<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $headers;
    public $rows;

    /**
     * Create a new component instance.
     *
     * @param array $headers
     * @param array $rows
     */
    public function __construct($headers = [], $rows = [])
    {
        // Pastikan selalu array, meskipun null atau tidak dikirim
        $this->headers = is_array($headers) ? $headers : [];
        $this->rows = is_array($rows) ? $rows : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
