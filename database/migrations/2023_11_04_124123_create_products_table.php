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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('quantity');
            $table->string('photo');
            $table->string('thumnail');
            $table->char('status', 10);
            $table->char('outstand', 10)->default('close');
            $table->integer('comment_count')->default(0);
            $table->integer('view')->default(0);
            $table->integer('buy_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
