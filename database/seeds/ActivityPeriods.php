<?php

use App\Model\Period;
use Illuminate\Database\Seeder;

class ActivityPeriods extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sobh=new Period();
        $sobh->name = 'الصبح';
        $sobh->save();

        $dohor = new Period();
        $dohor->name = 'الظهر';
        $dohor->save();

        $asor = new Period();
        $asor->name = 'العصر';
        $asor->save();

        $mogrib = new Period();
        $mogrib->name = 'المغرب';
        $mogrib->save();

        $esha = new Period();
        $esha->name = 'العشاء';
        $esha->save();

    }
}
