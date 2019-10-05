@extends('front/theme.default')



@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>You are 30 seconds away from earning your own money!</p>
                    <!-- <input type="submit" name="" value="Login"/><br/> -->
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form id="loginForm" action="{{ route('login') }}" method="POST">
                                @csrf
                                <h3  class="register-heading">Login</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input id="email" type="email" name="email" value="" autocomplete="email" autofocus="autofocus" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <input id="password" type="password" name="password" autocomplete="current-password" class="form-control ">
                                        </div>
                                        <!-- <input type="checkbox" name="remember_token" id="remember_token" class="form-control"> -->
                                        <input type="submit" class="btnRegister btnLogin"  value="Sing-In"/>
                                    </div>
                                    <div class="col-md-6">
                                        <section class="alert alert-dismissible" style="display:none;">
                                        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                        </section>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form id="registerForm" action="{{ route('register') }}" method="POST">
                        @csrf
                            <h3 class="register-heading">Register Info</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input id="name" type="text" name="name" class="form-control" placeholder="First Name *" value="" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="E-Mail Address *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"  class="form-control"  placeholder="Confirm Password *" value="" />
                                    </div>
                                    <input type="submit" class="btnRegister btnRegister"  value="Register"/>
                                </div>
                                <div class="col-md-6">
                                        <section class="alert alert-dismissible" style="display:none;">
                                        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                        </section>
                                    </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.main-panel{
    margin-top: 100px;
}
.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 6%;
    padding: 3%;
    margin-bottom: 2%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
@endsection
