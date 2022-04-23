<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Support\Facades\Layout;
use App\Models\TypeCredit;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\DateTimer;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
           // ID::make(__('ID'), 'id'),
            //BelongsTo::make('Client', 'client', 'App\Nova\Client')->searchable(),

        ];

    }
}
