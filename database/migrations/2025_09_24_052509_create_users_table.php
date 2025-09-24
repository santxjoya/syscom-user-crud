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
        Schema::create('users', function (Blueprint $table) {
            $table->id('use_id');
            $table->string('use_name', 255);
            $table->string('use_mail', 255)->unique();
            $table->foreignId('rol_id')->constrained('roles','rol_id');
            $table->date('use_confirmation_date');
            $table->longText('use_signature')->nullable();
            $table->string('use_contract')->nullable();
            $table->date('use_elimination_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
