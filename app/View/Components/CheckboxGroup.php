<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxGroup extends Component
{
    public $name;
    public $label;
    public $items;
    public $selected;

    public function __construct($name, $items = [], $label = '', $selected = [])
    {
        $this->name = $name;
        $this->items = $items;
        $this->label = $label;
        $this->selected = $selected;
    }

    public function render(): View|Closure|string
    {
        return view('components.checkbox-group');
    }
}
