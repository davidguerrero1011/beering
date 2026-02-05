<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralForm extends Component
{

    public $type;
    public $cities;
    public $countries;
    public $roles;
    public $products;
    public $suppliers;
    public $users;
    public $tables;
    public $categories;
    public $paymentTypes;

    /**
     * Create a new component instance.
     */
    public function __construct(int $type, $cities, $countries, $roles, $products, $suppliers, $users, $tables, $categories, $paymentTypes)
    {
        $this->type = $type;
        $this->cities = $cities;
        $this->countries = $countries;
        $this->roles = $roles;
        $this->products = $products;
        $this->suppliers = $suppliers;
        $this->users = $users;
        $this->tables = $tables;
        $this->categories = $categories;
        $this->paymentTypes = $paymentTypes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general-form');
    }
}
