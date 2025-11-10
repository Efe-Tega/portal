<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $title;
    public $columns;
    public $item;
    public $searchable;
    public $filters;
    public $actions;
    public $pagination;

    public function __construct(
        $title,
        $columns,
        $item = null,
        $searchable = false,
        $filters = [],
        $actions = true,
        $pagination = true
    ) {
        $this->title = $title;
        $this->columns = $columns;
        $this->item = $item;
        $this->searchable = $searchable;
        $this->filters = $filters;
        $this->actions = $actions;
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-table');
    }
}
