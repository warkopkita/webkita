<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class WebkitaPlatformTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Test public homepage loads successfully.
     */
    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Webkita');
        $response->assertSee('UI/UX Portfolio');
    }

    /**
     * Test blog index and single post load.
     */
    public function test_blog_index_and_post_load(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Wawasan');

        $post = BlogPost::where('is_published', true)->first();
        if ($post) {
            $postResponse = $this->get('/blog/' . $post->slug);
            $postResponse->assertStatus(200);
            $postResponse->assertSee($post->title);
        }
    }

    /**
     * Test legal compliance pages load.
     */
    public function test_legal_pages_load(): void
    {
        $this->get('/kebijakan-privasi')->assertStatus(200)->assertSee('UU PDP');
        $this->get('/syarat-ketentuan')->assertStatus(200)->assertSee('Syarat & Ketentuan');
    }

    /**
     * Test dynamic sitemap.xml and robots.txt.
     */
    public function test_sitemap_and_robots_load(): void
    {
        $sitemap = $this->get('/sitemap.xml');
        $sitemap->assertStatus(200);
        $sitemap->assertHeader('Content-Type', 'application/xml');
        $this->assertStringContainsString('<urlset', $sitemap->getContent());

        $robots = $this->get('/robots.txt');
        $robots->assertStatus(200);
        $robots->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $this->assertStringContainsString('Sitemap:', $robots->getContent());
    }

    /**
     * Test package checkout page loads with package data.
     */
    public function test_package_checkout_page_loads(): void
    {
        $pkg = Package::where('slug', 'paket-bisnis')->first();
        $this->assertNotNull($pkg);

        $response = $this->get('/checkout/' . $pkg->slug);
        $response->assertStatus(200);
        $response->assertSee($pkg->name);
    }

    /**
     * Test client checkout form creates an order and user account.
     */
    public function test_checkout_form_submission_creates_order(): void
    {
        $pkg = Package::where('slug', 'paket-kilat')->first();
        $this->assertNotNull($pkg);

        $email = 'test.client.' . time() . '@example.com';
        $postData = [
            'customer_name' => 'Budi Santoso Test',
            'customer_email' => $email,
            'customer_whatsapp' => '081299998888',
            'domain_request' => 'budibisnis.id',
            'notes' => 'Tolong dibuatkan cepat.',
            'password' => 'password123',
        ];

        $response = $this->post('/checkout/' . $pkg->slug, $postData);
        $response->assertRedirect();

        $order = Order::where('customer_email', $email)->first();
        $this->assertNotNull($order);
        $this->assertEquals('unpaid', $order->status);
        $this->assertEquals($pkg->id, $order->package_id);

        // Verify payment page accessible
        $payResponse = $this->get('/checkout/payment/' . $order->order_code);
        $payResponse->assertStatus(200);
        $payResponse->assertSee($order->order_code);

        // Verify simulated instant payment
        $simResponse = $this->post('/checkout/payment/' . $order->order_code . '/simulate');
        $simResponse->assertRedirect(route('portal.dashboard'));

        $order->refresh();
        $this->assertEquals('paid', $order->status);

        // Verify invoice accessible
        $invResponse = $this->actingAs($order->user)->get('/portal/orders/' . $order->id . '/invoice');
        $invResponse->assertStatus(200);
        $invResponse->assertSee('INV-' . $order->order_code);
        $invResponse->assertSee('LUNAS');
    }

    /**
     * Test admin dashboard role guard.
     */
    public function test_admin_dashboard_requires_admin_role(): void
    {
        // Guest redirect to login
        $this->get('/admin/dashboard')->assertRedirect('/login');

        // Client forbidden (403)
        $client = User::where('role', 'client')->first();
        if ($client) {
            $this->actingAs($client)->get('/admin/dashboard')->assertStatus(403);
        }

        // Admin allowed (200)
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $response = $this->actingAs($admin)->get('/admin/dashboard');
            $response->assertStatus(200);
            $response->assertSee('Panel Manajemen Webkita');

            // Admin CSV export test
            $csvResponse = $this->actingAs($admin)->get('/admin/payments/export-csv');
            $csvResponse->assertStatus(200);
            $this->assertStringContainsString('text/csv', $csvResponse->headers->get('Content-Type'));
        }
    }
}
