<?php

namespace App\View\Components;

use App\Models\RodoRules;
use Illuminate\View\Component;

class FormCheckAccordion extends Component
{
    public $id;
    public $selectAllId;
    public $required_rodo_rules;
    public $textareaProperty;
    public $textareaInvestment;


    public function __construct($id = 'accordionExample', $selectAllId = 'select-all', $textareaProperty = '', $textareaInvestment = '')
    {
        $this->id = $id;
        $this->selectAllId = $selectAllId;
        $this->required_rodo_rules = RodoRules::where('active', 1)->get();
        $this->textareaProperty = $textareaProperty;
        $this->textareaInvestment = $textareaInvestment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form-check-accordion');
    }
}
