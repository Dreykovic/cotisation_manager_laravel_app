<?php

use App\Models\Membre;
use App\Models\Nature;
use App\Models\Tresorier;
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
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('montant');
            $table->enum('canal', ['Tmoney', 'Flooz', 'Main à main'])->default('Main à main');
            $table->date('date_cotisation')->default(now());
            $table->foreignIdFor(Membre::class);
            $table->foreignIdFor(Tresorier::class);
            $table->foreignIdFor(Nature::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotisations');
    }
};
