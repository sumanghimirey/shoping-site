@extends('admin.common.layout.layout')

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            @include('admin.user.partials.breadcrumb')

        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ trans('admin/user/general.content.common.user_manager') }}                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/user/general.content.edit.edit_form') }}                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.update', ['id' => $data['user']->id]) }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.username') }} </label>

                            <div class="col-sm-9">
                                <input type="text" name="username" placeholder="Username" value="{{ isset($data['user'])?$data['user']->username:'' }}" class="col-xs-10 col-sm-5">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.email') }} </label>

                            <div class="col-sm-9">
                                <input type="text" name="email" value="{{ isset($data['user'])?$data['user']->email:'' }}" placeholder="Email" class="col-xs-10 col-sm-5">
                            </div>
                        </div>

                        <div class="space-4"></div>



                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.name') }} </label>

                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ isset($data['user'])?$data['user']->name:'' }}" placeholder="Name" class="col-xs-10 col-sm-5">
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.status') }} </label>

                            <div class="col-sm-9">

                                <div class="control-group">

                                    <div class="radio">
                                        <label>
                                            <input name="status" type="radio" class="ace" value="1" {{ isset($data['user']) && $data['user']->status == 1?'checked':'' }}>
                                            <span class="lbl"> {{ trans('admin/user/general.content.common.active') }}</span>
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input name="status" type="radio" class="ace" value="0" {{ isset($data['user']) && $data['user']->status == 0?'checked':'' }}>
                                            <span class="lbl"> {{ trans('admin/user/general.content.common.in_active') }}</span>
                                        </label>
                                    </div>


                                </div>



                            </div>
                        </div>

                        <div class="space-4"></div>


                        <hr>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.password') }} </label>

                            <div class="col-sm-9">
                                <input type="password" name="password" placeholder="Username" class="col-xs-10 col-sm-5">
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> {{ trans('admin/user/general.content.common.password_confirmation') }} </label>

                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="col-xs-10 col-sm-5">
                            </div>
                        </div>


                        <div class="space-4"></div>




                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>



                    </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>

    @endsection