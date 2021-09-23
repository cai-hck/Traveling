@extends('layouts.app1')
@section('csscontent')
<link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/chosen.css')}}">
@endsection
@section('content')

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

<section class="Latest-Packages bgimages2" >
    <div class="container topsection"  style="top: -800px;">
        <div class="row bgcolor4 rowmar">
            <div class="col-md-12">
                <div class="boxtitle fon-wight">
                    <h4>التصنيف حسب</h4>
                </div>
            </div>

            
            <div class="col-xl-4 col-lg-6 colmdwidth">
                <div class="inputselct">
                    <select class="productChosen form-control sortby"  id="seloffercountry">
                        <option value="packagetitle"> بلد </option>
                        <?php foreach ($offercountries as $offercountry){?>
                            <option value="offercountryid{{$offercountry->id}}">{{$offercountry->arabic}}</option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 colmdwidth">
                <div class="inputselct">
                    <select class="form-control sortby"  id="seloffercity">
                        <option value="packagetitle"> المدينة </option>
                    </select>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 colmdwidth">
                <div class="inputselct">
                    <select class="form-control sortby" id="seltrip" >
                        <option value="packagetitle">الكل</option>
                        <option value="round">ذهاب واياب</option>
                        <option value="one">فقط ذهاب</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row martop-20">
            <div class="col-md-12">
                <div class="imagesair001">
                    <ul>
                        <li><img class="bgair001" src="{{asset('addbyme/images/air2white.png')}}"><span>الذهاب</span></li>
                        <li><img class="bgair002" src="{{asset('addbyme/images/air3white.png')}}"><span>الأياب</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 pright">
                <div class="box">

                    <div class="row rowmar Destinationpdd bookingdarection bor-bottom">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4" >
                            <div class="boxtitle">
                                <h4><img src="{{asset('addbyme/images/air2.png')}}"> <span>وقت المغادرة</span></h4>
                            </div>
                        </div>

                        <div class="col-md-4" >
                            <div class="boxtitle" style="text-align:left">
                                <h4><img src="{{asset('addbyme/images/air3.png')}}"> <span>وقت الوصول</span></h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="boxtitle airtitlepadd">
                                <h4><span>شركة الطيران</span></h4>
                            </div>
                        </div>
                    </div>
                    <?php $i = 0; $old= -1; foreach($flights as $flight){ if( $flight->id != $old){ $old=$flight->id;?>
                        <div class="mianbox0019 <?php if($i == 0){ echo'bgcolorbox1'; $i++;}else{ echo 'hovermianbox0019';}?> packagetitle  <?php if($flight->inbound == 'on'){echo 'round';}else{echo 'one';}?> offercityid{{$flight->offercity_id}} offercountryid{{$flight->offercountry_id}}">
                            <input type="hidden" value="details{{$flight->id}}">  
                            <div class="col-md-12 headerone row">
                                <div class="col-md-11" style="text-align:right;">
                                <h6 style="background-color: #FFE380;width: fit-content;padding: 5px; color: black;">{{$flight->o_departure}}</h6>
                                </div>
                                <div class="col-md-1">
                                <h6 style="background-color: #FFE380;width: fit-content;padding: 5px; color: black;">{{$flight->id}}</h6>
                                </div>
                            </div>
                            <div class="row  bgair0013 rowmar">
                                <div class="col-md-1">
                                    <div class="bgair0012">
                                        <img class="bgair0011" src="{{asset('addbyme/images/air2white.png')}}">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row bgnila">
                                        <div class="col-md-3 paddright01">
                                            <div class="London">
                                                <a href="#">{{$flight->o_departure_time}}</a>
                                            </div>
                                            <h3 class="Heathrow">{{$flight->o_country}}</h3>
                                        </div>

                                        <div class="col-md-6 borpaddlondan">
                                            <div class="borLondon1">
                                                <h3>مدة الطيران</h3>
                                                <h3><?php /*
                                                    $start_time = $flight->o_departure_time;
                                                    $end_time = $flight->o_arrival_time;

                                                    $start_datetime = new DateTime(date('Y-m-d').' '.$start_time);
                                                    $end_datetime = new DateTime(date('Y-m-d').' '.$end_time);
                                                    if($start_datetime > $end_datetime)
                                                    {
                                                        $start_datetime = new DateTime(date('Y-m-d',strtotime("-1 days")).' '.$start_time);
                                                    }
                                                    $interval = $start_datetime->diff($end_datetime);
                                                    echo $interval->format('%hh').' '.$interval->format('%im');*/?></h3>
                                            </div>
                                        </div>

                                        <div class="col-md-3 paddright02">
                                            <div class="London">
                                                <a href="#">{{$flight->o_arrival_time}}</a>
                                            </div>
                                            <h3 class="Heathrow">{{$flight->o_city}}</h3>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="textcolor002">
                                        <h3>{{$flight->o_airline}}</h3>
                                    </div>
                                </div>
                            </div>
                            <?php if($flight->inbound == 'on'){?>
                            <div class="row  bgair00131 bgair0013 rowmar">
                                <div class="col-md-1">
                                    <div class="bgair0012">
                                        <img class="bgair0014" src="{{asset('addbyme/images/air3white.png')}}">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row bgnila">
                                        <div class="col-md-3 paddright01">
                                            <div class="London">
                                                <a href="#">{{$flight->i_departure_time}}</a>
                                            </div>
                                            <h3 class="Heathrow">{{$flight->i_country}}</h3>
                                        </div>

                                        <div class="col-md-6 borpaddlondan">
                                            <div class="borLondon1">
                                                <h3>مدة الطيران</h3>
                                                <h3><?php /*
                                                    $start_time = $flight->i_departure_time;
                                                    $end_time = $flight->i_arrival_time;

                                                    $start_datetime = new DateTime(date('Y-m-d').' '.$start_time);
                                                    $end_datetime = new DateTime(date('Y-m-d').' '.$end_time);
                                                    if($start_datetime > $end_datetime)
                                                    {
                                                        $start_datetime = new DateTime(date('Y-m-d',strtotime("-1 days")).' '.$start_time);
                                                    }
                                                    $interval = $start_datetime->diff($end_datetime);
                                                    echo $interval->format('%hh').' '.$interval->format('%im');*/?></h3>
                                            </div>
                                        </div>

                                        <div class="col-md-3 paddright02">
                                            <div class="London">
                                                <a href="#">{{$flight->i_arrival_time}}</a>
                                            </div>
                                            <h3 class="Heathrow">{{$flight->i_city}}</h3>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="textcolor002">
                                        <h3>{{$flight->i_airline}}</h3>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    <?php } }?>
                    <div class="row rowmar arowdownbg">
                        <div class="col-md-12">
                            <div class="arowdown">
                                <p><a href="#"><i class="fa fa-angle-down"></i></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end of col-md-4--->

            <?php $i = 0; $old= -1; foreach($flights as $flight){ if( $flight->id != $old){ $old=$flight->id;?>
            <div class="col-md-4 pleft packagedetails <?php if($i == 0){echo 'firstpackage';$i++;}?>" id="details{{$flight->id}}">
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
                                <img src="{{asset('upload/photo/'.$flight->company_photo)}}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="Company">
                                <h4>{{$flight->travel_agency_name}}</h4>
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
                                <?php if($flight->seat >8 ){?>
                                <span><img src="{{asset('addbyme/images/mainicon.png')}}"> <b class="bgimages01">9+ </b></span>
                                <?php }else {?>
                                <span><img src="{{asset('addbyme/images/mainicon.png')}}"> <b class="bgimages02">{{$flight->seat}}</b></span>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row rowmar martop">
                        <div class="col-md-12">
                            <div class="time">
                                <h3>العرض ينتهي في</h3>
                                <p><i class="fa fa-clock-o"></i><span class="<?php if($i == 1){echo 'resttime';$i++;}?> timelist"></span><input type="hidden" value="{{date('Y-m-d', strtotime('+1 day', strtotime($flight->o_until)))}}"></p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ url('addappointmentflightnew') }}" method="POST">
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
                                        <span class="input-number-decrement rightnumber2 " id="adultrightnumber{{$flight->id}}">–</span><input class="input-number1 bornone input-number" readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1" id="adultleftnumber{{$flight->id}}">+</span>
                                        <input type="hidden" class="adultnumber" id="adultnumber{{$flight->id}}"  name="adult" value="0">
                                        <input type="hidden" value="{{$flight->id}}">
                                    </div>
                                <input type="hidden" id="adultstatus{{$flight->id}}" value="{{$flight->o_adult_b_status}}">
                                <?php if($flight->o_adult_b_status == 'on'){?> 
                                    <div style="text-align:center;    padding-top: 5px;">
                                        <input type="checkbox" class="adultcheckbox" id="adultcheckboxstatus{{$flight->id}}" style="    width: 20px; height: 20px;     position: absolute;" value="on" name="o_adult_b_status">
                                        <input type="hidden" value="{{$flight->id}}">
                                        <span style="padding-right: 30px;">درجة رجال الاعمال</span>
                                        <span id="adult_b_money{{$flight->id}}" style="color:#393939;display:none">{{$flight->o_adult_b}}</span>
                                        <span id="adultmoneyone{{$flight->id}}" style="color:#393939;display:none">{{$flight->o_adult}}</span>
                                    </div>
                                <?php }?>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="number">
                                        <h3><span>$</span><span id="adultmoney{{$flight->id}}" style="color:#393939">{{$flight->o_adult}}</span></h3>
                                    </div>
                                </div>

                            </div>
                            <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                                <div class="col-md-4">
                                    <div class="numbername">
                                        <h3>طفل</h3>
                                        <span>2-11</span>
                                    </div>
                                </div>

                                <div class="col-md-4 pright pleft ">
                                    <div class="borbox2">
                                        <span class="input-number-decrement rightnumber2">–</span><input class="input-number2 bornone input-number" readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                                        <input type="hidden" class="childnumber" id="childnumber{{$flight->id}}"  name="child" value="0">
                                        <input type="hidden" value="{{$flight->id}}">
                                    </div>
                                    <input type="hidden" id="childstatus{{$flight->id}}" value="{{$flight->o_child_b_status}}">
                                <?php if($flight->o_child_b_status == 'on'){?> 
                                    <div style="text-align:center;    padding-top: 5px;">
                                        <input type="checkbox" class="childcheckbox" id="childcheckboxstatus{{$flight->id}}" style="    width: 20px; height: 20px;     position: absolute;" value="on" name="o_child_b_status">
                                        <input type="hidden" value="{{$flight->id}}">
                                        <span style="    padding-right: 30px;">درجة رجال الاعمال</span>
                                        <span id="child_b_money{{$flight->id}}" style="color:#393939;display:none">{{$flight->o_child_b}}</span>
                                        <span id="childmoneyone{{$flight->id}}" style="color:#393939;display:none">{{$flight->o_child}}</span>
                                    </div>
                                <?php }?>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="number">
                                        <h3><span>$</span><span id="childmoney{{$flight->id}}" style="color:#393939">{{$flight->o_child}}</span></h3>
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
                                        <input type="hidden" class="infantnumber" id="infantnumber{{$flight->id}}" name="infant" value="0">
                                        <input type="hidden" value="{{$flight->id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="number">
                                        <h3><span>$</span><span id="infantmoney{{$flight->id}}" style="color:#393939">{{$flight->o_infant}}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="roomstatus{{$flight->id}}" value="{{$flight->o_infant_b_status}}">
                            <?php if($flight->o_infant_b_status == 'on'){?> 
                                <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                                    <div class="col-md-4">
                                        <div class="numbername">
                                            <h3>غرفة اضافية</h3>
                                            <span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 pright pleft ">
                                        <div class="borbox2">
                                            <span class="input-number-decrement rightnumber2">–</span><input class="input-number5 bornone input-number"  readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                                            <input type="hidden" class="roomnumber" id="roomnumber{{$flight->id}}" name="room" value="0">
                                            <input type="hidden" value="{{$flight->id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="number">
                                            <h3><span>$</span><span id="roommoney{{$flight->id}}" style="color:#393939">{{$flight->o_infant_b}}</span></h3>
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
                                <h3> <span>$</span><span id="totalmoney{{$flight->id}}" style="color:#393939;font-size:44px">0</span> </h3>
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
                        <input type="hidden" name="flight_id" value="{{$flight->id}}">
                    </form>

                    <div class="row rowmar">
                        <div class="col-md-12">
                            <div class="Publicprice">
                                <h3>سعر البيع للعامّة</h3>
                                <span><a href="#"><b>$</b>{{$flight->yousell}}</a></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php }}?>
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
    $('.bgcolorbox1').addClass('beforepackagetitle');
    $('.beforepackagetitle').removeClass('bgcolorbox1');
    $('.beforepackagetitle').addClass('hovermianbox0019');
    $('.packagetitle').removeClass('beforepackagetitle');
    $(this).addClass('bgcolorbox1');
    $(this).removeClass('hovermianbox0019');


    $('.timelist').removeClass('resttime');
    $('#'+$(this).find('input').val()).find('.timelist').addClass('resttime');
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
   total +=  Number($('#infantmoney'+package_id).text()) * Number($('#infantnumber'+package_id).val());
   if($('#roomstatus'+package_id).val() == 'on')
    total +=  Number($('#roommoney'+package_id).text()) * Number($('#roomnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.booknowbuttondiv').on('click',function(){
  $(this).next('input').click();
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
  $('.'+$("#seloffercountry").val()+'.'+$("#seloffercity").val()+'.packagetitle'+'.'+$("#seltrip").val()).show();
    for(var i=0;;i++)
    {
        if($('.packagetitle:eq( '+i+')').css("display")!='none')
        {
            $('.packagetitle:eq( '+i+')').trigger('click');
            break;
        }    
    }
})  
$('.adultcheckbox').on('click',function(){
    var package_id = $(this).next('input').val();
    if($('#adultcheckboxstatus'+package_id).is(':checked'))
    {
        $('#adultmoney'+package_id).text($('#adult_b_money'+package_id).text());
    }
    else
    {
        $('#adultmoney'+package_id).text($('#adultmoneyone'+package_id).text());
    }

    $('.adultnumber').val($('#adultnumber'+package_id).val()).trigger('change');
})
$('.childcheckbox').on('click',function(){
    var package_id = $(this).next('input').val();
    if($('#childcheckboxstatus'+package_id).is(':checked'))
    {
        $('#childmoney'+package_id).text($('#child_b_money'+package_id).text());
    }
    else
    {
        $('#childmoney'+package_id).text($('#childmoneyone'+package_id).text());
    }
    $('.childnumber').val($('#childnumber'+package_id).val()).trigger('change');
})

$('.infantcheckbox').on('click',function(){
    var package_id = $(this).next('input').val();
    if($('#infantcheckboxstatus'+package_id).is(':checked'))
    {
        $('#infantmoney'+package_id).text($('#infant_b_money'+package_id).text());
    }
    else
    {
        $('#infantmoney'+package_id).text($('#infantmoneyone'+package_id).text());
    }
    $('.infantnumber').val($('#infantnumber'+package_id).val()).trigger('change');
})
$('#refreshcircle').on('click',function(){
    var a = $('#country_to').val();
    $('#country_to').val($('#country_from').val());
    $('#country_from').val(a);
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