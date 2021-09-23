@extends('layouts.app')
@section('csscontent')
 
@endsection
@section('content')
<div style="background:#F9F9F9;padding-bottom:50px;">
  <?php foreach($changes as $change){?>
  <div class="container" style="width: 100%;text-align: center;font-size: 25px;padding: 20px;    line-height: 90px;background:white;">
    <a href="{{ url('/changeconfirm/'.$change->id)}}"><img src="{{asset('addbyme/images/win.png')}}"></a>
    <span style="color:red;">يرجى الانتباه: تم تغيير ساعة الرحلة ل <span style="background:red;    padding: 10px 10px 0px 10px;border-radius: 10%;color:white;">{{$change->id}}</span><span>ID</span> بتاريخ</span> 
    <span style="background:yellow; padding: 10px 10px 0px 10px;border-radius: 10%;">{{Carbon\Carbon::parse($change->updated_at)->format('d-m-Y')}}</span>  المتوجه الى 
    <span style="background:yellow; padding: 10px 10px 0px 10px;border-radius: 10%;">{{$change->o_country}}</span> من الساعة 
    <span style="background:yellow; padding: 10px 10px 0px 10px;border-radius: 10%;">{{$change->o_departure_time}}</span> الى 
    <span style="background:red; padding: 10px 10px 0px 10px;border-radius: 10%;color:white;">{{$change->o_arrival_time}}</span>
  </div>
  <?php }?>
