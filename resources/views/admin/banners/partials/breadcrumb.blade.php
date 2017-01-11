<ul class="breadcrumb">
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin.dashboard') }}">{{ trans('general.home') }}</a>
    </li>

    <li>
        <a href="{{ route('admin.banners.index') }}">{{ trans('admin/banner/general.content.common.banner_manager') }} </a>
    </li>

    @if (isset($data))
        <li class="active">{{ trans('admin/banner/general.content.common.edit') }} </li>
    @else
        <li class="active">{{ trans('admin/banner/general.content.common.add') }} </li>
    @endif

</ul><!-- .breadcrumb -->