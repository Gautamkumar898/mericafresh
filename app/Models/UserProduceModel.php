<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProduceModel extends Model
{
    protected $table = 'user_product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'produce_id','price','unit_metrics','packaging','status','type','created_at', 'updated_at', 'added_by'];


    public function user_produce($id){
       
        return $this->db->table('user_product as up')
         ->where('up.user_id',$id)
        ->join('product p','p.p_id=up.produce_id','inner')
        ->join('category ct','ct.category_id=p.product_category','inner')
        ->get()->getResultArray();
    }

    public function userwise_produce($id)
    {
        return $this->db->table('farmer as f')
        ->where('f.farmer_status','0')
        ->where('f.f_id',$id)
        ->join('user_product up','up.user_id=f.f_id','inner')
        ->join('product p','p.p_id=up.produce_id','inner')
        ->join('category ct','ct.category_id=p.product_category','inner')
        ->orderBy('f.f_id','DESC')
        ->get()->getResultArray();

    }

}



