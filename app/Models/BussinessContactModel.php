<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessContactModel extends Model
{
    use HasFactory;
    protected $table = "bussiness_contact";
    protected $fillable = ['company_name','number_of_location','full_name','mobile_number','bussiness_email'];
}
