<?php

use App\Model\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminGroup = new UserGroup();
        $adminGroup->name = "مدير";
        $adminGroup->save();
        $daeaaGroup = new UserGroup();
        $adminGroup->name = "داعيه";
        $adminGroup->save();
        $adminGroup = new UserGroup();
        $adminGroup->name = "متعاون";
        $adminGroup->save();
        $adminGroup = new UserGroup();
        $adminGroup->name = "منسق مناشط";
        $adminGroup->save();
    }
}
