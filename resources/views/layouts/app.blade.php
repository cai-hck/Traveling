<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Travel Agency</title>
    <link rel="shortcut icon" sizes="114x114" href="{{{ asset('addbyme/images/logo.png') }}}">
    <!--link-->
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/bootstrap.min.css')}}">
    <?php if(Auth::user() == ''){?>
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/modalstyle.css')}}">
    <?php }?>
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/bootstrap-datepicker.css')}}">
    <?php if(Auth::user() == ''){?>
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/slick-theme.css')}}">
    <?php }?>
    @yield('csscontent')
    <!--end of link-->
    <style type="text/css">
        @font-face {
            font-family: IRAQSansWeb;
            src: url("{{asset('addbyme/fonts/IRAQSansWeb.woff2')}}");
        }
    </style>
     <style type="text/css">
        @font-face {
            font-family: IRAQSansWeb_Bold;
            src: url("{{asset('addbyme/fonts/IRAQSansWeb_Bold.woff2')}}");
        }
    </style>
     <style type="text/css">
        @font-face {
            font-family: IRAQSansWeb_Medium;
            src: url("{{asset('addbyme/fonts/IRAQSansWeb_Medium.woff2')}}");
        }
    </style>
</head>
<body style=" font-family: 'IRAQSansWeb_Bold';zoom: 70%;">
    <?php if(Auth::user() == ''){?>
    <section class="bgimages">
        <!--header--->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-5 mar4">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('addbyme/images/logo.png')}}"></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-7 mar4 border-left1">
                        <div class="textlogo">
                            <h3>أكبر شركة سياحة وسفر في العراق</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contactbar">
                            <ul>
                                <li><a class="bg1" href="#" data-toggle="modal" data-target="#myModal3" id="createaccountbutton">انشاء حساب</a></li>
                                <li><a class="bg2" href="#" data-toggle="modal" data-target="#myModal5" id="loginbutton">..تسجيل الدخول</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#myModal8">اتصل بنا</a></li>
                            </ul>
                            <div class="complan">
                                <p><img src="{{asset('addbyme/images/Ellipse 2.png')}}"><a href="{{url('/listofcompany')}}">قائمة الشركات</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php }else {?>
    <section class="bgimages1">
        <!--header--->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-5 mar4">
                        <div style="font-size:40px;    text-align: right;">
                            <a href="{{url('/')}}"><span style="color: black;">ID {{$company->id}}</span></a>
                        </div>
                        <div class="logo">
                            <a href="#"><img src="{{asset('upload/photo/'.$company->photo)}}"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-7 mar4 border-left1">
                        <div class="textlogo">
                            <h3>{{$company->travel_agency_name}}</h3>
                        </div>
                        <div class="row textlogo">
                            <div class="col-md-6">
                                <div class="blance3">
                                    <h4>الرصيد</h4>
                                    <p class="bgp01">${{$moneyone->remain}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blance3">
                                    <h4>الحساب</h4>
                                    <p>${{$moneyone->balance}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-5">
                        <div class="contactbar">
                            <ul class="addbuttonnew">
                                <li><a href="{{url('/companyoffer')}}" class="bg3" style="<?php if($company->bookpackage != 'on'){echo 'display:none';}?>"> عروض الكروبات</a></li>  
                                <li><a href="{{url('/companyofferflight')}}" class="bg3" style="<?php if($company->bookflight != 'on'){echo 'display:none';}?>">عروض جارتر</a></li>    
                                <li><a href="{{url('/visaoffer')}}" class="bg3" style="<?php if($company->bookvisa != 'on'){echo 'display:none';}?>">عروض الفيزا</a></li>        
                                <li><a class="bg2" href="{{url('/logout')}}">الخروج<img src="{{asset('addbyme/images/lon.png')}}"></a></li>
                                <br/>
                                <?php if($company->addpackage == 'on'){?>
                                    <li style="margin-left: 10px!important;margin-top: 30px;"><a href="{{url('/bookednew')}}"><span class="bage3">{{$count}}</span>حجوزات الكروبات</a></li>
                                    <li style="margin-left: 10px!important;"><a class="bg1" href="{{url('/addpackagenew')}}" > <i class="fa fa-plus-square"></i>اضافة عروض الكروبات</a></li>
                                <?php }?>
                                <br/>
                                <?php if($company->addflight == 'on'){?>
                                    <li style="margin-left: 10px!important;margin-top: 20px;"><a href="{{url('/bookedflightnew')}}"><span class="bage3">{{$count1}}</span>حجوزات الطيران</a></li>
                                    <li style="margin-left: 10px!important;"><a class="bg1" href="{{url('/addflightnew')}}" > <i class="fa fa-plus-square"></i>اضافة عروض الطيران</a></li>
                                <?php }?>
                                <br/>
                                <?php if($company->addvisa == 'on'){?>
                                    <li style="margin-left: 10px!important;margin-top: 20px;"><a href="{{url('/bookedvisa')}}"><span class="bage3">{{$count2}}</span>حجوزات الفيزا </a></li>
                                    <li style="margin-left: 10px!important;"><a class="bg1" href="{{url('/editvisa')}}" > <i class="fa fa-plus-square"></i>تعديل الفيزا</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--end of header--->

        <div class="mar5">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="title titlebox3">
                            <h3>أهلا {{$company->travel_agency_name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
        <!--end of header--->
            @yield('content')
    <!--footer-->
    <?php if(Auth::user() == ''){?>
    <section class="footer">
        <div class="container">
            <div class="row bor-bottom rowmar">
                <div class="col-md-5">
                    <div class="contactbar topfooet">
                        <ul>
                            <li><a class="bg1" href="#" data-toggle="modal" data-target="#myModal3">انشاء حساب</a></li>
                            <li><a class="bg2" href="#"  data-toggle="modal" data-target="#myModal5">..تسجيل الدخول</a></li>
                            <li><a href="#"  data-toggle="modal" data-target="#myModal8">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <div class="footerlogo">
                        <img src="{{asset('addbyme/images/logo.png')}}">
                    </div>
                </div>
                <div class="col-md-4 col-8">
                    <div class="footertext">
                        <h3>الطريقة الجديدة والفريدة<span>لتكتشف العالم</span></h3>
                    </div>
                </div>
            </div>
            <div class="row paddfooterbottom">
                <div class="col-md-5">
                    <div class="footerbottom">
                        <ul>
                        <li><a href="#"><i class="fa fa-envelope"></i> support@najmetalsahel.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="TravelIraq">
                        <p>جميع الحقوق محفوظة 2019</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footericon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }else {?>
    <section class="footer">
        <div class="container">
            <div class="row bor-bottom rowmar">
                <div class="col-md-5">
                    <div class="contactbar topfooet footerfont">
                        <ul  style="text-align:right;">
                            <li><a class="bg2" href="{{url('/logout')}}">الخروج<img src="{{asset('addbyme/images/lon.png')}}"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <div class="footerlogo">
                        <img src="{{asset('addbyme/images/logo.png')}}">
                    </div>
                </div>
                <div class="col-md-4 col-8">
                    <div class="footertext">
                        <h3>الطريقة الجديدة والفريدة<span>لتكتشف العالم</span></h3>
                    </div>
                </div>
            </div>

            <div class="row paddfooterbottom">
                <div class="col-md-5">
                    <div class="footerbottom">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> support@najmetalsahel.com</a></li>
                        </ul>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="TravelIraq">
                        <p>جميع الحقوق محفوظة 2019</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footericon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('addbyme/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/bootstrap-datepicker.js')}}"></script>
    <?php if(Auth::user() == ''){?>
    <script type="text/javascript" src="{{asset('addbyme/js/slick.js')}}"></script>
    <?php }?>
    <script type="text/javascript" src="{{asset('addbyme/js/my.js')}}"></script>
    
    @yield('jscontent')
    <?php if(Auth::user() == ''){?>
     <!-- Contact Us Modal -->
    <div class="modal fade" id="myModal8">
        <div class="modal-dialog modal-dialog-centered modal-lg6">
        <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <div class="modal-content"> 
                <div class="modal-header d-block">
                    <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                </div>
                <!-- Modal body -->
                <div class="modal-body w-100 text-left">
                    <div class="contact-us2"> 
                        <h3 class="heading-three">اتصل بنا</h3>
                    </div>
                    <form class="contact-us" method="POST" action="{{url('contactus')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-control">
                                    <input type="text" name="name" placeholder="الأسم " required>
                                    <i class="fa fa-user e-mail1"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control">
                                    <input type="text" name="phone_number" placeholder="أرقام الموبايلات" required>
                                    <i class="fa fa-phone e-mail1"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-control">
                                    <input type="email" name="email" placeholder="  الإيميل" required>
                                    <i class="fa fa-envelope e-mail1"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-control">
                                    <textarea rows="5" cols="30" placeholder="رسالتك" name="message" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="ac-link submit">SEND<i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>	
                </div>     
            </div>
        </div>
    </div>
    <!-- Login Modal -->
    <div class="modal fade" id="myModal5">
        <div class="modal-dialog modal-dialog-centered modal-lg4">
            <div class="modal-content"> 
            <!-- Modal body -->
                <div class="modal-body w-100 text-center"> 
                    <div class="row">
                        <div class="col-md-5 my-auto">
                            <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                            <p class="verification" style="    font-size: 22px!important;   text-align: center!important">أهلا بك في موقع العراقي للسفر والسياحة </p>
                            <a href="#"><p class="small-text">استشكف عندنا افضل العروض</p></a>
                            <a href="#" onclick="createaccountmodal();"class="ac-link">انشاء حساب</a>
                        </div>
                        <div class="col-md-7">
                            <p class="alert text-right" style="display:none">Email or Password was entered in incorrect, please try again</p>
                            <form class="pop-up border-left" method="POST" action="{{url('accountlogin')}}" id="loginform">
                                @csrf
                                <div class="form-control foam">
                                    <label>البريد الألكتروني</label>
                                    <input type="email" name="email" id="loginemail" required>
                                    <i class="fa fa-envelope e-mail"></i>
                                </div>
                                <div class="form-control foam">
                                    <label>الرمز</label>
                                    <input type="password" name="password" id="myInput2" required>
                                    <i class="fa fa-eye password" onclick="myFunction2()"></i>
                                    <i class="fa fa-lock e-mail"></i>
                                </div>
                                <div class="form-control foam d-flex mb-5">
                                    <input type="checkbox" name="remember">
                                    <span class="checkmark"></span>
                                    <label class="ml-3">تذكرني</label>
                                </div>
                                <input type="submit" value="تسجيل الدخول">
                            </form>
                            <input type="hidden" id="loginstatus" value="bad">
                            <a href="#"  onclick="forgotmodal()"><p class="small-text mt-5">هل نسيت كلمة المرور؟</p></a>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <?php if($status == 'reset'){?>
        <a data-toggle="modal" data-target="#myModal14" id="resetmodal" style="display:none;"></a>
        <div class="modal fade" id="myModal14">
            <div class="modal-dialog modal-dialog-centered modal-lg4">
                <div class="modal-content"> 
                <!-- Modal body -->
                    <div class="modal-body w-100 text-center"> 
                        <div class="row">
                            <div class="col-md-5 my-auto">
                                <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                                <p class="verification" style="    font-size: 22px!important;   text-align: center!important">أهلا بك في موقع العراقي للسفر والسياحة </p>
                                <a href="#"><p class="small-text">استشكف عندنا افضل العروض</p></a>
                                <a href="#" onclick="createaccountmodal();"class="ac-link">انشاء حساب</a>
                            </div>
                            <div class="col-md-7">
                                <p class="alert text-right" style="display:none">Email or Password was entered in incorrect, please try again</p>
                                <form class="pop-up border-left" id="resetpasswordform" method="POST" action="{{url('resetnewpassword')}}" >
                                    @csrf
                                    <div class="form-control foam">
                                        <label>كلمة المرور</label>
                                        <input type="password" name="newpasword" id="newpassword" required style="width:100%;    padding-right: 30px;">
                                        <i class="fa fa-eye password" onclick="myFunction3()"></i>
                                        <i class="fa fa-lock e-mail"></i>
                                    </div>
                                    <div class="form-control foam">
                                        <label>اعادة كتابة كلمة المرور</label>
                                        <input type="password" name="retypepassword" id="retypepassword" required style="width:100%;    padding-right: 30px;">
                                        <i class="fa fa-eye password" onclick="myFunction4()"></i>
                                        <i class="fa fa-lock e-mail"></i>
                                    </div>
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <input type="submit" value="Change">
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    <?php }?>
    
    <!-- Forgot Modal -->
    <a data-toggle="modal" data-target="#myModal13" id="forgotmodal" style="display:none;"></a>
    <div class="modal fade" id="myModal13">
        <div class="modal-dialog modal-dialog-centered modal-lg4">
            <div class="modal-content"> 
            <!-- Modal body -->
                <div class="modal-body w-100 text-center"> 
                    <div class="row">
                        <div class="col-md-5 my-auto">
                            <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                            <p class="verification" style="    font-size: 22px!important;   text-align: center!important">أهلا بك في موقع العراقي للسفر والسياحة </p>
                            <a href="#"><p class="small-text">استشكف عندنا افضل العروض</p></a>
                            <a href="#" onclick="createaccountmodal1();"class="ac-link">انشاء حساب</a>
                        </div>
                        <div class="col-md-7">
                            <p class="alert text-right" style="color: #253858!important;">الرجاء ادخال البريد الألكتروني</p>
                            <form class="pop-up border-left" id="forgotpasswordform">
                                @csrf
                                <div class="form-control foam">
                                    <label>البريد الألكتروني</label>
                                    <input type="email" name="email" required id="forgotemail"style="width:100%;    padding-right: 30px;">
                                    <i class="fa fa-envelope e-mail"></i>
                                </div>
                                <input type="submit" style="width:225px" value="استعادة كلمة المرور">
                            </form>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <!-- Create Aaccount Modal -->
    <div class="modal fade" id="myModal3">
        <div class="modal-dialog modal-dialog-centered modal-lg3">
        <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header d-block">
            
                    <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                    <p class="verification booking1">أهلا بك في موقع العراقي للسفر والسياحة </p>
                    <a href="#"><p class="small-text">استشكف عندنا افضل العروض</p></a>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                
                    <form class="pop-up text-center"  method="POST" action="{{url('createaccount')}}" id="createaccountform">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-control foam">
                                    <label>الأسم</label>
                                    <input type="text" name="first_name" required>
                                </div>
                                <div class="form-control foam">
                                    <label>اللقب</label>
                                    <input type="text" name="last_name" required>
                                </div>
                                <div class="form-control foam">
                                    <label>اسم الشركة </label>
                                    <input type="text" name="travel_agency_name" required>
                                </div>
                                <div class="form-control foam" required>
                                    <label>المدينة</label>
                                    <select name="city" class="visitorcity" required>
                                    <option></option>
                                    <?php foreach($cities as $city){?>
                                        <option value="{{$city->arabic}}">{{$city->arabic}}</option>
                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-control foam">
                                    <label>المنطقة</label>
                                    <select name="area" class="visitorarea"required>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-control foam">
                                    <label>أرقام الموبايلات</label>
                                    <input type="text" name="mobile_number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control foam">
                                    <label>الإيميل</label>
                                    <input type="email" name="email" required id="companyemail">
                                    <i class="fa fa-envelope e-mail"></i>
                                </div>
                                <div class="form-control foam">
                                    <label>الرمز</label>
                                    <input type="password" name="password" id="myInput" required>
                                    <i class="fa fa-eye password" onclick="myFunction()"></i>
                                    <i class="fa fa-lock e-mail"></i>
                                </div>
                                <p class="text-box" style="text-align:right">يرجى ملاحظة ان هذا القسم خاص فقط بشركات السياحة والسفر </p>
                                <input type="submit" value="التسجيل">
                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="companyemailstatus" value="bad">
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <p class="verification booking1"><a href="#" onclick="loginmodal()">مسجّل عدنه من قبل؟ قم بتسجيل الدخول</a></p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Create Follow Modal -->
    <a data-toggle="modal" data-target="#myModal9" id="followmodal" style="display:none;"></a>
    <div class="modal fade" id="myModal9">
        <div class="modal-dialog modal-dialog-centered">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <div class="modal-content borderradius"> 
                <div class="modal-header d-block"  style="text-align:center!important;">
                    <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                </div>
                <!-- Modal body -->
                <div class="modal-body w-100 text-center">
                    <div class="comany-image">
                        <h3 class="heading-four d-inline-block" id="followcompanyname">Company Name</h3><img src="{{asset('addbyme/images/Capture.png')}}" class="img-fluid d-inline-block">
                    </div>
                    <form class="contact-us" method="POST" action="{{url('followcompany')}}"  >
                        @csrf
                        <input type="hidden" name="company_id" id="followcompanyid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-control">
                                <input type="text" name="fname" placeholder="الأسم ">
                                <i class="fa fa-user e-mail1"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-control">
                                <input type="text" name="lname" placeholder="اللقب">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-control">
                                    <input type="email" name="email" placeholder="الأيميل">
                                    <i class="fa fa-envelope e-mail1"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="verification text-left booking2" style="text-align:right!important;    line-height: 35px;">ستقوم باستلام اي عروض جديدة من قبل <span id="followcompanyname1">Company Name</span></p>
                            </div>
                            <button type="submit" class="ac-link submit">متابعة عروض الشركة</button>
                        </div>
                    </form> 
                </div>    
            </div>
        </div>
    </div>
    <!-- After Create Modal -->
    <a data-toggle="modal" data-target="#myModal7" id="aftercreateaccount" style="display:none;"></a>
    <div class="modal fade" id="myModal7">
        <div class="modal-dialog modal-dialog-centered modal-lg5">
            <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <div class="modal-content"> 
                <div class="modal-header d-block">
                    <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                    <p class="verification verification1">أهلا بك في موقع العراقي للسفر والسياحة </p>
                    <a href="#"><p class="small-text">استشكف عندنا افضل العروض</p></a>
                </div>
                <!-- Modal body -->
                <div class="modal-body w-100 text-center"> 
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset('addbyme/images/confirmed.png')}}" class="img-fluid mb-5">
                            <p class="verification">شكرا لتسجيكم n </p>
                            <p class="verification">سنقوم بالاتصال بكم خلال 24 ساعة</p>
                        </div>
                    </div>
                </div>  
                <!-- Modal footer -->
                <div class="modal-footer conts">
                    <p class="verification"><?php echo '<span>'.$after_company_signup->content.'</span>';?></p>
                </div> 
            </div>
        </div>
    </div>

    
    <?php }?>
</body>
</html>
