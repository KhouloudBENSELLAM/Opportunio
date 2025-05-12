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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();

            // Clé étrangère liée à la table recruteurs (assure-toi que cette table existe déjà)
            $table->foreignId('company_id')
                  ->constrained('recruteurs') // référence automatiquement la clé primaire 'id'
                  ->onDelete('cascade');      // suppression en cascade

            $table->string('title', 255);
            $table->text('description');
            $table->text('requirements');
            $table->string('location', 255);
            $table->enum('contract_type', ['CDI', 'CDD', 'Freelance', 'Stage', 'Alternance'])->default('CDI'); // exemple de types
            $table->date('date_posted')->default(now()); // valeur par défaut = aujourd’hui
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active'); // bonne pratique
            $table->string('type', 100); // ex: 'temps plein', 'temps partiel'
            $table->string('duree', 100)->nullable(); // exemple: '6 mois', '1 an'

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
