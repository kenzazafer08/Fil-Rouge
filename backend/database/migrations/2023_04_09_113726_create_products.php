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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('discription');
            $table->string('image');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('id_categorie');
            $table->foreign('id_categorie')->references('id')->on('pcategories');
            $table->integer('id_pet');
            $table->foreign('id_pet')->references('id')->on('pets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
