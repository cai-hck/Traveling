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
                          <li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>"  class="<?php if($company->travel_agency_name != $appointment->name){echo 'active1';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                          <li><a href="{{url('/addflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
                          <li><a href="{{url('/editflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">تعديل رحلات الطيران ( خاص بالشركات)</a></li>
                          <li><a href="{{url('/bookedflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">التذاكر التي تم حجزها</a></li>
                          <li><a href="{{url('/bookedvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                          <li><a href="{{url('/editvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                          <li><a href="{{url('/viewbookedvisa')}}"  >الفيزا التي قدمتها</a></li>
                          <li><a href="{{url('/viewbookednew')}}"   class="<?php if($company->travel_agency_name == $appointment->name){echo 'active1';}?>" >حجوزات الكروبات</a></li>
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
              <div class="box bg-gradient">
               <div class="row rowmar Destinationpdd bor-bottom bgrow">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>العروض التي تم حجزها</h4>
                  </div>
                </div>
               </div>
             
               <div class="row rowmar">
                <div class="col-md-12">
                  <div class="logocentercontact">
                  <h3>رقم الحجز </h3>
                  <p>#{{$appointment->id}}</p>
                 </div>
                </div>
             </div>
                 

            <div class="bookingname">
               <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>الأسم </b> <span><input type="text" name="text" value="{{$appointment->name}}" readonly placeholder="Haydar Jomaa"  style="color:white"></span></p>
                  </div>
                </div>
               </div>

              <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>رقم الموبايل </b> <span><input type="text" name="Mobile Number" value="{{$appointment->mobile_number}}" readonly placeholder="03276128673"  style="color:white"></span></p>
                  </div>
                </div>
               </div>

              <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>الأيميل </b> <span><input type="text" name="Email address" value="{{$appointment->email}}" readonly  placeholder="example@example.com"  style="color:white"></span></p>
                  </div>
                </div>
               </div>

                <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>تاريخ الحجز </b> <span><input type="text" name="Email address" placeholder="10/10/1987" value="{{Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y')}}"  style="color:white"></span></p>
                  </div>
                </div>
               </div>


                <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>بالغ <small>12+</small> </b> <span><input type="text" name="Email address"value="{{$appointment->adult}}" readonly  placeholder="3"  style="color:white"></span></p>
                  </div>
                </div>
               </div>

                <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>طفل <small>2-11</small> </b> <span><input type="text" name="Email address " value="{{$appointment->child+$appointment->childbed}}" readonly  placeholder="0" style="color:white"></span></p>
                  </div>
                </div>
               </div>

                <div class="row rowmar">
                <div class="col-md-12">
                  <div class="nameform">
                    <p><b>رضيع <small>العمر اقل من سنتين</small> </b> <span><input type="text" name="Email address" value="{{$appointment->infant}}" readonly  placeholder="0"  style="color:white"></span></p>
                  </div>
                </div>
               </div>
               <?php if($package != ''){?>
               <div class="row rowmar" >
                  <div class="col-md-4">
                      <h4>العروض التي تم حجزها</h4>
                  </div>
                  <div class="col-md-8 row" style="background-color:#0053A0;color:white;border-radius: 10px;">
                     <div class="col-md-3" style="padding-top:10px;">
                          <h4>{{$package->country}}</h4>
                      </div>
                      <div class="col-md-9 Country" style="text-align:left;padding-top:10px;">
                          <h5><span>الفندق : </span> <ul>
                            <li class="<?php if($package->star > 0){echo 'star';}?>"><i class="fa fa-star"></i></li>
                            <li class="<?php if($package->star > 1){echo 'star';}?>"><i class="fa fa-star"></i></li>
                            <li class="<?php if($package->star > 2){echo 'star';}?>"><i class="fa fa-star"></i></li>
                            <li class="<?php if($package->star > 3){echo 'star';}?>"><i class="fa fa-star"></i></li>
                            <li class="<?php if($package->star > 4){echo 'star';}?>"><i class="fa fa-star"></i></li>
                        </ul></h5>
                      </div>
                      <div class="col-md-12">
                          <h5>{{$package->subject}}</h5>
                      </div>
                  </div>
                  <div class="col-md-12 row" class="row" style="padding-top:10px;">
                    <div class="col-md-4 ">
                        <h4>العرض ينتهي في</h4>
                    </div>
                    <h4  style="background-color:#0053A0;color:white;border-radius: 10px;padding:10px;">
                        {{$package->offer_until}}
                    </h4>
                  </div>
                </div>
                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>مراجعة وتأكيد صحّة البيانات</h4>
                  </div>
                  </div>
                </div>
                
                <?php foreach($visitors as $visitor){?>
                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="ablitbotton">
                    <a href="#">{{$visitor->type}}</a>
                  </div>
                  </div>
                </div>


                 <div class="row rowmar bor-bottom paddro">
                  <div class="col-md-4">
                    <div class="bookform1">
                      <label>الأسم</label>
                       <input type="text" name="First Name" placeholder="Haydar" readonly value="{{$visitor->first_name}}">
                    </div>
                  </div>

                      <div class="col-md-4">
                      <div class="bookform1">
                      <label>اللقب</label>
                       <input type="text" name="Last Name" placeholder="Jomaa" readonly value="{{$visitor->last_name}}">
                    </div>
                  </div>

                    <div class="col-md-4">
                   <div class="bookform1">
                    <label>تاريخ الولادة</label>
                    <span class="map1"><i class="fa fa-calendar"></i></span><input type="text" name="text" placeholder="10/10/1987"  readonly value="{{$visitor->day_of_birth}}">
                   </div>
                  </div>

                  <div class="col-md-4">
                      <div class="bookform1">
                      <label>رقم الجواز</label>
                       <input type="text" name="Passport No" placeholder="64299398197"  readonly value="{{$visitor->pssport_no}}">
                    </div>
                  </div>


                    <div class="col-md-4">
                      <div class="bookform1">
                      <label>تاريخ اصدار الجواز</label>
                       <span class="map1"><i class="fa fa-calendar"></i></span><input type="text" name="text" placeholder="10/10/1987"  readonly value="{{$visitor->passport_issue_date}}">
                    </div>
                  </div>


                      <div class="col-md-4">
                      <div class="bookform1">
                      <label>تاريخ نفاذ الجواز</label>
                       <span class="map1"><i class="fa fa-calendar"></i></span><input type="text" name="text" placeholder="10/10/1987"  readonly value="{{$visitor->passport_expire_date}}">
                    </div>
                  </div>
               

                     <div class="col-md-12">
                        <div class="bookform1 borderbx">
                            <label for="imageUpload">صورة الجواز (صفحة معلومات الجواز)</label>
                              <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                      
                                  </div>
                                  <div class="avatar-preview">
                                      <div id="imagePreview" >
                                                      <img src="{{asset('upload/passport/'.$visitor->photo)}}" style="width:100%;height:auto;">
                                      </div>
                                  </div>
                              </div>
                        </div>
                   </div>
                    <?php if($visitor->personal == 'off'){?>
                      <div class="col-md-12">
                        <div class="bookform1 borderbx">
                            <label for="imageUpload">الصورة الشخصية لغرض التأشيرة</label>
                              <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                      
                                  </div>
                                  <div class="avatar-preview">
                                      <div id="imagePreview" >
                                                      <img src="{{asset('upload/visa/'.$visitor->personalphoto)}}" style="width:100%;height:auto;">
                                      </div>
                                  </div>
                              </div>
                        </div>
                   </div>
                    <?php }?>
                </div>
                <?php }?>



            <div class="row rowmar martop">
                 <div class="col-md-6">
              <div class="row rowmar">
              <div class="col-md-6">
                <div class="numbername">
                  <h3>بالغ ({{$appointment->adult}})</h3>
                  <span>12+</span>
                </div>
              </div>
               
               <div class="col-md-6">
                <div class="number">
                  <h3><span>$</span><?php if($appointment->single == 'on') {echo $package->single;}else { echo $package->adult;}?></h3>
                </div>
               </div>

            </div>

              <div class="row rowmar martop bor-bottom paddrowbottom">
              <div class="col-md-6">
                <div class="numbername">
                  <h3>طفل ({{$appointment->child}})</h3>
                  <span>2-11</span>
                </div>
              </div>


               
               <div class="col-md-6">
                <div class="number">
                  <h3><span>$</span>{{$package->child}}</h3>
                </div>
               </div>

            </div>
              <?php if($package->childbedstatus == 'on'){?>
                <div class="row rowmar martop bor-bottom paddrowbottom">
                  <div class="col-md-6">
                    <div class="numbername">
                      <h3>الطقل بسرير  ({{$appointment->childbed}})</h3>
                      <span>2-11</span>
                    </div>
                  </div>


                  
                  <div class="col-md-6">
                    <div class="number">
                      <h3><span>$</span>{{$package->childbed}}</h3>
                    </div>
                  </div>

                </div>
              <?php }?>
              <div class="row rowmar martop">
              <div class="col-md-6">
                <div class="numbername">
                  <h3>رضيع ({{$appointment->infant}})</h3>
                  <span>العمر اقل من سنتين</span>
                </div>
              </div>


               
               <div class="col-md-6">
                <div class="number">
                  <h3><span>$</span>{{$package->infant}}</h3>
                </div>
               </div>
             </div>
             <?php if($package->roomstatus == 'on'){?>
                <div class="row rowmar martop bor-bottom paddrowbottom">
                  <div class="col-md-6">
                    <div class="numbername">
                      <h3>غرفة اضافية  ({{$appointment->room}})</h3>
                      <span></span>
                    </div>
                  </div>


                  
                  <div class="col-md-6">
                    <div class="number">
                      <h3><span>$</span>{{$package->room}}</h3>
                    </div>
                  </div>

                </div>
              <?php }?>
             <div class="row rowmar mar50 bo5">
              <div class="col-md-6 col-6">
                <div class="total let">
                  <h3> المجموع </h3>
                </div>
              </div>

                <div class="col-md-6 col-6 paddcol">
                <div class="total">
                  <h3> <span>$</span><?php $total = $package->infant*$appointment->infant+$package->child*$appointment->child+$appointment->adult*$package->adult+$package->childbed*$appointment->childbed+$package->room*$appointment->room; if($appointment->single == 'on') {echo $package->single;}else { echo $total;}?> </h3>
                </div>
              </div>

             </div>

            </div>
            </div>

            <?php }?>
  <div class="row rowmar" style="height:30px"></div>
<!--
  <div class="row rowmar">
 	  <div class="col-md-6 col-6">
      <div class="tab-buttons2 nextrght3">
            <a class="nextrght" href="#"><i class="fa fa-arrow-circle-left"></i> Previous </a>
      </div>
 	  </div>

 	 	<div class="col-md-6 col-6">
      <div class="tab-buttons2 right3">
            <a class="nextrght" href="#">Next  <i class="fa fa-arrow-circle-right"></i></a>
      </div>
 	  </div>
 </div>
                -->

                  

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