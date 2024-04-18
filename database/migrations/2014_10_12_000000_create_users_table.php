<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_naissance');
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->string('pays')->default('Togo');
            $table->string('ville')->default('Sokodé');
            $table->string('quartier')->default('quartier');

            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('secret'));
            $table->unique(['first_name', 'last_name', 'date_naissance', 'sexe']);
            $table->rememberToken();
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
