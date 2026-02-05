<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Ramsey\Uuid\Type\Integer;

class GeneralModalProfile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = 'Perfil', public Int $userId) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.general-modal-profile');
    }
}
