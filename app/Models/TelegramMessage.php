<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramMessage extends Model
{
    use HasFactory;
    protected $fillable = ['from_first_name', 'text', 'processed_at', 'promoted_token'];
}
