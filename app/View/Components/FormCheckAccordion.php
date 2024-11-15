<?php

namespace App\View\Components;

use App\Models\RodoRules;
use Illuminate\View\Component;

class FormCheckAccordion extends Component
{
    public $id;
    public $selectAllId;
    public $required_rodo_rules;


    public function __construct($id = 'accordionExample', $selectAllId = 'select-all')
    {
        $this->id = $id;
        $this->selectAllId = $selectAllId;
        $this->required_rodo_rules = RodoRules::whereIn('id', [1, 2, 3])->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form-check-accordion');
    }
}
