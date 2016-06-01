<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('OAuthUsersSeeder');
        

        Model::reguard();
    }
}
class OAuthUsersSeeder extends Seeder{
     
     public function run(){
         DB::table('oauth_users')->insert(array(
			'username' => "bshaffer",
			'password' => sha1('brent123'),
			'first_name' => "Brent",
			'last_name' => "Shaffer",
		));
        
     }  
     
 } 