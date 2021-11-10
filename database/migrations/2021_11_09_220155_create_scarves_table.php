<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScarvesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scarves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('color_scheme');
            $table->integer('edge_size')->default(null)->nullable();
            $table->string('edge_color_scheme')->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scarves');
    }
}
