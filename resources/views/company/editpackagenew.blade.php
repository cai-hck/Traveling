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
                            <li><a href="{{url('/editpackagenew')}}"  class="active1" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">تعديل العروض الحالية (كروبات)</a></li>
                            <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li><li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
                            <li><a href="{{url('/addflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">إضافة رحلة طيران (خاص بالشركات)</a></li>
                            <li><a href="{{url('/editflightnew')}}"  style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">تعديل رحلات الطيران ( خاص بالشركات)</a></li>
                            <li><a href="{{url('/bookedflightnew')}}" style="<?php if($company->addflight != 'on'){echo 'display:none';}?>">التذاكر التي تم حجزها</a></li>
                            <li><a href="{{url('/bookedvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                            <li><a href="{{url('/editvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
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
                    <h4>تعديل العروض الحالية</h4>
                  </div>
                </div>
               </div>


            <div class="bookingname">

               <div class="row rowmar">
                  <div class="col-md-6">
                    <div class="passport">
                    <h4>تفاصيل العرض</h4>
                  </div>
                  </div>

                <div class="col-md-6 textright"  style="display:none">
                    <div class="passport">
                          <select class="form-control Sort" id="sel1" name="sellist1">
                          <option>Sort by</option>
                          <option>Sort by2</option>
                          <option>Sort by3</option>
                          <option>Sort by4</option>
                        </select>
                  </div>
                  </div>
                </div>

                </div>

              <div class="row rowmar bor-bottom ">
                <div class="col-md-12">
                  <div class="multipal multpulwidthul">
                    <ul>
                      <li>الرقم الخاص للحجز</li>
                      <li>الدولة</li>
                      <li class="multpulwidthul2">عدد الأيام</li>
                      <li style="width:20%">تاريخ أضافة العرض</li>
                      <li>تاريخ انتهاء العرض</li>
                    </ul>
                  </div>
                </div>
              </div>

            <?php foreach($packages as $package){?>
            <div class="row rowmar bor-bottom ">
                <div class="col-md-12">
                  <div class="multipal1">
                    <ul>
                      <li><input type="text" name="text" placeholder="817462112" value="{{$package->id}}" readonly></li>
                      <li><input type="text" name="text" placeholder="Turkey" value="{{$package->country}}" readonly></li>
                      <li class="widthli1">
                            <?php
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $package->from);
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d',$package->until);
                                $diffInDays = $to->diffInDays($from);
                            ?>   
                            <input type="text" name="text" placeholder="10" value="{{$diffInDays+1}}" readonly>
                        </li>
                      <li  style="width:20%"><input type="text" name="text" placeholder="10/10/1987" value="{{Carbon\Carbon::parse($package->created_at)->format('d-m-Y')}}" readonly></li>
                      <li >
                            <?php
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d',$package->offer_until);
                                $diffInDays = $to->diffInDays($from);
                                if( $to > $from)
                                    $diffInDays = 'X'
                            ?>   
                          <input type="text" name="text" placeholder="10" value="{{$diffInDays}}" readonly>
                      </li>
                      <li class="widthli3">
                          <a href="{{ url('/editpackagenewone/'.$package->id)}}" class="btn btn-edit" style="color:white">تعديل <i class="fa fa-edit"></i></a>  
                          <a onclick="return confirm('Are you sure?')" href="{{ url('/deletepackagenewone/'.$package->id)}}" class="btn btn-edit colorveiw"  style="color:white;    background-color: dimgrey!important;display:none;">حذف</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php }?>


              <div class="row rowmar">
                <div class="col-md-12">
                  <div class="multipal2">
                  <ul class="pagination">
				  <li class="page-item active"><a class="page-link" href="#">1</a></li>
				  <li class="page-item"><a class="page-link" href="#">2</a></li>
				  <li class="page-item"><a class="page-link" href="#">3</a></li>
				</ul>
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