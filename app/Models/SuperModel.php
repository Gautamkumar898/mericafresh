<?php 
namespace App\Models;
use CodeIgniter\Model;

class SuperModel extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'admin_id ';
    
    protected $allowedFields = ['admin_name', 'admin_email','admin_password','admin_image','admin_status','created_at'];

}