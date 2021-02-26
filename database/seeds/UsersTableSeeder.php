<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'priority' => 'Low',

        ]);
        DB::table('priorities')->insert([
            'priority' => 'Normal',

        ]);
        DB::table('priorities')->insert([
            'priority' => 'High',

        ]);



        DB::table('privileges')->insert([
            'privilege' => 'User',

        ]);
        DB::table('privileges')->insert([
            'privilege' => 'IT User',

        ]);
        DB::table('privileges')->insert([
            'privilege' => 'Admin User',

        ]);

        DB::table('statuses')->insert([
            'status' => 'Done',

        ]);
        DB::table('statuses')->insert([
            'status' => 'Failure',

        ]);
        DB::table('statuses')->insert([
            'status' => 'Waiting',

        ]);


        // DB::table('users')->insert([
        //     'name' => 'Islam',
        //     'email' => 'islam.jameel9@gmail.com',

        //     'password' => bcrypt('12341234'),
        //     'admin' => 1,
        //     'privilege'=>3,



        // ]);

        // DB::table('profiles')->insert([
        //     'user_id'=>1,
        //     'hr_id'=>1122,
        //     'avatar'=>'usersimage/123',
        //     'department_id' => 1,
        //     'position_id'=>1,
        //     'ip_phone'=>122,
        //     'mobile'=> 321 ,
        // ]);

        factory(App\Priority::class, 3 )->create();
        // factory(App\User::class, 50 )->create();
        factory(App\Type::class, 7 )->create();
        // factory(App\Ticket::class, 50 )->create();
        factory(App\Department::class,10 )->create();
        factory(App\Position::class,10 )->create();
        factory(App\Site::class,10 )->create();
        // factory(App\Profile::class,50 )->create();


    }
}
