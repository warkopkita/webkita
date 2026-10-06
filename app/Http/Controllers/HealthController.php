<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HealthController extends Controller
{
    /**
     * Diagnostic health check endpoint for UptimeRobot, Docker, and status monitors.
     */
    public function check(): JsonResponse
    {
        $status = 'healthy';
        $checks = [
            'database' => 'connected',
            'cache' => 'operational',
            'storage' => 'writable',
        ];

        // 1. Database Check
        try {
            DB::connection()->getPdo();
        } catch (\Throwable $e) {
            $status = 'degraded';
            $checks['database'] = 'error: ' . $e->getMessage();
            Log::error('[HealthCheck] Database connection failed: ' . $e->getMessage());
        }

        // 2. Cache Check
        try {
            Cache::put('health_ping', true, 10);
            if (!Cache::get('health_ping')) {
                throw new \Exception('Cache write/read failed');
            }
        } catch (\Throwable $e) {
            $status = 'degraded';
            $checks['cache'] = 'error: ' . $e->getMessage();
            Log::error('[HealthCheck] Cache check failed: ' . $e->getMessage());
        }

        // 3. Storage Directory Writable
        if (!is_writable(storage_path())) {
            $status = 'degraded';
            $checks['storage'] = 'storage directory is not writable';
            Log::error('[HealthCheck] Storage path not writable: ' . storage_path());
        }

        $httpCode = ($status === 'healthy') ? 200 : 503;

        return response()->json([
            'status' => $status,
            'service' => 'Webkita Studio Platform',
            'environment' => config('app.env'),
            'timestamp' => Carbon::now()->toIso8601String(),
            'checks' => $checks,
        ], $httpCode);
    }
}
