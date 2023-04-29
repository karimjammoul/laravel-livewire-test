<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'action', 'field', 'old_value_type', 'old_value_id', 'new_value_type', 'new_value_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oldValue()
    {
        return $this->morphTo();
    }

    public function newValue()
    {
        return $this->morphTo();
    }
}
