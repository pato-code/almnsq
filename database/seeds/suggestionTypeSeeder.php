<?php

use App\Model\SuggestionType;
use Illuminate\Database\Seeder;

class suggestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $complement=new SuggestionType();
        $complement->name = "شكوي";
        $complement->save();
        $suggestion=new SuggestionType();
        $suggestion->name = "إقتراح";
        $suggestion->save();
    }
}
