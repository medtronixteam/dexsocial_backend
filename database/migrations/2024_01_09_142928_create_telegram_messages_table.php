<?php

// database/migrations/YYYY_MM_DD_create_telegram_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('telegram_messages', function (Blueprint $table) {
            $table->id();
            $table->string('from_first_name');
            $table->text('text');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
            $table->unique(['from_first_name', 'text']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('telegram_messages');
    }
}

