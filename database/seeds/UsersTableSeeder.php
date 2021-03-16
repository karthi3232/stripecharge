<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Product;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mastercategories =array([
				'name' => 'Black Grapes',
				'stripe_plan' => 'plan_J7jIU1oQEofg87',
				'cost'=> '100.00',
				'description'=> 'Rich in Antioxidants. protect against diseases like cancer, diabetes, Alzheimers, Parkinsons, and heart disease',
			],[
				'name' => 'Green Grapes',
				'stripe_plan' => 'plan_J7jKXMqG6L5Vej',
				'cost'=> '75.00',
				'description'=> 'High levels of Vitamin C and Vitamin K. Grapes are easy to incorporate into your diet, whether fresh, frozen, as juice or wine',
			],
			[
				'name' => 'Beetroot',
				'stripe_plan' => 'plan_J7jKnZ6dPsLhzi',
				'cost'=> '44.00',
				'description'=> 'Great source of fiber, folate (vitamin B9), manganese, potassium, iron, and vitamin C.',
			],
			
			[
				'name' => 'Mushroom',
				'stripe_plan' => 'plan_J7jKFStBPTTqZ2',
				'cost'=> '35.00',
				'description'=> 'Mushrooms are a rich, low calorie source of fiber, protein, and antioxidants.',
			],
			[
				'name' => 'Honey',
				'stripe_plan' => 'plan_J7jLcrJHNnu0TW',
				'cost'=> '150.00',
				'description'=> 'Immune-boosting and anticancer benefits.',
			],
		);	 
		
		$sno=1;
        foreach($mastercategories as $key=>$value){
			//print_r($categories);
			Product::insert([
				'name' => $value['name'],
				'stripe_plan' => $value['stripe_plan'],
				'cost' => $value['cost'],
				'description' => $value['description'],
				'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now(),
			]);
		}
    }
}
