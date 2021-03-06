@extends('admin.auth.layout')

@section('page_title')
    Login Page
@endsection

@section('content')

    <div class="position-relative">

        <!-- Login -->
        <div id="login-box" class="login-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        Please Enter Your Information
                    </h4>

                    <div class="space-6"></div>

                    <form method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="email" class="form-control" placeholder="Valid Email"/>
															<i class="icon-user"></i>
														</span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </label>

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password"/>
															<i class="icon-lock"></i>
														</span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </label>

                            <div class="space"></div>

                            <div class="clearfix">
                                <label class="inline">
                                    <input type="checkbox" name="remember" class="ace"/>
                                    <span class="lbl"> Remember Me</span>
                                </label>

                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                    <i class="icon-key"></i>
                                    Login
                                </button>
                            </div>

                            <div class="space-4"></div>
                        </fieldset>
                    </form>

                    <div class="social-or-login center">
                        <span class="bigger-110">Or Login Using</span>
                    </div>

                    <div class="social-login center">
                        <a class="btn btn-primary">
                            <i class="icon-facebook"></i>
                        </a>

                        <a class="btn btn-info">
                            <i class="icon-twitter"></i>
                        </a>

                        <a class="btn btn-danger">
                            <i class="icon-google-plus"></i>
                        </a>
                    </div>
                </div><!-- /widget-main -->

                <div class="toolbar clearfix">
                    <div>
                        <a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
                            <i class="icon-arrow-left"></i>
                            I forgot my password
                        </a>
                    </div>

                    <div>
                        <a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
                            I want to register
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div><!-- /widget-body -->
        </div><!-- /login-box -->

        <div id="forgot-box" class="forgot-box widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header red lighter bigger">
                        <i class="icon-key"></i>
                        Retrieve Password
                    </h4>

                    <div class="space-6"></div>
                    <p>
                        Enter your email and to receive instructions
                    </p>

                    <form>
                        <fieldset>
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email"/>
															<i class="icon-envelope"></i>
														</span>
                            </label>

                            <div class="clearfix">
                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                    <i class="icon-lightbulb"></i>
                                    Send Me!
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div><!-- /widget-main -->

                <div class="toolbar center">
                    <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                        Back to login
                        <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div><!-- /widget-body -->
        </div><!-- /forgot-box -->

        <div id="signup-box" class="signup-box widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header green lighter bigger">
                        <i class="icon-group blue"></i>
                        New User Registration
                    </h4>

                    <div class="space-6"></div>
                    <p> Enter your details to begin: </p>

                    <form>
                        <fieldset>
                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email"/>
															<i class="icon-envelope"></i>
														</span>
                            </label>

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username"/>
															<i class="icon-user"></i>
														</span>
                            </label>

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password"/>
															<i class="icon-lock"></i>
														</span>
                            </label>

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password"/>
															<i class="icon-retweet"></i>
														</span>
                            </label>

                            <label class="block">
                                <input type="checkbox" class="ace"/>
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
                            </label>

                            <div class="space-24"></div>

                            <div class="clearfix">
                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                    <i class="icon-refresh"></i>
                                    Reset
                                </button>

                                <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                    Register
                                    <i class="icon-arrow-right icon-on-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="toolbar center">
                    <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                        <i class="icon-arrow-left"></i>
                        Back to login
                    </a>
                </div>
            </div><!-- /widget-body -->
        </div><!-- /signup-box -->
    </div><!-- /position-relative -->

@endsection
