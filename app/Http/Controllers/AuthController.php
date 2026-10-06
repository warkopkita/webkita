<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show login page.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login submission.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('portal.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Show register page.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Handle client registration.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'whatsapp' => 'required|string|max:25',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $phone = preg_replace('/[^0-9]/', '', $validated['whatsapp']);
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp' => $phone ?: $validated['whatsapp'],
            'password' => Hash::make($validated['password']),
            'role' => 'client',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('portal.dashboard')->with('success', 'Akun berhasil didaftarkan! Selamat datang di Client Portal Webkita.');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('info', 'Anda telah berhasil keluar.');
    }

    /**
     * Redirect to Google OAuth or handle local demo login.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        $clientId = config('services.google.client_id', env('GOOGLE_CLIENT_ID'));

        if (! empty($clientId)) {
            $redirectUri = url('/auth/google/callback');
            $query = http_build_query([
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri,
                'response_type' => 'code',
                'scope' => 'openid profile email',
                'access_type' => 'online',
                'state' => csrf_token(),
            ]);

            return redirect('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
        }

        // Development demo fallback
        $user = User::firstOrCreate(
            ['email' => 'klien.google.demo@webkita.id'],
            [
                'name' => 'Budi Santoso (Google Demo)',
                'password' => Hash::make(\Illuminate\Support\Str::random(16)),
                'role' => 'client',
                'whatsapp' => '081298765432',
                'referral_code' => 'WK-G' . strtoupper(\Illuminate\Support\Str::random(5)),
            ]
        );

        Auth::login($user);

        return redirect()->route('portal.dashboard')->with('success', 'Berhasil masuk dengan Akun Google (Mode Cepat).');
    }

    /**
     * Handle Google OAuth callback.
     */
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        $code = $request->input('code');
        $clientId = config('services.google.client_id', env('GOOGLE_CLIENT_ID'));
        $clientSecret = config('services.google.client_secret', env('GOOGLE_CLIENT_SECRET'));

        if ($code && $clientId && $clientSecret) {
            try {
                $tokenResponse = \Illuminate\Support\Facades\Http::asForm()->post('https://oauth2.googleapis.com/token', [
                    'code' => $code,
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'redirect_uri' => url('/auth/google/callback'),
                    'grant_type' => 'authorization_code',
                ]);

                if ($tokenResponse->successful()) {
                    $token = $tokenResponse->json()['access_token'] ?? null;
                    $userResponse = \Illuminate\Support\Facades\Http::withToken($token)->get('https://www.googleapis.com/oauth2/v3/userinfo');

                    if ($userResponse->successful()) {
                        $googleUser = $userResponse->json();
                        $user = User::firstOrCreate(
                            ['email' => $googleUser['email']],
                            [
                                'name' => $googleUser['name'] ?? 'Pengguna Google',
                                'password' => Hash::make(\Illuminate\Support\Str::random(24)),
                                'role' => 'client',
                                'whatsapp' => '0812' . rand(10000000, 99999999),
                                'referral_code' => 'WK-G' . strtoupper(\Illuminate\Support\Str::random(5)),
                            ]
                        );

                        Auth::login($user);
                        return redirect()->route('portal.dashboard')->with('success', 'Berhasil masuk melalui Akun Google.');
                    }
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::error('Google OAuth Error: ' . $e->getMessage());
            }
        }

        return redirect()->route('login')->withErrors(['email' => 'Gagal mengautentikasi akun Google. Silakan masuk manual.']);
    }
}

