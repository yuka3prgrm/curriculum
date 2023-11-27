<?php

use Illuminate\Database\Seeder;

use Carbon\carbon;
use Illuminate\Support\Facades\Hash;

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
                "password"       => Hash::make("owner123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー1",
                "email"    => "users@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー2",
                "email"    => "users2@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー3",
                "email"    => "users3@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー4",
                "email"    => "users4@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー5",
                "email"    => "users5@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー6",
                "email"    => "users6@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー7",
                "email"    => "users7@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー8",
                "email"    => "users8@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー9",
                "email"    => "users9@user",
                "password"       => Hash::make("user123"),
                "del_flg"     => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "authority_flg"     => 1,
                "name"       => "ユーザー10",
                "email"    => "users10@user",
                "password"       => Hash::make("user123"),
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
