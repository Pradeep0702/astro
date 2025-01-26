<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $fillable = ['c_id','title','meta_d','meta_key','slug','thumbnail_image','content'];

    public function blogdata(){
        return $this->hasMany(BlogcategoryModel::class,'id','c_id');
    }

}
