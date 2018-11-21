<?php

use Illuminate\Database\Seeder;
use App\Model\ActivityType as Model;

class ActivityType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sermon=new Model();
        $sermon->name = "محاضرة";
        $sermon->save();

        $drs=new Model;
        $drs->name = "درس";
        $drs->save();

        $klma=new Model;
        $klma->name = "كلمة";
        $klma->save();
    }
}
