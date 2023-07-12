<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('title_id');
            $table->string('location_name');
            $table->string('owner_id');
            $table->string('owner_fname');
            $table->string('owner_lname');
            $table->string('bidder_id');
            $table->string('bidder_fname');
            $table->string('bidder_lname');
            $table->string('admin_id');
            $table->string('admin_fname');
            $table->string('admin_lname');
            $table->string('cost');
            $table->string('owner_approve');
            $table->string('bidder_approve');
            $table->string('admin_approve');
            $table->string('bank_statement');
            $table->string('transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
