<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class skills extends Component
{
    // public $skills;
    
    public function __construct($skills)
    {
        $this->skills = $skills;
    }

    public function render(): View|Closure|string
    {
        return view('components.skills', [
            'skills' => $this->skills
        ]);
    }
}
