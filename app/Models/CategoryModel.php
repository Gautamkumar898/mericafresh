<?php 
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'category_id ';
    
    protected $allowedFields = ['category_name', 'added_by','category_status','updated_at','created_at'];
}