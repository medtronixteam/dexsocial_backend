<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('manual_telegram_messages', function (Blueprint $table) {
            $table->id();
            $table->string('token_name')->nullable();
            $table->string('image_path')->nullable();
            $table->string('token_symbol')->nullable();
            $table->string('token_chain')->nullable();
            $table->string('contract_address')->nullable();
            $table->text('description')->nullable();
            $table->string('telegram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->string('dexscreener')->nullable();
            $table->string('dextools')->nullable();
            $table->string('pancakeswap')->nullable();
            $table->tinyInteger('manually_added')->default(0); // Default value is 0
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manual_telegram_messages');
    }
};
