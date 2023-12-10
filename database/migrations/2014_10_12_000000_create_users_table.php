<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->date('birth_date');
            $table->string('nickname')->nullable();

            $table->text('image_porfile')->nullable();
            $table->enum('type', ['ADM', 'PRF', 'SKR'])->default('SKR');

            $table->foreignId('address')->constrained('addresses')->nullOnDelete();
            $table->foreignId('nationality')->constrained('countries')->nullOnDelete();

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
