<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
