<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $name;
    public $label;
    public $value;
    public $checked;
    public $class;
    public function __construct($type,$name,$label='',$value='',$checked='',$class= 'form-control')
    {
        //
        $this->type= $type;
        $this->name=$name;
        $this->label= $label;
        $this->value= $value;
        $this->checked= $checked;
        $this->class= $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}