<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index(){
        $news_categories=NewsCategory::all();
        return view('Back.categories.index',compact('news_categories'));
    }
    public function create(Request $request){
        $isExist=NewsCategory::whereSlug(Str::slug($request->name))->first();
        if( $isExist){
        toastr()->error($request->name.' adında kateqoriya var');
        return redirect()->back();
        }
        $category=new NewsCategory;
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->save();
        toastr()->success('Kateqoriya əlavə olundu');
        return redirect()->back();
    }
    public function update(Request $request){
        $isSlug=NewsCategory::whereSlug(Str::slug($request->name))->whereNotIn('id',[$request->id])->first();
        $isName=NewsCategory::whereName($request->name)->whereNotIn('id',[$request->id])->first();
        if( $isSlug or $isName){
        toastr()->error($request->name.' adında kateqoriya var');
        return redirect()->back();
        }
        $category=NewsCategory::find($request->id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->slug);
        $category->save();
        toastr()->success('Kateqoriya redaktə olundu');
        return redirect()->back();
    }

    public function getData(Request $request){
  $category=NewsCategory::findOrFail($request->id);
  return response()->json($category);


}
public function switch (Request $request){
    $news=NewsCategory::findOrFail($request->id);
    $news->status=$request->statu=="true" ? 1 : 0 ;
    $news->save();
}
}