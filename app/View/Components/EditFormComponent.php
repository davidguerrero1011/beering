<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditFormComponent extends Component
{

    public $type;
    public $id;
    public $users;
    public $information;
    public $countries;

    /**
     * Create a new component instance.
     */
    public function __construct(int $type, int $id, $users, $information, $countries)
    {
        $this->type = $type;
        $this->id = $id;
        $this->users = $users;
        $this->information = $information;
        $this->countries = $countries;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-form-component');
    }
}
