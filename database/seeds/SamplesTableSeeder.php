<?php

use Illuminate\Database\Seeder;

class SamplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
            // 'title' => str_random(10),
            // 'email' => str_random(10).'@gmail.com',
        // ]);

		$samples = factory(App\Sample::class, 100)->create();
		
    }
}
