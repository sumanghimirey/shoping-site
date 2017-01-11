@extends('admin.common.layout.layout')

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            @include('admin.banners.partials.breadcrumb')

        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ trans('admin/banner/general.content.common.banner_manager') }}                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/banner/general.content.add.add_form') }}                    </small>
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
                    <form id="data-form" class="form-horizontal" role="form" method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">



                        @include('admin.banners.partials.form')

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button id="form-submit-btn" class="btn btn-info" type="submit">
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

@section('page_specific_scripts')

    <script>
        $('#form-submit-btn').click(function () {
            var textalt = $('#textalt').val();
            if(textalt == ''){
                $('#textalt').parent().append('<div style="clear: both"></div> <p class="help-inline form-error-msg">Name is required</p> ');
                return false;
            }else {
                $('#textalt').parent().find('.form-error-msg').remove();
            }

            var caption = $('#caption').val();
            if(caption == ''){
                $('#caption').parent().append('<div style="clear: both"></div><p class="help-inline form-error-msg">Caption is required</p> ');
                return false;
            }else {
                $('#caption').parent().find('.form-error-msg').remove();
            }

            var image = $('#image').val();
            if(image == ''){
                $('#image').parent().append('<div style="clear: both"></div><p class="help-inline form-error-msg">Image is required</p> ');
                return false;
            }else {
                $('#image').parent().find('.form-error-msg').remove();
            }

            var link = $('#link').val();
            if(link == ''){
                $('#link').parent().append('<div style="clear: both"></div><p class="help-inline form-error-msg">Link is required</p> ');
                return false;
            }else {
                $('#link').parent().find('.form-error-msg').remove();
            }

            var position = $('#position').val();
            if(position == ''){
                $('#position').parent().append('<div style="clear: both"></div><p class="help-inline form-error-msg">Position is required</p> ');
                return false;
            }else {
                $('#position').parent().find('.form-error-msg').remove();
            }

            $('#data-form').submit();
            return false;
        });
    </script>

    @endsection