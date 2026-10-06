<!-- resources/views/components/analytics.blade.php -->
@php
    $ga4Id = config('services.analytics.ga4_id', env('GA4_MEASUREMENT_ID'));
    $metaPixelId = config('services.analytics.meta_pixel_id', env('META_PIXEL_ID'));
@endphp

@if ($ga4Id)
    <!-- Google Analytics 4 (GA4) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4Id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $ga4Id }}', {
            'anonymize_ip': true,
            'cookie_flags': 'SameSite=Lax;Secure'
        });
    </script>
@endif

@if ($metaPixelId)
    <!-- Meta Pixel (Facebook & Instagram Ads) -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ $metaPixelId }}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" 
             src="https://www.facebook.com/tr?id={{ $metaPixelId }}&ev=PageView&noscript=1"/>
    </noscript>
@endif
