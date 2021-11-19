<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScarfUsages extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scarf_usages', function (Blueprint $table) {
            $table->id();
            $table->date('introduced_on');
            $table->date('cancelled_on')->nullable();
            $table->foreignId('scarf_id')->constrained();
            $table->foreignId('scout_group_id')->constrained();
            $table->foreignId('scarf_usage_type_id')->default(1)->constrained();
            $table->unique(['scarf_id', 'scout_group_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scarf_usages');
    }
}
