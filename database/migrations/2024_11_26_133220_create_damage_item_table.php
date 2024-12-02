<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageItemTable extends Migration
{
    public function up()
    {
        Schema::create('damage_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items_in')->onDelete('cascade');
            $table->date('date_damage');
            $table->integer('total_item');
            $table->enum('type_item', ['inventaris', 'bahan']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('damage_items');
    }
}

