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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name_on_card');
            $table->string('email_on_card');
            $table->string('phone_on_card');
            $table->string('status');
            $table->string('st_name')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('profile_image')->nullable();
            $table->string('background_color')->nullable();
            $table->foreignId('card_design_id')->constrained('card_designs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
