<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Webkita — Jasa Pembuatan Website Bisnis Profesional, Cepat & Terjangkau')</title>
    <meta name="description" content="@yield('meta_description', 'Solusi pembuatan website bisnis profesional, landing page konversi tinggi, toko online otomatis, dan aplikasi web kustom berbasis Laravel. Pengerjaan cepat mulai 3 hari kerja.')">
    <meta name="keywords" content="jasa web development, buat website bisnis, bikin landing page umkm, toko online otomatis, web developer indonesia, laravel developer, webkita">
    <meta name="author" content="Webkita Studio">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Webkita — Solusi Website Bisnis Cepat, Andal, dan Terjangkau')">
    <meta property="og:description" content="Bikin website bisnis profesional yang menghasilkan penjualan tanpa ribet bersama Webkita.">
    <meta property="og:image" content="{{ asset('images/og-webkita.jpg') }}">

    <!-- PWA Manifest & Theme Color -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#381867">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23C8F169' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'><polyline points='16 18 22 12 16 6'/><polyline points='8 6 2 12 8 18'/><path d='m9 15 3-7 3 7'/></svg>">

    <!-- Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|inter:400,500,600" rel="stylesheet" />

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ProfessionalService",
      "name": "Webkita Web Development Studio",
      "url": "{{ url('/') }}",
      "logo": "{{ url('/') }}/logo.png",
      "description": "Studio UI/UX and Web Development profesional berbasis Laravel di Indonesia. Solusi website bisnis, landing page, dan toko online otomatis.",
      "address": {
        "@@type": "PostalAddress",
        "addressCountry": "ID"
      },
      "priceRange": "Rp 499.000 - Rp 3.500.000"
    }
    </script>

    @stack('styles')
</head>
<body class="bg-[#381867] text-white font-sans antialiased selection:bg-[#C8F169] selection:text-[#1E0A38]">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Floating WhatsApp Widget -->
    @include('components.floating-whatsapp')

    <!-- Real-time Social Proof Notification -->
    @include('components.social-proof-popup')

    <!-- Cookie Consent Banner (UU PDP Compliance) -->
    @include('components.cookie-consent')

    @stack('scripts')
</body>
</html>
