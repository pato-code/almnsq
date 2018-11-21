<?php

use App\Model\ActivityStatus;
use Illuminate\Database\Seeder;

class ActivityStatues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        $request =new ActivityStatus;
//        $request->name = 'request';
//        $request->save();
//
//        $toImam = new ActivityStatus;
//        $toImam->name = 'toImam';
//        $toImam->save();
//
//        $create = new ActivityStatus;
//        $create->name = 'create';
//        $create->save();
//
//        $accept = new ActivityStatus;
//        $accept->name = 'accept';
//        $accept->save();

        $deny = new ActivityStatus;
        $deny->name = 'deny';
        $deny->save();
    }
}
