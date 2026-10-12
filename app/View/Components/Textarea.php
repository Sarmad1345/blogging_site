<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $label;
    public $rows;
    public $placeholder;
    public $value;

    public function __construct($name, $label = '', $rows = 3, $placeholder = '', $value = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.textarea');
    }
}
