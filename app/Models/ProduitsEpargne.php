<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ProduitsEpargne extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $table = 'produits_epargnes';

    protected $guarded = [];

}
