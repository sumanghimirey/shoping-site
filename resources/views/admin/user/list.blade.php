@extends('admin.common.layout.layout')

@section('page_title'){{ trans('admin/user/general.content.common.user_manager') }} | {{ trans('admin/user/general.content.list.list') }} - {{ trans('general.admin_panel') }} @endsection


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
                    <a href="{{ route('admin.users.index') }}">{{ trans('admin/user/general.content.common.user_manager') }} </a>
                </li>
                <li class="active">{{ trans('admin/user/general.content.list.list') }} </li>
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
                    {{ trans('admin/user/general.content.common.user_manager') }}
                    <small>
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/user/general.content.list.user_list') }}
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
                                        <th>{{ trans('admin/user/general.content.common.name') }}</th>
                                        <th>{{ trans('admin/user/general.content.common.email') }}</th>
                                        <th class="hidden-480">{{ trans('admin/user/general.content.common.created_at') }}</th>

                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            {{ trans('admin/user/general.content.common.updated_at') }}
                                        </th>
                                        <th class="hidden-480">{{ trans('admin/user/general.content.common.status') }}</th>

                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @if ($data['users']->count() > 0)

                                        @foreach($data['users'] as $user)

                                            <tr>
                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace">
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <a href="#">{{ $user->name }}</a>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>

                                                <td class="hidden-480">
                                                    @if ($user->status == 1)
                                                        <span class="label label-sm label-success">Active</span>
                                                        @else
                                                        <span class="label label-sm label-info">In-Active</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">

                                                        <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', ['id' => $user->id]) }}">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-danger" href="{{ route('admin.users.delete', ['id' => $user->id]) }}">
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