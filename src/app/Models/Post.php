<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * ブログポストのコメントを取得
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
     public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeVisible($query, $table_id)
    {
        $table = User::where('id', $table_id)->first();
        return $query->where('table_id', $table->id);
    }
    public function scopeShowPost($query, $id)
    {
        return $query->where('id', $id)->get();
    }
}
