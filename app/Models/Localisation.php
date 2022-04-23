<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;


class Localisation extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;
protected $table = 'localisations';

protected $fillable = [
    'libelle',
    'parent',
];

}
