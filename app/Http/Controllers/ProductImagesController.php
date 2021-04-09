<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_image;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_images= Product_image::all();

        return view('product_images.index')->with('product_images',$product_images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $product_images= Product_image::all();
        $product= Product::where('product_id', $id)->get();

        return view('product_images.create')->with('product',$product);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'category_id' =>'required',
        //     'category_name' =>'required',

        // ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'product_image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /category
            $request->file->store('products', 'public');

        $product_images =new Product_image();
        $product_images->product_id=$request->input('product_id');
        $product_images->product_image=$request->file->hashName();
        $product_images->save();
    }
       return redirect('/products')->with('success','Product Image Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_images= Product_image::where('product_id', $id)->get();
        $product= Product::where('product_id', $id)->get();


        return view('product_images.show')->with('product_images',$product_images)->with('product',$product);
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
        $product_image =Product_image::find($id);
        $product_image->delete();

       return redirect('/products')->with('success','Product Deleted');
    }
}
