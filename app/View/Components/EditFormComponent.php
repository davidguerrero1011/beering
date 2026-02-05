<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditFormComponent extends Component
{
    public $type;
    public $id;
    public $cities;
    public $countries;
    public $roles;
    public $products;
    public $suppliers;
    public $users;
    public $information;
    public $categories;
    public $tables;
    public $paymentTypes;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $id, $cities, $countries, $roles, $products, $suppliers, $users, $information, $categories, $tables, $paymentTypes)
    {
        $this->type = $type;
        $this->id = $id;
        $this->cities = $cities;
        $this->countries = $countries;
        $this->roles = $roles;
        $this->products = $products;
        $this->suppliers = $suppliers;
        $this->users = $users;
        $this->information = $information;
        $this->categories = $categories;
        $this->tables = $tables;
        $this->paymentTypes = $paymentTypes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-form-component');
    }
}
