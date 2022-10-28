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
        Schema::create('bds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->string('description');
            $table->string('category');
            $table->string('files')->nullable();
            #$table->string('file_path')->nullable();
            $table->string('status')->enum('en cours','termine','debut');
            $table->string('publishing_house');
            $table->dateTime('parution_date');
            $table->unsignedBigInteger('publication_id')->references('id')->on('publications')->onDelete('cascade')->default(1);
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
        Schema::dropIfExists('bds');
    }
};
