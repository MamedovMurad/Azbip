<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  index()
    {
        $news=News::orderBy('created_at','ASC')->get();
        return view('Back.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_categories=NewsCategory::all();
        return view('Back.news.create', compact('news_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $news=new News;
        $news->title=$request->title;
        $news->news_category_id=$request->category;
        $news->content=$request->content;
        $news->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).' '.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $news->image='/uploads/'.$imageName;
        };

        $news->save();

         return redirect()->route('news.index');
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
        $news=News::findorFail($id);
        $news_categories=NewsCategory::all();
        return view('Back.news.redakte', compact('news','news_categories'));
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
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $news=News::findorFail($id);
        $news->title=$request->title;
        $news->news_category_id=$request->category;
        $news->content=$request->content;
        $news->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=Str::slug($request->title).' '.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $news->image='/uploads/'.$imageName;
        };
        $news->save();

        return redirect()->route('admin.news.index');
    }
    public function switch (Request $request){
        $news=News::findOrFail($request->id);
        $news->status=$request->statu=="true" ? 1 : 0 ;
        $news->save();
        // return $request->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        News::find($id)->delete();

        return redirect()->route('news.index');
    }
    public function trashed(){
        $news=News::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.news.trashed',compact('news'));
    }
    public function recover($id){
        News::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.news.index');
    }
    public function hardDelete($id)
    {
        $news=News::onlyTrashed()->find($id);
        if(File::exists($news->image)){
            File::delete(public_path($news->image));
        }
        $news->forceDelete();

        return redirect()->back();

    }
}
