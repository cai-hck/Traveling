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
                                    <li><a href="{{url('/addpackagenew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">إضافة عرض جديد (كروبات)</a></li>
                                    <li><a href="{{url('/editpackagenew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">تعديل العروض الحالية (كروبات)</a></li>
                                    <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li>
                                    <li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                                    <li><a href="{{url('/addflightnew')}}" class="active1" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
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
            <form method="POST" action="{{url('addnewflightnew')}}">  
                @csrf 
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom bgrow">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>أضف رحلة جديدة</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bookingname">
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>تفاصيل الرحلة</h4>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row rowmar mainicontitletop01">
                            <div class="col-md-12">
                                <div class="mainicontitle">
                                    <h3>الذهاب</h3> <img src="{{asset('addbyme/images/air2.png')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>الدولة</label>
                                    <div class="bginpt">
                                        <input type="text" name="o_air_country" required list="offercountry" id="offercountryinput" class="mainheit mainheit3" required>
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
                                        <input type="text" list="offercity" name="o_air_city" required class="mainheit mainheit3" required>
                                        <datalist id="offercity">
                                        </datalist>
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="Another" style="display:none">اضافة مدينة أخرى</a>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-5">
                                <div class="bookform1 timeout">
                                    <label>المغادرة من مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="o_country" placeholder="Istanbul Airport">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="bookform1 timeout">
                                    <label>الوصول الى مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="o_city" placeholder="Istanbul Airport">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                            </div>

                        </div>

                        <div class="row rowmar">

                            <div class="col-md-5">
                                <div class="bookform1 bookform2">
                                    <label>تاريخ المغادرة</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="o_departure" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019"  required>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="bookform1 bookform2">
                                    <label>تاريخ الوصول</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="o_arrival" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                            </div>
                        </div>
                        
                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>وقت المغادرة</label>
                                    <div class="clock3">
                                        <input type="time" name="o_departure_time" placeholder="10:00" required>
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>ساعة الوصول</label>
                                    <div class="clock3">
                                        <input type="time" name="o_arrival_time" placeholder="11:00" required>
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="bookform1 placechageco">
                                    <label>الخطوط الجويّة</label>
                                    <div class="clock3">
                                        <input type="text" name="o_airline" placeholder="Turkish Airlines" required>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 mainbooking2">
                                    <label>رقم الرحلة</label>
                                    <textarea class="form-control" rows="2" name="o_more" placeholder="رفم رحلة الطيران" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar mainicontitletop01 colorchangetitle">
                            <div class="col-md-12">
                                <div class="mainicontitle">
                                    <div class="checkmar02">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input" name="inbound" checked value="on" id="checkinbound"></label>
                                    </div>
                                    <h3 class="marright01">الرجوع</h3> <img src="{{asset('addbyme/images/air3.png')}}">
                                </div>
                            </div>
                        </div>
                        <div id="inbounddiv">
                        <div class="row rowmar">
                            <div class="col-md-6">
                                <div class="bookform1">
                                    <label>الدولة</label>
                                    <div class="bginpt">
                                        <input type="text" name="i_air_country"  list="offercountry1" id="offercountryinput1" class="mainheit mainheit3">
                                        <datalist id="offercountry1">
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
                                        <input type="text" list="offercity1" name="i_air_city"  class="mainheit mainheit3">
                                        <datalist id="offercity1">
                                        </datalist>
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="Another" style="display:none">اضافة مدينة أخرى</a>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-5">
                                <div class="bookform1 timeout">
                                    <label>المغادرة من مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="i_country" placeholder="Istanbul Airport">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="bookform1 timeout">
                                    <label>الوصول الى مطار</label>
                                    <div class="clock3">
                                        <input type="text" name="i_city" placeholder="Istanbul Airport">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                            </div>

                        </div>

                        <div class="row rowmar">

                            <div class="col-md-5">
                                <div class="bookform1 bookform2">
                                    <label>تاريخ المغادرة</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="i_departure" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="bookform1 bookform2">
                                    <label>تاريخ الوصول</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="i_arrival" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019">
                                </div>
                            </div>

                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>وقت المغادرة</label>
                                    <div class="clock3">
                                        <input type="time" name="i_departure_time" placeholder="10:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 timeout">
                                    <label>ساعة الوصول</label>
                                    <div class="clock3">
                                        <input type="time" name="i_arrival_time" placeholder="11:00">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="bookform1 placechageco">
                                    <label>الخطوط الجويّة</label>
                                    <div class="clock3">
                                        <input type="text" name="i_airline" placeholder="Turkish Airlines">

                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 mainbooking2">
                                    <label>رقم الرحلة</label>
                                    <textarea class="form-control" rows="2" name="i_more" placeholder="رفم رحلة الطيران"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport validitysize">
                                    <h4>التكلفة للشخص الواحد</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>بالغ <span>12+</span></label>
                                    <input type="number" name="o_adult" placeholder="$1100" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>طفل <span>2-11</span></label>
                                    <input type="number" name="o_child" placeholder="$500" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>رضيع <span>العمر اقل من سنتين</span></label>
                                    <input type="number" name="o_infant" placeholder="$200" required>
                                </div>
                            </div>
                            <div class="col-md-4" style="display:none">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>غرفة اضافية<span></span></label>
                                    <div class="checkmar02">
                                    <label class="form-check-label chrcksingbox">
                                    <input type="checkbox" class="form-check-input" name="o_infant_b_status"  value="on"></label>
                                    </div>
                                    <input class="marright01" type="number" name="o_infant_b" placeholder="$600">
                                </div>
                            </div>
                            <div class="col-md-4"  style="display:none">
                            </div>
                            <div class="col-md-4"  style="display:none">
                            </div>
                            <div class="col-md-5">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>درجة رجال الأعمال <span>12+</span></label>
                                    <div class="checkmar02">
                                    <label class="form-check-label chrcksingbox">
                                    <input type="checkbox" class="form-check-input" name="o_adult_b_status" value="on"></label>
                                    </div>

                                    <input class="marright01" type="number" name="o_adult_b" placeholder="$1300">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="bookform1 bookform2 widthsize02">
                                    <label>درجة رجال الأعمال للأطفال <span>2-11</span></label>
                                    <div class="checkmar02">
                                    <label class="form-check-label chrcksingbox">
                                    <input type="checkbox" class="form-check-input" name="o_child_b_status"  value="on"></label>
                                    </div>
                                    <input class="marright01" type="number" name="o_child_b" placeholder="$600">
                                </div>
                            </div>
                            
                            </div>

                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport validitysize">
                                    <h4>مدة صلاحية العرض</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row rowmar paddro">
                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>من </label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="o_from"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="bookform1 bookform2">
                                    <label>الى</label>
                                    <span class="map1"><i class="fa fa-calendar"></i></span>
                                    <input type="date" name="o_until" value="<?php echo date('Y-m-d', strtotime("+1 week")); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+1 year")); ?>" placeholder="08/01/2019" required>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar">
                            <div class="col-md-4">
                                <div class="passport validitysize">
                                    <h4>التسديد</h4>
                                </div>
                                <div class="bookform1 bookform2 widthsize02 mar002">
                                    <input type="number" name="wesell" placeholder="$1500" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="passport validitysize">
                                    <h4>البيع</h4>
                                </div>

                                <div class="bookform1 bookform2 widthsize02  mar002">
                                    <input type="number" name="yousell" placeholder="$1700" required>  للشخص الواحد
                                </div>
                            </div>

                        </div>
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 inputwidth3">
                                    <label>عدد المقاعد المتوفرة</label>
                                    <input type="number" value="0" min="0" placeholder="0" name="seat" required>

                                    <div class="mainicon">
                                        <img src="{{asset('addbyme/images/mainicon.png')}}">
                                    </div>
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
                        <div class="row rowmar martop3">
                            <div class="col-md-12">
                                <div class="update">
                                    <button class="addpackcolor">اضافة عرض <img src="{{asset('addbyme/images/iconair.png')}}"></button></p>
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
    $('#checkinbound').on('click',function(){
        if($('#checkinbound').is(':checked'))
        {
            $('#inbounddiv').show();
        }
        else
        {
            $('#inbounddiv').hide();
        }
    })
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
    $('#offercountryinput1').on('change',function(){
        $.ajax({
            type:'post',
            url:'/getoffercity',
            data: {
                "arabic": $('#offercountryinput1').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $("#offercity1").empty();
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='" + data[i]['arabic']+"'>" + data[i]['arabic']+"</option>";
                }
                $("#offercity1").append(html);
            },
            failure:function(){
            }
        });
    })
</script>
@endsection