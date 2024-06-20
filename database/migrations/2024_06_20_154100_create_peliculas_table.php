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
        // La tabla peliculas tiene elementos
        Schema::create('peliculas', function (Blueprint $table) {
            // Los elementos son estos
            $table->id(); 
            $table->string('Title');
            $table->text('Description');
            $table->date('Release_date');
            $table->integer('Runtime');
            $table->String('Director');
            $table->String('Photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
