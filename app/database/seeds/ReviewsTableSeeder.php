<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
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
                "title"      => '大満足です',
                "comment"    => "１か月前に購入させてもらいました。着心地がよく、使いまわしもできるので重宝しています♪",
                "del_flg"    => "0",
                "user_id"    => 2,
                "product_id" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "title"      => '大満足です',
                "comment"    => "１か月前に購入させてもらいました。着心地がよく、使いまわしもできるので重宝しています♪",
                "del_flg"    => "0",
                "user_id"    => 3,
                "product_id" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];
        foreach($params as $param){
            DB::table("reviews")->insert($param);
        }
    }
}
