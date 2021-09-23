@extends('layouts.app')
@section('csscontent')
    <link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/chosen.css')}}">
@endsection
@section('content')



  <!--search-->
  <div class="mar1">
    <div class="container">
      <form action="{{ url('packagesearch') }}" method="POST">
        @csrf
        <?php if($status != 'search'){?>
        <div class="row boxform">
            <div class="col-md-4">
                <div class="Destination1">
                  <select class="productChosen form-control"  name="offercountry">
                    <option value="destination">الوجهة</option>
                    <?php foreach ($offercountries as $offercountry){?>
                    <option value="{{$offercountry->arabic}}">{{$offercountry->arabic}}</option>
                    <?php }?>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inputselct">
                    <select class="form-control" name="price" >
                      <option value="">حسب السعر</option>
                      <option value="lth"> السعر من الأرخص الى الأغلى </option>
                      <option value="htl"> السعر من الأغلى الى الأرخص </option>
                    </select>
                </div>
            </div>


            <div class="col-md-4">
                <div class="inputselct">
                  <select class="form-control" name="offer">
                    <option value="">حسب تاريخ اضافة العرض</option>
                    <option value="newest"> الأحدث اضافة </option>
                    <option value="oldest"> الاقدم اضافة </option>
                  </select>
              </div> 
            </div>

            <div class="col-md-8" style="text-algin:center;padding-top:20px">
                <div class="searchbox1">
                    <span class="map3"><i class="fa fa-calendar"></i></span>
                    
                    <span class="map2"><i class="fa fa-calendar"></i></span>
                    <input class="width3 datepickerall datecalc" id="datecalc1" type="text"  placeholder="{{date('d/m/Y')}}" id="datepicker1" name="find_start" required>
                    <input class="width3 datepickerall datecalc" id="datecalc2" type="text"  placeholder="{{date('d/m/Y',strtotime('+1 week'))}}" name="find_end">
                    <input class="width4"  id="datecalc3"  class="width3" type="text" readonly placeholder=" | 14 ليلة" style="text-align:right">
                </div>
            </div>

          <div class="col-md-4" style="text-algin:center;padding-top:20px">
                <button class="btn btn-red searchget" type="submit">ابحث</button>
              </div>
        </div>
        <?php }else{?>
          <div class="row boxform">
            <div class="col-md-4">
                <div class="Destination1">
                  <select class="productChosen form-control"  name="offercountry">
                    <option value="{{$request->offercountry}}"><?php if($request->offercountry == 'destination') {echo 'الوجهة';}else {echo $request->offercountry;}?></option>
                    <?php foreach ($offercountries as $offercountry){?>
                    <option value="{{$offercountry->arabic}}">{{$offercountry->arabic}}</option>
                    <?php }?>
                  </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inputselct">
                    <select class="form-control" name="price">
                      <?php if($request->price == 'lth'){?>
                      <option value="lth"> السعر من الأرخص الى الأغلى </option>
                      <option value="">حسب السعر</option>
                      <option value="htl"> السعر من الأغلى الى الأرخص </option>
                      <?php }else if($request->price == 'htl'){?>
                      <option value="htl"> السعر من الأغلى الى الأرخص </option>
                      <option value="">حسب السعر</option>
                      <option value="lth"> السعر من الأرخص الى الأغلى </option>
                      <?php }else{?>
                      <option value="">حسب السعر</option>
                      <option value="lth"> السعر من الأرخص الى الأغلى </option>
                      <option value="htl"> السعر من الأغلى الى الأرخص </option>
                      <?php }?>
                    </select>
                </div>
            </div>


            <div class="col-md-4">
                <div class="inputselct">
                  <select class="form-control" name="offer">
                      <?php if($request->offer == 'newest'){?>
                      <option value="newest"> الأحدث اضافة </option>
                      <option value="">حسب تاريخ اضافة العرض</option>
                      <option value="oldest"> الاقدم اضافة </option>
                      <?php }else if($request->offer == 'oldest'){?>
                      <option value="oldest"> الاقدم اضافة </option>
                      <option value="">حسب تاريخ اضافة العرض</option>
                      <option value="newest"> الأحدث اضافة </option>
                      <?php }else{?>
                      <option value="">حسب تاريخ اضافة العرض</option>
                      <option value="newest"> الأحدث اضافة </option>
                      <option value="oldest"> الاقدم اضافة </option>
                      <?php }?>
                  </select>
              </div> 
            </div>

            <div class="col-md-8" style="text-algin:center;padding-top:20px">
                <div class="searchbox1">
                    <span class="map3"><i class="fa fa-calendar"></i></span>
                    
                    <span class="map2"><i class="fa fa-calendar"></i></span>
                    <input class="width3 datepickerall datecalc " id="datecalc1" type="text"  placeholder="{{date('d/m/Y')}}"  name="find_start" required value="{{$request->find_start}}" >
                    <input class="width3 datepickerall datecalc " id="datecalc2" type="text"  placeholder="{{date('d/m/Y',strtotime('+1 week'))}}"  name="find_end" value="{{$request->find_end}}" >
                    <input class="width4" id="datecalc3" class="width3" type="text" readonly placeholder=" | 14 ليلة" style="text-align:right"
                    value="<?php
                              if($request->find_start != '' && $request->find_end != '')
                              {
                              $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s',strtotime($request->find_start)));
                              $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  date('Y-m-d H:i:s',strtotime($request->find_end)));
                              $diffInSeconds = $to->diffInSeconds($from);
                              $diffInDays = $diffInSeconds/(60*60*24);
                              if( $to <= $from)
                              {
                                echo '  | '.$diffInDays.' ليلة';
                              }
                              else
                              {
                                echo '  | '.'-'.$diffInDays.' ليلة';
                              }
                              }
                              ?>"
                    >
                </div>
            </div>

          <div class="col-md-4" style="text-algin:center;padding-top:20px">
                <button class="btn btn-red searchget" type="submit">ابحث</button>
              </div>
        </div>
        <?php }?>
      </form>
    </div>
  </div>
  <!--end of search-->


  <div class="mar2">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="title">
            <?php if( $status == 'Latest' || $status == 'reset'){?>
              <h3>اخر العروض</h3>
            <?php } else if($status == 'company'){?>
              <h3>{{$companies[0]->travel_agency_name}} عروض شركة</h3>
            <?php } else {?>
              <h3>بحث نتائج العروض</h3>
            <?php }?>
          </div>
          </div>
        </div>
    </div>
  </div>

