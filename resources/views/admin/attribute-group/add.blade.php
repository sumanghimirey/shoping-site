@extends('admin.common.layout.layout')

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            @include($view_path.'partials.breadcrumb')
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ trans($trans_path.'content.common.manager') }}<small>
                        <i class="icon-double-angle-right"></i>
                        {{ trans($trans_path.'content.add.add_form') }}</small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="data-form" class="form-horizontal" role="form" method="POST" action="{{ route($base_route.'.store') }}" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        @include($view_path.'partials.form')

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button id="form-submit-btn" class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    {{ trans('general.button.submit') }}
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    {{ trans('general.button.reset') }}
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

@section('page_specific_scripts')

    <!-- Form Validation script -->
    <script>

        $('#form-submit-btn').click(function (e) {

            var title = $('#title').val();
            if (title == '') {
                $('#title').parent().append('<br><p class="help-block form-error-msg">Title is required</p>')
                return false;
            } else {
                $('#title').parent().find('.form-error-msg').remove();
            }

            var description = $('#description').val();
            if (description == '') {
                $('#description').parent().append('<br><p class="help-block form-error-msg">Description is required</p>')
                return false;
            } else {
                $('#description').parent().find('.form-error-msg').remove();
            }


            $('#data-form').submit();

            return false;
        });

    </script>

    @endsection