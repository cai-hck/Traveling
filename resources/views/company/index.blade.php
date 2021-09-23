@extends('layouts.app1')
@section('csscontent')
<link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/chosen.css')}}">
@endsection
@section('content')
<!--search-->
    <!--end of search-->

    <div class="mar2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h3>اخر العروض</h3>
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
            <div class="col-xl-3 col-lg-6 colmdwidth1">
                <div class="inputselct">
                    <select class="productChosen form-control sortby"  id="seloffercountry">
                        <option value="packagetitle"> بلد </option>
                        <?php foreach ($offercountries as $offercountry){?>
                            <option value="offercountryid{{$offercountry->id}}">{{$offercountry->arabic}}</option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 colmdwidth1">
                <div class="inputselct">
                    <select class="form-control sortby"  id="seloffercity">
                        <option value="packagetitle"> المدينة </option>
                    </select>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 colmdwidth1">
                <div class="inputselct">
                    <select class="form-control sortby" id="selhotelrate">
                        <option value="packagetitle" >عدد نجوم الفندق | ----- </option>
                        <option value="hotelrate5">5 نجوم &nbsp| ★★★★★</option>
                        <option value="hotelrate4">4 نجوم &nbsp| ★★★★</option>
                        <option value="hotelrate3">3 نجوم &nbsp| ★★★</option>
                        <option value="hotelrate2">نجمتين&nbsp| ★★</option>
                        <option value="hotelrate1">نجمة  &nbsp&nbsp&nbsp&nbsp| ★</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 colmdwidth1">
                <div class="inputselct">
                    <select class="form-control sortby" id="seldays">
                        <option value="packagetitle">عدد الأيام</option>
                        <?php $i = 0; $old = -1; foreach($packages as $package){ if( $package->id != $old){ $old=$package->id;
                            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $package->from);
                            $now = \Carbon\Carbon::createFromFormat('Y-m-d', $package->until);
                            $diff1 = $date->diffInDays($now);
                            ?>
                        <option value="selday{{$diff1}}">أيام {{$diff1}}</option>
                        <?php }}?>
                    </select>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 colmdwidth1">
                <div class="inputselct">
                    <select class="form-control sortby" id="selspecial">
                        <option value="packagetitle">عرض خاص / عرض عادي</option>
                        <option value="specialtitle">عرض خاص</option>
                        <option value="normaltitle">عرض عادي</option>
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
                    
                    <div>
                    <?php $i = 0; $old = -1; foreach($packages as $package){ if( $package->id != $old){ $old=$package->id;
                        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $package->updated_at);
                        $now = \Carbon\Carbon::now();
                        $ca1 = 0;
                        $diff = $date->diffInHours($now);
                        if($package->day = 'one')
                        {
                            $ca1 = 24;
                        }
                        else if($package->day = 'two')
                        {
                            $ca1 = 48;
                        }
                        else if($package->day = 'three')
                        {
                            $ca1 = 72;
                        }
                        $sp = 0;
                        if($package->special == 'special' && $diff < $ca1 && $date < $now){
                            $sp = 1;
                        }
                        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $package->from);
                        $now = \Carbon\Carbon::createFromFormat('Y-m-d', $package->until);
                        $diff1 = $date->diffInDays($now);
                        ?>

                    <div class="<?php if($i == 0){ echo 'bgcolorbox1 ';$i++;}else{ echo 'bg-text1  bor-bottom';}?> packagetitle selday{{$diff1}} <?php if($sp == 1){echo 'specialtitle';}else{ echo 'normaltitle';}?> hotelrate{{$package->star}}  offercityid{{$package->offercity_id}} offercountryid{{$package->offercountries_id}}" >
                        <input type="hidden" value="details{{$package->id}}">  
                        <input type="hidden" value="offers{{$package->id}}">  
                        <div class="row packagerow">
                            <div class="col-md-12 spcailpadd">
                                <ul class="spcail">
                                    <?php 
                                    if($sp == 1){?>
                                    <li style="margin-right: -2px;"><a href="#" class="bg-01">عرض خاص</a></li>
                                     <?php }?>
                                    <li><a href="#" class="bg-02">{{$package->country}}</a></li>
                                    <li><a href="#" class="bg-02">{{$package->city}}</a></li>
                                    <li><a href="#" class="bg-02" style="text-align:left">{{$package->id}}</a></li>
                                </ul>

                            </div>
                        </div>

                        <div class="row rowmar" style="padding-top: 12px;">
                            <div class="col-md-12">
                                <div class="Country">
                                    <p>{{$package->subject}}</p>
                                    <h5><span>الفندق : </span> <ul>
                                    <li class="<?php if($package->star > 0){echo 'star';}?>"><i class="fa fa-star"></i></li>
                                    <li class="<?php if($package->star > 1){echo 'star';}?>"><i class="fa fa-star"></i></li>
                                    <li class="<?php if($package->star > 2){echo 'star';}?>"><i class="fa fa-star"></i></li>
                                    <li class="<?php if($package->star > 3){echo 'star';}?>"><i class="fa fa-star"></i></li>
                                    <li class="<?php if($package->star > 4){echo 'star';}?>"><i class="fa fa-star"></i></li>
                                    </ul> 
                                    <h5> <span>{{$package->hotelname}}</span> </h5>
                                    <?php 
                                     $date = \Carbon\Carbon::createFromFormat('Y-m-d', $package->from);
                                     $now = \Carbon\Carbon::createFromFormat('Y-m-d', $package->until);
                                     $diff1 = $date->diffInDays($now);
                                    ?>
                                    <button class="btn btn-yellowmian">{{$diff1}} أيام</button></h5>
                                </div>
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
            <div class="col-md-4 pleft pright  packagedetails <?php if($i == 0){echo 'firstpackage';$i++;}?>" id="details{{$package->id}}">
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
                                    <input type="text" name="text" placeholder="28/06/2019" value="{{$package->from}}" readonly>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 col-xl-6">
                            <div class="booking">
                                <h4>الى</h4>
                                <img src="{{asset('addbyme/images/Vector1.png')}}">
                                <div class="searchbox">
                                    <span class="map"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="text" placeholder="28/06/2019"  value="{{$package->until}}" readonly>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="mainicontitle">
                                <h3>الذهاب</h3> <img src="{{asset('addbyme/images/air2.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar">
                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>وقت المغادرة</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="10:00" value="{{$package->departure_time}}" readonly>
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>وقت الوصول</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="10:00"  value="{{$package->arrival_time}}" readonly>
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="border4">
                                <p>مدة الطيران</p>
                                <h4><?php 
                                        $start_time = $package->departure_time;
                                        $end_time = $package->arrival_time;

                                        $start_datetime = new DateTime(date('Y-m-d').' '.$start_time);
                                        $end_datetime = new DateTime(date('Y-m-d').' '.$end_time);
                                        if($start_datetime > $end_datetime)
                                        {
                                            $start_datetime = new DateTime(date('Y-m-d',strtotime("-1 days")).' '.$start_time);
                                        }
                                        $interval = $start_datetime->diff($end_datetime);
                                     //   echo $interval->format('%hh').' '.$interval->format('%im');?></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar bor-bottom paddboredr3">
                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>المغادرة من مطار</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->departure_airport}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>الوصول الى مطار</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->arrival_airport}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="bookform1 timeout">
                                <label>شركة الطيران</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->airline}}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="mainicontitle colorchangetitle">
                                <h3>الرجوع</h3> <img src="{{asset('addbyme/images/air3.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar">
                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>وقت المغادرة</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="10:00"  value="{{$package->departure_time_1}}" readonly>
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>وقت الوصول</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="10:00" value="{{$package->arrival_time_1}}" readonly>
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="border4">
                                <p>مدة الطيران</p>
                                <h4><?php 
                                        $start_time = $package->departure_time_1;
                                        $end_time = $package->arrival_time_1;

                                        $start_datetime = new DateTime(date('Y-m-d').' '.$start_time);
                                        $end_datetime = new DateTime(date('Y-m-d').' '.$end_time);
                                        if($start_datetime > $end_datetime)
                                        {
                                            $start_datetime = new DateTime(date('Y-m-d',strtotime("-1 days")).' '.$start_time);
                                        }
                                        $interval = $start_datetime->diff($end_datetime);
                                      //  echo $interval->format('%hh').' '.$interval->format('%im');?>
                                        </h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar marget">
                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>المغادرة من مطار</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->departure_airport_1}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bookform1 timeout">
                                <label>الوصول الى مطار</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->arrival_airport_1}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="bookform1 timeout">
                                <label>شركة الطيران</label>
                                <div class="clock3">
                                    <input type="text" name="text" placeholder="IST" value="{{$package->airline_1}}" readonly>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row rowmar get">
                        <div class="col-md-12">
                            <div class="titleget">
                                <h4>البرنامج</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar gettext">
                        <div class="col-md-12">
                            <div class="titleget">
                                <ul>
                                    <li><textarea class="textareahome" readonly >{{$package->more_details}}</textarea></li>
                                </ul>

                                <p>حفظ برنامج الرحلة</p>
                                <span class="icondownload"><a href="{{asset('upload/doc/'.$package->doc)}}" download><i class="fa fa-download"></i></a></span>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar get">
                        <div class="col-md-12">
                            <div class="titleget">
                                <h4>اسم الفندق</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar gettext">
                        <div class="col-md-12">
                            <div class="titleget">
                                <ul>
                                    <li><textarea class="textareahome" readonly >{{$package->hotelname}}</textarea></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php $p1 = 0; foreach($package_photos as $package_photo){ if($package_photo->package_id_new == $package->id){$p1++;}}
                    if($p1 > 0){?>
                    <div class="row rowmar get">
                        <div class="col-md-12">
                            <div class="titleget">
                                <h4>صور من البرنامج</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar gettext bor-bottom">
                        <div class="row" style="width:100%!important">
                            <?php $p = 0;foreach($package_photos as $package_photo){ if($package_photo->package_id_new == $package->id){?>
                            <div class="colwidth col-md-4">
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
                    <?php }?>
                </div>
            </div>
            <!--end of col-md-4--->

            <div class="col-md-4 pleft  packagedetails  <?php if($i == 1){echo 'firstpackage';$i++;}?>"  id="offers{{$package->id}}">
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
                                <a href="#" class="Follow" style="display:none">Follow</a>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar martop">
                        <div class="col-md-12">
                            <div class="time">
                                <h3>عدد المقاعد المتوفرة</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="imagesback">
                                <?php if($package->seat >8 ){?>
                                <span><img src="{{asset('addbyme/images/mainicon.png')}}"> <b class="bgimages01">9+  </b></span>
                                <?php }else {?>
                                <span><img src="{{asset('addbyme/images/mainicon.png')}}"> <b class="bgimages02">{{$package->seat}}</b></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar martop">
                        <div class="col-md-12">
                            <div class="time">
                                <h3>العرض ينتهي في</h3>
                                <p><i class="fa fa-clock-o"></i><span class="<?php if($i == 2){echo 'resttime';$i++;}?> timelist"></span><input type="hidden" value="{{date('Y-m-d', strtotime('+1 day', strtotime($package->offer_until)))}}"></p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ url('addappointmentnew') }}" method="POST">
                        @csrf
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
                            <span class="input-number-decrement rightnumber2 " id="adultrightnumber{{$package->id}}">–</span><input class="input-number1 bornone input-number" readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1" id="adultleftnumber{{$package->id}}">+</span>
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
                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number4 bornone input-number"  readonly type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
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
                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number2 bornone input-number" readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
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
                        <input type="hidden" id="roomstatus{{$package->id}}" value="{{$package->roomstatus}}">
                        <?php if($package->roomstatus == 'on'){?>
                        <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                            <div class="col-md-4">
                            <div class="numbername">
                                <h3>غرفة اضافية</h3>
                                <span style="    position: absolute;"></span>
                            </div>
                            </div>

                            <div class="col-md-4 pright pleft ">
                            <div class="borbox2">
                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number5 bornone input-number"  readonly type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                            <input type="hidden" class="roomnumber" id="roomnumber{{$package->id}}"  name="room" value="0">
                            <input type="hidden" value="{{$package->id}}">
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                            <div class="number">
                                <h3><span>$</span><span id="roommoney{{$package->id}}" style="color:#393939">{{$package->room}}</span></h3>
                            </div>
                            </div>

                        </div>
                        <?php }?>
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
                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="Publicprice">
                                <h3>سعر البيع للعامّة</h3>
                                <span><a href="#"><b>$</b>{{$package->yousell}}</a></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php } }?>
        </div>
    </div>

    <!--end of container--->
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
<input type="hidden" id="savecountry_id">
@endsection
@section('jscontent')
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/mian.js')}}"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
<!--end of js-->

