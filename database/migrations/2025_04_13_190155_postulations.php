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
        Schema::create('postulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('joboffer_id')->constrained('offres')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->string('status')->default('en attente');
            $table->date('application_date');
            $table->boolean('accepted_in_interview')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulations');
    }
};
