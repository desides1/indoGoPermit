<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cardDocument extends Component
{
    public $title;
    public $documentName;
    public $startDateName;
    public $endDateName;
    public $documentLabel;
    public $startDateLabel;
    public $endDateLabel;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $documentName, $startDateName, $endDateName, $documentLabel, $startDateLabel, $endDateLabel)
    {
        $this->title = $title;
        $this->documentName = $documentName;
        $this->startDateName = $startDateName;
        $this->endDateName = $endDateName;
        $this->documentLabel = $documentLabel;
        $this->startDateLabel = $startDateLabel;
        $this->endDateLabel = $endDateLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-document');
    }
}
