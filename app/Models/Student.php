<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'name',
        'nim',
        'birth_date',
        'gender',
        'address',
        'major_id',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }
}
