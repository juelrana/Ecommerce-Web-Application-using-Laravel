@extends('admin.admin_master')
@section('admin_main_content')

<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manufacturer Edit Form </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM-->

                {!! Form::open(['url' => '/update-manufacturer','method'=>'post']) !!}
                <div class="control-group">
                    <label class="control-label">Input</label>
                    <div class="controls">
                        <input type="text" class="span6 " name="manufacturer_name" value="<?php echo $manufacturer_info_by_id->manufacturer_name?>" />
                        <input type="hidden" class="span6 " name="manufacturer_id" value="<?php echo $manufacturer_info_by_id->manufacturer_id?>" />
                    </div>
                </div>
                
                
                <div class="control-group">
                    <label class="control-label">Manufacturer Description</label>
                    <div class="controls">
                        <textarea class="span6 " rows="3" name="manufacturer_description"><?php echo $manufacturer_info_by_id->manufacturer_description?></textarea>
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
                    <button type="submit" class="btn btn-success">Update</button>
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