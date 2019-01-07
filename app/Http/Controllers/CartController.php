<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart(){

        return view('pages/cart');
    }
    public function addToCart($product_id)
    {
        $product_info=DB::table('product')->where('product_id',$product_id)->first();
        $data=array();
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_retail_price;
        $data['quantity']=1;
        $data['attributes']['image']=$product_info->product_image;
        Cart::add($data);
        return  Redirect::to('/show-cart');
    }
    public function additionToCart($id){
        /* echo $id;
        exit(); */
        Cart::update($id, array(
            'quantity' => 1, 
          ));
         return Redirect::to('/show-cart');
    }
    public function subtractionFromCart($id){
        Cart::update($id, array(
            'quantity' =>-1, 
          ));
        return  Redirect::to('/show-cart');

    }
    public function deletionFromCart($id){
        Cart::remove($id);
        return  Redirect::to('/show-cart');

    }
    public function checkOut(){
       
        return view('/pages.checkout');
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
