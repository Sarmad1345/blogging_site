<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $placeholder;

    public function __construct($name, $options = [], $label = '', $selected = null, $placeholder = '-- Select --')
    {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label;
        $this->selected = $selected;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.select');
    }
}
