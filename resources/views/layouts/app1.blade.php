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
    
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/slick-theme.css')}}">
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
<body style=" font-family: 'IRAQSansWeb_Bold';">
    <section class="bgimages">
        <!--header--->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-5 mar4">
                        <div style="font-size:40px;    text-align: right;">
                            <a href="{{url('/')}}"><span style="color: black;">ID {{$companynow->id}}</span></a>
                        </div>
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('upload/photo/'.$companynow->photo)}}"></a>
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-7 mar4 border-left1">
                        <div class="textlogo">
                            <h3>{{$companynow->travel_agency_name}}</h3>
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
                    <div class="col-md-6">
                        <div class="contactbar">
                            <ul class="addbuttonnew">
                            <li><a href="{{url('/companyoffer')}}" class="bg3" style="<?php if($companynow->bookpackage != 'on'){echo 'display:none';}?>"> عروض الكروبات</a></li>  
                                <li><a href="{{url('/companyofferflight')}}" class="bg3" style="<?php if($companynow->bookflight != 'on'){echo 'display:none';}?>">عروض جارتر</a></li>
                                <li><a href="{{url('/visaoffer')}}" class="bg3" style="<?php if($companynow->bookvisa != 'on'){echo 'display:none';}?>">عروض الفيزا</a></li>        
                                <li><a class="bg2" href="{{url('/logout')}}">الخروج<img src="{{asset('addbyme/images/lon.png')}}"></a></li>
                                <br/>
                                <?php if($companynow->addpackage == 'on'){?>
                                    <li style="margin-left: 10px!important;margin-top: 30px;"><a href="{{url('/bookednew')}}"><span class="bage3">{{$count}}</span>حجوزات الكروبات</a></li>
                                    <li style="margin-left: 10px!important;"><a class="bg1" href="{{url('/addpackagenew')}}" > <i class="fa fa-plus-square"></i>اضافة عروض الكروبات</a></li>
                                <?php }?>
                                <br/>
                                <?php if($companynow->addflight == 'on'){?>
                                    <li style="margin-left: 10px!important;margin-top: 20px;"><a href="{{url('/bookedflightnew')}}"><span class="bage3">{{$count1}}</span>حجوزات الطيران</a></li>
                                    <li style="margin-left: 10px!important;"><a class="bg1" href="{{url('/addflightnew')}}" > <i class="fa fa-plus-square"></i>اضافة عروض الطيران</a></li>
                                <?php }?>
                                <br/>
                                <?php if($companynow->addvisa == 'on'){?>
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
        @yield('content')
    <!--footer-->
    <section class="footer">
        <div class="container">
            <div class="row bor-bottom rowmar">
                <div class="col-md-5">
                    <div class="contactbar topfooet footerfont">
                        <ul style="text-align:right;">
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
                        <ul >
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
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('addbyme/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/my.js')}}"></script>
    <script type="text/javascript" src="{{asset('addbyme/js/slick.js')}}"></script>
    @yield('jscontent')
</body>
</html>