</div>
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
                      <img src="{{asset('upload/photo/'.$company->photo)}}" id="companyphoto">
                      </div>

                     </div>
                      <div class="col-md-12">
                        <div class="Company">
                       <h4>{{$company->travel_agency_name}}  <img  src="{{asset('addbyme/images/badge.png')}}"></h4>
                       <a style="color:white;" class="Editphoto" id="editcompanyphoto">تحديث شعار الشركة</a>
                      </div>
                     </div>
                   </div>
                   
                   <div class="row rowmar">
                    <div class="col-md-12  pright pleft">
                      <div class="editprofile">
                        <ul>
                          <li><a href="{{url('/profile')}}" class="active1">تعديل البيانات</a></li>
                          <li><a href="{{url('/addpackagenew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">إضافة عرض جديد (كروبات)</a></li>
                          <li><a href="{{url('/editpackagenew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">تعديل العروض الحالية (كروبات)</a></li>
                          <li><a href="{{url('/addcheck')}}" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li><li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
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
              <form  action="{{url('/updatecompanyprofile')}}" method="Post"  enctype="multipart/form-data">
              @csrf
              <div class="box bg-gradient">
               <div class="row rowmar Destinationpdd bor-bottom bgrow">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>تعديل البيانات</h4>
                  </div>
                </div>
               </div>


               <div class="bookingname">

                <div class="row rowmar">
                  <div class="col-md-6">
                    <div class="passport">
                    <h4>معلومات الإدارة</h4>
                  </div>
                  </div>
                  <div class="col-md-6" style="margin-top: 20px;text-align:left;">
                    <h4>مبلغ تسديد العروض الخاصّة&nbsp<span style="background: #FFE380;border-radius: 3px;  padding: 10px; font-size: 25px;">${{$company->balance}}</span></h4>
                  </div>
                </div>

                <div class="row rowmar bor-bottom paddro bor-bottom">
                  <div class="col-md-6">
                    <div class="bookform1">
                      <label>الأسم </label>
                       <input type="text" name="first_name" placeholder="" value="{{$company->first_name}}" required>
                    </div>
                  </div>

                      <div class="col-md-6">
                      <div class="bookform1">
                      <label>اللقب</label>
                       <input type="text" name="last_name" placeholder=""  value="{{$company->last_name}}" required>
                    </div>
                  </div>

                    <div class="col-md-6">
                      <div class="bookform1">
                      <label>الإيميل</label>
                       <input type="text" name="email" placeholder=""  value="{{$company->email}}" required>
                    </div>
                  </div>


                       <div class="col-md-6">
                      <div class="bookform1">
                      <label>رقم الموبايل</label>
                       <input type="text" name="mobile_number" placeholder="Not for public"  value="{{$company->mobile_number}}" required>
                    </div>
                  </div>
                </div>



               <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>معلومات حول الشركة</h4>
                  </div>
                  </div>
                </div>


             <div class="row rowmar bor-bottom paddro bor-bottom">
                  <div class="col-md-6">
                    <div class="bookform1">
                      <label>المدينة</label>
                       <div class="inputselct bginpt">
                    <select class="mainheit mainheit3"  name="city" required id="admincity">
                      <option value="{{$company->city}}">{{$company->city}}</option>
                      <?php foreach($cities as $city){?>
                        <option value="{{$city->arabic}}">{{$city->arabic}}</option>
                      <?php }?>
                    </select>
                     </div>
                    </div>
                  </div>

                      <div class="col-md-6">
                      <div class="bookform1">
                      <label>المنطقة</label>
                     <div class="inputselct bginpt">
                      <select class="mainheit mainheit3" name="area" required id="adminarea">
                          <option value="{{$company->area}}">{{$company->area}}</option>
                          <?php foreach($areas as $area){?>
                            <option value="{{$area->arabic}}">{{$area->arabic}}</option>
                          <?php }?>
                      </select>
                       </div>
                    </div>
                  </div>

                    <div class="col-md-6">
                      <div class="bookform1">
                      <label>رقم هواتف الشركة</label>
                       <input type="text" placeholder="" name="travel_agency_phone_number" value="{{$company->travel_agency_phone_number}}" required>
                    </div>
                  </div>

                     <div class="col-md-12">
                      <div class="bookform1">
                      <label>عنوان الشركة</label>
                       <textarea class="form-control" rows="5"  placeholder="" name="address" required>{{$company->address}}</textarea>
                    </div>
                  </div>

                </div>

                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>الخدمات</h4>
                  </div>
                  </div>
                </div>


                <div class="row rowmar bor-bottom paddro bor-bottom">
                     <div class="col-md-12">
                      <div class="bookform1">
                      <label>يرجى ذكر كل ما تقدمه الشركة من خدمات</label>
                       <textarea class="form-control" rows="8"  placeholder="" name="service" required>{{$company->service}}</textarea>
                    </div>
                  </div>

                </div>

                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>المزيد من البيانات</h4>
                  </div>
                  </div>
                </div>


                <div class="row rowmar bor-bottom paddro bor-bottom">
                     <div class="col-md-12">
                      <div class="bookform1">
                       <textarea class="form-control" rows="8"  placeholder="" name="more_info" required>{{$company->more_info}}</textarea>
                    </div>
                  </div>

                </div>



                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>ساعات العمل</h4>
                  </div>
                  </div>
                </div>
              

                   <div class="row rowmar paddro">
                     <div class="col-md-2">
                      <div class="bookformday">
                        <h3>من</h3>
                      </div>
                    </div>

                    <div class="col-md-3 col-lg-2">
                      <div class="bookformday">
                        <select name="start_time"  class="custom-select mb-3" required style="    font-size: smaller;">
                            <?php if($company->start_time == ''){?>
                                <option value=""></option>
                            <?php }?>
                            <option value="1" <?php if($company->start_time % 12 == 1){ echo 'selected';}?>>1:00</option>
                            <option value="2" <?php if($company->start_time % 12 == 2){ echo 'selected';}?>>2:00</option>
                            <option value="3" <?php if($company->start_time % 12 == 3){ echo 'selected';}?>>3:00</option>
                            <option value="4" <?php if($company->start_time % 12 == 4){ echo 'selected';}?>>4:00</option>
                            <option value="5" <?php if($company->start_time % 12 == 5){ echo 'selected';}?>>5:00</option>
                            <option value="6" <?php if($company->start_time % 12 == 6){ echo 'selected';}?>>6:00</option>
                            <option value="7" <?php if($company->start_time % 12 == 7){ echo 'selected';}?>>7:00</option>
                            <option value="8" <?php if($company->start_time % 12 == 8){ echo 'selected';}?>>8:00</option>
                            <option value="9" <?php if($company->start_time % 12 == 9){ echo 'selected';}?>>9:00</option>
                            <option value="10" <?php if($company->start_time % 12 == 10){ echo 'selected';}?>>10:00</option>
                            <option value="11" <?php if($company->start_time % 12 == 11){ echo 'selected';}?>>11:00</option>
                            <option value="12" <?php if($company->start_time % 12 == 12){ echo 'selected';}?>>12:00</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3 col-lg-2">
                      <div class="bookformday">
                        <select name="start_zone" class="custom-select mb-3" required>
                            <?php if($company->start_time == ''){?>
                                  <option value=""></option>
                            <?php }?>
                            <option value="AM" <?php if($company->start_time < 12 && $company->start_time >= 1){ echo 'selected';}?>>AM</option>
                            <option value="PM" <?php if($company->start_time > 12){ echo 'selected';}?>>PM</option>
                          </select>
                      </div>
                    </div>


                      <div class="col-md-2 col-lg-2">
                      <div class="bookformday">
                      <h3>الى</h3>
                      </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                      <div class="bookformday">
                        <select name="end_time"  class="custom-select mb-3" required  style="    font-size: smaller;">
                            <?php if($company->end_time == ''){?>
                                <option value=""></option>
                            <?php }?>
                            <option value="1" <?php if($company->end_time % 12 == 1){ echo 'selected';}?>>1:00</option>
                            <option value="2" <?php if($company->end_time % 12 == 2){ echo 'selected';}?>>2:00</option>
                            <option value="3" <?php if($company->end_time % 12 == 3){ echo 'selected';}?>>3:00</option>
                            <option value="4" <?php if($company->end_time % 12 == 4){ echo 'selected';}?>>4:00</option>
                            <option value="5" <?php if($company->end_time % 12 == 5){ echo 'selected';}?>>5:00</option>
                            <option value="6" <?php if($company->end_time % 12 == 6){ echo 'selected';}?>>6:00</option>
                            <option value="7" <?php if($company->end_time % 12 == 7){ echo 'selected';}?>>7:00</option>
                            <option value="8" <?php if($company->end_time % 12 == 8){ echo 'selected';}?>>8:00</option>
                            <option value="9" <?php if($company->end_time % 12 == 9){ echo 'selected';}?>>9:00</option>
                            <option value="10" <?php if($company->end_time % 12 == 10){ echo 'selected';}?>>10:00</option>
                            <option value="11" <?php if($company->end_time % 12 == 11){ echo 'selected';}?>>11:00</option>
                            <option value="12" <?php if($company->end_time % 12 == 12){ echo 'selected';}?>>12:00</option>
                        </select>
                      </div>
                    </div>
              
                    <div class="col-md-3 col-lg-2">
                      <div class="bookformday">
                          <select name="end_zone" class="custom-select mb-3" required>
                          <?php if($company->end_time == ''){?>
                                <option value=""></option>
                            <?php }?>
                          <option value="AM" <?php if($company->end_time < 12 && $company->end_time >= 1){ echo 'selected';}?>>AM</option>
                          <option value="PM" <?php if($company->end_time > 12){ echo 'selected';}?>>PM</option>
                        </select>
                      </div>
                    </div>
                
                    </div>



              <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>أيام الدوام</h4>
                  </div>
                  </div>
                </div>
              

                   <div class="row rowmar bor-bottom paddro">
                     <div class="col-md-2">
                      <div class="bookformday">
                        <h3>من</h3>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="bookformday">
                          <select name="start_date" class="custom-select mb-3" required>
                          <?php if($company->start_date == ''){?>
                              <option value=""></option>
                          <?php }?>
                          <option value="الاثنين" <?php if($company->start_date == 'الاثنين'){ echo 'selected';}?>>الاثنين</option>
                          <option value="الثلاثاء" <?php if($company->start_date == 'الثلاثاء'){ echo 'selected';}?>>الثلاثاء</option>
                          <option value="الاربعاء" <?php if($company->start_date == 'الاربعاء'){ echo 'selected';}?>>الاربعاء</option>
                          <option value="الخميس" <?php if($company->start_date == 'الخميس'){ echo 'selected';}?>>الخميس</option>
                          <option value="الجمعة" <?php if($company->start_date == 'الجمعة'){ echo 'selected';}?>>الجمعة</option>
                          <option value="السبت" <?php if($company->start_date == 'السبت'){ echo 'selected';}?>>السبت</option>
                          <option value="الاحد" <?php if($company->start_date == 'الاحد'){ echo 'selected';}?>>الاحد</option>
                        </select>
                      </div>
                    </div>


                      <div class="col-md-2">
                      <div class="bookformday">
                      <h3>الى</h3>
                      </div>
                    </div>

              
                      <div class="col-md-3">
                      <div class="bookformday">
                          <select name="end_date" class="custom-select mb-3" required>
                          <?php if($company->end_date == ''){?>
                              <option value=""></option>
                          <?php }?>
                          
                          <option value="الاثنين" <?php if($company->end_date == 'الاثنين'){ echo 'selected';}?>>الاثنين</option>
                          <option value="الثلاثاء" <?php if($company->end_date == 'الثلاثاء'){ echo 'selected';}?>>الثلاثاء</option>
                          <option value="الاربعاء" <?php if($company->end_date == 'الاربعاء'){ echo 'selected';}?>>الاربعاء</option>
                          <option value="الخميس" <?php if($company->end_date == 'الخميس'){ echo 'selected';}?>>الخميس</option>
                          <option value="الجمعة" <?php if($company->end_date == 'الجمعة'){ echo 'selected';}?>>الجمعة</option>
                          <option value="السبت" <?php if($company->end_date == 'السبت'){ echo 'selected';}?>>السبت</option>
                          <option value="الاحد" <?php if($company->end_date == 'الاحد'){ echo 'selected';}?>>الاحد</option>
                        </select>
                      </div>
                    </div>
                
                    </div>

                <div class="row rowmar">
                  <div class="col-md-12">
                    <div class="passport">
                    <h4>روابط وسائل التواصل الإجتماعي</h4>
                  </div>
                  </div>
                </div>
                 

                 <div class="row rowmar martop3">
                  <div class="col-md-4">
                    <div class="Social">
                      <h3>Facebook Page</h3>
                    </div>
                  </div>

                   <div class="col-md-8">
                    <div class="Social">
                    <a href="#" class="imagesinput"><img src="{{asset('addbyme/images/t-3.png')}}"></a> <input type="text" name="facebook" placeholder="Optional" value="{{$company->facebook}}">
                    </div>
                  </div>
                  </div>


                <div class="row rowmar martop3">
                  <div class="col-md-4">
                    <div class="Social">
                      <h3>Twitter </h3>
                    </div>
                  </div>

                   <div class="col-md-8">
                    <div class="Social">
                     <a href="#" class="imagesinput"><img src="{{asset('addbyme/images/t-1.png')}}"></a> <input type="text" name="twitter" placeholder="Optional"  value="{{$company->twitter}}">
                    </div>
                  </div>
                  </div>


                  <div class="row rowmar martop3">
                  <div class="col-md-4">
                    <div class="Social">
                      <h3>Instagram</h3>
                    </div>
                  </div>

                   <div class="col-md-8">
                    <div class="Social">
                   <a href="#" class="imagesinput"><img src="{{asset('addbyme/images/t-4.png')}}"></a> <input type="text" name="instagram" placeholder="Optional"  value="{{$company->instagram}}">
                    </div>
                  </div>
                  </div>


                 <div class="row rowmar martop3">
                  <div class="col-md-4">
                    <div class="Social">
                      <h3>Youtube</h3>
                    </div>
                  </div>

                   <div class="col-md-8">
                    <div class="Social">
                    <a href="#" class="imagesinput"><img src="{{asset('addbyme/images/t-5.png')}}"></a> <input type="text" name="youtube" placeholder="Optional"  value="{{$company->youtube}}">
                    </div>
                  </div>
                  </div>

                  <div class="row rowmar martop3">
                  <div class="col-md-4">
                    <div class="Social">
                      <h3>Whatsapp</h3>
                    </div>
                  </div>

                   <div class="col-md-8">
                    <div class="Social">
                     <a href="#" class="imagesinput"><img src="{{asset('addbyme/images/whatsapp.svg')}}"></a> <input type="text" name="whatsapp" placeholder="Optional" value="{{$company->whatsapp}}">
                    </div>
                  </div>
                  </div>
                            <input type="hidden" name="travel_agency_name" value="{{$company->travel_agency_name}}">
              <input class="filestyle" type="file" data-input="false" name="image" style="display:none" data-buttonText="Upload Logo" data-size="sm" data-badge="false" accept="image/*"> 
              <div class="row rowmar martop3">
                  <div class="col-md-12">
                    <div class="update">
                    <button type="submit">تحديث </button></p>
                    </div>
                  </div>
                  </div>



                  </div>

                </div>






               </div>
            </form>    
           </div>
           <!--end of col-md-8-->
          </div>
      </div>

</section>
@endsection
@section('jscontent')
<script>
$('#editcompanyphoto').on('click',function(){
    $('.filestyle').click();
})
$('.filestyle').on('change',function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onloadend =function(){
        $('#companyphoto').attr('src',reader.result);    
    }
    reader.readAsDataURL(file);    
});
</script>
@endsection