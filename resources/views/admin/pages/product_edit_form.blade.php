@extends('admin.admin_master')
@section('admin_main_content')
<h3 align="center" style="color: green"> 
  <?php
  $msg=Session::get('msg');
  if($msg)
    echo $msg;
  Session::put('msg',null);
  ?>
</h3>
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN SAMPLE FORMPORTLET-->
    <div class="widget green">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i> Product Add Form </h4>
        <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
        </span>
      </div>
      <div class="widget-body">
        <!-- BEGIN FORM-->
        {!! Form::open(array('url' => '/save-products','method'=>'post','enctype'=>'multipart/form-data')) !!}
        <div class="control-group">
          <div class="controls">
            <input type="text" class="span6" name="product_sku" placeholder="SKU" />
            <input type="text" class="span6" name="product_name" placeholder=" Product Title" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Purchase Price:</label>
          <div class="controls">
            <input type="text" class="span4" name="product_purchase_price"placeholder="purchase Price"/>
            <input type="text" class="span4" name="product_retail_price" placeholder="Retail Price" />
            <input type="text" class="span4" name="product_quantity" placeholder="Qty" />
          </div>
        </div>
        
        <div class="control-group">
          <div class="controls">
            <input type="text" class="span8" name="product_brand_name" placeholder="Brand" />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label"> Manufacturer Name:</label>
          <div class="controls">
            <select data-placeholder="Your Favorite Type of Category" class="chzn-select-deselect span8" tabindex="-1"  name="manufacturer_id">
              <?php $all_manufacturer = DB::table('manufacturer')->select('*')->get();  ?>
              @foreach($all_manufacturer as $vmanufacturer)
              <option value="{{$vmanufacturer->manufacturer_id}}">{{$vmanufacturer->manufacturer_name}}</option> @endforeach                                                            
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label"> Category Name:</label>
          <div class="controls">
            <select data-placeholder="Your Favorite Type of Category" class="chzn-select-deselect span8" tabindex="-1" id="selCSI" name="category_id">
              <?php $all_category = DB::table('category')->select('*')->get();  ?>
              @foreach($all_category as $vcategory)
              <option value="{{$vcategory->category_id}}">{{$vcategory->category_name}}</option> @endforeach                                                            
            </select>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">Short Description:</label>
          <div class="controls">
            <textarea class="span8 " rows="3" name="product_short_description"></textarea>
          </div>
        </div>
      </div>
      <div class="widget-body form">


        <div class="control-group">
          <label class="control-label">Long Description:</label>
          <div class="controls">
            <textarea class="span8 wysihtmleditor5" rows="5" name="product_long_description"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label"> Publication Status:</label>
          <div class="controls">
            <select class="chzn-select-deselect span8" tabindex="-1"  name="product_publication_status">
              <option value="1">Publish </option>
              <option value="0">Unpublish</option>                                                           
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Image upload</label>
          <div class="controls">
            <div data-provides="fileupload" class="fileupload fileupload-new">
              <div class="input-append">
                <div class="uneditable-input">
                  <i class="icon-file fileupload-exists"></i>
                  <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-file">
                 <span class="fileupload-new">Select file</span>
                 <span class="fileupload-exists">Change</span>
                 <input type="file" class="default" name="product_image">
               </span>
               <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
             </div>
           </div>
         </div>
       </div>

       <div class="control-group">
        <div class="controls">
         <button type="submit" class="btn btn-success">Submit</button>
         <button type="button" class="btn">Cancel</button>
       </div>
     </div>
   </div>
   {!! Form::close() !!}
   <!-- END FORM-->
 </div>
</div>
<!-- END SAMPLE FORM PORTLET-->
</div>
@endsection