<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProcessedAtToTelegramMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('telegram_messages', function (Blueprint $table) {
            $table->timestamp('processed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('telegram_messages', function (Blueprint $table) {
            $table->dropColumn('processed_at');
        });
    }
}