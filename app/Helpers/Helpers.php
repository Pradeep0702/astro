<?php
use App\Models\ServiceCategoryModel;

class Helpers {
    public static function categories() {
        $categories = ServiceCategoryModel::with(['menu' => function ($query) {
            $query->select('cat_id', 'menu_name', 'menu_slug');
        }])->orderBy('order', 'ASC')->get();
        
        return $categories;
    }
}
?>