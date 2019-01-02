@extend('admin.admin_master')
@section('admin_main_content')
<div id="page-wraper">
  <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN BASIC PORTLET-->
      <div class="widget orange">
        <div class="widget-title">
          <h4><i class="icon-reorder"></i> Products Table</h4>
          <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
          </span>
        </div>
        <div class="widget-body">
          <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
              <tr>
                <th><i class="icon-bookmark"></i> Image</th>
                <th><i class="icon-bullhorn"></i> Title</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>Price</th>
                <th><i class="icon-bullhorn"></i> Qty</th>
                <th><i class="icon-bookmark"></i>Status</th>
            
                <th><i class=" icon-edit"></i> Action</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach($all_product_info as $vproduct){?>
                <tr>
                  <td> <img src="{{asset('/').$vproduct->product_image}}" width="100"></td>
                  <td ><?php echo $vproduct->product_name;?></td>
                  <td ><?php echo $vproduct->product_purchase_price;?></td>
                  <td ><?php echo $vproduct->product_quantity;?></td>
                  <?php if($vproduct->product_publication_status){?>
                    <td >  <button class="btn btn-success">Publish</button></td>
                  <?php }else{ ?>
                    <td>  <button class="btn btn-danger">Unpublish</button></td>
                  <?php } ?>

                  <td>
                    <?php
                    if($vproduct->product_publication_status){
                      ?>
                      <a href="{{URL::to('unpublish-product/'.$vproduct->product_id)}}" class="btn btn-danger"><i class="icon-question-sign"></i></a>
                    <?php }else{ ?>
                     <a href="{{URL::to('publish-product/'.$vproduct->product_id)}}" class="btn btn-success"><i class="icon-ok"></i></a>
                   <?php } ?>

                   <a href="{{URL::to('edit-product/'.$vproduct->product_id)}}"
                    class="btn btn-primary" onclick="return checkEdit()">
                    <i class="icon-pencil"></i></a>

                    <a href="{{URL::to('delete-product/'.$vproduct->product_id)}}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash "></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- END BASIC PORTLET-->
    </div>
  </div>

</div>
@endsection