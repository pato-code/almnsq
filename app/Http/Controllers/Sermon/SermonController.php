<?php

namespace App\Http\Controllers\Sermon;

use App\Model\Mosque;
use App\Model\Sermon;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SermonController extends Controller
{
    //
    public function index(){
        $sermons = Sermon::all();
        return View('Sermon.index' , compact('sermons'));
    }
    public function create()
    {
        //
        $mosques = Mosque::all();
        //$types=NewsType::all();
        return View('Sermon.addSermon')->with('mosques',$mosques);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();
        $seromn =new Sermon();
        $seromn->fill($input);
        if ($request->hasFile('file')){
            try {
                $file = $request->file('file');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file->move($destinationPath, $name);
                $seromn->file = $name;

            } catch (Exception $e) {
                dd($e);
            }
        }
        if ($request->hasFile('photo')){
            try {
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);
                $seromn->photo = $name;

            } catch (Exception $e) {
                dd($e);
            }
        }
        $seromn->save();
        return redirect('/sermon');
    }
    public function update($id){
        $mosques = Mosque::all();
        $sermon=Sermon::find($id);
        return View('Sermon.edit' , compact('sermon' , 'mosques'));
    }
    public function edit(Request $request , $id){
        $input= $request->all();
        $seromn =Sermon::find($id);
        $seromn->fill($input);

        if ($request->hasFile('file')){
            try {
                $file = $request->file('file');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/files');
                $file->move($destinationPath, $name);
                $seromn->file = $name;

            } catch (Exception $e) {
                dd($e);
            }
        }
        if ($request->hasFile('photo')){
            try {
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);
                $seromn->photo = $name;

            } catch (Exception $e) {
                dd($e);
            }
        }
        $seromn->save();
        return redirect('/sermon');
    }
    public function delete($id){
        $sermon = Sermon::find($id);
        $sermon->delete();
        return redirect('/sermon');
    }
}
