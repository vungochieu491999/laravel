<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReaction extends Model
{
    use HasFactory;

    protected $table = 'post_reactions';

    protected $fillable = [
        'reaction_id',
        'post_id',
        'user_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function reaction()
    {
        return $this->hasOne(Reaction::class);
    }
}
