<?php

namespace App\Livewire\Admin\Risks;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class RiskDescription extends Component
{
    public function render()
    {
        return view('livewire.admin.risks.risk-description');
    }
}
