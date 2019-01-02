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
                <h4><i class="icon-reorder"></i> Manufacturar Add Form </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM-->

                {!! Form::open(['url' => '/save-manufacturer','method'=>'post']) !!}
                <div class="control-group">
                    <label class="control-label">Input</label>
                    <div class="controls">
                        <input type="text" class="span6 " name="manufacturer_name" />
                    </div>
                </div>                
                <div class="control-group">
                    <label class="control-label">Category Description</label>
                    <div class="controls">
                        <textarea class="span6 " rows="3" name="manufacturer_description" required></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"> Publication Status</label>
                    <div class="controls">
                        <select data-placeholder="Condition of your Category!" class="chzn-select-deselect span6" tabindex="-1" id="selCSI" name='publication_status'>

                            <option selected="" value='1'>Published</option>
                            <option value='0'>Unpublished</option> 
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn">Cancel</button>
                </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>


@endsection