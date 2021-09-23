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
                            <h4>حسابك </h4>
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
                                    <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li><li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                                    <li><a href="{{url('/addflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
                                    <li><a href="{{url('/editflightnew')}}"  style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">تعديل رحلات الطيران ( خاص بالشركات)</a></li>
                                    <li><a href="{{url('/bookedflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">التذاكر التي تم حجزها</a></li>
                                    <li><a href="{{url('/bookedvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                                    <li><a href="{{url('/editvisa')}}"  class="active1"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                                    <li><a href="{{url('/viewbookedvisa')}}" >الفيزا التي قدمتها</a></li>
                                    <li><a href="{{url('/viewbookednew')}}"  >حجوزات الكروبات</a></li>
                                    <li><a href="{{url('/viewbookedflightnew')}}"  >حجوزات رحلات الطيران</a></li>
                                    <li><a href="{{url('/printreport')}}" >طباعة تقرير</a></li>
                                    <li><a href="{{url('/contact')}}" >اتصل بالادارة</a></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of col-md-4--->

                        <!--col-md-8-->
                <div class="col-md-8 pleft">
                    <div class="box bg-gradient">
                        <div class="row rowmar Destinationpdd bor-bottom bgrow">
                            <div class="col-md-12">
                                <div class="boxtitle">
                                    <h4>اعدادات الفيزا</h4>
                                </div>
                            </div>
                        </div>
                        <div class="bookingname">
                            <div class="row rowmar">
                                <div class="col-md-12">
                                    <div class="passport">
                                        <h4>تحديد فيزا أي دولة تقدمها </h4>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'تركيا' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?>></label>
                                        <span>تركيا</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                        <a href="{{ url('/editvisaone/تركيا')}}"><img src="{{asset('addbyme/images/تركيا.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'ايران' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                            <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> >
                                        </label>
                                        <span>ايران</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/ايران')}}"><img src="{{asset('addbyme/images/ايران.png')}}"></a>
                                    </div>
                                </div>
                            </div>

                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'الامارات' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                    <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>الامارات</span>
                                    </div>
                                
                                </div>

                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/الامارات')}}"><img src="{{asset('addbyme/images/الامارات.png')}}"></a>
                                    </div>
                                </div>
                            </div>

                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'سنغافورة' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>سنغافورة</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/سنغافورة')}}"><img src="{{asset('addbyme/images/سنغافورة.png')}}"></a>
                                    </div>
                                </div>
                            </div>

                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'الأردن' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>الأردن</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/الأردن')}}"><img src="{{asset('addbyme/images/الأردن.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'فيتنام' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>فيتنام</span>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/فيتنام')}}"><img src="{{asset('addbyme/images/فيتنام.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'الهند' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>الهند</span>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/الهند')}}"><img src="{{asset('addbyme/images/الهند.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'السعودية' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>السعودية</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/السعودية')}}"><img src="{{asset('addbyme/images/السعودية.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'قطر' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                    <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>قطر</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/قطر')}}"><img src="{{asset('addbyme/images/قطر.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'اذرببجان' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>اذرببجان</span>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/اذرببجان')}}"><img src="{{asset('addbyme/images/اذرببجان.png')}}"></a>
                                    </div>
                                </div>
                            </div>


                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'مصر' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>مصر</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/مصر')}}"><img src="{{asset('addbyme/images/مصر.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'عمان' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>عمان</span>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/عمان')}}"><img src="{{asset('addbyme/images/عمان.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                                

                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'تايلند' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>تايلند</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/تايلند')}}"><img src="{{asset('addbyme/images/تايلند.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                                
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'كمبوديا' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>كمبوديا</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/كمبوديا')}}"><img src="{{asset('addbyme/images/كمبوديا.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                                
                            <?php $p = 0;foreach($visastatus as $visastatusone){
                                    if($visastatusone->name == 'سريلانكا' && $visastatusone->set == 'on')
                                    {
                                        $p = 1;
                                    }
                                }?>
                            <div class="row rowmar marvishtop" style="padding-bottom:50px;">
                                <div class="col-md-3">
                                    <div class="checkmar02 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="checkbox" class="form-check-input33"  <?php if($p == 1){echo 'checked';}?> ></label>
                                        <span>سريلانكا</span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="natnal">
                                    <a href="{{ url('/editvisaone/سريلانكا')}}"><img src="{{asset('addbyme/images/سريلانكا.png')}}"></a>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        <!--end of col-md-8-->
    </div>
</section>
<input id="countryname" type="hidden">
@endsection
@section('jscontent')
<script>
    $('.form-check-input33').on('click',function(){
        $('#countryname').val($(this).parent('label').next('span').text());
        $.ajax({
            type:'post',
            url:'/checkvisa',
            data: {
                "country": $('#countryname').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  

            },
            failure:function(){
            }
        });
    })
</script>
@endsection