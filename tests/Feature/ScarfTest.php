<?php

namespace Tests\Feature;

use App\Models\Scarf;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScarfTest extends TestCase
{
    use RefreshDatabase;

    public function test_find_scarf_or_show_404_page(): void
    {
        $response = $this->get('scarves/1');
        $response->assertStatus(404);

        Scarf::factory()->create();

        $response = $this->get('scarves');
        $response->assertStatus(200);
    }
}
