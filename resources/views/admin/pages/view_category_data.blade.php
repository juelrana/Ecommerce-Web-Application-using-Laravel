@extend('admin.admin_master')
@section('admin_main_content')
<div id="page-wraper">
  <div class="row-fluid">
    <div class="span12">
      <!-- BEGIN BASIC PORTLET-->
      <div class="widget orange">
        <div class="widget-title">
          <h4><i class="icon-reorder"></i> Category Add Table</h4>
          <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
          </span>
        </div>
        <div class="widget-body">
          <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
              <tr>
                <th><i class="icon-bullhorn"></i> Category Name</th>
                <th class="hidden-phone"><i class="icon-question-sign"></i>Category Descrition</th>
                <th><i class="icon-bookmark"></i> Publication Status</th>
                <th><i class=" icon-edit"></i> Action</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach($all_category_info as $vcategory){?>
                <tr>
                  <td><?php echo $vcategory->category_name;?></td>
                  <td ><?php echo $vcategory->category_description;?></td>
                  <?php if($vcategory->publication_status){?>
                    <td >  <button class="btn btn-success">Publish</button></td>
                  <?php }else{ ?>
                    <td>  <button class="btn btn-danger">Unpublish</button></td>
                  <?php } ?>

                  <td>
                    <?php
                    if($vcategory->publication_status){
                      ?>
                      <a href="{{URL::to('unpublish-category/'.$vcategory->category_id)}}" class="btn btn-danger"><i class="icon-question-sign"></i></a>
                    <?php }else{ ?>
                     <a href="{{URL::to('publish-category/'.$vcategory->category_id)}}" class="btn btn-success"><i class="icon-ok"></i></a>
                   <?php } ?>

                   <a href="{{URL::to('edit-category/'.$vcategory->category_id)}}"
                    class="btn btn-primary" onclick="return checkEdit()">
                    <i class="icon-pencil"></i></a>

                    <a href="{{URL::to('delete-category/'.$vcategory->category_id)}}" class="btn btn-danger" onclick="return checkDelete()"><i class="icon-trash "></i></a>
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