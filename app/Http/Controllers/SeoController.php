<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Package;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Generate dynamic XML Sitemap for Google & Bing.
     */
    public function sitemap(): Response
    {
        $baseUrl = url('/');
        $posts = BlogPost::where('is_published', true)->latest('published_at')->get();
        $packages = Package::where('is_active', true)->get();

        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. Homepage
        $content .= "  <url>\n";
        $content .= "    <loc>{$baseUrl}/</loc>\n";
        $content .= "    <changefreq>daily</changefreq>\n";
        $content .= "    <priority>1.0</priority>\n";
        $content .= "  </url>\n";

        // 2. Blog Index
        $content .= "  <url>\n";
        $content .= "    <loc>{$baseUrl}/blog</loc>\n";
        $content .= "    <changefreq>daily</changefreq>\n";
        $content .= "    <priority>0.8</priority>\n";
        $content .= "  </url>\n";

        // 3. Blog Posts
        foreach ($posts as $post) {
            $lastmod = ($post->updated_at ?? $post->created_at)->toAtomString();
            $content .= "  <url>\n";
            $content .= "    <loc>{$baseUrl}/blog/{$post->slug}</loc>\n";
            $content .= "    <lastmod>{$lastmod}</lastmod>\n";
            $content .= "    <changefreq>weekly</changefreq>\n";
            $content .= "    <priority>0.7</priority>\n";
            $content .= "  </url>\n";
        }

        // 4. Package Checkout
        foreach ($packages as $pkg) {
            $content .= "  <url>\n";
            $content .= "    <loc>{$baseUrl}/checkout/{$pkg->slug}</loc>\n";
            $content .= "    <changefreq>monthly</changefreq>\n";
            $content .= "    <priority>0.8</priority>\n";
            $content .= "  </url>\n";
        }

        // 5. Legal Pages
        $content .= "  <url>\n";
        $content .= "    <loc>{$baseUrl}/kebijakan-privasi</loc>\n";
        $content .= "    <changefreq>monthly</changefreq>\n";
        $content .= "    <priority>0.3</priority>\n";
        $content .= "  </url>\n";

        $content .= "  <url>\n";
        $content .= "    <loc>{$baseUrl}/syarat-ketentuan</loc>\n";
        $content .= "    <changefreq>monthly</changefreq>\n";
        $content .= "    <priority>0.3</priority>\n";
        $content .= "  </url>\n";

        $content .= '</urlset>';

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * Generate dynamic robots.txt file.
     */
    public function robots(): Response
    {
        $baseUrl = url('/');
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /portal/\n";
        $content .= "Disallow: /api/\n";
        $content .= "\n";
        $content .= "Sitemap: {$baseUrl}/sitemap.xml\n";

        return response($content, 200, ['Content-Type' => 'text/plain']);
    }
}
