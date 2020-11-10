<?php 
namespace App\Models;
use CodeIgniter\Model;

class FarmerModel extends Model
{
    protected $table = 'farmer';

    protected $primaryKey = 'f_id ';

    protected $allowedFields = ['f_id',	'farmer_id',	'farmer_name',	'farmer_email',	'farmer_phone','farmer_mobile',	'farmer_website',	'farmer_owner',	'fb_url','instagram_url','farmer_bussiness_type',	'farmer_status',	'created_at',	'updated_at',	'added_by'];

    function getEditdata($id){
        $query = $this->db->query('SELECT *
        FROM ((farmer
        LEFT JOIN farmer_product ON farmer.f_id = farmer_product.f_id)
        INNER JOIN farmer_address on farmer.f_id = farmer_address.f_id)
        where farmer.f_id='.$id.'');
        return $query->getResultArray();
    }

    public function farmer_list()
    {
        return $this->db->table('farmer as f')
        ->where('f.farmer_status','0')
        ->join('farmer_address fa','fa.f_id=f.f_id','inner')
        ->orderBy('f.f_id','DESC')
        ->get()->getResultArray();
    }

    public function top_farmer()
    {
        return $this->db->table('farmer as f')
        ->where('f.farmer_status','0')
        ->join('farmer_address fa','fa.f_id=f.f_id','inner')
        ->limit(10)
        ->orderBy('f.f_id','DESC')
        ->get()->getResultArray();
    }

    public function getFarmerProduct($id)
    {
        return $this->db->table('farmer as f')
        ->where('f.farmer_status','0')
        ->where('f.f_id',$id)
        ->join('farmer_product fp','fp.f_id=f.f_id','inner')
        ->join('product p','p.p_id=fp.product_id','inner')
        ->join('category ca','ca.category_id=p.product_category','inner')
        ->orderBy('f.f_id','DESC')
        ->get()->getResultArray();
    }

    public function getAllFarmer()
    {
        return $this->db->table('farmer as f')
        ->where('f.farmer_status','0')
        ->join('farmer_product fp','fp.f_id=f.f_id','inner')
        ->join('product p','p.p_id=fp.product_id','inner')
        ->join('category ca','ca.category_id=p.product_category','inner')
        ->orderBy('f.f_id','DESC')
        ->get()->getResultArray();
    }
}