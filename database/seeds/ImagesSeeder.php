<?php

use Illuminate\Database\Seeder;
use App\Images;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            array('name' => 'Art',      'product_id' => 1 ),
            array('name' => 'Fuck',     'product_id' => 2 ),
            array('name' => 'Fear', 	'product_id' => 3 ),
            array('name' => 'Winter', 	'product_id' => 4 ),
            array('name' => 'Fick',     'product_id' => 1 ),
            array('name' => 'Fnyn',     'product_id' => 2 ),
            array('name' => 'Payne',    'product_id' => 3 ),
            array('name' => 'Spring',   'product_id' => 4 )
        );
    }
    
    // public function run(){
    // 	factory(Images::class, 50)->create();
    // }
}
