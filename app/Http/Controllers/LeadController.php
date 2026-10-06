<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Store a newly created lead from the brief form.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'whatsapp' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'paketPilihan' => 'nullable|string|max:100',
            'pesan' => 'nullable|string|max:2000',
        ]);

        // Clean whatsapp number
        $phone = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        // Save lead in database
        $lead = Lead::create([
            'name' => $validated['nama'],
            'whatsapp' => $phone ?: $validated['whatsapp'],
            'email' => $validated['email'] ?? null,
            'interested_package' => $validated['paketPilihan'] ?? 'Paket Webkita Bisnis',
            'notes' => $validated['pesan'] ?? null,
            'source' => 'web_contact_form',
            'status' => 'new',
        ]);

        // Generate WhatsApp direct chat message
        $waText = "Halo Webkita, saya ingin konsultasi pembuatan website:\n";
        $waText .= "- Nama: " . $lead->name . "\n";
        $waText .= "- No WhatsApp: " . $lead->whatsapp . "\n";
        $waText .= "- Minat Paket: " . $lead->interested_package . "\n";
        if ($lead->notes) {
            $waText .= "- Keterangan: " . $lead->notes . "\n";
        }
        $waText .= "\nMohon informasi ketersediaan jadwal pengerjaan.";

        $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waText);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih, brief Anda telah kami terima!',
            'lead_id' => $lead->id,
            'whatsapp_url' => $waUrl,
        ]);
    }
}
