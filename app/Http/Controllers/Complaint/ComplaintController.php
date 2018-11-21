<?php

namespace App\Http\Controllers\Complaint;

use App\Model\Complaint;
use App\Model\Mosque;
use App\Model\User;
use App\Model\UserGroup;
use App\Notifications\ComplimentNotification;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notification;


class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return response()->json($request,200);
        $mosque_id=$request->input('mosque_id');
        //dd($mosque_id);
        if ($mosque_id == -1){

            $mosque_name=$request->input('mosque_name');
            $neighborhood_id=$request->input('neighborhood_id');
            $mosque=new Mosque();
            $mosque->name = $mosque_name;
            $mosque->neighborhood()->associate($neighborhood_id);
            $mosque->save();

            $request->merge(["mosque_id" => $mosque->id]);
        }
        $input = $request->all();
        $complaint =new Complaint();
        $complaint->fill($input);
        if ($request->hasFile('file')){
            try {
                $file = $request->file('file');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file->move($destinationPath, $name);

                $complaint->file = $name;

            } catch (Exception $e) {
                return response()->json(
                    [
                        "error" => true ,
                        "message" => "مشكله مع رفع الملف"
                    ],200);
            }
        }
        $complaint->save();
        $notification = new ComplimentNotification($complaint);
        $test =$complaint->mosque->imam;
        if ($test !=null) {
            dd($test);
            Notification::send($test, $notification);
        }

        $adminGroup = UserGroup::where("name" , "مدير")->first();
        if ($adminGroup != null) {
            $admins = $adminGroup->users;



            Notification::send($admins, $notification);
        }
        return response()->json(
            [
                "error" => true ,
                "message" => "تم الإضافه بنجاح"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
