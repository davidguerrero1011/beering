<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConfigurationTable extends Component
{

    public $type;
    public $information;
    public $block;
    public $currenCash;

    /**
     * Create a new component instance.
     */
    public function __construct(int $type, $information = null, $block = null, $currenCash=null)
    {
        $this->type = $type;
        $this->information = $information;
        $this->block = $block;
        $this->currenCash = $currenCash;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.configuration-table');
    }
}
