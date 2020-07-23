<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('telephone');
            $table->integer('type');
            $table->string('taille');
            $table->string('facebook');
            $table->integer('product_id')->unsigned();
            $table->timestamps();

       
    
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->onDelete('cascade');
      
           });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
