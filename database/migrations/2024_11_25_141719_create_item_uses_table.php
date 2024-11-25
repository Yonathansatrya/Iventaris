<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_uses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->integer('total_use');
            $table->text('description')->nullable();
            $table->timestamps();

            // Foreign key untuk item_id
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_uses');
    }
}
