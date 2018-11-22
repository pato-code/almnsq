<?php

namespace App\Http\Controllers\News;

use App\Model\News;
use App\Model\NewsType;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DaeeNews extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::orderBy('created_at')->get();
        return View('News.index' , compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $types=NewsType::all();
        return View('News.addNews',compact('types'));
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
        //Validator::validate($request->)
        $input= $request->all();
        if ($request->hasFile('photo')){
            try {
                $file = $request->file('photo');
                $name = time().'.'.$file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);
                $news =new News();
                $news->fill($input);
                $news->photo = $name;
                $news->save();
            } catch (Exception $e) {
                dd($e);
            }
        }
        return redirect('/');
    }
    public function addSlider($id){

    }
    public function delete($id){
        $news=News::find($id);
        $news->delete();
        return redirect('/news');
    }
}
