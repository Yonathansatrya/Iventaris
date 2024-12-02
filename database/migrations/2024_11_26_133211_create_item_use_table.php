<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemUseTable extends Migration
{
    public function up()
    {
        Schema::create('item_use', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items_in')->onDelete('cascade');
            $table->integer('total_use');
            $table->date('date_use');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_use');
    }
}
