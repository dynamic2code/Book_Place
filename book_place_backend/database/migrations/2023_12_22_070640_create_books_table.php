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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId("added_by")->constrained('admin');
            $table->string("name");
            $table->string("publisher");
            $table->string("isbn");
            $table->string("category");
            $table->string("sub_category");
            $table->text("description");
            $table->integer("pages");
            $table->string("image");
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
        Schema::dropIfExists('books');
    }
};
