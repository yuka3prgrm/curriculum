<?php

use Illuminate\Database\Seeder;

use Carbon\carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                "authority_flg"     => 0,
                "name"       => "管理者",
                "email"    => "owner@com",
                "password"       => "owner123",
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "購入者",
                "email"    => "customer@com",
                "password"       => "customer123",
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];

        foreach($params as $param){
            DB::table("users")->insert($param);
        }
    }
}
