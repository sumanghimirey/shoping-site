@extends('admin.common.layout.layout')

@section('page_title')Error - Admin Panel @endsection

@section('content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="active">Error 404</li>
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
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="error-container">
                        <div class="well">
                            <h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="icon-random"></i>
												404
											</span>
                                Something Went Wrong
                            </h1>

                            <hr>
                            <h3 class="lighter smaller">
                                But we are working
                                <i class="icon-wrench icon-animated-wrench bigger-125"></i>
                                on it!
                            </h3>

                            <div class="space"></div>

                            <div>
                                <h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

                                <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                    <li>
                                        <i class="icon-hand-right blue"></i>
                                        Read the faq
                                    </li>

                                    <li>
                                        <i class="icon-hand-right blue"></i>
                                        Give us more info on how this specific error occurred!
                                    </li>
                                </ul>
                            </div>

                            <hr>
                            <div class="space"></div>

                            <div class="center">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                                    <i class="icon-dashboard"></i>
                                    Dashboard
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>

    @endsection
