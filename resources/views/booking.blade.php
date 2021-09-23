@extends('layouts.app')
@section('csscontent')
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/chosen.css')}}">
@endsection
@section('content')

    <div class="mar2">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="title bookbottom">
            <h3>احجز الان</h3>
            </div>
            </div>
        </div>
        </div>
    </div>

</section>

<section class="Latest-Packages bgimages3">
    <div class="container topsection">
          <div class="row bgcolor4 rowmar boxsmall">
            <div class="col-md-12">
            <div class="time">
              <h3>العرض ينتهي في</h3>
                <p><i class="fa fa-clock-o"></i><span class="resttime">
                            <?php
                            /*  $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s'));
                              $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  date('Y-m-d H:i:s',strtotime($package->offer_until)));
                              $diffInSeconds = $to->diffInSeconds($from);
                              $diffInDays = $to->diffInDays($from);
                              $diffInSeconds -= 60*60*24*$diffInDays;
                              echo $diffInDays.'ايام '.gmdate('H:i:s', $diffInSeconds);*/
                              ?></span><input type="hidden" value="{{$package->offer_until}}"></p>


              </div>
            </div>
	    	</div>



          <div class="row martop-20">
           <div class="col-md-4 pright">
              <div class="box">

               <div class="row rowmar Destinationpdd">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>العرض الذي اخترته</h4>
                  </div>
                </div>
               </div>
               
               <div class="row bgcolorbox1 rowmar">
                <div class="col-md-12">
                  <div class="Country">
                  <h4>{{$package->country}}</h4>
                  <p>{{$package->subject}}</p>
                   <h5><span>الفندق : </span> <ul>
                     <li class="<?php if($package->star > 0){echo 'star';}?>"><i class="fa fa-star"></i></li>
                      <li class="<?php if($package->star > 1){echo 'star';}?>"><i class="fa fa-star"></i></li>
                      <li class="<?php if($package->star > 2){echo 'star';}?>"><i class="fa fa-star"></i></li>
                      <li class="<?php if($package->star > 3){echo 'star';}?>"><i class="fa fa-star"></i></li>
                      <li class="<?php if($package->star > 4){echo 'star';}?>"><i class="fa fa-star"></i></li>
                  </ul></h5>
                </div>
              </div>
               </div>
                
                <div class="row rowmar padd20">
                  <div class="col-md-12  col-lg-6">
                    <div class="booking">
                     <h4>من</h4>
                      <img src="{{asset('addbyme/images/Vector.png')}}">
                       <div class="searchbox">
                       <span class="map"><i class="fa fa-calendar"></i></span>
                        <input type="text" placeholder="28/06/2019" value="{{$package->from}}" readonly>
                        </div>

                    </div>
                  </div>

                    <div class="col-md-12  col-lg-6">
                      <div class="booking">
                     <h4>الى</h4>
                      <img src="{{asset('addbyme/images/Vector1.png')}}">
                        <div class="searchbox">
                       <span class="map"><i class="fa fa-calendar"></i></span>
                       <input type="text"  placeholder="28/06/2019" value="{{$package->until}}" readonly></div>
                    </div>
                    <div>
                    </div>
                  </div>
                </div>


                <div class="row rowmar get">
                    <div class="col-md-12">
                      <div class="titleget">
                        <h4>على ماذا ستحصل؟</h4>
                      </div>
                    </div>
                  </div>

                  <div class="row rowmar gettext">
                    <div class="col-md-12">
                      <div class="titleget">
                       <ul>
                            <textarea class="textareabook" readonly >{{$package->more_details}}</textarea>
                       </ul>
                      </div>
                    </div>
                  </div>

                  <div class="row rowmar get">
                    <div class="col-md-12">
                      <div class="titleget">
                        <h4>الخدمات ووجبات الطعام:</h4>
                      </div>
                    </div>
                  </div>


                  <div class="row rowmar gettext">
                    <div class="col-md-12">
                      <div class="titleget">
                       <ul>
                            <textarea class="textareabook" readonly>{{$package->service}}</textarea>
                       </ul>
                      </div>
                    </div>
                  </div>

                  <div class="row rowmar get">
                    <div class="col-md-12">
                      <div class="titleget">
                        <h4>أمور لازم تعرفها قبل متسافر</h4>
                      </div>
                    </div>
                  </div>


                  <div class="row rowmar gettext bor-bottom">
                    <div class="col-md-12">
                      <div class="titleget">
                     
                       <ul>
                            <textarea class="textareabook" readonly>{{$package->term_condition}}</textarea>
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
                                <h4>البدأ بحجز العرض المقدم من شركة {{$package->travel_agency_name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="bookingname">
                        <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="passport">
                            <h4>املئ الحقول التالية بالضبط مثل مموجودة في جواز السفر</h4>
                        </div>
                        </div>
                        </div>
                    </div>
                    <form id="sendallform"  action="{{url('/sendall')}}" method="Post" enctype="multipart/form-data">
                        <div id="adulttable">
                            <?php for($i =0;$i<$appointment->adult;$i++){?>
                            <div class="oneadult onetraveler">
                                <div class="bookingname">
                                    <div class="row rowmar">
                                        <div class="col-md-12">
                                            <div class="ablitbotton">
                                                <a href=javascript:void(0);>بالغ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bookingform">
                                    <div class="row rowmar bor-bottom paddro">
                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>الأسم </label>
                                                <input type="text" name="first_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>اللقب</label>
                                                <input type="text" name="last_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ الولادة</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="day_of_birth" placeholder=""  required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>رقم الجواز</label>
                                                <input type="text" name="pssport_no" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ اصدار الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_issue_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ نفاذ الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_expire_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>الجواز</h5>
                                                <div id="drop--area">
                                                    <input type="file" data-input="false" class="passportphoto" name="photo" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpassport"> تحميل الصورة </label>                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>صورة الجواز (صفحة معلومات الجواز)</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/Passport.png')}}"  class="passportphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-12">
                                            <h5>هل لديك تأشيرة نافذة؟<input type="checkbox" name="personal"  class="personalcheck" value="off" style="width:20px;height:20px"></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo personalphotodiv">
                                                <h5>الصورة الشخصية لغرض التأشيرة</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/falsephoto.png')}}"  class="personalphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <input type="file" data-input="false" class="personalphoto" name="personalphoto" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpersonal"> تحميل الصورة </label> 
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="ablitbotton textright2">
                                                <a class="deladult" style="color:white">حذف <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div id="childbedtable">
                            <?php for($i =0;$i<$appointment->childbed;$i++){?>
                            <div class="onechildbed onetraveler">
                                <div class="bookingname">
                                    <div class="row rowmar">
                                        <div class="col-md-12">
                                            <div class="ablitbotton">
                                                <a href=javascript:void(0);>الطفل بسرير</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bookingform">
                                    <div class="row rowmar bor-bottom paddro">
                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>الأسم </label>
                                                <input type="text" name="first_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>اللقب</label>
                                                <input type="text" name="last_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ الولادة</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="day_of_birth" placeholder=""  required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>رقم الجواز</label>
                                                <input type="text" name="pssport_no" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ اصدار الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_issue_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ نفاذ الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_expire_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>الجواز</h5>
                                                <div id="drop--area">
                                                    <input type="file" data-input="false" class="passportphoto" name="photo" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpassport"> تحميل الصورة </label>                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>صورة الجواز (صفحة معلومات الجواز)</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/Passport.png')}}"  class="passportphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-12">
                                            <h5>هل لديك تأشيرة نافذة؟<input type="checkbox" name="personal" class="personalcheck" value="off" style="width:20px;height:20px"></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo personalphotodiv">
                                                <h5>الصورة الشخصية لغرض التأشيرة</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/falsephoto.png')}}"  class="personalphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <input type="file" data-input="false" class="personalphoto" name="personalphoto" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpersonal"> تحميل الصورة </label> 
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="ablitbotton textright2">
                                                <a class="delchildbed" style="color:white">حذف <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>   
                        </div>
                        <div id="childtable">
                            <?php for($i =0;$i<$appointment->child;$i++){?>
                            <div class="onechild onetraveler">
                                <div class="bookingname">
                                    <div class="row rowmar">
                                        <div class="col-md-12">
                                            <div class="ablitbotton">
                                                <a href=javascript:void(0);>طفل</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bookingform">
                                    <div class="row rowmar bor-bottom paddro">
                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>الأسم </label>
                                                <input type="text" name="first_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>اللقب</label>
                                                <input type="text" name="last_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ الولادة</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="day_of_birth" placeholder=""  required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>رقم الجواز</label>
                                                <input type="text" name="pssport_no" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ اصدار الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_issue_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ نفاذ الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_expire_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>الجواز</h5>
                                                <div id="drop--area">
                                                    <input type="file" data-input="false" class="passportphoto" name="photo" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpassport"> تحميل الصورة </label>                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>صورة الجواز (صفحة معلومات الجواز)</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/Passport.png')}}"  class="passportphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-12">
                                            <h5>هل لديك تأشيرة نافذة؟<input type="checkbox" name="personal" class="personalcheck" value="off" style="width:20px;height:20px"></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo personalphotodiv">
                                                <h5>الصورة الشخصية لغرض التأشيرة</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/falsephoto.png')}}"  class="personalphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <input type="file" data-input="false" class="personalphoto" name="personalphoto" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpersonal"> تحميل الصورة </label> 
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="ablitbotton textright2">
                                                <a class="delchild" style="color:white">حذف <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>   
                        </div>
                        <div id="infanttable">
                            <?php for($i =0;$i<$appointment->infant;$i++){?>
                            <div class="oneinfant onetraveler">
                                <div class="bookingname">
                                    <div class="row rowmar">
                                        <div class="col-md-12">
                                            <div class="ablitbotton">
                                                <a href=javascript:void(0);>رضيع</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bookingform">
                                    <div class="row rowmar bor-bottom paddro">
                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>الأسم </label>
                                                <input type="text" name="first_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>اللقب</label>
                                                <input type="text" name="last_name" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ الولادة</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="day_of_birth" placeholder=""  required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>رقم الجواز</label>
                                                <input type="text" name="pssport_no" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ اصدار الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_issue_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="bookform1">
                                                <label>تاريخ نفاذ الجواز</label>
                                                <span class="map1"><i class="fa fa-calendar"></i></span><input type="date" name="passport_expire_date" placeholder="" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>الجواز</h5>
                                                <div id="drop--area">
                                                    <input type="file" data-input="false" class="passportphoto" name="photo" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpassport"> تحميل الصورة </label>                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo">
                                                <h5>صورة الجواز (صفحة معلومات الجواز)</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/Passport.png')}}"  class="passportphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-12">
                                            <h5>هل لديك تأشيرة نافذة؟<input type="checkbox" name="personal"class="personalcheck" value="off" style="width:20px;height:20px"></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="Passportuplo personalphotodiv">
                                                <h5>الصورة الشخصية لغرض التأشيرة</h5>
                                                <div id="drop--area" >
                                                    <img src="{{asset('addbyme/images/falsephoto.png')}}"  class="personalphoto_preview" style="height:auto;width:50%;display: initial;">                              
                                                    <input type="file" data-input="false" class="personalphoto" name="personalphoto" style="display:none" data-buttonText="Upload photo" data-size="sm" data-badge="false" accept="image/*"> 
                                                    <label class="button uploadpersonal"> تحميل الصورة </label> 
                                                    <div id="gallery"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="ablitbotton textright2">
                                                <a class="delinfant" style="color:white">حذف <i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>  
                        </div>
                        <button type="submit" id="sendallformsubmit" style="display:none;"></button>
                    </form>
                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="ablitbotton">
                                <?php if($appointment->single == 'on'){?>
                                    <a href="javascript:void(0);" style="color:white">اضافة مسافر آخر<i class="fa fa-user-plus"></i> </a>
                                <?php }else {?>
                                    <a data-toggle="modal" data-target="#myModal11" style="color:white">اضافة مسافر آخر<i class="fa fa-user-plus"></i> </a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="boxcolorhow">
                        
                        <form  action="{{ url('/addappointmentall') }}" method="POST" id="addappointmentall">
                        <div class="row rowmar martop boxfontchail">

                            @csrf
                            <div class="col-md-6">
                                <div class="row rowmar bor-bottom">
                                    <div class="col-md-4">
                                        <div class="numbername">
                                            <h3>بالغ</h3>
                                            <span>12+</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 pright pleft ">
                                        <div class="borbox2">
                                            <span class="input-number-decrement rightnumber2 ">–</span><input class="input-number1 bornone input-number " type="text" name="adultnumber" value="{{$appointment->adult}}" min="0" max="15" id="adultnumber"><span class="input-number-increment rightnumber1">+</span>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-4">
                                        <div class="number">
                                            <h3><span>$</span><span id="adultmoney" style="color:#393939"><?php if($appointment->single == 'on'){echo $package->single;}else{echo $package->adult;}?></span></h3>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="single" value="{{$appointment->single}}">
                                <input type="hidden" id="childbedstatus" value="{{$package->childbedstatus}}">
                                <?php if($appointment->single != 'on'){?>
                                <?php if($package->childbedstatus == 'on'){?>
                                    <div class="row rowmar martop bor-bottom paddrowbottom">
                                        <div class="col-md-4">
                                            <div class="numbername">
                                                <h3>الطفل بسرير</h3>
                                                <span>2-11</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pright pleft ">
                                            <div class="borbox2">
                                                <span class="input-number-decrement rightnumber2 ">–</span><input class="input-number2 bornone input-number " type="text" value="{{$appointment->childbed}}" min="0" max="15" id="childbednumber" name="childbednumber"><span class="input-number-increment rightnumber1">+</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="number">
                                                <h3><span>$</span><span id="childbedmoney" style="color:#393939">{{$package->childbed}}</span></h3>
                                            </div>
                                        </div>

                                    </div>
                                <?php }else{?>
                                    <input  type="hidden" value="0"  id="childbednumber" name="childbednumber">
                                <?php }?>
                                <div class="row rowmar martop bor-bottom paddrowbottom">
                                    <div class="col-md-4">
                                        <div class="numbername">
                                            <h3>طفل</h3>
                                            <span>2-11</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pright pleft ">
                                        <div class="borbox2">
                                            <span class="input-number-decrement rightnumber2 ">–</span><input class="input-number2 bornone input-number " type="text" value="{{$appointment->child}}" min="0" max="15" id="childnumber" name="childnumber"><span class="input-number-increment rightnumber1">+</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="number">
                                            <h3><span>$</span><span id="childmoney" style="color:#393939">{{$package->child}}</span></h3>
                                        </div>
                                    </div>

                                </div>

                                <div class="row rowmar martop">
                                    <div class="col-md-4">
                                        <div class="numbername">
                                            <h3>رضيع</h3>
                                            <span>العمر اقل من سنتين</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 pright pleft ">
                                        <div class="borbox2">
                                            <span class="input-number-decrement rightnumber2 ">–</span><input class="input-number3 bornone input-number " type="text" value="{{$appointment->infant}}" min="0" max="15" id="infantnumber" name="infantnumber"><span class="input-number-increment rightnumber1">+</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="number">
                                            <h3><span>$</span><span id="infantmoney" style="color:#393939">{{$package->infant}}</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php } else {?>
                                    <input  type="hidden" value="0"  id="childbednumber" name="childbednumber">
                                    <input  type="hidden" value="0"  id="childnumber" name="childnumber">
                                    <input  type="hidden" value="0"  id="infantnumber" name="infantnumber">
                                <?php }?>
                                <input type="text" name="name" placeholder="الأسم " style="display:none" value="{{$appointment->name}}" required>
                                <input type="text" name="last_name" placeholder="اللقب"  style="display:none" value="{{$appointment->last_name}}" required>
                                <input type="text" name="mobile_number" placeholder="Mobile No" id="clientphone_number" style="display:none" value="{{$appointment->mobile_number}}" required>
                                <input type="text" name="email" placeholder="Email address"  style="display:none" value="{{$appointment->email}}" required>
                                <input type="text" name="package_id" placeholder="ID"  style="display:none" value="{{$appointment->package_id}}" required>
                                <input type="text" name="company_id" placeholder="ID"  style="display:none" value="{{$package->company_id}}" required>
                           
                            </div>
                            <div class="col-md-6">
                                <div class="row rowmar">
                                    <div class="col-md-12">
                                        <div class="confirm2">
                                            <a href="javascript:void(0);"><input type="checkbox"  id="checkall" name ="confirm" style="    width: 20px; height: 20px;" required> أوؤكد ان جميع البيانات صحيحة</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row rowmar ">
                                    <div class="col-md-6">
                                        <div class="total let">
                                            <h3> المجموع </h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 paddcol">
                                        <div class="total">
                                            <h3> <span>$</span><span id="totalmoney" style="color:#393939;font-size:44px;"><?php $total = $package->infant*$appointment->infant+$package->child*$appointment->child+$appointment->adult*$package->adult+$package->childbed*$appointment->childbed; if($appointment->single == 'on'){echo $package->single;}else{ echo $total;}?></span> </h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <input id="testall" name="test" type="hidden" value="{{rand(10000,99999)}}">
                                <a  class="booknowbuttondiv" href="javascript:void(0);"> 
                                <div class="row rowmar Destinationpdd bgcolorbox2">
                                    <div class="col-md-12">
                                        <div class="boxtitle" style="text-align:center">
                                            <h4>احجز الان</h4>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                <input type="submit" style="display:none">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
           <!--end of col-md-8-->
       </div>
</section>

<section class="topsection4">
  <!--container--->  
    <div class="container">
        <div class="titleback">
          <h3>وين تحب <span>تستكشف</span></h3>
          <h4>للأشهر الثلاثة القادمة</h4>
        </div>
    

        <div class="row">
          <div class="col-md-12">
          <ul class="nav nav-pills tabing1" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#month1">
                  <?php 
                  $ar = array("كانون الثاني - يناير", "شباط - فبراير", "آذار - مارس",
                   "نيسان - ابريل", "أيار - مايو","حزيران - يونيو","تموز - يوليو","آب - أغسطس"
                   ,"أيلول - سبتمبر","تشرين الأول - أكتوبر","تشرين الثاني - نوفمبر","كانون الأول - ديسمبر");
                  $monthNum  = date('m'); 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#month2">
                <?php 
                  $monthNum  = date('m')+1; 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#month3">
                <?php 
                  $monthNum  = date('m')+2; 
                  $monthNum =  $monthNum % 12;
                  ?>
                  {{$ar[$monthNum]}}
                </a>
              </li>
            </ul>
          </div>
        </div>
     </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="month1" class="container-fluid tab-pane active">
            <div class="sliderone">
            <?php foreach($package1 as $package1one){?>
            <div class="colwidth">
                <div class="boxliser">
                <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                <div class="rate">
                    <h4>${{$package1one->adult}}</h4>
                </div>
                <div class="textslider">
                    <ul>
                    <li><a class="bga" href="javascript:void(0);">{{$package1one->city}}</a></li>
                    <li><a href="javascript:void(0);">{{$package1one->country}}</a></li>
                    </ul>
                    <p>{{$package1one->subject}}</p>
                </div>
                <div class="conli">
                    <ul>
                    <li><img src="{{asset('upload/photo/'.$package1one->company_photo)}}"></li>
                    <li>{{$package1one->travel_agency_name}}</li>
                    </ul>
                </div>
                </div>
            </div>
            <?php }?>
            </div>
        </div>
        <div id="month2" class="container-fluid tab-pane">
            <div class="sliderone">
                <?php foreach($package2 as $package2one){?>
                <div class="colwidth">
                <div class="boxliser">
                    <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                    <div class="rate">
                    <h4>${{$package2one->adult}}</h4>
                    </div>
                    <div class="textslider">
                    <ul>
                        <li><a class="bga" href="javascript:void(0);">{{$package2one->city}}</a></li>
                        <li><a href="javascript:void(0);">{{$package2one->country}}</a></li>
                    </ul>
                    <p>{{$package2one->subject}}</p>
                    </div>
                    <div class="conli">
                    <ul>
                        <li><img src="{{asset('upload/photo/'.$package2one->company_photo)}}"></li>
                        <li>{{$package2one->travel_agency_name}}</li>
                    </ul>
                    </div>
                </div>
                </div>
                <?php }?>
            </div> 
        </div>
        <div id="month3" class="container-fluid tab-pane">
            <div class="sliderone">
                <?php foreach($package3 as $package3one){?>
                <div class="colwidth">
                <div class="boxliser">
                    <img src="{{asset('addbyme/images/slider'.rand(1,3).'.png')}}">
                    <div class="rate">
                    <h4>${{$package3one->adult}}</h4>
                    </div>
                    <div class="textslider">
                    <ul>
                        <li><a class="bga" href="javascript:void(0);">{{$package3one->city}}</a></li>
                        <li><a href="javascript:void(0);">{{$package3one->country}}</a></li>
                    </ul>
                    <p>{{$package3one->subject}}</p>
                    </div>
                    <div class="conli">
                    <ul>
                        <li><img src="{{asset('upload/photo/'.$package3one->company_photo)}}"></li>
                        <li>{{$package3one->travel_agency_name}}</li>
                    </ul>
                    </div>
                </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
  <!--end of container--->  
</section>
<div class="modal fade" id="myModal11">
    <div class="modal-dialog modal-dialog-centered">
        <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <div class="modal-content"> 
            <div class="modal-header d-block" >
                <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                <p class="small-text" style="text-align:center!important;">Select New Traveler Type</p>
            </div>
            <!-- Modal body -->
            <div class="modal-body w-100 text-center"> 
                <div class="row">
                    <?php if($package->childbedstatus != 'on'){?>
                        <div class="col-md-4">
                            <input type="radio" name="newtraveler" id="newadult"  style="    width: 50px; height: 50px;">
                            <p >بالغ</p>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="newtraveler" id="newchild"    style="    width: 50px; height: 50px;">
                            <p >طفل</p>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" name="newtraveler" id="newinfant"    style="    width: 50px; height: 50px;">
                            <p >رضيع</p>
                        </div>
                    <?php }else {?>
                        <div class="col-md-3">
                            <input type="radio" name="newtraveler" id="newadult"  style="    width: 50px; height: 50px;">
                            <p >بالغ</p>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="newtraveler" id="newchild"    style="    width: 50px; height: 50px;">
                            <p >طفل</p>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="newtraveler" id="newinfant"    style="    width: 50px; height: 50px;">
                            <p >رضيع</p>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="newtraveler" id="newchildbed"    style="    width: 50px; height: 50px;">
                            <p >الطفل بسرير</p>
                        </div>
                    <?php }?>
                </div>
            </div>  
            <!-- Modal footer -->
            <div class="modal-footer conts">
                <button id="addnewtraveler"style="    width: 200px;    height: 50px;    background: whitesmoke;    border-radius: 20%;    font-size: x-large;">ADD</button>
            </div> 
        </div>
    </div>
</div>
<a id="smsverifymodal" data-toggle="modal" data-target="#myModal1"></a>

 <!-- The Modal -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg1">
     <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <p class="verification" style="display:none">قمنا بإرسال رسالة SMS يحتوى على رمز الى رقم موبايلك</p>
            <form class="pop-up text-center" id="verifycodeform">
            <label>ادخل الرمز المرسل</label>
                <input type="number" name="numb" id="inputverifycode" required style="text-align:center">
                <p id="resendverifycode">اعادة ارسال الرمز </p>
                <input type="submit" value="تأكيد">
            </form>
        </div>
        <!-- Modal footer -->
      </div>
    </div>
</div>

<a id="bookinggoodmodal" data-toggle="modal" data-target="#myModal2"></a>
 <!-- The Modal -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg2">
<!--    <button type="button" class="close" data-dismiss="modal">&times;</button> -->
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <img src="{{asset('addbyme/images/confirmed.png')}}" class="img-fluid">
            <p class="verification booking1">تم تأكيد الحجز</p>
            <p class="verification booking4">رقم تأكيد الحجز هو  <span class="numb" id="bookingrefid">#{{$package->id}}</span></p>
            <p class="verification text-left"  style="line-height: inherit;">لإجراء عملية الدفع يرجى زيارة مقر الشركة ({{$package->travel_agency_name}}) قبل انتهاء مدة العرض في  {{$package->offer_until}}</p> 
        </div>
        
        <!-- Modal body -->
        <div class="modal-body confirmed w-100">
        
        <h5>عنوان الشركة</h5>
        <p style="font-size:24px">{{$package->address}}</p>
        <h5>رقم الهاتف</h5>
        <p style="font-size:24px">{{$package->travel_agency_phone_number}}</p>
        <h5>ساعات العمل</h5>
        <p style="font-size:24px"> {{$package->start_date}} - {{$package->end_date}}   
            {{$package->start_time % 12 }}:00<?php if($package->start_time >12){echo 'PM';}else if($package->start_time >0 &&$package->start_time <=12){echo 'AM';}?> 
            - {{$package->end_time % 12 }}:00<?php if($package->end_time >12){echo 'PM';}else if($package->end_time >0 &&$package->end_time <=12){echo 'AM';}?> </p>
        
        </div>
        
        <!-- Modal footer -->
    <div class="modal-footer d-block">
        <p class="verification" style="line-height: inherit;">تم ارسال تفاصيل الحجز الى بريدك الالكتروني {{$appointment->email}}</p>
        <ul class="modal-footer-list text-center">
            <li><span>شارك</span></li>
            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        </ul>
    </div>
    </div>
    </div>
</div>
<input id="verifycode" value="no" style="display:none">
<input id="alldone" type="hidden" value="no">
<div id="preloader" style="display:none">
<div id="status">&nbsp;</div>
</div>
@endsection
@section('jscontent')
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

<!--end of js-->





<script type="text/javascript">
	// add an attribute dir="ltr" to the slider's container
//$('.slider').attr('dir', 'ltr');

// OR add `rtl: false` property to slider settings

$('.sliderone').slick({
  autoplay: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  dots: true,
  infinite: true,
  cssEase: 'linear',
  rtl: true,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
         speed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

});
autosize(document.getElementsByClassName("textareabook"));
$('#adultnumber').on('change',function(){
   var total = 0;
   total +=  Number($('#adultmoney').text()) * Number($('#adultnumber').val());
   total +=  Number($('#childmoney').text()) * Number($('#childnumber').val());
   if($('#childbedstatus').val() == 'on')
        total +=  Number($('#childbedmoney').text()) * Number($('#childbednumber').val());
   total +=  Number($('#infantmoney').text()) * Number($('#infantnumber').val());
   $('#totalmoney').text(total);
});
$('#childnumber').on('change',function(){
   var total = 0;
   total +=  Number($('#adultmoney').text()) * Number($('#adultnumber').val());
   total +=  Number($('#childmoney').text()) * Number($('#childnumber').val());
   
   if($('#childbedstatus').val() == 'on')
        total +=  Number($('#childbedmoney').text()) * Number($('#childbednumber').val());
   total +=  Number($('#infantmoney').text()) * Number($('#infantnumber').val());
   $('#totalmoney').text(total);
});
$('#childbednumber').on('change',function(){
   var total = 0;
   total +=  Number($('#adultmoney').text()) * Number($('#adultnumber').val());
   total +=  Number($('#childmoney').text()) * Number($('#childnumber').val());
   
   if($('#childbedstatus').val() == 'on')
        total +=  Number($('#childbedmoney').text()) * Number($('#childbednumber').val());
   total +=  Number($('#infantmoney').text()) * Number($('#infantnumber').val());
   $('#totalmoney').text(total);
});
$('#infantnumber').on('change',function(){
   var total = 0;
   total +=  Number($('#adultmoney').text()) * Number($('#adultnumber').val());
   total +=  Number($('#childmoney').text()) * Number($('#childnumber').val());
   if($('#childbedstatus').val() == 'on')
        total +=  Number($('#childbedmoney').text()) * Number($('#childbednumber').val());
   total +=  Number($('#infantmoney').text()) * Number($('#infantnumber').val());
   $('#totalmoney').text(total);
});
$('#addnewtraveler').on('click',function(){
    $('#myModal11').modal('toggle');
    var html = '';
    if($('#newadult').is(':checked'))
        html +="<div class='oneadult onetraveler'>";
    if($('#newchild').is(':checked'))
        html +="<div class='onechild onetraveler'>";
    if($('#newinfant').is(':checked'))
        html +="<div class='oneinfant onetraveler'>";
    if($('#newchildbed').is(':checked'))
        html +="<div class='onechildbed onetraveler'>";
    html +="<div class='bookingname'>";
    html +="                    <div class='row rowmar'>";
    html +="                    <div class='col-md-12'>";
    html +="                        <div class='ablitbotton'>";
    if($('#newadult').is(':checked'))
        html +="                        <a href='#'>بالغ</a>";
    if($('#newchild').is(':checked'))
        html +="                        <a href='#'>طفل</a>";
    if($('#newinfant').is(':checked'))
        html +="                        <a href='#'>رضيع</a>";
    if($('#newchildbed').is(':checked'))
        html +="                        <a href='#'>الطفل بسرير</a>";
    html +="                    </div>";
    html +="                    </div>";
    html +="                    </div>";
    html +="                </div>";
    html +="                <div class='bookingform'>";

    html +="                    <div class='row rowmar bor-bottom paddro'>";
    html +="                    <div class='col-md-4'>";
    html +="                        <div class='bookform1'>";
    html +="                        <label>الأسم </label>";
    html +="                        <input type='text' name='first_name' placeholder='' required>";
    html +="                        </div>";
    html +="                    </div>";

    html +="                        <div class='col-md-4'>";
    html +="                       <div class='bookform1'>";
    html +="                        <label>اللقب</label>";
    html +="                       <input type='text' name='last_name' placeholder='' required>";
    html +="                        </div>";
    html +="                    </div>";

    html +="                       <div class='col-md-4'>";
    html +="                   <div class='bookform1'>";
    html +="                        <label>تاريخ الولادة</label>";
    html +="                        <span class='map1'><i class='fa fa-calendar'></i></span><input type='date' name='day_of_birth' placeholder='' required>";
    html +="                    </div>";
    html +="                    </div>";

    html +="                   <div class='col-md-4'>";
    html +="                        <div class='bookform1'>";
    html +="                        <label>رقم الجواز</label>";
    html +="                        <input type='text' name='pssport_no' placeholder='' required>";
    html +="                        </div>";
    html +="                     </div>";
    html +="                       <div class='col-md-4'>";
    html +="                       <div class='bookform1'>";
    html +="                        <label>تاريخ اصدار الجواز</label>";
    html +="                        <span class='map1'><i class='fa fa-calendar'></i></span><input type='date' name='passport_issue_date' placeholder='' required>";
    html +="                        </div>";
    html +="                    </div>";


    html +="                        <div class='col-md-4'>";
    html +="                        <div class='bookform1'>";
    html +="                        <label>تاريخ نفاذ الجواز</label>";
    html +="                        <span class='map1'><i class='fa fa-calendar'></i></span><input type='date' name='passport_expire_date' placeholder='' required>";
    html +="                        </div>";
    html +="                    </div>";


    html +="                                 <div class='col-md-4'>";
    html +="                                         <div class='Passportuplo'>";
    html +="                                             <h5>الجواز</h5>";
    html +="                                             <div id='drop--area'>";
    html +="                                                 <input type='file' data-input='false' class='passportphoto' name='photo' style='display:none' data-buttonText='Upload photo' data-size='sm' data-badge='false' accept='image/*'> ";
    html +="                                                 <label class='button uploadpassport'> تحميل الصورة </label> ";                             
    html +="                                                 <div id='gallery'></div>";
    html +="                                             </div>";
    html +="                                         </div>";
    html +="                                    </div>";
    html +="                                    <div class='col-md-4'>";
    html +="                                         <div class='Passportuplo'>";
    html +="                                             <h5>صورة الجواز (صفحة معلومات الجواز)</h5>";
    html +="                                            <div id='drop--area' >";
    html +="                                                <img src='{{asset('addbyme/images/Passport.png')}}'  class='passportphoto_preview' style='height:auto;width:50%;display: initial;'> ";                             
    html +="                                                <div id='gallery'></div>";
    html +="                                             </div>";
    html +="                                         </div>";
    html +="                                     </div>";
    html +="                                    <div class='col-md-4'>";
    html +="                                    </div>";
    html +="                                    <div class='col-md-12'>";
    html +="                                        <h5>هل لديك تأشيرة نافذة؟<input type='checkbox' name='personal' value='off' class='personalcheck' style='width:20px;height:20px'></h5>";
    html +="                                    </div>";
    html +="                                   <div class='col-md-4'>";
    html +="                                        <div class='Passportuplo personalphotodiv'>";
    html +="                                            <h5>الصورة الشخصية لغرض التأشيرة</h5>";
    html +="                                            <div id='drop--area' >";
    html +="                                                <img src='{{asset('addbyme/images/falsephoto.png')}}'  class='personalphoto_preview' style='height:auto;width:50%;display: initial;'>";                              
    html +="                                                <input type='file' data-input='false' class='personalphoto' name='personalphoto' style='display:none' data-buttonText='Upload photo' data-size='sm' data-badge='false' accept='image/*'> ";
    html +="                                                <label class='button uploadpersonal'> تحميل الصورة </label> ";
    html +="                                                <div id='gallery'></div>";
    html +="                                            </div>";
    html +="                                        </div>";
    html +="                                    </div>";
    html +="                                    <div class='col-md-4'>";
    html +="                                    </div>";


    html +="                        <div class='col-md-4'>";
    html +="                            <div class='ablitbotton textright2'>";
    if($('#newadult').is(':checked'))
        html +="                                <a class='deladult' style='color:white'>حذف <i class='fa fa-trash'></i></a>";
    if($('#newchild').is(':checked'))
        html +="                                <a class='delchild' style='color:white'>حذف <i class='fa fa-trash'></i></a>";
    if($('#newchildbed').is(':checked'))
        html +="                                <a class='delchildbed' style='color:white'>حذف <i class='fa fa-trash'></i></a>";
    if($('#newinfant').is(':checked'))
        html +="                                <a class='delinfant' style='color:white'>حذف <i class='fa fa-trash'></i></a>";

 
    html +="                            </div>";
    html +="                        </div>";
    html +="                    </div>";
    html +="                </div>";
    html +="     </div>";
    if($('#newadult').is(':checked'))
    {
        $('#adulttable').append(html);
        var adultnu = Number($('#adultnumber').val());
        adultnu++;
        if(adultnu >15)
            alert('Number Adult limit is 15!');
        else
             $('#adultnumber').val(adultnu).trigger('change');
    }
    if($('#newchild').is(':checked'))
    {
        $('#childtable').append(html);
        var childnu = Number($('#childnumber').val());
        childnu++;
        if(childnu >15)
            alert('Number Child limit is 15!');
        else
             $('#childnumber').val(childnu).trigger('change');
    }
    if($('#newchildbed').is(':checked'))
    {
        $('#childbedtable').append(html);
        var childbnu = Number($('#childbednumber').val());
        childbnu++;
        if(childbnu >15)
            alert('Number Child with bed limit is 15!');
        else
             $('#childbednumber').val(childbnu).trigger('change');
    }
    if($('#newinfant').is(':checked'))
    {
        $('#infanttable').append(html);
        var infantnu = Number($('#infantnumber').val());
        infantnu++;
        if(infantnu >15)
            alert('Number Infant limit is 15!');
        else
             $('#infantnumber').val(infantnu).trigger('change');
    }
})
$('#sendallform').on('click','.deladult',function(){
    if((Number($('#adultnumber').val()) + Number($('#childnumber').val()) + Number($('#childbednumber').val()) + Number($('#infantnumber').val()))== 1)
    {
        alert("Must have more than one traveler!");
    }
    else
    {
        $(this).parents('.oneadult').first().empty().removeClass('oneadult');
        var adultnu = Number($('#adultnumber').val());
        adultnu--;
        $('#adultnumber').val(adultnu).trigger('change');
    }
})
$('#sendallform').on('click','.delchild',function(){
    if((Number($('#adultnumber').val()) + Number($('#childnumber').val()) + Number($('#childbednumber').val()) + Number($('#infantnumber').val()))== 1)
    {
        alert("Must have more than one traveler!");
    }
    else
    {
        $(this).parents('.onechild').first().empty().removeClass('onechild');
        var adultnu = Number($('#childnumber').val());
        adultnu--;
        $('#childnumber').val(adultnu).trigger('change');
    }
})
$('#sendallform').on('click','.delchildbed',function(){
    if((Number($('#adultnumber').val()) + Number($('#childnumber').val()) + Number($('#childbednumber').val()) + Number($('#infantnumber').val()))== 1)
    {
        alert("Must have more than one traveler!");
    }
    else
    {
        $(this).parents('.onechildbed').first().empty().removeClass('onechildbed');
        var adultnu = Number($('#childbednumber').val());
        adultnu--;
        $('#childbednumber').val(adultnu).trigger('change');
    }
})
$('#sendallform').on('click','.delinfant',function(){
    if((Number($('#adultnumber').val()) + Number($('#childnumber').val()) + Number($('#childbednumber').val()) + Number($('#infantnumber').val()))== 1)
    {
        alert("Must have more than one traveler!");
    }
    else
    {
        $(this).parents('.oneinfant').first().empty().removeClass('oneinfant');
        var adultnu = Number($('#infantnumber').val());
        adultnu--;
        $('#infantnumber').val(adultnu).trigger('change');
    }
})
$('#addappointmentall').submit(function(){
    if($('#alldone').val() == 'no')
    {
        $('#sendallformsubmit').click();
      
    }
    else if($('#alldone').val() == 'yes')
    {
        var nu = Number($('#adultnumber').val()) + Number($('#childnumber').val())
        +Number($('#childbednumber').val())+Number($('#infantnumber').val());
        nu *=1000;
        $("#preloader").show();
        $("#status").show();

        var focusElement = $("#preloader");
        $(focusElement).focus();
        ScrollToTop(focusElement);
        $('body').css('overflow','hidden'); 
        setTimeout(
            function() {
                $.ajax({
                    type:'post',
                    url:'/addappointmentall',
                    data: $('#addappointmentall').serialize(),
                    success:function(data) {
                        $("#preloader").hide();
                         $('body').css('overflow','auto'); 
                        $('#bookingrefid').text('#'+data);
                        $('#alldone').val('no');
                        $('#bookinggoodmodal').click();
                    },
                    failure:function(){
                    }
                });
        },
        10000);
       

    }
    return false;
})
function ScrollToTop(el) {
    $('html, body').animate({ scrollTop: $(el).offset().top - 50 }, 'fast');          
}
$('#sendallform').submit(function(){
    $.ajax({
        type:'post',
        url:'/sendsms1',
        data: {
            "contact_number": $('#clientphone_number').val(),
            "verifycode": $('#verifycode').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        success:function(data) {
            console.log(data);
            $('#smsverifymodal').click();
            $('#verifycode').val(data);
        },
        failure:function(){
        }
    });
    return false;
})
$('#resendverifycode').on('click',function(){
    $.ajax({
        type:'post',
        url:'/sendsms1',
        data: {
            "contact_number": $('#clientphone_number').val(),
            "verifycode": $('#verifycode').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        success:function(data) {
            $('#verifycode').val(data);
        },
        failure:function(){
        }
    });
})
$('#verifycodeform').submit(function(){
    if($('#inputverifycode').val() == $('#verifycode').val())
    {
        $('#myModal1').modal('toggle');
        var adultnu = Number($('#adultnumber').val());
        for(var i =0;i<adultnu;i++)
        {
            var dataimg = new FormData();
            dataimg.append("type", 'adult');
            dataimg.append("first_name", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="first_name"]').val());
            dataimg.append("last_name", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="last_name"]').val());
            dataimg.append("day_of_birth", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="day_of_birth"]').val());
            dataimg.append("pssport_no", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="pssport_no"]').val());
            dataimg.append("passport_issue_date", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="passport_issue_date"]').val());
            dataimg.append("passport_expire_date", $('#adulttable').find('.oneadult:eq( '+i+')').find('[name="passport_expire_date"]').val());
            dataimg.append("image",$('#adulttable').find('.oneadult:eq( '+i+')').find('[name="photo"]')[0].files[0]);
            dataimg.append("personalphoto",$('#adulttable').find('.oneadult:eq( '+i+')').find('[name="personalphoto"]')[0].files[0]);
            dataimg.append("personal",$('#adulttable').find('.oneadult:eq( '+i+')').find('[name="personal"]').val());
            dataimg.append("appointment_id", '0');
            dataimg.append("status", $('#testall').val());
            dataimg.append("_token", $('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                type:'post',
                url:'/addvisitor',
                cache : false,
                contentType : false,
                processType : false,
                processData: false,
                data: dataimg,
                success:function(data) {
                },
                failure:function(){
                }
            });
        }
        var childnu = Number($('#childnumber').val());
        for(var i =0;i<childnu;i++)
        {
            var dataimg = new FormData();
            dataimg.append("type", 'child');
            dataimg.append("first_name", $('#childtable').find('.onechild:eq( '+i+')').find('[name="first_name"]').val());
            dataimg.append("last_name", $('#childtable').find('.onechild:eq( '+i+')').find('[name="last_name"]').val());
            dataimg.append("day_of_birth", $('#childtable').find('.onechild:eq( '+i+')').find('[name="day_of_birth"]').val());
            dataimg.append("pssport_no", $('#childtable').find('.onechild:eq( '+i+')').find('[name="pssport_no"]').val());
            dataimg.append("passport_issue_date", $('#childtable').find('.onechild:eq( '+i+')').find('[name="passport_issue_date"]').val());
            dataimg.append("passport_expire_date", $('#childtable').find('.onechild:eq( '+i+')').find('[name="passport_expire_date"]').val());
            dataimg.append("image",$('#childtable').find('.onechild:eq( '+i+')').find('[name="photo"]')[0].files[0]);
            dataimg.append("personalphoto",$('#childtable').find('.onechild:eq( '+i+')').find('[name="personalphoto"]')[0].files[0]);
            dataimg.append("personal",$('#childtable').find('.onechild:eq( '+i+')').find('[name="personal"]').val());
            dataimg.append("appointment_id", '0');
            dataimg.append("status", $('#testall').val());
            dataimg.append("_token", $('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                type:'post',
                url:'/addvisitor',
                cache : false,
                contentType : false,
                processType : false,
                processData: false,
                data: dataimg,
                success:function(data) {
                },
                failure:function(){
                }
            });
        }
        if($('#childbedstatus').val() == 'on'){
            var childbnu = Number($('#childbednumber').val());
            for(var i =0;i<childbnu;i++)
            {
                var dataimg = new FormData();
                dataimg.append("type", 'child with bed');
                dataimg.append("first_name", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="first_name"]').val());
                dataimg.append("last_name", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="last_name"]').val());
                dataimg.append("day_of_birth", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="day_of_birth"]').val());
                dataimg.append("pssport_no", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="pssport_no"]').val());
                dataimg.append("passport_issue_date", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="passport_issue_date"]').val());
                dataimg.append("passport_expire_date", $('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="passport_expire_date"]').val());
                dataimg.append("image",$('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="photo"]')[0].files[0]);
                dataimg.append("personalphoto",$('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="personalphoto"]')[0].files[0]);
                dataimg.append("personal",$('#childbedtable').find('.onechildbed:eq( '+i+')').find('[name="personal"]').val());
                dataimg.append("appointment_id", '0');
                dataimg.append("status", $('#testall').val());
                dataimg.append("_token", $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    type:'post',
                    url:'/addvisitor',
                    cache : false,
                    contentType : false,
                    processType : false,
                    processData: false,
                    data: dataimg,
                    success:function(data) {
                    },
                    failure:function(){
                    }
                });
            }
        }
        var infantnu = Number($('#infantnumber').val());
        for(var i =0;i<infantnu;i++)
        {
            var dataimg = new FormData();
            dataimg.append("type", 'infant');
            dataimg.append("first_name", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="first_name"]').val());
            dataimg.append("last_name", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="last_name"]').val());
            dataimg.append("day_of_birth", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="day_of_birth"]').val());
            dataimg.append("pssport_no", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="pssport_no"]').val());
            dataimg.append("passport_issue_date", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="passport_issue_date"]').val());
            dataimg.append("passport_expire_date", $('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="passport_expire_date"]').val());
            dataimg.append("image",$('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="photo"]')[0].files[0]);
            dataimg.append("personalphoto",$('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="personalphoto"]')[0].files[0]);
            dataimg.append("personal",$('#infanttable').find('.oneinfant:eq( '+i+')').find('[name="personal"]').val());
            dataimg.append("appointment_id", '0');
            dataimg.append("status", $('#testall').val());
            dataimg.append("_token", $('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                type:'post',
                url:'/addvisitor',
                cache : false,
                contentType : false,
                processType : false,
                processData: false,
                data: dataimg,
                success:function(data) {
                },
                failure:function(){
                }
            });
        }
        $('#alldone').val('yes');
        $('#addappointmentall').submit()
    }
    else
    {
        alert('Verify Code Incorrect!')
    }
    return false;
})
$('#allgoodsubmit').on('click',function(){
    $('#alldone').val('yes');
    $('#addappointmentall').submit();
})
$('#sendallform').on('click','.uploadpassport',function(){
    $('#sendallform').find('.justopenpassport').removeClass('justopenpassport');
    $(this).parent().find('input').addClass('justopenpassport');
    $(this).parent().find('input').click();
})
$('#sendallform').on('click','.uploadpersonal',function(){
    $('#sendallform').find('.justopenpersonal').removeClass('justopenpersonal');
    $(this).parent().find('input').addClass('justopenpersonal');
    $(this).parent().find('input').click();
})
$('#sendallform').on('change','.passportphoto',function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onloadend =function(){
        $('#sendallform').find('.justopenpassport').parents('.onetraveler').first().find('.passportphoto_preview').attr('src',reader.result);    
    }
    reader.readAsDataURL(file);  
})
$('#sendallform').on('change','.personalphoto',function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onloadend =function(){
        $('#sendallform').find('.justopenpersonal').parents('.onetraveler').first().find('.personalphoto_preview').attr('src',reader.result);    
    }
    reader.readAsDataURL(file);  
})
$('#sendallform').on('click','.personalcheck',function(){
    if($(this).prop("checked") == true)
    {
        $(this).parent().parent().next('div').find('.personalphotodiv').hide();
        $(this).val('on');
    }
    else
    {
        $(this).parent().parent().next('div').find('.personalphotodiv').show();
        $(this).val('off');
    }    
})
$('.booknowbuttondiv').on('click',function(){
  $(this).next('input').click();
})
setInterval('settimefunction()', 1000);
function settimefunction(){
    var dateVar2 = $('.resttime').next('input').val();
    var d1 = new Date($.now());
    var d2=new Date(dateVar2);
    
    diff  = new Date(d2 - d1),
    diffDays  = parseInt(diff/(1000*60*60*24));
    diffhours  = parseInt(diff%(1000*60*60*24)/(60*60*1000));
    diffmins  = parseInt(diff%(1000*60*60)/(60*1000));
    diffsecs  = parseInt(diff%(1000*60)/1000);

    $('.resttime').text(diffDays+'  ايام '+diffhours+':'+diffmins+':'+diffsecs);
}
</script>
@endsection