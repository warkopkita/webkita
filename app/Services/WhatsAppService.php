<?php

namespace App\Services;

use App\Models\Lead;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Send generic WhatsApp message using configured provider (Fonnte, Wablas, or Log).
     */
    public function sendMessage(string $recipientPhone, string $message): array
    {
        $provider = config('services.whatsapp.provider', env('WHATSAPP_GATEWAY_PROVIDER', 'log'));
        $token = config('services.whatsapp.token', env('WHATSAPP_API_TOKEN', ''));

        // Sanitize phone number (e.g., 08123... -> 628123...)
        $phone = preg_replace('/[^0-9]/', '', $recipientPhone);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        if (empty($token) || $provider === 'log') {
            Log::info("[WhatsApp Gateway - MOCK/LOG] To: {$phone} | Provider: {$provider} | Message: {$message}");
            return [
                'success' => true,
                'provider' => 'log',
                'target' => $phone,
                'message' => 'Message simulated and logged (API token not configured).',
            ];
        }

        try {
            if ($provider === 'fonnte') {
                $response = Http::withHeaders([
                    'Authorization' => $token,
                ])->asForm()->post('https://api.fonnte.com/send', [
                    'target' => $phone,
                    'message' => $message,
                ]);

                return [
                    'success' => $response->successful(),
                    'provider' => 'fonnte',
                    'response' => $response->json(),
                ];
            }

            if ($provider === 'wablas') {
                $domain = env('WABLAS_DOMAIN', 'teks.wablas.com');
                $response = Http::withHeaders([
                    'Authorization' => $token,
                ])->asForm()->post("https://{$domain}/api/send-message", [
                    'phone' => $phone,
                    'message' => $message,
                ]);

                return [
                    'success' => $response->successful(),
                    'provider' => 'wablas',
                    'response' => $response->json(),
                ];
            }

            Log::warning("[WhatsApp Gateway] Unsupported provider: {$provider}");
            return ['success' => false, 'error' => "Unsupported provider {$provider}"];
        } catch (\Throwable $e) {
            Log::error("[WhatsApp Gateway] Delivery failed: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Notify client upon successful payment confirmation.
     */
    public function sendPaymentSuccess(Order $order): array
    {
        $clientPhone = $order->user->whatsapp ?? null;
        if (!$clientPhone) {
            return ['success' => false, 'error' => 'No client WhatsApp number.'];
        }

        $amountFormatted = 'Rp ' . number_format($order->total_price, 0, ',', '.');
        $portalUrl = url('/portal/dashboard');
        $invoiceUrl = url("/portal/orders/{$order->id}/invoice");

        $message = "Halo {$order->user->name}! 🎉\n\n"
            . "Pembayaran untuk pesanan *{$order->order_code}* ({$order->package->name}) sejumlah *{$amountFormatted}* telah BERHASIL diverifikasi dan statusnya LUNAS.\n\n"
            . "Tahap berikutnya: Silakan lengkapi brief proyek Anda melalui Portal Klien Webkita agar tim desainer & developer dapat segera memulai pengerjaan.\n\n"
            . "🔗 Portal Klien: {$portalUrl}\n"
            . "🧾 Unduh Invoice Resmi: {$invoiceUrl}\n\n"
            . "Terima kasih telah mempercayakan pembuatan website bisnis Anda kepada Webkita Studio!";

        return $this->sendMessage($clientPhone, $message);
    }

    /**
     * Notify client when order milestone status changes.
     */
    public function sendOrderStatusUpdate(Order $order, string $status): array
    {
        $clientPhone = $order->user->whatsapp ?? null;
        if (!$clientPhone) {
            return ['success' => false, 'error' => 'No client WhatsApp number.'];
        }

        $statusLabels = [
            'unpaid' => 'Menunggu Pembayaran',
            'paid' => 'Pembayaran Terverifikasi (Lunas)',
            'in_progress' => 'Sedang Dikerjakan (Development & UI/UX)',
            'review' => 'Siap Direview oleh Klien',
            'completed' => 'Proyek Selesai & Go-Live',
            'cancelled' => 'Dibatalkan',
        ];

        $statusText = $statusLabels[$status] ?? ucfirst($status);
        $portalUrl = url('/portal/dashboard');

        $message = "Halo {$order->user->name},\n\n"
            . "Pemberitahuan pembaruan status proyek *{$order->order_code}* ({$order->package->name}):\n\n"
            . "Status saat ini: *{$statusText}*\n\n"
            . "Silakan pantau perkembangan atau berikan masukan melalui portal klien Anda:\n"
            . "🔗 {$portalUrl}\n\n"
            . "Salam hangat,\nTim Webkita Studio";

        return $this->sendMessage($clientPhone, $message);
    }

    /**
     * Notify Admin hotline when a new lead inquiry arrives.
     */
    public function sendAdminNewLeadNotification(Lead $lead): array
    {
        $adminPhone = env('WHATSAPP_ADMIN_NUMBER', '6281234567890');
        $phone = $lead->whatsapp ?? $lead->phone ?? '-';
        $notes = $lead->notes ?? $lead->message ?? '-';
        $interested = $lead->interested_package ?? 'Konsultasi Web';

        $message = "🚨 *LEAD BARU MASUK - WEBKITA*\n\n"
            . "• Nama: {$lead->name}\n"
            . "• Email: " . ($lead->email ?? '-') . "\n"
            . "• WhatsApp: {$phone}\n"
            . "• Minat Paket: {$interested}\n"
            . "• Pesan/Catatan: \"{$notes}\"\n\n"
            . "Segera follow up via WhatsApp: https://wa.me/{$phone}";

        return $this->sendMessage($adminPhone, $message);
    }
}
