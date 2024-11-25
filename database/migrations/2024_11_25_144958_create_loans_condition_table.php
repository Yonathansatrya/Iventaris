<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansConditionTable extends Migration
{
    public function up()
    {
        Schema::create('loans_condition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->onDelete('cascade');
            $table->enum('status_condition', ['normal', 'rusak_ringan', 'rusak_berat']);
            $table->string('damage_report')->nullable();
            $table->string('photo_report')->nullable();
            $table->string('responsibility')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans_condition');
    }
}
