@extends('layouts.app')
@section('csscontent')
 
@endsection
@section('content')
<section class="Latest-Packages bgimages3 paddbottom3">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pright">
                <div class="box">

                    <div class="row rowmar Destinationpdd">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>حسابك</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar bgcolorbox3 account">
                        <div class="col-md-12">
                            <div class="circle">
                                <img src="{{asset('upload/photo/'.$company->photo)}}">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="Company">
                                <h4>{{$company->travel_agency_name}}  <img src="{{asset('addbyme/images/badge.png')}}"></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12  pright pleft">
                            <div class="editprofile">
                                <ul>
                                    <li><a href="{{url('/profile')}}">تعديل البيانات</a></li>
                                    <li><a href="{{url('/addpackagenew')}}"   class="active1"  style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">إضافة عرض جديد (كروبات)</a></li>
                                    <li><a href="{{url('/editpackagenew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">تعديل العروض الحالية (كروبات)</a></li>
                                    <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li>
                                    <li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                                    <li><a href="{{url('/addflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
                                    <li><a href="{{url('/editflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">تعديل رحلات الطيران ( خاص بالشركات)</a></li>
                                    <li><a href="{{url('/bookedflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">التذاكر التي تم حجزها</a></li>
                                    <li><a href="{{url('/bookedvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                                    <li><a href="{{url('/editvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                                    <li><a href="{{url('/viewbookedvisa')}}"  >الفيزا التي قدمتها</a></li>
                                    <li><a href="{{url('/viewbookednew')}}"  >حجوزات الكروبات</a></li>
                                    <li><a href="{{url('/viewbookedflightnew')}}"  >حجوزات رحلات الطيران</a></li>
                                    <li><a href="{{url('/printreport')}}" >طباعة تقرير</a></li>
                                    <li><a href="{{url('/contact')}}">اتصل بالادارة</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of col-md-4--->

            <!--col-md-8-->
            <div class="col-md-8 pleft">
                <form method="POST" action="{{url('addnewpackagenew')}}"  enctype="multipart/form-data">
                @csrf 
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom bgrow">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>اضافة عرض جديد</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bookingname">
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>تفاصيل العرض</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>الدولة</label>
                                    <div class="bginpt">
                                        <input type="text" name="country" required list="offercountry" id="offercountryinput" class="mainheit mainheit3">
                                        <datalist id="offercountry">
                                            <?php foreach($offercountries as $offercountry){?>
                                                <option value="{{$offercountry->arabic}}">{{$offercountry->arabic}}</option>
                                            <?php }?>
                                        </datalist>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>المدينة </label>
                                    <div class="bginpt">
                                        <input type="text" list="offercity" name="city" required class="mainheit mainheit3">
                                        <datalist id="offercity">
                                        </datalist>
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="Another" style="display:none">اضافة مدينة أخرى</a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>من</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="from" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>الى</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="until"   min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019" required >
                                </div>
                            </div>

                            <div class="col-md-4" style="display:none">
                                <div class="bookform1 bookform2">
                                    <label>Days </label>
                                    <input type="text"  placeholder="8 Days"  >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="bookform1">
                                    <label>عدد نجوم الفندق</label>
                                    <input type="hidden" value="0" name="star" id="numberstar">
                                    <ul class="star1">
                                        <li class="forstar"><input type="hidden" value="1" ><i class="fa fa-star"></i></li>
                                        <li class="forstar"><input type="hidden" value="2" ><i class="fa fa-star"></i></li>
                                        <li class="forstar"><input type="hidden" value="3" ><i class="fa fa-star"></i></li>
                                        <li class="forstar"><input type="hidden" value="4" ><i class="fa fa-star"></i></li>
                                        <li class="forstar"><input type="hidden" value="5" ><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1">
                                    <label>اسم فندق</label>
                                    <textarea class="form-control" rows="2" required name="hotelname"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">

                                <div class="Another3">
                                    <a href="#" class="Another" style="display:none;">Add another hotel</a>
                                </div>

                                <div class="bookform1 mainbooking2">
                                    <label>عنوان العرض ( تفصيل مختصر)</label>
                                    <textarea class="form-control" rows="2" name="subject" placeholder="على سبيل المثال: 10 أيام في تركيا بمنطقة الفاتح" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 inputwidth3">
                                    <label>عدد المقاعد المتوفرة</label>
                                    <input type="text"  placeholder="0" name="seat" required>

                                    <div class="mainicon">
                                        <img src="{{asset('addbyme/images/mainicon.png')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="uplaodphot2">
                                    <div class="avatar-upload">
                                        <div class="row rowmar">
                                            <div class="col-md-4">
                                                <div class="avatar-edit">
                                                    <h3>ارفاق برنامج الرحلة</h3>
                                                    <input type='file' id="docUpload"  name="doc"/>
                                                    <label for="docUpload">Upload photo <img src="{{asset('addbyme/images/uploadicon.png')}}"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="uploadboximages">
                                                    <h3>Actual uploaded Doc a preview</h3>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="mainicontitle">
                                    <h3>الذهاب</h3> <img src="{{asset('addbyme/images/air2.png')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>وقت المغادرة</label>
                                    <div class="clock3">
                                        <input type="time" name="departure_time" id="departure_time" placeholder="10:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bordertrave">
                                    <p>مدة الطيران</p>
                                    <hr class="hrboredr">
                                    <h4 id="duration">not yet</h4>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>وقت الوصول</label>
                                    <div class="clock3">
                                        <input type="time" name="arrival_time" id="arrival_time" placeholder="11:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>المغادرة من مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="departure_airport" placeholder="IST">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bordertrave">

                                    <hr class="hrboredr">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>الوصول الى مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="arrival_airport" placeholder="IST">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>شركة الطيران</label>
                                    <div class="clock3">
                                        <input type="text" name="airline" placeholder="Turkish Airlines">

                                    </div>
                                </div>

                                <div class="Another3">
                                    <a href="#" class="Another" style="display:none;">Add Another Flight</a>
                                </div>

                            </div>

                        </div>

                        <div class="row rowmar martopaire">
                            <div class="col-md-12">
                                <div class="mainicontitle colorchangetitle">
                                    <h3>الرجوع</h3> <img src="{{asset('addbyme/images/air3.png')}}">
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>وقت المغادرة</label>
                                    <div class="clock3">
                                        <input type="time" name="departure_time_1" id="departure_time_1" placeholder="10:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bordertrave">
                                    <p>مدة الطيران</p>
                                    <hr class="hrboredr">
                                    <h4 id="duration_1">not yet</h4>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>وقت الوصول </label>
                                    <div class="clock3">
                                        <input type="time" name="arrival_time_1" id="arrival_time_1" placeholder="11:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>المغادرة من مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="departure_airport_1" placeholder="IST">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bordertrave">

                                    <hr class="hrboredr">

                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bookform1 timeout">
                                    <label>الوصول الى مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="arrival_airport_1" placeholder="IST">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>شركة الطيران</label>
                                    <div class="clock3">
                                        <input type="text" name="airline_1" placeholder="Turkish Airlines">

                                    </div>
                                </div>

                                <div class="Another3">
                                    <a href="#" class="Another" style="display:none;">Add Another Flight</a>
                                </div>

                            </div>

                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>مدة صلاحية العرض</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar paddro">
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>من</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date"   name="offer_from" value="<?php echo date('Y-m-d'); ?>"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" required >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>الى</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date"   name="offer_until" value="<?php echo date('Y-m-d', strtotime("+1 week")); ?>"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" required >
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar paddro">
                            <div class="col-md-12">
                                <div class="form-check maincolorlableinput">
                                    <label class="form-check-label maincolorlable"  for="radio4">
                                        <input type="checkbox" class="form-check-input" name="special" value="special" id="radio4"> <span>هل هو عرض خاص؟</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar paddro">
                            <div class="col-md-12">
                                <div class="dayinline">

                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio3">
                                            <input type="radio" class="form-check-input" id="radio3" name="day" value="one" > <span>5 دولارات لليوم الواحد</span>
                                        </label>
                                    </div>

                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio2">
                                            <input type="radio" class="form-check-input" id="radio2" name="day" value="two" > <span>يومين 8 دولارات</span>
                                        </label>
                                    </div>

                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio1">
                                            <input type="radio" class="form-check-input" id="radio1" name="day" value="three" > <span>3 أيام 12 دولار</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>التكلفة للشخص الواحد</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar paddro">
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>بالغ <span>12+</span></label>
                                    <input type="number"  placeholder="$1100"  name="adult" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>طفل <span>2-11</span></label>
                                    <input type="number"  placeholder="$500"  name="child" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>رضيع <span>العمر اقل من سنتين</span></label>
                                    <input type="number"  placeholder="$200"  name="infant" required>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="bookform1 bookform2">
                                    <label>تحديد </label>
                                <input type="checkbox"     name="singlestatus"  style="height: 30px; margin-top: 18px;" value="on">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>السنكل</label>
                                <input type="number"  placeholder="$1300"  name="single" >
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-2">
                                <div class="bookform1 bookform2">
                                    <label>تحديد</label>
                                <input type="checkbox"    name="childbedstatus"  style="height: 30px; margin-top: 18px;" value="on">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>طفل بسرير</label>
                                <input type="number"  placeholder="$600"  name="childbed" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="bookform1 bookform2">
                                    <label>تحديد </label>
                                <input type="checkbox"     name="roomstatus"  style="height: 30px; margin-top: 18px;" value="on">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>غرفة اضافية</label>
                                <input type="number"  placeholder="$1300"  name="room" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>التسديد</label>
                                    <input type="number" name="wesell" placeholder="$1100">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>البيع <span>للشخص الواحد</span> </label>
                                    <input type="number" name="yousell" placeholder="$1300">
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 mainbooking2">
                                    <label>البرنامج والخدمات</label>
                                    <textarea class="form-control" rows="5" name="more_details" placeholder="تفاصيل الرحلة من برنامج وخدمات" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                <h4>صور من الفندق وبرنامج الرحلة</h4>
                                </div>
                            </div>
                        </div>              
                        <input type="file" id="uploadFile" name="uploadFile[]" multiple accept="image/*"/>
                        <div class="row rowmar">
                            <div class="col-md-12 image_preview">

                            </div>
                        </div>   
                        

                        <div class="row rowmar martop3">
                            <div class="col-md-12">
                                <div class="update">
                                    <button  type="submit" class="addpackcolor">اضافة عرض<img src="{{asset('addbyme/images/iconair.png')}}"></button></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                </form>
            </div>
                                          
        </div>
        <!--end of col-md-8-->
    </div>
    </div>

</section>
@endsection
@section('jscontent')
<script>
    $('#offercountryinput').on('change',function(){
        $.ajax({
            type:'post',
            url:'/getoffercity',
            data: {
                "arabic": $('#offercountryinput').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $("#offercity").empty();
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='" + data[i]['arabic']+"'>" + data[i]['arabic']+"</option>";
                }
                $("#offercity").append(html);
            },
            failure:function(){
            }
        });
    })
    $('.forstar').on('click',function(){
        $('.forstar').removeClass('star');
        var nu  = Number($(this).find('input').val());
        for(var i = 0;i < nu ; i++)
        {
            $('.forstar:eq( '+i+')').addClass('star');
        }
        $('#numberstar').val(nu);
    })
    $("#uploadFile").change(function(){
      $('.image_preview').empty();
      var total_file=document.getElementById("uploadFile").files.length;
      for(var i=0;i<total_file;i++)
      {
        $('.image_preview').append("<img  class='image_preview_img' src='"+URL.createObjectURL(event.target.files[i])+"' >");
      }
    });
    $("#docUpload").change(function(){
        $('#imagePreview').css('background-image', "url({{asset('addbyme/images/uploadimages2.png')}})");
    });
 /*   $('#departure_time').change(function(){
        if($('#departure_time').val() !='' && $('#arrival_time').val() !='')
        {
            var start_time = $('#departure_time').val();
            var end_time = $('#arrival_time').val();
            if(start_time > end_time)
            {
                var diff1 = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            else
            {
                var diff1 = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            $('#duration').text(diff+'h '+diff1+'m');
        }
    })
    $('#arrival_time').change(function(){
        if($('#departure_time').val() !='' && $('#arrival_time').val() !='')
        {
            var start_time = $('#departure_time').val();
            var end_time = $('#arrival_time').val();
            if(start_time > end_time)
            {
                var diff1 = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            else
            {
                var diff1 = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            $('#duration').text(diff+'h '+diff1+'m');
        }
    })
    $('#departure_time_1').change(function(){
        if($('#departure_time_1').val() !='' && $('#arrival_time_1').val() !='')
        {
            var start_time = $('#departure_time_1').val();
            var end_time = $('#arrival_time_1').val();
            if(start_time > end_time)
            {
                var diff1 = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            else
            {
                var diff1 = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            $('#duration_1').text(diff+'h '+diff1+'m');
        }
    })
    $('#arrival_time_1').change(function(){
        if($('#departure_time_1').val() !='' && $('#arrival_time_1').val() !='')
        {
            var start_time = $('#departure_time_1').val();
            var end_time = $('#arrival_time_1').val();
            if(start_time > end_time)
            {
                var diff1 = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-2 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            else
            {
                var diff1 = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60) % 60; 
                var diff = (( new Date("1970-1-1 " + end_time) - new Date("1970-1-1 " + start_time) ) / 1000 / 60 -diff1) / 60; 
            }
            $('#duration_1').text(diff+'h '+diff1+'m');
        }
    })*/
</script>
@endsection