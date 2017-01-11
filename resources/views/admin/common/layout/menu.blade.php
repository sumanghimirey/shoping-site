<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="{{ Request::is('admin/dashboard')?'active':'' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> {{ trans('admin/dashboard/general.dashboard') }} </span>
            </a>
        </li>
        <li class="{{ Request::is('admin/users*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-user"></i>
                <span class="menu-text">  {{ trans('admin/user/general.menu.user_manager') }}  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/users')?'active':'' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/user/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/users/add')?'active':'' }}">
                    <a href="{{ route('admin.users.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/user/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>

        <!-- Page Menu -->
        <li class="{{ Request::is('admin/page*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/page/general.menu.manager') }}  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/users')?'active':'' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/page/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/page/add')?'active':'' }}">
                    <a href="{{ route('admin.pages.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/page/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>


        <li class="{{ Request::is('admin/menu*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/menu/general.menu.manager') }}  </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/menu')?'active':'' }}">
                    <a href="{{ route('admin.menus.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/menu/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/menu/add')?'active':'' }}">
                    <a href="{{ route('admin.menus.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/menu/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('admin/product-attribute*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/product-attribute/general.menu.manager') }}  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/product-attribute')?'active':'' }}">
                    <a href="{{ route('admin.product-attributes.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-attribute/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/product-attribute/add')?'active':'' }}">
                    <a href="{{ route('admin.product-attributes.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-attribute/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('admin/attribute-group*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/attribute-group/general.menu.manager') }}  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/attribute-group')?'active':'' }}">
                    <a href="{{ route('admin.attribute-groups.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/attribute-group/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/attribute-group/add')?'active':'' }}">
                    <a href="{{ route('admin.attribute-groups.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/attribute-group/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/banner*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/banner/general.menu.manager') }}  </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/banner')?'active':'' }}">
                    <a href="{{ route('admin.banners.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/banner/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/banner/add')?'active':'' }}">
                    <a href="{{ route('admin.banners.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/banner/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/product-tags*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/product-tag/general.menu.manager') }}  </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/product-tags')?'active':'' }}">
                    <a href="{{ route('admin.product-tags.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-tag/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/product-tag/add')?'active':'' }}">
                    <a href="{{ route('admin.product-tags.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-tag/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/product-category*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/product-category/general.menu.manager') }}  </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/product-category')?'active':'' }}">
                    <a href="{{ route('admin.product-categorys.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-category/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/product-category/add')?'active':'' }}">
                    <a href="{{ route('admin.product-categorys.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product-category/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('admin/product*')?'active':'' }}">
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text">  {{ trans('admin/product/general.menu.manager') }}  </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li class="{{ Request::is('admin/product')?'active':'' }}">
                    <a href="{{ route('admin.products.index') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product/general.menu.list') }}
                    </a>
                </li>

                <li class="{{ Request::is('admin/product/add')?'active':'' }}">
                    <a href="{{ route('admin.products.add') }}">
                        <i class="icon-double-angle-right"></i>
                        {{ trans('admin/product/general.menu.add') }}
                    </a>
                </li>
            </ul>
        </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>