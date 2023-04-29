<?php

namespace HexGad\Forms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $casts = ['properties' => 'json'];

    protected $fillable = [
        'title',
        'description',
        'submit_button_text',
        'submit_action',
        'redirection_url',
        'submit_message',
        'properties'
    ];
}
