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
        {!! Form::open(array('url' => '/update-product','method'=>'post','enctype'=>'multipart/form-data', 'name'=>'edit_product')) !!}
        <div class="control-group">
          <div class="controls">
            <input type="text" class="span6" name="product_sku" value="{{$productInfo->product_sku}}" />
            <input type="text" class="span6" name="product_name" value="{{$productInfo->product_name}}" />
            <input type="hidden" class="span6" name="product_id" value="{{$productInfo->product_id}}" />
            <input type="hidden" class="span6" name="product_image" value="{{$productInfo->product_image}}" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Purchase Price:</label>
          <div class="controls">
            <input type="text" class="span4" name="product_purchase_price" value="{{$productInfo->product_purchase_price}}" />
            <input type="text" class="span4" name="product_retail_price" value="{{$productInfo->product_retail_price}}"  />
            <input type="text" class="span4" name="product_quantity" value="{{$productInfo->product_quantity}}"  />
          </div>
        </div>
        
        <div class="control-group">
          <div class="controls">
            <input type="text" class="span8" name="product_brand_name" value="{{$productInfo->product_brand_name}}"  />
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
            <textarea class="span8 " rows="3" name="product_short_description">{{$productInfo->product_short_description}}</textarea>
          </div>
        </div>
      </div>
      <div class="widget-body form">


        <div class="control-group">
          <label class="control-label">Long Description:</label>
          <div class="controls">
            <textarea class="span8 wysihtmleditor5" rows="5" name="product_long_description">{{$productInfo->product_long_description}}</textarea>
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
          <span><img src="{{asset('/').$productInfo->product_image}}" alt="" height="100" width="100"/></span>
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
         <button type="submit" class="btn btn-success">Update</button>
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
<script type="text/javascript">
document.forms['edit_product'].elements['category_id'].value="{{$productInfo->category_id}}";
document.forms['edit_product'].elements['product_publication_status'].value="{{$productInfo->product_publication_status}}";
document.forms['edit_product'].elements['manufacturer_id'].value="{{$productInfo->manufacturer_id}}"
</script>
@endsection