<?php 
namespace App\Models;
use CodeIgniter\Model;
class FarmeraddressModel extends Model
{
    protected $table = 'farmer_address';
    protected $primaryKey = 'address_id';
 	
    protected $allowedFields = ['f_id',	'farmer_country','farmer_state','farmer_city',	'farmer_address',	'farmer_zip',	'created_at',	'update_at'	,'added_by'];
}