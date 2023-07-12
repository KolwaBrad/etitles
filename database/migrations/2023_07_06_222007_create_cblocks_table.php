<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('c_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indexb');
            $table->string('owner_id');
            $table->string('title_id');
            $table->string('previousHash');
            $table->string('hash');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_blocks');
    }
};
