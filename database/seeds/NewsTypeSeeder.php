<?php

use App\Model\NewsType;
use Illuminate\Database\Seeder;

class NewsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $news_mnashet =new NewsType();
        $news_mnashet->name = "محاضره";
        $news_mnashet->save();


        $news_daoo =new NewsType();
        $news_daoo->name = "دعوه عامة";
        $news_daoo->save();

        $news_ads =new NewsType();
        $news_ads->name = "إعلان";
        $news_ads->save();

        $news_article =new NewsType();
        $news_article->name = "مقال";
        $news_article->save();
    }
}
