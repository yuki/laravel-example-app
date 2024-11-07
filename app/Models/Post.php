<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use SoftDeletes;

    public function comentarios(): HasMany {
        return $this->hasMany(Comentario::class);
    }
}
