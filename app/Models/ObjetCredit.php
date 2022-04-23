<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ObjetCredit extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $table = 'objets_credits';

    protected $fillable = [
        'libel',
        'code',
    ];
}
