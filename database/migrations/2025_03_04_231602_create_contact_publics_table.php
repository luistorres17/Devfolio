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
    {
        Schema::create('contact_publics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('mensaje');
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->enum('status', ['pendiente', 'leido'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_publics');
    }
};
