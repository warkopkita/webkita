<?php

namespace App\Http\Controllers;

use App\Models\PageLegal;
use Illuminate\Contracts\View\View;

class LegalController extends Controller
{
    public function privacyPolicy(): View
    {
        $page = PageLegal::firstOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Kebijakan Privasi (Privacy Policy)',
                'content' => '<p>Webkita berkomitmen penuh untuk melindungi privasi Anda sesuai UU PDP No. 27 Tahun 2022.</p>',
            ]
        );

        return view('legal.show', compact('page'));
    }

    public function termsOfService(): View
    {
        $page = PageLegal::firstOrCreate(
            ['slug' => 'terms-of-service'],
            [
                'title' => 'Syarat & Ketentuan Layanan (Terms of Service)',
                'content' => '<p>Syarat dan ketentuan pengerjaan website bersama Webkita Studio.</p>',
            ]
        );

        return view('legal.show', compact('page'));
    }
}
