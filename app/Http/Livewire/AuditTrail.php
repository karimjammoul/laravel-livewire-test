<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AuditTrail extends Component
{
    public function render()
    {
        $data = [];

        $auditTrails = \App\Models\AuditTrail::paginate(10);
        $data['auditTrails'] = $auditTrails;

        return view('livewire.audit-trail', $data);
    }
}
