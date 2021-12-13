<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class dinput extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $type;
    public $value;

    public function __construct($label, $type, $value)
    {
        $this->label = $label;
        $this->type  = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.r_input');
    }
}
