<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsInTable extends Migration
{
    public function up()
    {
        Schema::create('items_in', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->unique();
            $table->string('specification')->unique();
            $table->string('procurement_sources');
            $table->integer('total_item');
            $table->string('condition');
            $table->enum('type_item', ['inventaris', 'bahan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items_in');
    }
}
