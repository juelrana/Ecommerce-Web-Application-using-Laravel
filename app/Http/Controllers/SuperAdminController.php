<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use Symfony\Component\HttpFoundation\File\File;
session_start();

class SuperAdminController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

/*************** Dashboard *********************************/

public function index()
{
    $this->authCheck();
    $admin_home=view('admin.pages.admin_home_post');
    return view('admin.admin_master')
    ->with('admin_main_content',$admin_home);
}
public function logOut(){
    Session::put('admin_full_name',null);
    Session::put('admin_id',null);
    session_destroy();
    Session::put('logout_msg','You are successfully logout!');
    return Redirect::to('/admin-login');
}
public function authCheck(){
    $admin_id=Session::GET('admin_id');
    if($admin_id){
        return;
    }else{
        return Redirect::to('/admin-login')->send();
    }
}

/*****************category************************************/

public function addCategory(){
    $this->authCheck();
    $add_category_form=view('admin.pages.category_add_form');
    return view('admin.admin_master')
    ->with('admin_main_content',$add_category_form);
}
public function saveCategoryData(Request $request){
    $data=array();
    $data['category_name']=$request->category_name;
    $data['category_description']=$request->category_description;
    $data['publication_status']=$request->publication_status;
    DB::table('category')->insert($data);
    Session::put('msg','Save Data Succesfully!!');
    return Redirect::to('/add-category');
}
public function viewCategoryData(){
   $this->authCheck();
   $all_category = DB::table('category')->select('*')->get();
   $view_category_page=view('admin.pages.view_category_data')
   ->with('all_category_info',$all_category);
   return view('admin.admin_master')
   ->with('admin_main_content',$view_category_page);
}
public function unpublishCategoryById($id){
    DB::table('category')
    ->where('category_id', $id)
    ->update(['publication_status' => 0]);
    return Redirect::to('/view-category');
}
public function publishCategoryById($id){
    DB::table('category')
    ->where('category_id', $id)
    ->update(['publication_status' => 1]);
    return Redirect::to('/view-category');
}
public function deleteCategoryById($id){

    DB::table('category')
    ->where('category_id', '=', $id)
    ->delete();
    Session::put('delete_msg','Delete Data Succesfully!!');
    return Redirect::to('/view-category');
}
public function editCategoryById($id){
    $categoryByIDInfo = DB::table('category')
    ->where('category_id',$id)
    ->first();
    $edit_category_page=view('admin.pages.category_edit_form')
    ->with('category_info_by_id',$categoryByIDInfo);
    return view('admin.admin_master')
    ->with('admin_main_content',$edit_category_page);
}
public function updateCategoryData(Request $request){
    $data=array();
    $data['category_name']=$request->category_name;
    $data['category_description']=$request->category_description;
    $data['publication_status']=$request->publication_status;
    $category_id=$request->category_id;
    DB::table('category')
    ->where('category_id',$category_id)
    ->update($data);
    Session::put('msg','Update Data Succesfully!!');
    return Redirect::to('/view-category');
}


/*****************Manufacturer************************************/

public function addManufacturer(){
    $this->authCheck();
    $add_manufacturer_form=view('admin.pages.manufacturer_add_form');
    return view('admin.admin_master')
    ->with('admin_main_content',$add_manufacturer_form);
}
public function saveManufacturerData(Request $request){
    $data=array();
    $data['manufacturer_name']=$request->manufacturer_name;
    $data['manufacturer_description']=$request->manufacturer_description;
    $data['publication_status']=$request->publication_status;
    DB::table('manufacturer')->insert($data);
    Session::put('msg','Save Data Succesfully!!');
    return Redirect::to('/add-manufacturer');
}
public function viewManufacturerData(){
   $this->authCheck();
   $all_manufacturer = DB::table('manufacturer')->select('*')->get();
   $view_manufacturer_page=view('admin.pages.view_manufacturer_data')
   ->with('all_manufacturer_info',$all_manufacturer);
   return view('admin.admin_master')
   ->with('admin_main_content',$view_manufacturer_page);
}
public function unpublishManufacturerById($id){
    DB::table('manufacturer')
    ->where('manufacturer_id', $id)
    ->update(['publication_status' => 0]);
    return Redirect::to('/view-manufacturer');
}
public function publishManufacturerById($id){
    DB::table('manufacturer')
    ->where('manufacturer_id', $id)
    ->update(['publication_status' => 1]);
    return Redirect::to('/view-manufacturer');
}
public function deleteManufacturerById($id){

    DB::table('manufacturer')
    ->where('manufacturer_id', '=', $id)
    ->delete();
    Session::put('delete_msg','Delete Data Succesfully!!');
    return Redirect::to('/view-manufacturer');
}
public function editManufacturerById($id){
    $manufacturerByIDInfo = DB::table('manufacturer')
    ->where('manufacturer_id',$id)
    ->first();
    $edit_manufacturer_page=view('admin.pages.manufacturer_edit_form')
    ->with('manufacturer_info_by_id',$manufacturerByIDInfo);
    return view('admin.admin_master')
    ->with('admin_main_content',$edit_manufacturer_page);
}
public function updateManufacturerData(Request $request){
    $data=array();
    $data['manufacturer_name']=$request->manufacturer_name;
    $data['manufacturer_description']=$request->manufacturer_description;
    $data['publication_status']=$request->publication_status;
    $manufacturer_id=$request->manufacturer_id;
    DB::table('manufacturer')
    ->where('manufacturer_id',$manufacturer_id)
    ->update($data);
    Session::put('msg','Update Data Succesfully!!');
    return Redirect::to('/view-manufacturer');
}



