<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    public function bcategory()
    {
        return $this->belongsTo(Bcategory::class, 'bcategory_id');
    }
}
