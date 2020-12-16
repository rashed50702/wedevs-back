<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::orderBy('title', 'asc')->get();
    }

    public function productSave(Request $request)
    {
        $filename = Null;

        $this->validate($request, [
            'title' => 'required|max:255',
            'price' => 'required',
        ]);

        if ($request->file('image')) {

            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images/products'), $filename);
        }

        $product = new Product();
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->image       = $filename;
        $product->save();
        return response()->json(['message' => 'Product successfully saved!']);
    }

    public function productShow($id)
    {
        return Product::where('id', $id)->first();
    }

    public function productUpdate(Request $request, $id)
    {
        // return $id;
        // return $request->all();
        $this->validate($request, [
            'title' => 'required|max:255',
            'price' => 'required',
        ]);

        $product = Product::find($id);
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->price       = $request->price;
        if ($request->file('image')) {

            $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

            //remove old photo from folder if exist
            $image_path = public_path('images/products/').$product->image;
            unlink($image_path);

            $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images/products'), $filename);
            $product->image = $filename;
        }
        $product->save();
        return response()->json(['message' => 'Product successfully updated!']);
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $productImage = public_path("images/products/{$product->image}");
            if (File::exists($productImage)) {
                unlink($productImage);
            }
        }
        $product->delete();

        return Response::json(['message' => 'The product deleted successfully!'], 200);
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
