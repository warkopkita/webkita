<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class AbTestingService
{
    /**
     * Get or assign a variant for an experiment.
     * Persists user assignment in a secure cookie.
     *
     * @param string $experimentName e.g., 'hero_headline'
     * @param array $variants e.g., ['A' => 'Text A', 'B' => 'Text B']
     * @return array ['key' => 'A', 'value' => 'Text A']
     */
    public static function getExperiment(string $experimentName, array $variants): array
    {
        $cookieName = 'exp_' . $experimentName;
        $cookieVal = Request::cookie($cookieName);

        if ($cookieVal && array_key_exists($cookieVal, $variants)) {
            $selectedKey = $cookieVal;
        } else {
            // Deterministic or pseudo-random split
            $keys = array_keys($variants);
            $selectedKey = $keys[array_rand($keys)];

            // Queue cookie for 30 days
            Cookie::queue($cookieName, $selectedKey, 60 * 24 * 30);
        }

        return [
            'experiment' => $experimentName,
            'key' => $selectedKey,
            'value' => $variants[$selectedKey],
        ];
    }
}