</section>


<section class="Latest-Packages bgimages2">
     <div class="container topsection">
          <div class="row bgcolor4 rowmar">
          	<div class="col-md-12">
          	 <div class="boxtitle fon-wight">
                 <h4>التصنيف حسب</h4>
                </div>
             </div>

		  <div class="col-md-4 colmdwidth">
            <div class="inputselct">
              <select class="productChosen form-control sortby"  style="width:100%" <?php if($status != 'search' ){echo 'disabled';} else if($request->offercountry == 'destination'){echo 'disabled';} ?> id="seloffercity">
                <option value=""> المدينة </option>
                <?php if($status == 'search' && $request->offercountry != 'destination'){ ?>
                  <?php foreach ($offercities as $offercity){?>
                  <option value="{{$offercity->id}}">{{$offercity->arabic}}</option>
                  <?php }?>
                <?php }?>
              </select>
            </div>
			</div>
      


		  	<div class="col-md-4 colmdwidth">
          <div class="inputselct">
			  <select class="form-control sortby" id="selhotelrate">
			    <option value="" >عدد نجوم الفندق | ----- </option>
			    <option value="5">5 نجوم &nbsp| ★★★★★</option>
			    <option value="4">4 نجوم &nbsp| ★★★★</option>
			    <option value="3">3 نجوم &nbsp| ★★★</option>
			    <option value="2">نجمتين&nbsp| ★★</option>
			    <option value="1">نجمة  &nbsp&nbsp&nbsp&nbsp| ★</option>
			  </select>
             </div>
		  </div>
  

		    <div class="col-md-4 colmdwidth" style="display:none">
            <div class="inputselct">
              <select class="productChosen form-control sortby"  <?php if( $status == 'company'){echo 'disabled';} ?>  id="selcompanyname">
                <?php if( $status != 'company'){?>
                  <option value=""><span>اسم الشركة </span></option>
                <?php }?>
                <?php foreach($companies as $company){?>
                  <option value="{{$company->id}}">{{$company->travel_agency_name}}</option>
                <?php }?>
              </select>
            </div>
		  </div>

		</div>



          <div class="row martop-20">
           <div class="col-md-4 pright">
              <div class="box">

               <div class="row rowmar Destinationpdd bor-bottom">
                <div class="col-md-12">
                  <div class="boxtitle">
                    <h4>الوجهة</h4>
                  </div>
                </div>
               </div>
               <div style="max-height:1500px;overflow:auto;">
               <?php $i = 0; $old = -1; foreach($packages as $package){ if( $package->id != $old){ $old=$package->id;?>
                <div class="row rowmar packagetitle <?php if($i == 0){ echo 'bgcolorbox1 ';$i++;}else{ echo 'bg-text1  bor-bottom';}?> hotelrate{{$package->star}} companyid{{$package->company_id}} offercityid{{$package->offercity_id}} companyid offercityid hotelrate">
                  <input type="hidden" value="details{{$package->id}}">  
                  <input type="hidden" value="offers{{$package->id}}">  
                  <div class="col-md-12">
                    <div class="Country">
                    <h4 >{{$package->country}}</h4>
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
               <?php } }?>

               </div >
                <div class="row rowmar">
                    <div class="col-md-12">
                        <div class="arowdown">
                           <p><a href="#"><i class="fa fa-angle-down"></i></a></p>
                        </div>
                    </div>
               </div>
              </div>
           </div>
           <!--end of col-md-4--->
           <?php $i = 0; $old= -1; foreach($packages as $package){ if( $package->id != $old){ $old=$package->id;?>
            <!--col-md-4--->
            <div class="col-md-4 pleft pright packagedetails <?php if($i == 0){echo 'firstpackage';$i++;}?>" id="details{{$package->id}}">
              <div class="bg-gradient">
                <div class="row rowmar Destinationpdd bor-bottom">
                  <div class="col-md-12">
                    <div class="boxtitle">
                      <h4>التفاصيل</h4>
                    </div>
                  </div>
                </div>
                    
                <div class="row rowmar padd20">
                  <div class="col-md-12 col-xl-6">
                    <div class="booking">
                     <h4>من</h4>
                      <img src="{{asset('addbyme/images/Vector.png')}}">
                       <div class="searchbox">
                       <span class="map"><i class="fa fa-calendar"></i></span>
                        <input type="text"  placeholder="28/06/2019" value="{{$package->from}}" readonly>
                        </div>

                    </div>
                  </div>

                    <div class="col-md-12 col-xl-6">
                      <div class="booking">
                     <h4>الى</h4>
                      <img src="{{asset('addbyme/images/Vector1.png')}}">
                        <div class="searchbox">
                       <span class="map"><i class="fa fa-calendar"></i></span>
                       <input  type="text"  placeholder="28/06/2019" value="{{$package->until}}"readonly></div>
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
                          <li>
                            <textarea class="textareahome" readonly >{{$package->more_details}}</textarea>
                          </li>
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
                        <li>
                          <textarea class="textareahome" readonly>{{$package->service}}</textarea>
                        </li>
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

                <div class="row rowmar gettext">
                  <div class="col-md-12">
                    <div class="titleget">
                      <ul>
                        <li>
                        <textarea class="textareahome" readonly>{{$package->term_condition}}</textarea>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row rowmar gettext bor-bottom">
                  <div class="multiple-items" style="width:100%!important">
                    <?php $p = 0;foreach($package_photos as $package_photo){ if($package_photo->package_id == $package->id){?>
                      <div class="colwidth">
                        <div class="boxliser">  
                              <a data-toggle="modal" data-target="#bigphotomodal" class="showphoto" id="<?php echo 'photo'.$p;?>"  >
                                  <img src="{{asset('upload/package/'.$package_photo->photo)}}" style="height:50px;">
                                  <input value="{{$p}}" type="hidden">
                              </a>
                        </div>
                      </div>
                    <?php $p++;}}$p--;?>
                    <input value="{{$p}}" type="hidden" id="countofphoto">
                  </div> 
                </div>
                <div class="row rowmar gettext">
                  <div class="col-md-12">
                    <div class="titleget lsiticon">
                      <h5><span>شارك هذا العرض</span>
                      <ul>
                        <li><a href="#"><img src="{{asset('addbyme/images/t-3.png')}}"></a></li>
                        <li><a href="#" class="whatappwidth"><img src="{{asset('addbyme/images/whatsapp.svg')}}"></a></li>
                        <li><a href="#"><img src="{{asset('addbyme/images/t-1.png')}}"></a></li>
                      </ul></h5>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!--end of col-md-4--->

            <div class="col-md-4 pleft packagedetails <?php if($i == 1){echo 'firstpackage';$i++;}?>" id="offers{{$package->id}}" >
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom bgrow">
                        <div class="col-md-12">
                            <div class="boxtitle">
                              <h4>البدأ بحجز هذا العرض</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar martop">
                      <div class="col-md-4">
                      <div class="circle">
                        <img src="{{asset('upload/photo/'.$package->company_photo)}}">
                      </div>
                      </div>
                      <div class="col-md-8">
                        <div class="Company">
                        <h4>{{$package->travel_agency_name}}</h4>
                        <a href="javascript:void(0);" class="Follow followbutton" >متابعة عروض الشركة</a>
                        <input type="hidden" value="{{$package->travel_agency_name}}">
                        <input type="hidden" value="{{$package->company_id}}">
                        <ul class="listicon2 iconwith">
                          <?php if($package->whatsapp != '') {?>
                            <li><a href="{{$package->whatsapp}}" class="whatappwidth"><img src="{{asset('addbyme/images/whatsapp.svg')}}"></a></li>
                          <?php }?>
                          <?php if($package->instagram != '') {?>
                          <li><a href="{{$package->instagram}}"><img src="{{asset('addbyme/images/t-4.png')}}"></a></li>
                          <?php }?>
                          <?php if($package->facebook != '') {?>
                          <li><a href="{{$package->facebook}}"><img src="{{asset('addbyme/images/t-3.png')}}"></a></li>
                          <?php }?>
                          <?php if($package->twitter != '') {?>
                          <li><a href="{{$package->twitter}}"><img src="{{asset('addbyme/images/t-1.png')}}"></a></li>
                          <?php }?>
                          <?php if($package->youtube != '') {?>
                          <li><a href="{{$package->youtube}}"><img src="{{asset('addbyme/images/t-5.png')}}"></a></li>    
                          <?php }?>    
                        </ul>
                      </div>
                      </div>
                    </div>
                    <form  action="{{ url('/addappointment') }}" method="POST" class="addappointment">
                      @csrf
                      <div class="row rowmar martop">
                        <div class="col-md-12">
                          <div class="time">
                            <h3>العرض ينتهي في</h3>
                            <p><i class="fa fa-clock-o"></i> <span class="<?php if($i == 2){echo 'resttime';$i++;}?> timelist">
                              <?php
                             /* $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s'));
                              $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  date('Y-m-d H:i:s',strtotime($package->offer_until)));
                              $diffInSeconds = $to->diffInSeconds($from);
                              $diffInDays = $to->diffInDays($from);
                              $diffInSeconds -= 60*60*24*$diffInDays;
                              echo $diffInDays.'ايام '.gmdate('H:i', $diffInSeconds);*/
                              ?> </span><input type="hidden" value="{{$package->offer_until}}">
                            </p>
                          </div>

                            <div class="formbox">
                            <div class="input"><input type="text" name="name" placeholder="الأسم" required></div>
                            <div class="input"><input type="text" name="last_name" placeholder="اللقب" required></div>
                            <div class="input"><input type="number" name="mobile_number" placeholder="رقم الموبايل" required class="iraqmobile"></div>
                            <div class="input"><input type="email" name="email" placeholder="الأيميل" required></div>
                            </div>
                        </div>
                      </div>
                      <div class="boxcolorhow">
                        <div class="row rowmar martop bor-bottom paddrowbottom">
                          <div class="col-md-4">
                            <div class="numbername">
                              <h3>بالغ</h3>
                              <span>12+</span>
                            </div>
                          </div>

                          <div class="col-md-4 pright pleft ">
                            <div class="borbox2">
                            <span class="input-number-decrement rightnumber2 " id="adultrightnumber{{$package->id}}">–</span><input readonly class="input-number1 bornone input-number"  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1" id="adultleftnumber{{$package->id}}">+</span>
                            <input type="hidden" class="adultnumber" id="adultnumber{{$package->id}}"  name="adult" value="0">
                            <input type="hidden" value="{{$package->id}}">
                          </div>
                          
                          <?php if($package->singlestatus == 'on'){?> 
                          <div style="text-align:center;    padding-top: 5px;">
                          <input type="checkbox" class="singlecheck" style="    width: 20px; height: 20px;     position: absolute;" value="on" name="single">
                          <input type="hidden" value="{{$package->id}}">
                          <input type="hidden" value="off">
                          <span style="    padding-right: 30px;">سنكل</span>
                          <span id="singlemoney{{$package->id}}" style="color:#393939;display:none">{{$package->single}}</span>
                          <span id="adultmoneyone{{$package->id}}" style="color:#393939;display:none">{{$package->adult}}</span>
                          </div>
                          <?php }?>
                          </div>
                            
                            <div class="col-md-4">
                            <div class="number">
                              <h3><span>$</span><span id="adultmoney{{$package->id}}" style="color:#393939">{{$package->adult}}</span></h3>
                            </div>
                            </div>

                        </div>
                        <input type="hidden" id="childbedstatus{{$package->id}}" value="{{$package->childbedstatus}}">
                        <?php if($package->childbedstatus == 'on'){?>
                        <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                          <div class="col-md-4">
                            <div class="numbername">
                              <h3>طفل بسرير</h3>
                              <span style="    position: absolute;">6-11</span>
                            </div>
                          </div>

                          <div class="col-md-4 pright pleft ">
                            <div class="borbox2">
                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number4 bornone input-number" readonly type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                            <input type="hidden" class="childbednumber" id="childbednumber{{$package->id}}"  name="childbed" value="0">
                            <input type="hidden" value="{{$package->id}}">
                          </div>
                          </div>
                            
                            <div class="col-md-4">
                            <div class="number">
                              <h3><span>$</span><span id="childbedmoney{{$package->id}}" style="color:#393939">{{$package->childbed}}</span></h3>
                            </div>
                            </div>

                        </div>
                        <?php }?>
                        <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                          <div class="col-md-4">
                            <div class="numbername">
                              <h3>طفل بدون سرير</h3>
                              <span>2-6</span>
                            </div>
                          </div>

                          <div class="col-md-4 pright pleft ">
                            <div class="borbox2">
                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number2 bornone input-number" readonly type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                            <input type="hidden" class="childnumber" id="childnumber{{$package->id}}"  name="child" value="0">
                            <input type="hidden" value="{{$package->id}}">
                          </div>
                          </div>
                            
                            <div class="col-md-4">
                            <div class="number">
                              <h3><span>$</span><span id="childmoney{{$package->id}}" style="color:#393939">{{$package->child}}</span></h3>
                            </div>
                            </div>

                        </div>

                        <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                            <div class="col-md-4">
                                <div class="numbername">
                                    <h3>رضيع</h3>
                                    <span>العمر اقل من سنتين</span>
                                </div>
                            </div>

                            <div class="col-md-4 pright pleft ">
                                <div class="borbox2">
                                  <span class="input-number-decrement rightnumber2">–</span><input class="input-number3 bornone input-number"  readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                                  <input type="hidden" class="infantnumber" id="infantnumber{{$package->id}}" name="infant" value="0">
                                  <input type="hidden" value="{{$package->id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="number">
                                    <h3><span>$</span><span id="infantmoney{{$package->id}}" style="color:#393939">{{$package->infant}}</span></h3>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row rowmar mar50">
                          <div class="col-md-6">
                              <div class="total let">
                                <h3> المجموع </h3>
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="total">
                              <h3> <span>$</span><span id="totalmoney{{$package->id}}" style="color:#393939;font-size:44px">0</span> </h3>
                            </div>
                          </div>

                      </div>

                      <a  class="booknowbuttondiv" herf="javascript:void(0);"> 
                      <div class="row rowmar Destinationpdd bgcolorbox2">
                          <div class="col-md-12">
                              <div class="boxtitle" style="text-align:center">
                                <h4>احجز الان</h4>
                              </div>
                          </div>
                      </div>
                      </a>
                      <input type="submit" style="display:none">
                      <input type="hidden" name="package_id" value="{{$package->id}}">
                    </form>
                </div>
            </div>
          <?php } }?>
        
          </div>
      </div>
    <!--end of container--->
    <div class="topsection3">
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
    </div>
