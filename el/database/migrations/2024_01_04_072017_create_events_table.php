<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable(false);
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->date('date')->nullable(false);
        $table->time('time')->nullable(false);
        $table->string('location')->nullable();
        $table->string('link')->nullable(false);
        $table->string('presentateur')->nullable(false);
        $table->timestamps(); // Cette ligne inclut les colonnes "created_at" et "updated_at" par défaut
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
