<?php

namespace App\View\Components\components;

use Illuminate\View\Component;

class d_link extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.components.d_link');
    }
}
