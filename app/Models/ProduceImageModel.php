<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduceImageModel extends Model
{
    protected $table = 'produce_image';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['produce_id', 'user_id','image_name','status','created_at', 'updated_at', 'added_by'];
}
