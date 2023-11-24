<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
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
            "name" =>"ボタンブラウス　ベージュ",
            "price" =>2500,
            "image"=>"img/cniXVwMbwI44ji6MSL6kdkTCD9k2K100fVazunZR.png",
            "introduction"=>"中央についたボタンがワンポイントでおしゃれに着こなせます。質感は滑らかで、薄手素材なので暖かい時期におススメです。",
            "stock"=>12,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"ロングパーカー　ホワイト",
            "price" =>5000,
            "image"=>"img/g4DzJtNUNaP8ZPqBbWUqGINk1eiTJIIah9mdOtYG.png",
            "introduction"=>"シンプルなデザインのパーカーです。丈が長いのがポイント。
            お尻が隠れる長さなので、体系をカバーしつつおしゃれに着こなせます。生地は厚めで寒い季節にもこの一枚があれば安心。",
            "stock"=>30,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"子供用ジャケット　ブラック",
            "price" =>6000,
            "image"=>"img/136cDCakSfX2BIOgn4XVdb9fuHSYB5QzwoVqsd4H.png",
            "introduction"=>"伸縮性もあり、長時間来ていても苦になりません。
            人気の形で少しおしゃれなレストランに行く際も、フォーマルな場でも問題なく着こなせます。",
            "stock"=>15,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"ダメージジーンズ",
            "price" =>3500,
            "image"=>"img/g3tJBCWdkNnSvTsAf43159SU6WhN8zavRL8vp6FX.png",
            "introduction"=>"シンプルなデザインのダメージジーンズ。
            色は薄めで、春から夏にかけて特に使える一品。
            トップスには何を合わせても問題ないので着回しにもおススメ。",
            "stock"=>20,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"ボタンブラウス　ベージュ",
            "price" =>3700,
            "image"=>"img/cniXVwMbwI44ji6MSL6kdkTCD9k2K100fVazunZR.png",
            "introduction"=>"中央についたボタンがワンポイントでおしゃれに着こなせます。質感は滑らかで、薄手素材なので暖かい時期におススメです。",
            "stock"=>10,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"ロングパーカー　ホワイト",
            "price" =>2500,
            "image"=>"img/g4DzJtNUNaP8ZPqBbWUqGINk1eiTJIIah9mdOtYG.png",
            "introduction"=>"シンプルなデザインのパーカーです。丈が長いのがポイント。
            お尻が隠れる長さなので、体系をカバーしつつおしゃれに着こなせます。生地は厚めで寒い季節にもこの一枚があれば安心。",
            "stock"=>20,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"子供用ジャケット　ブラック",
            "price" =>3000,
            "image"=>"img/136cDCakSfX2BIOgn4XVdb9fuHSYB5QzwoVqsd4H.png",
            "introduction"=>"伸縮性もあり、長時間来ていても苦になりません。
            人気の形で少しおしゃれなレストランに行く際も、フォーマルな場でも問題なく着こなせます。",
            "stock"=>8,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
        [
            "name" =>"ダメージジーンズ",
            "price" =>8000,
            "image"=>"img/g3tJBCWdkNnSvTsAf43159SU6WhN8zavRL8vp6FX.png",
            "introduction"=>"シンプルなデザインのダメージジーンズ。
            色は薄めで、春から夏にかけて特に使える一品。
            トップスには何を合わせても問題ないので着回しにもおススメ。",
            "stock"=>5,
            "hidden_flg"=>0,
            "del_flg"=>0,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
        ],
    ];
    foreach($params as $param){
        DB::table("products")->insert($param);
    }
    }
}
