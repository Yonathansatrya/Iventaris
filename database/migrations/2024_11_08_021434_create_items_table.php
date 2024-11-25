<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code_item')->unique();
            $table->string('item_name');
            $table->enum('type_item',['inventaris','bahan'])->default('inventaris');
            $table->string('total_item');
            $table->date('date_in_item');
            $table->enum('status', ['tersedia', 'tidak tersedia', 'dipinjamkan', 'rusak'])->default('tersedia');
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
        Schema::dropIfExists('items');
    }
}
