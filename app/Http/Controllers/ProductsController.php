<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Product_image;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        
        $products = DB::table('products')
            ->select('*', DB::raw('(Select category_name from categories where category_id=products.category_id) as category_name'))
            ->get();

        $product_images= Product_image::all();

        return view('products.index')->with('products',$products)->with('product_images',$product_images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();

        return view('products.create')->with('categories',$categories);
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
            'product_name' =>'required',

        ]);
        $product =new Product();
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->category_id=$request->input('category_id');
        $product->save();


        if ($request->hasFile('filename')) {

            // $request->validate([
            //     'category_image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            // ]);

            foreach($request->file('filename') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->store('products', 'public');
                // $data[] = $name;

                $product_image =new Product_image();
                $product_image->product_id=$product->product_id;
                $product_image->product_image=$image->hashName();
                $product_image->save();
            }


            }

       


        

       return redirect('/products')->with('success','Product Created');
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
        $product =Product::find($id);
        $categories= Category::all();
        // $product_images= Product_image::where('product_id', $id)->get();
        return view('products.edit')->with('product',$product)->with('categories',$categories);
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
            'product_name' =>'required',

        ]);
        $product =Product::find($id);
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->category_id=$request->input('category_id');
        $product->save();


        // foreach($request->file('filename') as $image)
        // {
        //     $name = $image->getClientOriginalName();
        //     $image->store('products', 'public');
        //     // $data[] = $name;

        //     $product_image =new Product_image();
        //     $product_image->product_id=$product->product_id;
        //     $product_image->product_image=$image->hashName();
        //     $product_image->save();
        // }

        
       return redirect('/products')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =Product::find($id);
        
        $product->delete();
       return redirect('/products')->with('success','Product Deleted');
    }
}