</section>


<div class="modal fade" id="bigphotomodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog big-dialog">
        <div class="modal-content">
            <div class="modal-body  ">
                <div class="row" style="    text-align: center;">
                  <div class="col-md-12" style="    padding: 10px;">
                    <img src="{{asset('addbyme/images/logo.png')}}" id="modalphotosrc"style="width:100%;height:auto;border-radius: 10px;">
                  </div>
                  <div class="col-md-12">
                    <input type="button" class="btn btn-sing-in hvr-pop" style="width: 100px; background: crimson;  color: white;" id="modalphotoprevious" value="السابق">
                    <input type="button" class="btn btn-sing-in hvr-pop" style="width: 100px; background: crimson;  color: white;" id="modalphotonext" value="التالى">
                    <input id="modalphotoid" type="hidden">
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jscontent')
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/mian.js')}}"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>

<!--end of js-->




<script type="text/javascript">
        (function() {
 
  window.inputNumber = function(el) {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() {
      init($(this));
    });

    function init(el) {

      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if(!min || value >= min) {
          el[0].value = value;
          if(el.hasClass('input-number1'))
            $('.adultnumber').val(value).trigger('change');
          if(el.hasClass('input-number2'))
            $('.childnumber').val(value).trigger('change');
          if(el.hasClass('input-number4'))
            $('.childbednumber').val(value).trigger('change');
          if(el.hasClass('input-number3'))
            $('.infantnumber').val(value).trigger('change');
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if(!max || value <= max) {
          el[0].value = value;
          if(el.hasClass('input-number1'))
            $('.adultnumber').val(value).trigger('change');
          if(el.hasClass('input-number2'))
            $('.childnumber').val(value).trigger('change');
          if(el.hasClass('input-number4'))
            $('.childbednumber').val(value).trigger('change');
          if(el.hasClass('input-number3'))
            $('.infantnumber').val(value).trigger('change');
        }
      }
    }
  }
})();

