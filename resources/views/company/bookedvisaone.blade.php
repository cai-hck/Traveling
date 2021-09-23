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
                          <li><a href="{{url('/bookedvisa')}}"  class="active1" style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">حجوزات الفيزا</a></li>
                          <li><a href="{{url('/editvisa')}}"  style="<?php if($company->addvisa != 'on'){echo 'display:none';}?>">تعديل الفيزا</a></li>
                          <li><a href="{{url('/viewbookedvisa')}}" >الفيزا التي قدمتها</a></li>
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
                                <p><b>الأسم </b> <span><img src="{{asset('addbyme/images/'.$visa->name.'.png')}}"></span></p>
                            </div>
                            </div>
                        </div>
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
                                <p><b>فيزا خاصة</b> <span><input type="text" name="Email address"value="{{$appointment->child}}" readonly  placeholder="3"  style="color:white"></span></p>
                            </div>
                            </div>
                        </div>

                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="passport">
                                    <h4>شخص</h4>
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
                                <div class="bookform1 borderbx">
                                    <label >الصورة الشخصية</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div >
                                                <?php if($appointment->name == 'Turkey'){?>
                                                    <img src="http://turkishvisa.nalsahel.com/upload/visa/{{$visitor->personalphoto}}" style="width:100%;height:auto;">
                                                <?php }else{?>
                                                    <img src="{{asset('upload/visa/'.$visitor->personalphoto)}}" style="width:100%;height:auto;">
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-12">
                                <div class="bookform1 borderbx">
                                    <label>صورة الجواز (صفحة معلومات الجواز)</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div  >
                                            <?php if($appointment->name == 'Turkey'){?>
                                                <img src="http://turkishvisa.nalsahel.com/upload/passport/{{$visitor->photo}}" style="width:100%;height:auto;">
                                            <?php }else{?>
                                                <img src="{{asset('upload/passport/'.$visitor->photo)}}" style="width:100%;height:auto;">
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($visitor->last_name != 'name'){?>
                            <div class="col-md-12">
                                <div class="bookform1 borderbx">
                                    <label >هوية الأحوال المدنية /  الجنسية</label>
                                    <div class="avatar-upload">
                                        <div class="avatar-preview">
                                            <div>
                                                <img src="{{asset('upload/visa/'.$visitor->last_name)}}" style="width:100%;height:auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <?php }?>



                        <div class="row rowmar martop ">
                            <div class="col-md-6">
                                <div class="row rowmar paddrowbottom">
                                    <div class="col-md-6">
                                        <div class="numbername">
                                            <h3>بالغ ({{$appointment->adult}})</h3>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="number">
                                            <h3><span>$</span>{{$visa->cost}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row rowmar paddrowbottom">
                                    <div class="col-md-6">
                                        <div class="numbername">
                                            <h3>فيزا خاصة ({{$appointment->adult}})</h3>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="number">
                                            <h3><span>$</span>{{$visa->cost_1}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row rowmar mar50 bo5">
                                    <div class="col-md-6 col-6">
                                        <div class="total let">
                                            <h3> المجموع </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 paddcol">
                                        <div class="total">
                                            <?php 
                                                $total = $visa->cost*$appointment->adult + $visa->cost_1*$appointment->child;

                                            ?>
                                            <h3> <span>$</span><?php echo $total;?> </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row rowmar" style="height:30px"></div>
                        <div class="row rowmar ">
                            <div class="col-md-12">
                                <div class="natla2">
                                    <div class="checkmar03 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="radio" class="form-check-input33" name="status" value="on" <?php if($status->current == 'on') {echo 'checked';}?>></label>
                                        <span class="appod01"><i class="fa fa-check-circle"></i> تم اصدارها</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form   action="{{url('/updatevisaon')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$appointment->id}}">
                        <div class="row rowmar rowwidth02">
                            <div class="col-md-12">
                                <div class="uplaodphot2">
                                    <div class="avatar-upload">
                                        <div class="row rowmar">
                                            <div class="col-md-4">
                                                <div class="avatar-edit avatar-edit02">

                                                    <input type="file" id="imageUpload" name="doc">
                                                    <label for="imageUpload"> <img src="{{asset('addbyme/images/uploadicon.png')}}"> تحميل الفيزا</label>

                                                    <div class="avatar-preview">
                                                        
                                                        <div id="imagePreview"  style="background-image: url({{ asset('addbyme/images/pdf01whaite.png')}});" style="background-image: url(images/pdf01whaite.png);">
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
                                <div class="bookform1 mainbooking2">
                                    <textarea class="form-control" rows="5" name="info" placeholder="ملاحظات">{{$status->approve_info}}</textarea>
                                    <div class="button004">
                                        <div class="update updateleft002">
                                            <button class="addpackcolor">تحديث</button>    <button class="sendtypetwo addpackcolor bg0003"><i class="fa fa-envelope"></i> ارسال الى ايميل</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="type" id="senddoc">
                        </form>


                        <div class="row rowmar marroe00099">
                            <div class="col-md-12">
                                <div class="natla2">
                                    <div class="checkmar03 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="radio" class="form-check-input33" name="status" value="pending" <?php if($status->current == 'pending') {echo 'checked';}?>></label>
                                        <span class="appod01 appod02"><i class="fa fa-clock-o"></i> قيد الانجاز</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form   action="{{url('/updatevisaone')}}" method="Post" >
                        @csrf
                        <input type="hidden" name="id" value="{{$appointment->id}}">
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 mainbooking2 mainbooking202">
                                    <textarea class="form-control" rows="5" name="info" placeholder="ملاحظات">{{$status->pending_info}}</textarea>
                                    <div class="button004">
                                        <div class="update updateleft002">
                                            <button class="addpackcolor addpackcolor004 ">تحديث</button>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>


                        <div class="row rowmar marroe00099">
                            <div class="col-md-12">
                                <div class="natla2">
                                    <div class="checkmar03 vistrue">
                                        <label class="form-check-label chrcksingbox">
                                        <input type="radio" class="form-check-input33" name="status"  value="not"  <?php if($status->current == 'not') {echo 'checked';}?>></label>
                                        <span class="appod01 appod03"><i class="fa fa-window-close"></i> </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form   action="{{url('/updatevisaoff')}}" method="Post" >
                        @csrf
                        <input type="hidden" name="id" value="{{$appointment->id}}">
                        <div class="row rowmar">
                            <div class="col-md-12">
                                <div class="bookform1 mainbooking2 mainbooking202">
                                    <textarea class="form-control" rows="5" name="info" placeholder="ملاحظات">{{$status->not_approve_info}}</textarea>
                                    <div class="button004">
                                        <div class="update updateleft004">
                                            <button class="addpackcolor addpackcolor005 ">تحديث</button>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
        <!--end of col-md-8-->
  

</section>
<input type="hidden" id="currentname">
<input type="hidden" id="appoint_id" value="{{$appointment->id}}">
@endsection
@section('jscontent')
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', "url({{asset('addbyme/images/uploadimages2.png')}})");
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        $('.form-check-input33').on('click',function(){
            
            $('#currentname').val($(this).val());
            $.ajax({
                type:'post',
                url:'/clickcurrent',
                data: {
                    "id": $('#appoint_id').val(),
                    "current": $('#currentname').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {
                },
                failure:function(){
                }
            });
        })
        $('.sendtypetwo').on('click',function(){
            $('#senddoc').val('send');
        })
    </script>
@endsection