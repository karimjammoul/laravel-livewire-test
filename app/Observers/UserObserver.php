<?php

namespace App\Observers;

use App\Models\AuditTrail;
use App\Models\User;

class UserObserver
{
    public function updated(User $user)
    {
        $changes = $user->getChanges();
        $original = $user->getOriginal();

        foreach ($changes as $field => $newVal) {

            $oldVal = $original[$field];

            if ($field === 'updated_at') {
                continue;
            }

            if ($newVal !== $oldVal) {
                AuditTrail::create([
                    'user_id' => $user->id,
                    'action' => 'update',
                    'field' => $field,
                    'old_value' => $oldVal,
                    'new_value' => $newVal,
                ]);
            }
        }
    }
}
