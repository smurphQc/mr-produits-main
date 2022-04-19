<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            /* La version complète serait $table->foreignId('product_id')
                                                ->references('id')
                                                ->on('products')
            constrained() se base sur les conventions de nommage Laravel
            pour déduire la table et la FK et permet d'éviter d'écrire
            ->references('id')->on('products').

            onDelete('cascade') s'assure de supprimer les options
            associées à un produit lorsqu'on supprime un produit */
            $table->foreignId('product_id')
              ->constrained()
              ->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }
};
