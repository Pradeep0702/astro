<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServicecategoryModel;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = "service_page";
    protected $fillable = ['cat_id','menu_name','menu_slug','meta_data','hero_section','info_card_section','page_banner_section','main_section','faq_section'];

    protected $casts = [
        'meta_data' => 'json',
        'hero_section' => 'json',
        'info_card_section' => 'json',
        'page_banner_section' => 'json',
        'main_section' => 'json',
        'faq_section' => 'json',
    ];

    
    public function categoryname(){
        return $this->hasMany(ServicecategoryModel::class,'id','cat_id');
    }
}