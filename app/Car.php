<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   	protected $table = 'cars';
   	protected $fillable = ['name','price'];
   	public $timestamps = false;

   	public function color(){
   		// lưu ý ở đây là chúng ta phải truyền vào sau tên của bảng trung gian chứ không phải model của nó
   		return $this->belongsToMany('App\Color','car_color');
   	}
}
