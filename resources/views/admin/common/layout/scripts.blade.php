
<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset("assets/admin/js/jquery-2.0.3.min.js") }}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{ asset("assets/admin/js/jquery-1.10.2.min.js") }}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/typeahead-bs2.min.js') }}"></script>

<!-- page specific plugin scripts -->


@yield('page_specific_scripts')

<script src="{{ asset('assets/admin/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/ace.min.js') }}"></script>
