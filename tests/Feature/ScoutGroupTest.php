<?php

namespace Tests\Feature;

use App\Models\Association;
use App\Models\ScoutGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScoutGroupTest extends TestCase
{
    use RefreshDatabase;

    public function test_find_scarf_or_show_404_page(): void
    {
        Association::factory()->create([
            'name'       => 'Scouting Nederland',
            'country'    => 'Netherlands',
            'founded_on' => '1911-04-01',
        ]);

        $response = $this->get('groups/1');
        $response->assertStatus(404);

        $scoutGroup = ScoutGroup::factory()->create([
            'name' => 'My Scouting Group Name',
            'website'    => 'some.website',
            'city'       => 'some.city',
            'country'    => 'Netherlands',
        ]);
        $response = $this->get('groups/my-scouting-group-name');
        $response->assertStatus(200);
        $response->assertViewHas('scoutGroup', $scoutGroup);
    }
}
