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
                          <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li>
                          <li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                          <li><a href="{{url('/addflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
                          <li><a href="{{url('/editflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">تعديل رحلات الطيران ( خاص بالشركات)</a></li>
                          <li><a href="{{url('/bookedflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">التذاكر التي تم حجزها</a></li>
                          <li><a href="{{url('/bookedvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                          <li><a href="{{url('/editvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                          <li><a href="{{url('/viewbookedvisa')}}" >الفيزا التي قدمتها</a></li>
                          <li><a href="{{url('/viewbookednew')}}"  >حجوزات الكروبات</a></li>
                          <li><a href="{{url('/viewbookedflightnew')}}"  >حجوزات رحلات الطيران</a></li>
                          <li><a href="{{url('/printreport')}}" >طباعة تقرير</a></li>
                          <li><a href="{{url('/contact')}}" class="active1" >اتصل بالادارة</a></li>
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
               <div class="row rowmar Destinationpdd bor-bottom">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>اتصل بالادارة</h4>
                  </div>
                </div>
               </div>
             
               <div class="row rowmar">
                <div class="col-md-12">
                  <div class="logocentercontact">
                   <img src="{{asset('addbyme/images/logo.png')}}">
                 </div>
                </div>
             </div>
                 

            <div class="bookingname">
               <div class="row rowmar">
                  <div class="col-md-6">
                    <div class="passport">
                    <h4>اتصل بنا</h4>
                  </div>
                  </div>
                </div>

                  <form  action="{{url('/contactadmin')}}" method="Post" >
                  @csrf
                  <div class="row rowmar paddro rowwidthform">
                    <div class="col-md-6">
                        <div class="bookform1">
                            <label>الأسم </label>
                            <div class="iconname">
                                <input type="text" name="first_name" placeholder="الأسم " required>
                                <span><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="bookform1">
                        <div class="iconname">
                          <textarea class="form-control" name="message" rows="5" id="comment" placeholder="رسالتك" required></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="sand">
                        <button class="btn btn-sand" type="submit">SEND <i class="fa fa-paper-plane-o"></i></button>
                      </div>
                    </div>
                  </div>


              </div>

                </div>

               </div>
                 
           </div>
           <!--end of col-md-8-->
  

</section>
@endsection
@section('jscontent')
<script>

</script>
@endsection