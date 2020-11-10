<?php

namespace App\Models;

use CodeIgniter\Model;

class FarmerProductModel extends Model
{
    protected $table = 'farmer_product';
    protected $primaryKey = 'fp_id';
    protected $allowedFields = ['f_id', 'product_id', 'created_at', 'updated_at', 'added_by'];
}
