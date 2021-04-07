<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' =>'required',
            'category_name' =>'required',

        ]);
        $category =new Category();
        $category->category_id=$request->input('category_id');
        $category->category_name=$request->input('category_name');
        $category->category_description=$request->input('category_description');
        $category->save();

       return redirect('/categories')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories_products =DB::table('products')
        ->where('category_id',$id)
        ->get();

        $category_name = Category::find($id);

        return view('categories.show')->with('categories_products',$categories_products)->with('category_name',$category_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =Category::find($id);
        return view('categories.edit')->with('category',$category);
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
        $this->validate($request, [
            'category_id' =>'required',
            'category_name' =>'required',

        ]);
        $category =Category::find($id);
        $category->category_id=$request->input('category_id');
        $category->category_name=$request->input('category_name');
        $category->category_description=$request->input('category_description');

        $category->save();
       return redirect('/categories')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::find($id);
        
        $category->delete();
       return redirect('/categories')->with('success','Category Deleted');
    }
}
