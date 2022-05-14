<?php

namespace App\View\Components;

use App\Models\TypeCredit;
use Illuminate\View\Component;

class TypecreditSortInformation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $typecredits;

    public function __construct(TypeCredit $typecredits)
    {
        //
        $this->typecredits = $typecredits;
    }


    public function periodicite()
    {
        $descriptions = [
            1 => __('In the process'),
            3 => __('Paid'),
            6 => __('Cancellation'),
            12 => __('Refund'),
        ];

        if (array_key_exists($this->typecredits->periodicite, $descriptions)) {
            return $descriptions[$this->typecredits->periodicite];
        }

        return 'Unknown';
    }

    public function caution()
    {
        $descriptions = [
            1 => __('In the process'),
            3 => __('Paid'),
            6 => __('Cancellation'),
            12 => __('Refund'),
        ];

        if (array_key_exists($this->typecredits->typ_caution_financiere, $descriptions)) {
            return $descriptions[$this->typecredits->typ_caution_financiere];
        }

        return 'Unknown';
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typecredit-sort-information');
    }
}
