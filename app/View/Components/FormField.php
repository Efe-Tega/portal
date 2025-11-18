<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormField extends Component
{
    public $label;
    public $name;
    public $type;
    public $required;
    public $placeholder;
    public $options;
    public $value;

    public function __construct($label, $name, $type = 'text', $required = false, $placeholder = '', $options = [], $value = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-field');
    }
}
