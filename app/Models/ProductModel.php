<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'p_id';
 	
    protected $allowedFields = ['p_id','product_name','product_image','product_category','amount','quantity','product_status','created_at',	'update_at'	,'added_by'];

public function getproduct_detalis()
{
    return $this->db->table('product as fa')
    ->where('fa.product_status','0')
    ->join('category ca','ca.category_id=fa.product_category','inner')
    ->orderBy('fa.p_id','DESC')
    ->get()->getResultArray();
}

public function editProduct($id)
{
    return $this->db->table('product as fa')
    ->where('fa.p_id',$id)
    ->where('fa.product_status','0')
    ->join('category ca','ca.category_id=fa.product_category','inner')
    ->get()->getRow();  
}

}