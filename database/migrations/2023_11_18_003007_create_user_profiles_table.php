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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("cover")->nullable();
            $table->string("avatar")->nullable();
            $table->string("name")->nullable();
            $table->text("introduce")->nullable();
            $table->date("birth")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable(); 
            $table->boolean("status")->default(false);
            $table->boolean("is_disabled")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
