<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Reunion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
