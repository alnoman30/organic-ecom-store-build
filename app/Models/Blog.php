<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blogCategory(){

        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}