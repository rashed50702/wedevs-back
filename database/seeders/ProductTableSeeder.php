<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = new Product();
    	$data->title = "On Cloud Nine Pillow";
    	$data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    	$data->price = 500;
    	$data->save();


    	$data = new Product();
    	$data->title = "Silver Lining Dress";
    	$data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    	$data->price = 1100;
    	$data->save();
    	
    	$data = new Product();
    	$data->title = "Cup of Joe Pillow";
    	$data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    	$data->price = 3300;
    	$data->save();
    	
    	$data = new Product();
    	$data->title = "Sunset Boulevard Pants";
    	$data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    	$data->price = 3050;
    	$data->save();
    	
    	$data = new Product();
    	$data->title = "Lovey Dovey Maxi Dress";
    	$data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
    	$data->price = 14099;
    	$data->save();

    }
}
