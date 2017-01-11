@extends('admin.common.layout.layout')

@section('page_title'){{ trans($trans_path.'content.common.manager') }} | {{ trans('admin/page/general.content.list.list') }} - {{ trans('general.admin_panel') }} @endsection

@section('content')


    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="{{ route('admin.dashboard') }}">{{ trans('general.home') }}</a>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}">{{ trans('admin/page/general.content.common.manager') }} </a>
                </li>
                <li class="active">{{ trans($trans_path.'content.list.list') }} </li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    {{ trans($trans_path.'content.common.manager') }}
                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{ trans($trans_path.'content.list.user_list') }}
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">

                                @if (Request::session()->has('message'))
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="icon-remove"></i>
                                        </button>
                                        {!! Request::session()->get('message') !!}
                                        <br>
                                    </div>
                                @endif

                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>{{ trans($trans_path.'content.common.title') }}</th>
                                      
                                        <th>{{ trans($trans_path.'content.common.created_at') }}</th>
                                       
                                        <th class="hidden-480">{{ trans($trans_path.'content.common.status') }}</th>

                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @if ($data['rows']->count() > 0)

                                        @foreach($data['rows'] as $row)

                                            <tr>
                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace">
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                
                                                <td>{{ $row->page_title }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                

                                                <td class="hidden-480">
                                                    @if ($row->status == 1)
                                                        <span class="label label-sm label-success">Active</span>
                                                        @else
                                                        <span class="label label-sm label-info">In-Active</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">

                                                        <a class="btn btn-xs btn-info" href="{{ route($base_route.'.edit', ['id' => $row->id]) }}">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-danger bootbox-confirm" id="btn-delete" href="{{ route($base_route.'.delete', ['id' => $row->id]) }}">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </a>

                                                    </div>


                                                </td>
                                            </tr>

                                            @endforeach

                                        @else

                                        <tr>
                                            <td colspan="7">No data found.</td>
                                        </tr>

                                        @endif

                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>

    @endsection

@section('page_specific_scripts')

    <script src="{{ asset('assets/admin/js/bootbox.min.js') }}"></script>
    <script>
        $(".bootbox-confirm").on(ace.click_event, function() {
            console.log('sdfd');
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    //
                }
            });
        });
    </script>


@endsection