inputNumber($('.input-number1'));
inputNumber($('.input-number2'));
inputNumber($('.input-number3'));
inputNumber($('.input-number4'));
      </script>

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
autosize(document.getElementsByClassName("textareahome"));
$('.packagedetails').hide();
$('.firstpackage').show();
$('.packagetitle').on('click',function(){
    $('.packagedetails').hide();
    $('#'+$(this).find('input').val()).show();
    $('#'+$(this).find('input').next('input').val()).show();
    $('.bgcolorbox1').addClass('beforepackagetitle');
    $('.beforepackagetitle').removeClass('bgcolorbox1');
    $('.beforepackagetitle').addClass('bg-text1');
    $('.beforepackagetitle').addClass('bor-bottom');
    $('.packagetitle').removeClass('beforepackagetitle');
    $(this).addClass('bgcolorbox1');
    $(this).removeClass('bg-text1');
    $(this).removeClass('bor-bottom');
    $('.timelist').removeClass('resttime');
    $('#'+$(this).find('input').next('input').val()).find('.timelist').addClass('resttime');
    for(var i = 0;i<1000;i++)
    {
      if($('.singlecheck:eq( '+i+')').next('input').next('input').val() == 'on')
      {
        $('.singlecheck:eq( '+i+')').click();
      }
    }
});
$('.adultnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.childnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.childbednumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.infantnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.booknowbuttondiv').on('click',function(){
  $(this).next('input').click();
})

