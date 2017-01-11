<ul class="breadcrumb">
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin.dashboard') }}">{{ trans('general.home') }}</a>
    </li>

    <li>
        <a href="{{ route('admin.users.index') }}">{{ trans('admin/user/general.content.common.user_manager') }} </a>
    </li>

    @if (isset($data))
        <li class="active">{{ trans('admin/user/general.content.common.edit') }} </li>
    @else
        <li class="active">{{ trans('admin/user/general.content.common.add') }} </li>
    @endif

</ul><!-- .breadcrumb -->