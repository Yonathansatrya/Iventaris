<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairDamageItemsTable extends Migration
{
    public function up()
    {
        Schema::create('repair_damage_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damage_item_id')->constrained('damage_items')->onDelete('cascade');
            $table->string('information');
            $table->date('repair_completion_date')->nullable();
            $table->string('name_technician');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repair_damage_items');
    }
}

