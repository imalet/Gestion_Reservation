<?php

use App\Models\Association;
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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_limite_inscription');
            $table->text('description');
            $table->string('path_image');
            $table->enum('est_cloture_ou_pas',['cloture', 'pas cloture']);
            $table->date('date_evenement');
            $table->foreignIdFor(Association::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
