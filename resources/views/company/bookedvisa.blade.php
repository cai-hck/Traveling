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
                          <li><a href="{{url('/bookedvisa')}}" class="active1" style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>" >حجوزات الفيزا</a></li>
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
              <div class="box bg-gradient">
               <div class="row rowmar Destinationpdd bor-bottom bgrow">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>العروض التي تم حجزها</h4>
                  </div>
                </div>
               </div>


            <div class="bookingname">

               <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport3">
                    <h4>البحث عن طريق الرقم الخاص للحجز </h4>

                      <form class="form-inline" >
                        <div class="input-group">
                          <input type="number" class="form-control" placeholder="" id="filterbyid">
                                <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                          </div>
                        </div> 
                    </form>
                  </div>
                  </div>
                </div>

                </div>

              <div class="row rowmar bor-bottom ">
                <div class="col-md-12">
                  <div class="multipal3 mainwidthulbooking">
                    <ul>
                      <li style="width:7%!important;">رقم الحجز</li>
                      <li style="width:13%!important;">اسم الشركة</li>
                      <li class="adult"  style="width:6%!important;">بالغ</li>
                      <li class="adult"  style="width:6%!important;">فيزا خاصة</li>
                      <li style="width:18%!important;">تاريخ الحجز</li>
                      <li  style="width:44%!important;">تفاصيل وحالة الحجز</li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php  $i=0; foreach($appointments as $appointment){?>
              <div class="row rowmar bor-bottom id{{$appointment->id}} id <?php if($i > 200){echo 'hideid'.intval($i/200);}?>"  style="<?php if($i > 200){echo 'display:none;';}?>">
                <div class="col-md-12">
                  <div class="multipal1">
                    <ul>
                      <li style="width:7%!important;"><input type="text" name="text" placeholder="" readonly value="{{$appointment->id}}"></li>
                      <li style="width:13%!important;"><input type="text" name="text" placeholder="Name" value="{{$appointment->name}}"></li>
                      <li class="widthli1" style="width:6%!important;"><input type="text" name="text" readonly placeholder="0" value="{{$appointment->adult}}"></li>
                      <li class="widthli1" style="width:6%!important;"><input type="text" name="text" readonly placeholder="0" value="{{$appointment->child}}"></li>
                      <li style="width:18%!important;"><input type="text" name="text" placeholder="10/10/1987" value="{{Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y')}}"></li>
                      <li  style="width:44%!important;">
                        <a href="{{ url('/viewbookedvisaone/'.$appointment->id)}}" class="btn btn-edit colorveiw" style="color:white">مشاهدة</a>
                        <?php  if($appointment->current == 'not'){?>
                            <a href="javascript:void(0);" class="btn btn-edit colorveiw" style="color:white;    background-color: brown!important">لم يتم المصادقة عليها</a>
                        <?php }
                        else if($appointment->current == 'on'){?>
                            <a href="javascript:void(0);" class="btn btn-edit colorveiw" style="color:white;    background-color: green!important">تم اصدارها</a>
                            <a href="{{asset('upload/doc/'.$appointment->file)}}" download class="btn btn-edit colorveiw" style="color:white;    background-color: red!important">تحميل</a>
                        <?php }
                        else{?>
                            <a href="javascript:void(0);" class="btn btn-edit colorveiw" style="color:white;    background-color: burlywood!important;">قيد الانجاز</a>
                        <?php }
                        ?>
                        <?php if($appointment->name == 'Turkey'){?>
                          <a href="javascript:void(0);"  class="btn btn-edit colorveiw" style="color:white;    background-color: #F7F7F7!important;"><img src="{{asset('addbyme/images/visa.png')}}"></a>
                        <?php }?>
                        <a href="{{ url('/deletebookedone/'.$appointment->id)}}" onclick="return confirm('Are you sure?')"  class="btn btn-edit colorveiw" style="color:white; background-color: black!important">الغاء</a>
                          </li>
                    </ul>
                  </div>
                </div>
              </div>
            <?php 
              if($i % 200 == 0 && $i != 0){?>
              <div class="col-md-12 loadmorediv <?php echo 'loadmorediv'.$i/200;?>" style="border-bottom: 1px solid #ccc;text-align:center; <?php if($i != 200){echo 'display:none;';}?>">
                <a href="javascript:void(0);" class="btn btn-edit colorveiw loadmore" style="color:black;background-color: yellow!important">تحميل المزيد</a>
                <input type="hidden" value="<?php echo $i/200;?>">
              </div>
              <?php }$i++;}?>


           


                  </div>

                </div>

               </div>
                 
           </div>
           <!--end of col-md-8-->
  

</section>
@endsection
@section('jscontent')
<script>
$('#filterbyid').on('input',function(){
        $('.id').hide();
        $('.id'+$('#filterbyid').val()).show();
        if($('#filterbyid').val() == '')
        {
          $('.loadmorediv').hide();
          $('.loadmorediv1').show();
          $('[class~="hideid"]').hide();
        }
    });
    $('.loadmore').on('click',function(){
      $('.hideid'+$(this).next('input').val()).show();
      $('.loadmorediv'+$(this).next('input').val()).hide();
      $('.loadmorediv'+parseInt(parseInt($(this).next('input').val())+1)).show();
    })
</script>
@endsection