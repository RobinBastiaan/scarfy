<?php

namespace Tests;

use App\Models\Scarf;
use App\Models\ScarfUsage;
use App\Models\ScarfUsageType;
use App\Models\ScoutGroup;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Adding a visible ScoutGroup requires there to be an associated valid ScarfUsage and Scarf.
     */
    protected function addVisibleScoutGroup(array $scoutGroupData): ScoutGroup
    {
        /** @var ScarfUsageType $scarfUsageType */
        $scarfUsageType = ScarfUsageType::factory()->create(['name' => 'group']);
        /** @var ScoutGroup $scoutGroup */
        $scoutGroup = ScoutGroup::create($scoutGroupData);
        /** @var Scarf $scarf */
        $scarf = Scarf::factory()
            ->withBaseColor('#762d4e')
            ->withBorder(25, '#d0d7d7')
            ->withImage('png')
            ->create();

        /** @var ScarfUsage $scarfUsage */
        ScarfUsage::factory()->create([
            'scarf_id'            => $scarf->id,
            'scout_group_id'      => $scoutGroup->id,
            'scarf_usage_type_id' => $scarfUsageType->id,
        ]);

        return $scoutGroup;
    }
}