/*************** Products ***********************************/

public function addProducts(){
 $this->authCheck();
 $product_add_form=view('admin.pages.product_add_form');
 return view('admin.admin_master')
 ->with('admin_main_content',$product_add_form);

} 
public function saveProducts(Request $request){
    $this->authCheck();
    $data=array();
    $data['category_id']=$request->category_id;
    $data['manufacturer_id']=$request->manufacturer_id;
    $data['product_sku']=$request->product_sku;
    $data['product_name']=$request->product_name;
    $data['product_purchase_price']=$request->product_purchase_price;
    $data['product_retail_price']=$request->product_retail_price;
    $data['product_quantity']=$request->product_quantity;
    $data['product_brand_name']=$request->product_brand_name;
    $data['product_short_description']=$request->product_short_description;
    $data['product_long_description']=$request->product_long_description;
    $data['product_publication_status']=$request->product_publication_status;
    $data['product_featured_status']=0;
    
    /***************image****************************************************/
    $files=$request->file('product_image');
    $filename=$files->getClientOriginalName();
    $extension=$files->getClientOriginalExtension();
    $image=date('his').$filename;
    $image_url='public/product_images/'.$image;
    $destinationPath=base_path().'\public\product_images';
    $sucess=$files->move($destinationPath,$image);

    if ($sucess) {
        $data['product_image']=$image_url;
        DB::table('product')->insert($data);
        Session::put('msg','Save Data Succesfully!!');
        return Redirect::to('/add-products');
    }

    else
    {
        $error=$files->getErrorMessage();
    }
}
public function viewProductsData(){
   $this->authCheck();
   $all_products = DB::table('product')->select('*')->get();
   $view_product_page=view('admin.pages.view_product_data')
   ->with('all_product_info',$all_products);
   return view('admin.admin_master')
   ->with('admin_main_content',$view_product_page);

}
public function unpublishProductById($id){
    DB::table('product')
    ->where('product_id', $id)
    ->update(['product_publication_status' => 0]);
    return Redirect::to('/view-products');
}
public function publishProductById($id){
    DB::table('product')
    ->where('product_id', $id)
    ->update(['product_publication_status' => 1]);
    return Redirect::to('/view-products');
}
public function deleteProductById($id){

    DB::table('product')
    ->where('product_id', '=', $id)
    ->delete();
    Session::put('delete_msg','Delete Data Succesfully!!');
    return Redirect::to('/view-products');
}
public function editProductById($id){
    $productInfo = DB::table('product')
    ->where('product_id',$id)
    ->first();
    $edit_product_page=view('admin.pages.product_edit_form')
    ->with('productInfo',$productInfo);
    return view('admin.admin_master')
    ->with('admin_main_content',$edit_product_page);
}
public function updateProductData(Request $request){
    $this->authCheck();
    $data=array();
    $data['category_id']=$request->category_id;
    $data['manufacturer_id']=$request->manufacturer_id;
    $data['product_sku']=$request->product_sku;
    $data['product_name']=$request->product_name;
    $data['product_purchase_price']=$request->product_purchase_price;
    $data['product_retail_price']=$request->product_retail_price;
    $data['product_quantity']=$request->product_quantity;
    $data['product_brand_name']=$request->product_brand_name;
    $data['product_short_description']=$request->product_short_description;
    $data['product_long_description']=$request->product_long_description;
    $data['product_publication_status']=$request->product_publication_status;
    $data['product_featured_status']=0;
    $product_id=$request->product_id;
    $data['product_image']=$request->product_image;
    
    // echo'<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // exit();
    if($_FILES['product_image']['name']==''){
        $data['product_image']=$request->product_image;
        DB::table('product')
    ->where('product_id',$product_id)
    ->update($data);
    Session::put('msg','Update Data Succesfully!!');
    return Redirect::to('/view-products');
    }else{

   
    /***************image****************************************************/
    $files=$request->file('product_image');
    $filename=$files->getClientOriginalName();
    $extension=$files->getClientOriginalExtension();
    $image=date('his').$filename;
    $image_url='public/product_images/'.$image;
    $destinationPath=base_path().'\public\product_images';
    $sucess=$files->move($destinationPath,$image);

    if ($sucess) {
        $data['product_image']=$image_url;
        DB::table('product')
    ->where('product_id',$product_id)
    ->update($data);
    Session::put('msg','Update Data Succesfully!!');
    //unlink($request->product_image);
        return Redirect::to('/view-products');
    }

    else
    {
        $error=$files->getErrorMessage();
    }
}
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
