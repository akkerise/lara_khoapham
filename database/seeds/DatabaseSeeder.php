<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CategoriesSeeder');
    	$this->call('ProductSeeder');

    }
}



class CategoriesSeeder extends Seeder
{
	public function run()
	{
		DB::table('categories')->insert(
			array('category_name' => 'Áo'),
			array('category_name' => 'Quần'),
			array('category_name' => 'Mũ'),
			array('category_name' => 'Dép')
			);
	}
}

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert(
            array('name' => 'Quần Rách', 		'price' => 2000 , 'cate_id' => 2),
            array('name' => 'Quần Tennis', 		'price' => 15000 , 'cate_id' => 4),
            array('name' => 'Quần Võ Thuật', 	'price' => 6000 , 'cate_id' => 1),
            array('name' => 'Quần Lởm', 		'price' => 2000000 , 'cate_id' => 3)
        );
    }
}


