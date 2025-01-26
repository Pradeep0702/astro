<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerModel extends Model
{
    use HasFactory;
    protected $table="career";
    protected $casts = [
         'job_details'=>'json'
    ];
    protected $fillable = ['title','designation_name','job_type','work_type','job_details'];

    public function scopeSearch($query,$search){

        return $query->when($search,function($query,$search){
            $query->where('title','like','%'.$search.'%')
            ->orwhere('designation_name','like','%'.$search.'%')
            ->orwhere('job_type','like','%'.$search.'%')
            ->orwhere('work_type','like','%'.$search.'%');
         });
    }
}
