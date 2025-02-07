<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualTelegramMessage extends Model
{
    protected $fillable = [
        // Add the fillable fields here
        'token_name',
        'image_path',
        'token_symbol',
        'token_chain',
        'contract_address',
        'description',
        'telegram',
        'twitter',
        'website',
        'dexscreener',
        'dextools',
        'pancakeswap',
        'manually_added',
        'promoted',
        'people_clicked',
    ];
    public static $rules = [
        'promoted' => 'required|in:0,1', // Validation rules for 'promoted'
        // Add other validation rules...
    ];
}
