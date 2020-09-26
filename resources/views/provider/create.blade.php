@extends('base_layout.master_layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase"> Horizontal Form</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                    <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                    <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Regular input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Enter your name">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Input with hint</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Enter your email">
                                <div class="form-control-focus">
                                </div>
                                <span class="help-block">Some help goes here...</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="col-md-2 control-label" for="form_control_1">Success Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Success state">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-warning">
                            <label class="col-md-2 control-label" for="form_control_1">Warning Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Warning state">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-error">
                            <label class="col-md-2 control-label" for="form_control_1">Error State</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="form_control_1" placeholder="Error state">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Dropdown Input</label>
                            <div class="col-md-10">
                                <select class="form-control" id="form_control_1">
                                    <option value=""></option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                    <option value="">Option 3</option>
                                    <option value="">Option 4</option>
                                </select>
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="col-md-2 control-label" for="form_control_1">Textarea</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" placeholder="Enter more text"></textarea>
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Disabled</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" disabled="" id="form_control_1" placeholder="Placeholder...">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Readonly</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" readonly="" value="Some value" id="form_control_1" placeholder="Placeholder...">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Readonly</label>
                            <div class="col-md-10">
                                <div class="form-control form-control-static">
                                    email@example.com
                                </div>
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Small</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control input-sm" id="form_control_1" placeholder=".input-sm">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Large</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control input-lg" id="form_control_1" placeholder=".input-lg">
                                <div class="form-control-focus">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="button" class="btn default">Cancel</button>
                                <button type="button" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase"> Checkbox &amp; Radios</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                    <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                    <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Checkboxes</label>
                            <div class="col-md-10">
                                <div class="md-checkbox-list">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox30" class="md-check">
                                        <label for="checkbox30">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 1 </label>
                                    </div>
                                    <div class="md-checkbox has-error">
                                        <input type="checkbox" id="checkbox31" class="md-check" checked="">
                                        <label for="checkbox31">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 2 </label>
                                    </div>
                                    <div class="md-checkbox has-warning">
                                        <input type="checkbox" id="checkbox32" class="md-check">
                                        <label for="checkbox32">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 3 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Inline Checkboxes</label>
                            <div class="col-md-10">
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox33" class="md-check">
                                        <label for="checkbox33">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 1 </label>
                                    </div>
                                    <div class="md-checkbox has-error">
                                        <input type="checkbox" id="checkbox34" class="md-check" checked="">
                                        <label for="checkbox34">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 2 </label>
                                    </div>
                                    <div class="md-checkbox has-info">
                                        <input type="checkbox" id="checkbox35" class="md-check">
                                        <label for="checkbox35">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 3 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Radios</label>
                            <div class="col-md-10">
                                <div class="md-radio-list">
                                    <div class="md-radio">
                                        <input type="radio" id="radio50" name="radio211" class="md-radiobtn">
                                        <label for="radio50">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 1 </label>
                                    </div>
                                    <div class="md-radio has-error">
                                        <input type="radio" id="radio51" name="radio211" class="md-radiobtn" checked="">
                                        <label for="radio51">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 2 </label>
                                    </div>
                                    <div class="md-radio has-warning">
                                        <input type="radio" id="radio52" name="radio231" class="md-radiobtn">
                                        <label for="radio52">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 3 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Inline Radios</label>
                            <div class="col-md-10">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="radio53" name="radio2" class="md-radiobtn">
                                        <label for="radio53">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 1 </label>
                                    </div>
                                    <div class="md-radio has-error">
                                        <input type="radio" id="radio54" name="radio2" class="md-radiobtn" checked="">
                                        <label for="radio54">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 2 </label>
                                    </div>
                                    <div class="md-radio has-warning">
                                        <input type="radio" id="radio55" name="radio2" class="md-radiobtn">
                                        <label for="radio55">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        Option 3 </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="button" class="btn default">Cancel</button>
                                <button type="button" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-settings font-green-haze"></i>
                    <span class="caption-subject bold uppercase"> Input Groups &amp; Icons</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                    <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                    <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                    <i class="icon-trash"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" class="form-horizontal">
                    <div class="form-body">
                        <div class="form-group form-md-line-input has-danger">
                            <label class="col-md-2 control-label" for="form_control_1">Left icon</label>
                            <div class="col-md-10">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Left icon">
                                    <div class="form-control-focus">
                                    </div>
                                    <span class="help-block">Some help goes here...</span>
                                    <i class="fa fa-bell-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-success">
                            <label class="col-md-2 control-label" for="form_control_1">Right icon</label>
                            <div class="col-md-10">
                                <div class="input-icon right">
                                    <input type="text" class="form-control" placeholder="Right icon">
                                    <div class="form-control-focus">
                                    </div>
                                    <span class="help-block">Some help goes here...</span>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Input Group</label>
                            <div class="col-md-10">
                                <div class="input-group has-success">
                                    <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Email Address">
                                    <div class="form-control-focus">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input has-info">
                            <label class="col-md-2 control-label" for="form_control_1">Input Group</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                    <div class="form-control-focus">
                                    </div>
                                    <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="help-block">Some help goes here...</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Both Addons</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control" placeholder="Enter amount">
                                    <div class="form-control-focus">
                                    </div>
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Action Button</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <span class="input-group-btn btn-left">
                                    <button class="btn blue-madison" type="button">Go!</button>
                                    </span>
                                    <div class="input-group-control">
                                        <input type="text" class="form-control" placeholder="Placeholder">
                                        <div class="form-control-focus">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Dropdowm Menu</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-control">
                                        <input type="text" class="form-control" placeholder="Placeholder">
                                        <div class="form-control-focus">
                                        </div>
                                    </div>
                                    <span class="input-group-btn btn-right">
                                    <button type="button" class="btn green-haze dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="javascript:;">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Something else here</a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li>
                                            <a href="javascript:;">Separated link</a>
                                        </li>
                                    </ul>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Action Buttons(small size)</label>
                            <div class="col-md-10">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn btn-left">
                                    <button class="btn red-intense" type="button">Go!</button>
                                    </span>
                                    <div class="input-group-control">
                                        <input type="text" class="form-control input-sm" placeholder=".input-sm">
                                        <div class="form-control-focus">
                                        </div>
                                    </div>
                                    <span class="input-group-btn btn-right">
                                    <button class="btn green-haze" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-2 control-label" for="form_control_1">Action Buttons(large size)</label>
                            <div class="col-md-10">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-btn btn-left">
                                    <button class="btn red-intense" type="button">Go!</button>
                                    </span>
                                    <div class="input-group-control">
                                        <input type="text" class="form-control input-lg" placeholder=".input-lg">
                                        <div class="form-control-focus">
                                        </div>
                                    </div>
                                    <span class="input-group-btn btn-right">
                                    <button class="btn green-haze" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions margin-top-10">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="button" class="btn default">Cancel</button>
                                <button type="button" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection