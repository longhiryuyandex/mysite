<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Model\Product;

class ProductController extends Controller
{
    public function active_feature(Request $request){
        $data = $request->all();
        $field = $data['field'];
        // get data form DB
        $active = Product::find($data['id']);
        $value = ($active->$field + 1) % 2;
        Product::where('id',$data['id'])->update([$field => $value]);
        return $value;
    }

    public function quick_view(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $product = Product::find($id);
        return view('layouts.admin.product.quickview',['product' => $product ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        return view('layouts.admin.product.list', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.product.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->all();
        Product::create($product);

        return back();
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
        $product = Product::find($id);
        return view('layouts.admin.product.edit',['product' => $product]);
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
        $product = $request->all();
        $back = $product['submit'];
        unset($product['submit']);
        unset($product['_method']);
        unset($product['_token']);

        //set price format
        $product['price'] = str_replace('.','',$product['price']);
        Product::where('id',$id)->update($product);
        if($back == 'apply'):
            return back();
        else:
            return redirect()->route('products.index');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return true;
    }
}
