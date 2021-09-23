@extends('layouts.app')
@section('csscontent')
 
@endsection
@section('content')
    <div class="mar2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title bookbottom">
                        <h3>قائمة بشركات السياحة والسفر</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Latest-Packages bgimages3">
     <div class="container topsection">
          <div class="row rowmar Companies">
            <div class="col-md-2">
              <div class="inputselct inputselct1">
                <select class="form-control mainheit visitorcity1">
                    <option value="">المدينة</option>
                    <?php foreach($cities as $city){?>
                        <option value="{{$city->id}}">{{$city->arabic}}</option>
                    <?php }?>
                </select>
             </div>
            </div>

             <div class="col-md-2">
              <div class="inputselct inputselct1">
                <select class="form-control mainheit visitorarea1" >
                    <option  value="">المنطقة</option> 
                </select>
             </div>
            </div>


            <div class="col-md-4">
              <div class="buttonloction">
            <a onclick="getlocationbyip()" style="color:white;"class="use_default_location hvr-forward"><span><i class="fa fa-location-arrow"></i> </span>الموقع الحالي <span class="go-btn"><img src="{{asset('addbyme/images/left-s.png')}}" class="img-fluid"> </span> </a>
            </div>
          </div>

              <div class="col-md-3"  style="display:none">
              <div class="inputselct">
            <select class="form-control mainheit" id="sel1" >
              <option>More Filters</option>
              <option>More Filters 1</option>
              <option>More Filters 2</option>
              <option>More Filters 3</option>
            </select>
             </div>
            </div>

	    	</div>



          <div class="row">
           <div class="col-md-4 pright">
              <div class="box">

               <div class="row rowmar Destinationpdd bor-bottom" >
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>قائمة الشركات</h4>
                  </div>
                </div>
               </div>
                <?php $i = 0 ;foreach($companies as $company){?>
                <div class="row rowmar companytitle companycity{{$company->city_id}}  companyarea{{$company->area_id}} companycity companyarea <?php if($i == 0){ echo 'bgcolorbox1 Companies2';$i++;}else{ echo 'bgicolorpadd  bor-bottom';}?>">
                    <input type="hidden" value="details{{$company->id}}">
                    <div class="col-md-12 col-lg-4">
                        <div class="circle">
                            <img src="{{asset('upload/photo/'.$company->photo)}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="Company">
                            <h4>{{$company->travel_agency_name}}  <img src="{{asset('addbyme/images/badge.png')}}"></h4>
                            <a href="javascript:void(0);" class="Follow followbutton">متابعة عروض الشركة</a>
                            <input type="hidden" value="{{$company->travel_agency_name}}">
                            <input type="hidden" value="{{$company->id}}">
                        </div>
                    </div>
                </div>
                <?php }?>
              </div>
           </div>
           <!--end of col-md-4--->

            <!--col-md-8-->
            
            <?php $i = 0;foreach($companies as $company){?>
            <div class="col-md-8 pleft companydetails  <?php if($i == 0){echo 'firstcompany';$i++;}?>"  id="details{{$company->id}}" >
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>التفاصيل</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar paddtop">
                        <div class="col-md-12">
                            <div class="circleimg2">
                                <img src="{{asset('upload/photo/'.$company->photo)}}">
                            </div>
                            <div class="barimages">
                                <img class="bar" src="{{asset('upload/qr/'.$company->qr)}}" style="width: 85px;">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="Company circlecompay">
                                <h4>{{$company->travel_agency_name}}</h4>
                                <a href="javascript:void(0);" class="Follow followbutton">متابعة عروض الشركة</a>
                                <input type="hidden" value="{{$company->travel_agency_name}}">
                                <input type="hidden" value="{{$company->id}}">

                                <ul class="listicon2">
                                    <?php if($company->whatsapp != '') {?>
                                        <li><a href="{{$company->whatsapp}}"><img src="{{asset('addbyme/images/whatsapp.svg')}}"></a></li>
                                    <?php }?>
                                    <?php if($company->instagram != '') {?>
                                    <li><a href="{{$company->instagram}}"><img src="{{asset('addbyme/images/t-4.png')}}"></a></li>
                                    <?php }?>
                                    <?php if($company->facebook != '') {?>
                                    <li><a href="{{$company->facebook}}"><img src="{{asset('addbyme/images/t-3.png')}}"></a></li>
                                    <?php }?>
                                    <?php if($company->twitter != '') {?>
                                    <li><a href="{{$company->twitter}}"><img src="{{asset('addbyme/images/t-1.png')}}"></a></li>
                                    <?php }?>
                                    <?php if($company->youtube != '') {?>
                                    <li><a href="{{$company->youtube}}"><img src="{{asset('addbyme/images/t-5.png')}}"></a></li>    
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bookingname">
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>الخدمات</h4>
                                </div>
                                <div class="services">
                                    <ul>
                                        <li>
                                        <textarea class="textarealist" >{{$company->service}}</textarea>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>المزيد من البيانات</h4>
                                </div>
                                <div class="services">
                                    <ul>
                                        <li>
                                            <textarea class="textarealist">{{$company->more_info}}</textarea>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>العنوان</h4>
                                </div>
                                <div class="services">
                                    <ul>
                                        <li>{{$company->address}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>أرقام الموبايلات</h4>
                                </div>
                                <div class="services">
                                    <ul>
                                        <li>{{$company->travel_agency_phone_number}}</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>ساعات العمل</h4>
                                </div>
                                <div class="services">
                                    <ul>
                                        <li>
                                            {{$company->start_date}} - {{$company->end_date}}   
                                            {{$company->start_time % 12 }}:00<?php if($company->start_time >12){echo 'PM';}else if($company->start_time >0 &&$company->start_time <=12){echo 'AM';}?> 
                                            - {{$company->end_time % 12 }}:00<?php if($company->end_time >12){echo 'PM';}else if($company->end_time >0 &&$company->end_time <=12){echo 'AM';}?> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="checkbtn">
                                <a  href="{{ url('/checkcompanypackage/'.$company->id)}}">اطلع على عروضنه<img src="{{asset('addbyme/images/iconair.png')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="passport">
                                <h4>اتصل ب {{$company->travel_agency_name}} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="bookingform">
                        <form class="contactcompany">
                        <input type="hidden" value="{{$company->id}}">
                        <div class="row rowmar paddro rowwidthform" >
                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>الأسم  </label>
                                    <div class="iconname">
                                        <input type="text" id="first_name_contact_company{{$company->id}}" name="first_name"placeholder="الأسم" required>
                                        <span><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>الأيميل</label>
                                    <div class="iconname">
                                        <input type="email" id="email_contact_company{{$company->id}}" name="email" placeholder="الأيميل" required>
                                        <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="bookform1">
                                    <div class="iconname">
                                        <textarea class="form-control" rows="5" id="message_contact_company{{$company->id}}" name="message"placeholder="رسالتك" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="sand">
                                    <button class="btn btn-sand" >SEND</button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div class="row rowmar paddro rowwidthform aftercontactcompany" style="display:none">
                            <div class="col-md-12">
                                <div class="sucessfully">
                                    <img src="{{asset('addbyme/images/confirmed.png')}}" class="img-fluid">
                                    <h3>تم ارسال رسالتك بنجاح</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar gettext bortop">
                            <div class="col-md-12">
                                <div class="titleget lsiticon">
                                    <h5><span> مشاركة حساب الشركة </span>
                                        <ul>
                                            <li><a href="#"><img src="{{asset('addbyme/images/t-3.png')}}"></a></li>
                                            <li><a href="#"><img src="{{asset('addbyme/images/whatsapp.svg')}}"></a></li>
                                            <li><a href="#"><img src="{{asset('addbyme/images/t-1.png')}}"></a></li>
                                        </ul>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of col-md-8-->
          <?php }?>
      </div>

</section>
<section class="topsection4">
  <!--container--->  
    <div class="container">
        <div class="titleback">
          <h3>وين تحب <span>تستكشف</span></h3>
          <h4>للأشهر الثلاثة القادمة</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
            <ul class="nav nav-pills tabing1" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#month1">
                  <?php 
                  $ar = array("كانون الثاني - يناير", "شباط - فبراير", "آذار - مارس",
                   "نيسان - ابريل", "أيار - مايو","حزيران - يونيو","تموز - يوليو","آب - أغسطس"
                   ,"أيلول - سبتمبر","تشرين الأول - أكتوبر","تشرين الثاني - نوفمبر","كانون الأول - ديسمبر");
                  $monthNum  = date('m'); 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#month2">
                <?php 
                  $monthNum  = date('m')+1; 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#month3">
                <?php 
                  $monthNum  = date('m')+2; 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
            </ul>
            </div>
        </div>
    </div>

        <!-- Tab panes -->
    <div class="tab-content">
        <div id="month1" class="container-fluid tab-pane active">
            <div class="sliderone">
            <?php foreach($package1 as $package1one){?>
            <div class="colwidth">
                <div class="boxliser">
                <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                <div class="rate">
                    <h4>${{$package1one->adult}}</h4>
                </div>
                <div class="textslider">
                    <ul>
                    <li><a class="bga" href="javascript:void(0);">{{$package1one->city}}</a></li>
                    <li><a href="javascript:void(0);">{{$package1one->country}}</a></li>
                    </ul>
                    <p>{{$package1one->subject}}</p>
                </div>
                <div class="conli">
                    <ul>
                    <li><img src="{{asset('upload/photo/'.$package1one->company_photo)}}"></li>
                    <li>{{$package1one->travel_agency_name}}</li>
                    </ul>
                </div>
                </div>
            </div>
            <?php }?>
            </div>
        </div>
        <div id="month2" class="container-fluid tab-pane">
            <div class="sliderone">
                <?php foreach($package2 as $package2one){?>
                <div class="colwidth">
                <div class="boxliser">
                    <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                    <div class="rate">
                    <h4>${{$package2one->adult}}</h4>
                    </div>
                    <div class="textslider">
                    <ul>
                        <li><a class="bga" href="javascript:void(0);">{{$package2one->city}}</a></li>
                        <li><a href="javascript:void(0);">{{$package2one->country}}</a></li>
                    </ul>
                    <p>{{$package2one->subject}}</p>
                    </div>
                    <div class="conli">
                    <ul>
                        <li><img src="{{asset('upload/photo/'.$package2one->company_photo)}}"></li>
                        <li>{{$package2one->travel_agency_name}}</li>
                    </ul>
                    </div>
                </div>
                </div>
                <?php }?>
            </div> 
        </div>
        <div id="month3" class="container-fluid tab-pane">
            <div class="sliderone">
                <?php foreach($package3 as $package3one){?>
                <div class="colwidth">
                <div class="boxliser">
                    <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                    <div class="rate">
                    <h4>${{$package3one->adult}}</h4>
                    </div>
                    <div class="textslider">
                    <ul>
                        <li><a class="bga" href="javascript:void(0);">{{$package3one->city}}</a></li>
                        <li><a href="javascript:void(0);">{{$package3one->country}}</a></li>
                    </ul>
                    <p>{{$package3one->subject}}</p>
                    </div>
                    <div class="conli">
                    <ul>
                        <li><img src="{{asset('upload/photo/'.$package3one->company_photo)}}"></li>
                        <li>{{$package3one->travel_agency_name}}</li>
                    </ul>
                    </div>
                </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
  <!--end of container--->  
</section>
<input type="hidden" id="selectedcompany" >
@endsection
@section('jscontent')
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

<script type="text/javascript">
	// add an attribute dir="ltr" to the slider's container
//$('.slider').attr('dir', 'ltr');

// OR add `rtl: false` property to slider settings

$('.sliderone').slick({
  autoplay: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  rtl: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
         speed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

});

</script>
<script>
    
    autosize(document.getElementsByClassName("textarealist"));
$('.companydetails').hide();
$('.firstcompany').show();
    $('.companytitle').on('click',function(){
        $('.companydetails').hide();
        $('#'+$(this).find('input').val()).show();
        $('.bgcolorbox1').addClass('beforecompanytitle');
        $('.beforecompanytitle').removeClass('bgcolorbox1');
        $('.beforecompanytitle').removeClass('Companies2');
        $('.beforecompanytitle').addClass('bgicolorpadd');
        $('.beforecompanytitle').addClass('bor-bottom');
        $('.companytitle').removeClass('beforecompanytitle');
        $(this).addClass('bgcolorbox1');
        $(this).addClass('Companies2');
        $(this).removeClass('bgicolorpadd');
        $(this).removeClass('bor-bottom');
    }) 
    $('.contactcompany').submit(function() {
        $('#selectedcompany').val($(this).find('input').val());
        $.ajax({
            type:'post',
            url:'/contactcompany',
            data: {
                "first_name": $('#first_name_contact_company'+$('#selectedcompany').val()).val(),
                "user_email": $('#email_contact_company'+$('#selectedcompany').val()).val(),
                "message": $('#message_contact_company'+$('#selectedcompany').val()).val(),
                "company_id": $('#selectedcompany').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {       
                console.log(data);           
            },
            failure:function(){
            }
        });
        $(this).hide();
        $('.aftercontactcompany').show();
        return false;
    })
    $('.visitorcity1').on('change',function(){

        $.ajax({
            type:'post',
            url:'/getvisitorarea1',
            data: {
                "id": $('.visitorcity1').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $(".visitorarea1").empty();
                html +="<option value=''>المنطقة</option>";
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='" + data[i]['id']+"'>" + data[i]['arabic']+"</option>";
                }
                $(".visitorarea1").append(html);
                $('.companytitle').hide();
                $('.companydetails').hide();
                $('.companycity'+$(".visitorcity1").val()+'.companyarea'+$(".visitorarea1").val()+'.companytitle').show();
                for(var i=0;;i++)
                {
                    if($('.companytitle:eq( '+i+')').css("display")!='none')
                    {
                        $('.companytitle:eq( '+i+')').trigger('click');
                        break;
                    }    
                }
            },
            failure:function(){
            }
        });
    })
    $('.visitorarea1').on('change',function(){
        $('.companytitle').hide();
        $('.companydetails').hide();
        $('.companycity'+$(".visitorcity1").val()+'.companyarea'+$(".visitorarea1").val()+'.companytitle').show();
        for(var i=0;;i++)
        {
            if($('.companytitle:eq( '+i+')').css("display")!='none')
            {
                $('.companytitle:eq( '+i+')').trigger('click');
                break;
            }    
        }
    })
    function getlocationbyip()
    {
        $.ajax({
            type:'post',
            url:'/getlocationbyip',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {
                if(data != 'yet' )
                {
                    $('.visitorcity1').val(data).trigger('change'); 
                    $.ajax({
                        type:'post',
                        url:'/getareabyip', 
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                        },
                        success:function(data) {
                            if(data != 'yet' )
                            {
                                $('.visitorarea1').val(data).trigger('change'); 
                            }             
                        },
                        failure:function(){
                        }
                    });
                }                  
            },
            failure:function(){
            }
        });
    }
</script>
@endsection
