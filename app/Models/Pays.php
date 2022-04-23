<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Pays extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $table= 'pays';

    protected $fillable = [
           'libel_pays',
           'code_pays',
           'libel_nationalite'

    ];
}
