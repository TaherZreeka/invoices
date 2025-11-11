<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardCard extends Component
{  public $title;
    public $total;
    public $count;
    public $icon;
    public $bg;
    public $percent;

    public function __construct($title, $total, $count, $icon, $bg, $percent)
    {
        $this->title = $title;
        $this->total = $total;
        $this->count = $count;
        $this->icon = $icon;
        $this->bg = $bg;
        $this->percent = $percent;
    }

    public function render()
    {
        return view('components.dashboard-card');
    }
}