$('.sortby').on('change',function(){
  $('.packagetitle').hide();
  $('.packagedetails').hide();
  $('.hotelrate'+$("#selhotelrate").val()+'.companyid'+$("#selcompanyname").val()+'.offercityid'+$("#seloffercity").val()+'.packagetitle').show();
    for(var i=0;;i++)
    {
        if($('.packagetitle:eq( '+i+')').css("display")!='none')
        {
            $('.packagetitle:eq( '+i+')').trigger('click');
            break;
        }    
    }
})
$('.datecalc').on('change',function(){
  if($('#datecalc1').val() != '' && $('#datecalc2').val() != '')
  {
    var dateVar1 = $('#datecalc1').val();
    var dateVar2 = $('#datecalc2').val();
    var d1=new Date(dateVar1);
    var d2=new Date(dateVar2);

    var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds

    var diffDays = Math.round(Math.abs((d2.getTime() - d1.getTime()) / (oneDay)));
    if(d1 <= d2)
    {
      $('#datecalc3').val('| '+diffDays+' ليلة')
    }
    else
    {
      $('#datecalc3').val('| '+'-'+diffDays+' ليلة')
    }
  }
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
$('.addappointment').submit(function(){
  var mobile = $(this).find('.iraqmobile').val();
  if(mobile.length  != 11 || mobile.charAt(0) != '0' || mobile.charAt(1) != '7')
  {
      alert('Please input correct phone number format.');
      return false;
  }
  return true; 
})
$('.singlecheck').on('click',function(){
  var total = 0;
  var package_id = $(this).next('input').val();
  if($(this).next('input').next('input').val() == 'on')
  {
    $(this).next('input').next('input').val('off');
    $('.unaudltrow').show();
    $('#adultleftnumber'+package_id).show()
    $('#adultrightnumber'+package_id).show();
    total =  Number($('#adultmoneyone'+package_id).text()) ;
    $('#adultmoney'+package_id).text(total);
    total = 0;
    total +=  Number($('#adultmoneyone'+package_id).text()) * Number($('#adultnumber'+package_id).val());
    total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
    if($('#childbedstatus'+package_id).val() == 'on')
      total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
    total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
    $('#totalmoney'+package_id).text(total);
    
    
  }
  else
  {
    $(this).next('input').next('input').val('on');
    var k = Number($('#adultnumber'+package_id).val());
    if(k==0)
    {
        $('#adultleftnumber'+package_id).click();
    }
    else
    {
      for(var i = 0;i<k-1;i++)
          $('#adultrightnumber'+package_id).click();
    }
    $('.unaudltrow').hide();
    $('#adultleftnumber'+package_id).hide()
    $('#adultrightnumber'+package_id).hide();
    total =  Number($('#singlemoney'+package_id).text()) ;
    $('#totalmoney'+package_id).text(total);
    $('#adultmoney'+package_id).text(total);
  }
})

$('.multiple-items').slick({
  dots: false,
  infinite: true,
  speed: 200,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
  responsive: [{
    breakpoint: 600,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1
    }
  },
  {
      breakpoint: 400,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
  }]
});
$(".showphoto").on('click',function(){
    $('#modalphotosrc').attr('src',$(this).find('img').attr('src'));
    $('#modalphotoid').val($(this).find('input').val());
    $('#modalphotoprevious').show();
    $('#modalphotonext').show();
    if($(this).find('input').val()=='0')
    {
        $('#modalphotoprevious').hide();
    }
    if($(this).find('input').val()==$('#countofphoto').val())
    {
        $('#modalphotonext').hide();
    }
})
$('#modalphotonext').on('click',function(){
    var photo = $('#modalphotoid').val();
    photo++;
    $('#modalphotosrc').attr('src',$('#photo'+photo).find('img').attr('src'));
    $('#modalphotoid').val($('#photo'+photo).find('input').val());
    $('#modalphotoprevious').show();
    $('#modalphotonext').show();
    if($('#photo'+photo).find('input').val()=='0')
    {
        $('#modalphotoprevious').hide();
    }
    if($('#photo'+photo).find('input').val()==$('#countofphoto').val())
    {
        $('#modalphotonext').hide();
    }
})
$('#modalphotoprevious').on('click',function(){
    var photo = $('#modalphotoid').val();
    photo--;
    $('#modalphotosrc').attr('src',$('#photo'+photo).find('img').attr('src'));
    $('#modalphotoid').val($('#photo'+photo).find('input').val());
    $('#modalphotoprevious').show();
    $('#modalphotonext').show();
    if($('#photo'+photo).find('input').val()=='0')
    {
        $('#modalphotoprevious').hide();
    }
    if($('#photo'+photo).find('input').val()==$('#countofphoto').val())
    {
        $('#modalphotonext').hide();
    }
})
</script>
@endsection