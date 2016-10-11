<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $table = 'colors';

	protected $fillable = ['id','name'];

	public $timestamps = false;

	public function car(){
		// lưu ý ở đây là chúng ta phải truyền vào sau tên của bảng trung gian chứ không phải model của nó
		return $this->belongsToMany('App\Car','car_color');
	}
}
