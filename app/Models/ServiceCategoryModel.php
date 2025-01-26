<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceModel;

class ServiceCategoryModel extends Model
{
    use HasFactory;    
    protected $table = "service_category";
    protected $fillable = ['category_name','order','category_icon','category_design'];

    protected $casts = ['category_design'=>'json'];

    public function menu(){
        return $this->hasMany(ServiceModel::class,'cat_id','id');
    }

}
