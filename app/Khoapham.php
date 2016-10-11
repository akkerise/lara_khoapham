<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'kpt_khoapham';
    protected $fillable = ['id' , 'monhoc', 'giangvien'];
    protected $timestamps = false;
}
