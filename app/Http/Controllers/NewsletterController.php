<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Subscribe an email to Webkita digital insights newsletter.
     */
    public function subscribe(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email:filter|max:150',
            'source' => 'nullable|string|max:50',
        ]);

        $subscriber = NewsletterSubscriber::updateOrCreate(
            ['email' => strtolower(trim($validated['email']))],
            [
                'is_active' => true,
                'source' => $validated['source'] ?? 'website_footer',
                'ip_address' => $request->ip(),
                'subscribed_at' => now(),
            ]
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Terima kasih! Email Anda telah terdaftar untuk menerima wawasan digital Webkita.',
            ]);
        }

        return back()->with('success', 'Terima kasih! Email Anda telah terdaftar untuk menerima wawasan digital Webkita.');
    }
}
