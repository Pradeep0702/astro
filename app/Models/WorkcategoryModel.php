<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkcategoryModel extends Model
{
    use HasFactory;
    protected $table = "work_category";
    protected $fillable = ['category_name','order'];
}
