<?php

namespace App\Models;

use App\Models\patients;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class consultation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(patients::class);
    }
}
