<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// use App\Product;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/model/select_all', function(){
	$data = App\Product::all()->take(2)->toArray(); // lấy tất cả dữ liệu trong bảng trả về array
//    $data = Product::all()->toJson(); // lấy tất cả dữ liệu trong bảng trả về json
//    $data = Product::all()->toBase(); // lấy tất cả dữ liệu trong bảng trả về base
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
});
Route::get('/model/select_id', function(){
	$data = App\Product::find(10)->toJson();
    dd($data);
});

Route::get('/model/findorfail', function(){
	$data = App\Product::findOrFail(10);
    dd($data);
});

Route::get('/model/where', function(){
	$data = App\Product::where('price','=',50000)->firstOrFail()->get();
    dd($data);
});

Route::get('/model/take', function(){
	$data = App\Product::where('price',50000)->firstOrFail()->tojSon();
    // lưu ý khi sử dụng firstOrFail() thì không được có get ở phía sau
    dd($data);
});

Route::get('/model/select', function(){
    $data = App\Product::where('price',50000)->select('name','id')->take(2)->get()->toArray();
    // take() phải đi với get()
    dd($data);
});

Route::get('/model/count', function(){
    $data = App\Product::count();
    // ta sử dụng App\Product::all()->count() tương tự như App\Product::count()
    dd($data);
});

// Tìm dựa vào điều kiện động truyền vào sau
Route::get('model/raw', function (){
    // where có điều kiện
   $data = App\Product::whereRaw('price = ? AND id > ?',[50000,2])->take(1)->get()->tojSon();
    // where() phải đi cùng get()
//    dd($data);
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
});

// Tìm dựa theo điều kiện cho trước
Route::get('model/findfail',function (){
    $data = App\Product::where('price','>',50000)->firstOrFail()->get();
    dd($data);
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
});
Route::get('model/add',function (){
   $product = new App\Product;
    $product->name = 'Quần xì';
    $product->price = 500000;
    $product->cate_id = 100;
    $product->save();
    if ($product->fails()){
        echo "Lỗi insert dữ liệu";
        dd($product);
    }else{
        echo "Success";
    }
});

Route::get('model/create',function (){
    $product = new App\Product;
    $data = [
        'name' => 'FUCK',
        'price' => 2000,
        'cate_id' => 5
    ];
    $product::create($data);
    echo "Success";
});

Route::get('model/update',function(){
	$product = App\Product::find(411);
	$product->price = 100000;
	$product->name = 'CLGT';
	$product->cate_id = 10;
	$product->save();
	echo "Success";
});

Route::get('model/delete/{id}',function ($id){
    App\Product::destroy($id);
    echo "Success";
});

Route::get('relation/one_many_1',function(){
	$data = App\Product::find(2)->images()->get();
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
});

Route::get('relation/one_many_2',function(){
	$data = App\Images::find(2)->product()->get()->toArray();
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
});

Route::get('relation/car', function(){
	$data = App\Car::find(2)->product()->get()->toArray();
	dd($data);
});

// Tìm color của chiếc xe đã được xác định
Route::get('relation/many_many/1', function(){
	$data = App\Car::find(3)->color()->select('colors.name')->get()->toArray();
	dd($data);
});
// Tìm car nào có màu đã được xác định
Route::get('relation/many_many/2', function(){
    $data = App\Color::find(4)->car()->get()->toArray();
    dd($data);
});