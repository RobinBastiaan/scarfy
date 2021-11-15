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
            $table->string('color_scheme_right')->default(null)->nullable();
            $table->integer('edge_size1')->default(null)->nullable();
            $table->string('edge_color_scheme1')->default(null)->nullable();
            $table->string('edge_color_scheme_right1')->default(null)->nullable();
            $table->integer('edge_size2')->default(null)->nullable();
            $table->string('edge_color_scheme2')->default(null)->nullable();
            $table->string('edge_color_scheme_right2')->default(null)->nullable();
            $table->integer('edge_size3')->default(null)->nullable();
            $table->string('edge_color_scheme3')->default(null)->nullable();
            $table->string('edge_color_scheme_right3')->default(null)->nullable();
            $table->integer('edge_size4')->default(null)->nullable();
            $table->string('edge_color_scheme4')->default(null)->nullable();
            $table->string('edge_color_scheme_right4')->default(null)->nullable();
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
