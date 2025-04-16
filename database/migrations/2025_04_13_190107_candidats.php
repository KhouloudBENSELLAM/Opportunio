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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('utilisateurs')->onDelete('cascade');
            // $table->text('info_profile')->nullable();
            $table->text('skills')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->string('cv')->nullable();
            $table->text('preferences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
