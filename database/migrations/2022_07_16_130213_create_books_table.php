<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::create('books' , function ( Blueprint $table )
        {
            $table->id();
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade')->onUpdate('cascade');
            $table->string('book_name');
            $table->integer('number_of_pages');
            $table->string('publisher');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::dropIfExists('books');
    }
};
