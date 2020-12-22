<?php 
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'p_id';
 	
    protected $allowedFields = ['p_id','product_name','product_category','product_status','product_image1','product_image2','product_image3','product_image4','created_at','update_at'	,'added_by'];

public function getproduct_detalis()
{
    return $this->db->table('product as fa')
    ->where('fa.product_status','0')
    ->join('category ca','ca.category_id=fa.product_category','inner')
    ->orderBy('fa.p_id','DESC')
    ->get()->getResultArray();
}

//fetch Details
public function editProduct($id)
{
    return $this->db->table('product as p')
    ->where('p.p_id',$id)
    ->where('p.product_status','0')
    ->join('category ca','ca.category_id=p.product_category','inner')
    ->get()->getRow();  
}

}