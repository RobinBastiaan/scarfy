<?php

namespace Tests\Feature;

use App\Models\Scarf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_counts(): void
    {
        Scarf::factory()->count(20)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Recente Toevoegingen');
    }
}
