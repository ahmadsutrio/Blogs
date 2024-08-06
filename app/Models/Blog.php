<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    public $fillable = [
        'title',
        'slug',
        'status',
        'foto',
        'content',
        'id_users',
        'id_kategori'
    ];

    public function Users() :BelongsTo{
        return $this->belongsTo(User::class,'id_users','id');
    }

    public function KategoriBlog():BelongsTo{
        return $this->belongsTo(KategoriBlogs::class,'id_kategori','id')->select('kategori','id');
    }
    
}
