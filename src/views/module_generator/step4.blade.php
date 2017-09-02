@extends("crudbooster::admin_template")
@section("content")

    @include('crudbooster::module_generator.partials.nav_tabs', ['step' => ['','','','active'], 'id' => $id ])

    <div class="box box-default">
        <div class="box-header">
            <h1 class="box-title">Configuration</h1>
        </div>
        <form method='post' action='{{Route('AdminModulesControllerPostStepFinish')}}'>
            {{csrf_field()}}
            <input type="hidden" name="id" value='{{$id}}'>
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Title Field Candidate</label>
                            <input type="text" name="title_field" value="{{$config['title_field']}}"
                                   class='form-control'>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Limit Data</label>
                            <input type="number" name="limit" value="{{$config['limit']}}" class='form-control'>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <label>Order By</label>
                            <?php
                            if (is_array($config['orderby'])) {
                                $orderby = [];
                                foreach ($config['orderby'] as $k => $v) {
                                    $orderby[] = $k . ',' . $v;
                                }
                                $orderby = implode(";", $orderby);
                            } else {
                                $orderby = $config['orderby'];
                            }
                            ?>
                            <input type="text" name="orderby" value="{{$orderby}}" class='form-control'>
                            <div class="help-block">E.g : column_name,desc</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Global Privilege</label>
                                    <label class='radio-inline'>
                                        <input type='radio' name='global_privilege'
                                               {{($config['global_privilege'])?"checked":""}} value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['global_privilege'])?"checked":""}} type='radio'
                                               name='global_privilege' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Table Action</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_table_action'])?"checked":""}} type='radio'
                                               name='button_table_action' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_table_action'])?"checked":""}} type='radio'
                                               name='button_table_action' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Bulk Action Button</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_bulk_action'])?"checked":""}} type='radio'
                                               name='button_bulk_action' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_bulk_action'])?"checked":""}} type='radio'
                                               name='button_bulk_action' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Button Action Style</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_action_style']=='button_icon')?"checked":""}} type='radio'
                                               name='button_action_style' value='button_icon'/> Icon
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_action_style']=='button_icon_text')?"checked":""}} type='radio'
                                               name='button_action_style' value='button_icon_text'/> Icon & Text
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_action_style']=='button_text')?"checked":""}} type='radio'
                                               name='button_action_style' value='button_text'/> Button Text
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_action_style']=='button_dropdown')?"checked":""}} type='radio'
                                               name='button_action_style' value='button_dropdown'/> Dropdown
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Add</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_add'])?"checked":""}} type='radio' name='button_add'
                                               value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_add'])?"checked":""}} type='radio' name='button_add'
                                               value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Edit</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_edit'])?"checked":""}} type='radio' name='button_edit'
                                               value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_edit'])?"checked":""}} type='radio'
                                               name='button_edit' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Delete</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_delete'])?"checked":""}} type='radio'
                                               name='button_delete' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_delete'])?"checked":""}} type='radio'
                                               name='button_delete' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Detail</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_detail'])?"checked":""}} type='radio'
                                               name='button_detail' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_detail'])?"checked":""}} type='radio'
                                               name='button_detail' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>


                        </div>


                    </div>

                    <div class="col-sm-4">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Show Data</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_show'])?"checked":""}} type='radio' name='button_show'
                                               value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_show'])?"checked":""}} type='radio'
                                               name='button_show' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Filter & Sorting</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_filter'])?"checked":""}} type='radio'
                                               name='button_filter' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_filter'])?"checked":""}} type='radio'
                                               name='button_filter' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Import</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_import'])?"checked":""}} type='radio'
                                               name='button_import' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_import'])?"checked":""}} type='radio'
                                               name='button_import' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Button Export</label>
                                    <label class='radio-inline'>
                                        <input {{($config['button_export'])?"checked":""}} type='radio'
                                               name='button_export' value='true'/> TRUE
                                    </label>
                                    <label class='radio-inline'>
                                        <input {{(!$config['button_export'])?"checked":""}} type='radio'
                                               name='button_export' value='false'/> FALSE
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box-footer">
                <div align="right">
                    <button type="button" onclick="location.href='{{CRUDBooster::mainpath('step3').'/'.$id}}'"
                            class="btn btn-default">&laquo; Back
                    </button>
                    <input type="submit" name="submit" class='btn btn-primary' value='Save Module'>
                </div>
            </div>
        </form>
    </div>


@endsection