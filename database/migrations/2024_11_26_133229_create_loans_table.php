<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('name_loan');
            $table->foreignId('item_id')->constrained('items_in')->onDelete('cascade');
            $table->enum('role', ['murid', 'karyawan']);
            $table->string('specification');
            $table->integer('total_loans');
            $table->date('loan_start_date');
            $table->date('loan_end_date');
            $table->string('description');
            $table->enum('status', ['baik', 'rusak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
