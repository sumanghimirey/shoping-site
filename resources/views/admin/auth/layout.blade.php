<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title')</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome-ie7.min.css') }}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{ asset('assets/admin/css/ace-fonts.css') }}" />

    @yield('page_specific_css')

    <!-- ace styles -->

    <link rel="stylesheet" href="{{ asset('assets/admin/css/ace.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ace-rtl.min.css') }}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/ace-ie.min.css') }}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{ asset('assets/admin/js/html5shiv.js') }}"></script>
    <script src="{{ asset('assets/admin/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">Ace</span>
                            <span class="white">Application</span>
                        </h1>
                        <h4 class="blue">&copy; Company Name</h4>
                    </div>

                    @yield('content')

                    <div class="space-6"></div>


                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/admin/js/jquery-2.0.3.min.js') }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset('assets/admin/js/jquery-1.10.2.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='{{ asset('assets/admin/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#'+id).addClass('visible');
    }
</script>
</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:46:42 GMT -->
</html>