<script>
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
$('.adultnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   
   if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
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
   
   if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
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
   
   if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
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

   if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.roomnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   if($('#childbedstatus'+package_id).val() == 'on')
    total +=  Number($('#childbedmoney'+package_id).text()) * Number($('#childbednumber'+package_id).val());
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());

   if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.booknowbuttondiv').on('click',function(){
  $(this).next('input').click();
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
    if($('#roomstatus'+package_id).val() == 'on')
      total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
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
$('.sortby').on('change',function(){
  $('.packagetitle').hide();
  $('.packagedetails').hide();
  $('.'+$("#selhotelrate").val()+'.'+$("#seloffercountry").val()+'.'+$("#seloffercity").val()+'.packagetitle'+'.'+$("#selspecial").val()+'.'+$("#seldays").val()).show();
    for(var i=0;;i++)
    {
        if($('.packagetitle:eq( '+i+')').css("display")!='none')
        {
            $('.packagetitle:eq( '+i+')').trigger('click');
            break;
        }    
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
          if(el.hasClass('input-number5'))
            $('.roomnumber').val(value).trigger('change');
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
          if(el.hasClass('input-number5'))
            $('.roomnumber').val(value).trigger('change');
        }
      }
    }
  }
})();

inputNumber($('.input-number1'));
inputNumber($('.input-number2'));
inputNumber($('.input-number3'));
inputNumber($('.input-number4'));
inputNumber($('.input-number5'));

$('#seloffercountry').on('change',function(){
    if($('#seloffercountry').val() == 'packagetitle')
    {
        var html ="";
        $("#seloffercity").empty();
        html += "<option value='packagetitle'> المدينة </option>"
        $("#seloffercity").append(html);
    }
    else 
    {
        var fid = $('#seloffercountry').val();
        var itemId = fid.substring(14, fid.length);
        $('#savecountry_id').val(itemId);
        $.ajax({
            type:'post',
            url:'/getoffercity_id',
            data: {
                "id": $('#savecountry_id').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $("#seloffercity").empty();
                html += "<option value='packagetitle'> المدينة </option>"
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='offercityid" + data[i]['id']+"'>" + data[i]['arabic']+"</option>";
                }
                $("#seloffercity").append(html);
            },
            failure:function(){
            }
        });
    }
})
</script>
@endsection