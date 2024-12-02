<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsibilityItemLoansTable extends Migration
{
    public function up()
    {
        Schema::create('responsibility_item_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->onDelete('cascade');
            $table->integer('total_loan');
            $table->string('description_responsibility');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('responsibility_item_loans');
    }
}
