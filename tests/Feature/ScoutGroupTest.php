<?php

namespace Tests\Feature;

use App\Models\Association;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScoutGroupTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Association::factory()->create([
            'name'       => 'Scouting Nederland',
            'country'    => 'Netherlands',
            'founded_on' => '1911-04-01',
        ]);
    }

    public function test_find_scout_group_or_show_404_page(): void
    {
        $scoutGroupData = [
            'name'           => 'My Scouting Group Name',
            'website'        => 'some.website',
            'city'           => 'some.city',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'association_id' => Association::where('name', 'Scouting Nederland')->first()->id,
        ];

        // check the old situation
        $response = $this->get('/groups/my-scouting-group-name');
        $response->assertStatus(404);

        // change the situation
        $this->addVisibleScoutGroup($scoutGroupData);

        // check the new situation
        $this->withoutExceptionHandling();
        $this->assertDatabaseHas('scout_groups', $scoutGroupData);
        $response = $this->get('/groups/my-scouting-group-name');
        $response->assertStatus(200);
        $response->assertSeeText($scoutGroupData['name']);
    }
}
