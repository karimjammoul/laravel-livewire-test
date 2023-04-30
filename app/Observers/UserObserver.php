<?php

namespace App\Observers;

use App\Models\AuditTrail;
use App\Models\Department;
use App\Models\Gender;
use App\Models\Role;
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

                $fieldType = match ($field) {
                    'gender_id' => Gender::class,
                    'department_id' => Department::class,
                    'role_id' => Role::class,
                    'name' => 'name',
                    'phone_number' => 'phone_number',
                    'email' => 'email',
                    'password' => 'password',
                };

                AuditTrail::create([
                    'user_id' => $user->id,
                    'action' => 'update',
                    'field' => $field,
                    'old_value_type' => $fieldType,
                    'old_value_id' => $oldVal,
                    'new_value_type' => $fieldType,
                    'new_value_id' => $newVal,
                ]);
            }
        }
    }
}
