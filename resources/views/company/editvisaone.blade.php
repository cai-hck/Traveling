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
                    <form method="POST" action="{{url('updatevisa')}}"  enctype="multipart/form-data">
                        @csrf
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
                                <div class="row rowmar marvishtop">
                                    <div class="col-md-3">
                                        <div class="checkmar02 vistrue">
                                            <span>{{$visastatus->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="natnal">
                                            <img src="{{asset('addbyme/images/'.$visastatus->name.'.png')}}">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row rowmar">
                                        <div class="col-md-12">
                                            <div class="bookform1 mainbooking2">
                                                <label>معلومات</label>
                                                <textarea class="form-control" rows="3" name="info"  placeholder="Information about your sevrice ">{{$visastatus->info}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row rowmar">
                                        <div class="col-md-4">
                                            <div class="bookform1 bookform2 widthsize02">
                                                <label>عدد الايام لاصدار الفيزا</label>
                                                <input type="number" name="days" placeholder="1"  value="{{$visastatus->days}}"><span class="day002">أيام</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row rowmar">
                                        <div class="col-md-4">
                                            <div class="bookform1 bookform2 widthsize02">
                                                <label>المبلغ </label>
                                                <input type="number" name="cost" placeholder="$1100" value="{{$visastatus->cost}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row rowmar">
                                        <div class="col-md-4">
                                            <div class="bookform1 bookform2 widthsize02">
                                                <input type="checkbox" name="set_1" placeholder="1"  <?php if($visastatus->set_1 == 'on'){echo 'checked';}?> style='height: 20px;' value="on">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row rowmar">
                                        <div class="col-md-4">
                                            <div class="bookform1 bookform2 widthsize02">
                                                <label>عدد الايام لاصدار الفيزا</label>
                                                <input type="number" name="days_1" placeholder="1"  value="{{$visastatus->days_1}}"><span class="day002">أيام</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row rowmar">
                                        <div class="col-md-4">
                                            <div class="bookform1 bookform2 widthsize02">
                                                <label>المبلغ </label>
                                                <input type="number" name="cost_1" placeholder="$1100" value="{{$visastatus->cost_1}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$visastatus->id}}">
            


                                <div class="row rowmar martop3">
                                    <div class="col-md-12">
                                        <div class="update">
                                            <button class="addpackcolor bg0003">تحديث</button>
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
</section>
@endsection
@section('jscontent')
<script>

</script>
@endsection