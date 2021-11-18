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
            $table->foreignId('scarf_usage_type_id')->constrained();
            $table->unique(['scout_group_id', 'scarf_usage_type_id']);
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
