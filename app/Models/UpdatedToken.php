<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdatedToken extends Model
{
    use HasFactory;

    protected $fillable = ['telegram_message_id', /* other fillable fields */];

    // Your other model code...

    public function telegramMessage()
    {
        return $this->belongsTo(TelegramMessage::class);
    }
}
