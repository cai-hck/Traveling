@extends('layouts.app')
@section('csscontent')
 
@endsection
@section('content')
<section class="Latest-Packages bgimages3 paddbottom3 ">
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
                              <li><a href="{{url('/editvisa')}}"    style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                              <li><a href="{{url('/viewbookedvisa')}}" >الفيزا التي قدمتها</a></li>
                              <li><a href="{{url('/viewbookednew')}}"  >حجوزات الكروبات</a></li>
                              <li><a href="{{url('/viewbookedflightnew')}}"  >حجوزات رحلات الطيران</a></li>
                              <li><a href="{{url('/printreport')}}"  class="active1">طباعة تقرير</a></li>
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
                                <h4>طباعة تقرير</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bookingname">
                        <div class="row rowmar">
                          <div class="col-md-12">
                            <div class="passport">
                            <h4>طباعة تقرير<img src="{{asset('addbyme/images/Group.png')}}"></h4>
                          </div>
                          </div>
                        </div>
                        <form action="{{ url('expert_excel') }}" method="POST">
                        @csrf 
                        <div class="row rowmar bor-bottom paddro bor-bottom">
                            <div class="col-md-3">
                                <div class="bookform1">
                                    <label>اسم الشركة</label>
                                    <div class="inputselct bginpt">
                                      <select class="mainheit mainheit3"  name="company_name" required>
                                          <option value="All">الكل</option>
                                        <?php foreach($companies as $companyone){?>
                                          <option value="{{$companyone->id}}">{{$companyone->travel_agency_name}}</option>
                                        <?php }?>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bookform1">
                                    <label>تحديد</label>
                                    <div class="inputselct bginpt">
                                      <select class="mainheit mainheit3"  name="type" required>
                                        <option value="Flight">طيران</option>
                                        <option value="Package">كروبات</option>
                                        <option value="Visa">visa</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bookform1">
                                    <label>جهة الحجز</label>
                                    <div class="inputselct bginpt">
                                      <select class="mainheit mainheit3"  name="use" required>
                                        <option value="Provied">العروض التي وفرتها</option>
                                        <option value="Appointment">العروض التي حجزتها</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bookform1">
                                    <label>نوع الملف</label>
                                    <div class="inputselct bginpt">
                                      <select class="mainheit mainheit3"  name="down_type" required>
                                        <option value="xls">xls</option>
                                        <option value="xlsx">xlsx</option>
                                        <option value="csv">csv</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1">
                                    <label>ID</label>
                                    <input type="number" name="id" placeholder="Optional">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1">
                                    <label>من تاريخ</label>
                                    <input type="date" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bookform1">
                                    <label>الى تاريخ</label>
                                    <input type="date" name="end_date" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div class="bookform1" style="text-align:center">
                                <button style="background-color:green;padding:10px 10px;border-radius: 20px;color:white;">Print <img src="{{asset('addbyme/images/Group.png')}}"></button>
                              </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            <!--end of col-md-8-->
          </div>
      </div>

</section>
@endsection
@section('jscontent')
<script>
   
</script>
@endsection