<?php

namespace Tests\Feature;

use App\Models\Association;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
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

    /**
     * A basic test example.
     */
    public function test_homepage_data(): void
    {
        // check the old situation
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSeeText('Recente Toevoegingen');

        // change the situation
        $this->addVisibleScoutGroup([
            'name'           => 'My Scouting Group Name',
            'website'        => 'some.website',
            'city'           => 'some.city',
            'country'        => 'Netherlands',
            'founded_on'     => '2000-01-01',
            'association_id' => Association::where('name', 'Scouting Nederland')->first()->id,
        ]);

        // check the new situation
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Recente Toevoegingen');
    }
}
