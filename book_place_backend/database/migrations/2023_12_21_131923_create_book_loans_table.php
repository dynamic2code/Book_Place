<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('user');
            $table->foreignId("book_id")->constrained('book');
            $table->dateTime("loan_date");
            $table->dateTime("due_date");
            $table->dateTime("return_date");
            $table->boolean("extended")->default(false);
            $table->timestamps("extension_date");
            $table->float("penalty_amount");
            $table->enum('penalty_status', ['pending', 'approved', 'none'])->default('none');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId("added_by")->constrained('admin');
            $table->timestamps("created_at");
            $table->timestamps("updated_at");
            $table->timestamps("deleted_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_loans');
    }
};
