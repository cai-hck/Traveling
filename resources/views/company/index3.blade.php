@extends('layouts.app1')
@section('csscontent')
<link rel="stylesheet" type="text/css" href="{{asset('addbyme/css/chosen.css')}}">
@endsection
@section('content')
    <div class="mar2 mar0092">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <img src="{{asset('addbyme/images/pdf01.png')}}">
                        <h3>قدّم على الفيزا والمتابعة الكترونيا</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bgcolor4 rowmar">
            <div class="col-md-12">
                <div class="boxtitle fon-wight">
                    <h4>التصنيف حسب</h4>
                </div>
            </div>
            <?php $i = 0;if($i == 1){?>
            <div class="col-xl-3 col-lg-6 colmdwidth" style="display:none">
                <div class="inputselct">
                    <select class="productChosen form-control sortby" id="selcompanyname">
                        <option value="packagetitle"><span>اسم الشركة </span></option>
                        <?php foreach($companies as $company){?>
                            <option value="companyid{{$company->id}}">{{$company->travel_agency_name}}</option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <?php }?>
            <input type="hidden" value="packagetitle" id="selcompanyname">
            <div class="col-xl-3 col-lg-6 colmdwidth">
                <div class="inputselct">
                    <select class="productChosen form-control sortby" id="selcountryname">
                        <option value="packagetitle"><span>كل الدول</span></option>
                        <option value="تركيا"><span>تركيا</span></option>
                        <option value="ايران"><span>ايران</span></option>
                        <option value="الامارات"><span>الامارات</span></option>
                        <option value="سنغافورة"><span>سنغافورة</span></option>
                        <option value="الأردن"><span>الأردن</span></option>
                        <option value="فيتنام"><span>فيتنام</span></option>
                        <option value="الهند"><span>الهند</span></option>
                        <option value="السعودية"><span>السعودية</span></option>
                        <option value="قطر"><span>قطر</span></option>
                        <option value="اذرببجان"><span>اذرببجان</span></option>
                        <option value="مصر"><span>مصر</span></option>
                        <option value="عمان"><span>عمان</span></option>
                        <option value="تايلند"><span>تايلند</span></option>
                        <option value="كمبوديا"><span>كمبوديا</span></option>
                        <option value="سريلانكا"><span>سريلانكا</span></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Latest-Packages bgimages2">
    <div class="container topsection" style="top: -531px;">
        <div class="row">
            <div class="col-md-8 pright">
                <div class="box">
                    <div class="row rowmar Destinationpdd bookingdarection">
                        <div class="col-md-6">
                            <div class="boxtitle">
                                <h4><span>الدول</span></h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="boxtitle">
                                <h4> <span>العدد المنجز</span></h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="boxtitle">
                                <h4><span>عدد الايام لاصدار الفيزا</span></h4>
                            </div>
                        </div>
                    </div>
                    <?php  $i = 0; $old= -1;  foreach($visa as $visaone){if( $visaone->id != $old){ $old=$visaone->id;?>
                    <div class="mianbox0019 hovermianbox0019 bgair001301 <?php if($i == 0) {echo 'bgcolorbox1';} $i++;?> packagetitle companyid{{$visaone->company_id}} {{$visaone->name}}">
                        <input type="hidden" value="details{{$visaone->id}}">  
                        <div class="row  rowmar">
                            <div class="col-md-5">
                                <div class="bgair0012">
                                    <ul class="Processed_Visa">
                                        <li class="specal001" style="display:none">Special</li>
                                        <li class=""><img src="{{asset('addbyme/images/'.$visaone->name.'.png')}}" style="height:40px"></li>
                                        <li class="specal003">{{$visaone->name}}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">
                            <ul class="Visa001">
                                    <?php $p= 0;foreach($appointment as $appointmentone){if($visaone->id ==  $appointmentone->package_id){$p++;}}?>
                                    <li>{{$p}}</li>
                                    <li>فيزا <i class="fa fa-check"></i></li>
                            </ul>
                            </div>

                            <div class="col-md-3">
                                <div class="btnred002">
                                <button class="btn btn-yellow001">{{$visaone->days}} أيام</button>
                            </div>
                            </div>


                            <div class="col-md-12">
                                <div class="textcolor002">
                                    <h3>{{$visaone->info}}</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php } }?>

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
            <?php $i = 0; $old= -1; foreach($visa as $visaone){ if( $visaone->id != $old){ $old=$visaone->id;?>
            <div class="col-md-4 pleft packagedetails <?php if($i == 0){echo 'firstpackage';$i++;}?>" id="details{{$visaone->id}}">
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom bgrow">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>ابدأ بالتقديم على الفيزا</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row rowmar martop">
                        <div class="col-md-4">
                            <div class="circle">
                                <img src="{{asset('upload/photo/'.$visaone->company_photo)}}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="Company">
                                <h4>{{$visaone->travel_agency_name}}</h4>
                            </div>
                        </div>
                    </div>


                    <form action="{{ url('addappointmentvisa') }}" method="POST">
                        @csrf
                        <div class="boxcolorhow businessrow">
                            <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                                <div class="col-md-4">
                                    <div class="numbername">
                                        <h3>شخص</h3>
                                    </div>
                                </div>

                                <div class="col-md-4 pright pleft ">
                                    <div class="borbox2">
                                        <span class="input-number-decrement rightnumber2">–</span><input class="input-number1 bornone input-number"  readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                                        <input type="hidden" class="adultnumber" id="adultnumber{{$visaone->id}}" name="adult" value="0">
                                        <input type="hidden" value="{{$visaone->id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="number">
                                        <h3><span>$</span><span id="adultmoney{{$visaone->id}}" style="color:#393939">{{$visaone->cost}}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <?php if($visaone->set_1 == 'on'){?>
                            <div class="row rowmar martop bor-bottom paddrowbottom unaudltrow">
                                <div class="col-md-4">
                                    <div class="numbername">
                                        <h3>فيزا خاصة</h3>
                                    </div>
                                </div>

                                <div class="col-md-4 pright pleft ">
                                    <div class="borbox2">
                                        <span class="input-number-decrement rightnumber2">–</span><input class="input-number2 bornone input-number"  readonly  type="text" value="0" min="0" max="15"><span class="input-number-increment rightnumber1">+</span>
                                        <input type="hidden" class="childnumber" id="childnumber{{$visaone->id}}" name="child" value="0">
                                        <input type="hidden" value="{{$visaone->id}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="number">
                                        <h3><span>$</span><span id="childmoney{{$visaone->id}}" style="color:#393939">{{$visaone->cost_1}}</span></h3>
                                    </div>
                                </div>
                            </div>
                            <?php } else{?>
                                <input type="hidden" class="childnumber" id="childnumber{{$visaone->id}}" name="child" value="0">
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
                                    <h3> <span>$</span><span id="totalmoney{{$visaone->id}}" style="color:#393939;font-size:44px">0</span></h3>
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
                        <input type="hidden" name="visa_id" value="{{$visaone->id}}">
                    </form>

                </div>
            </div>
            <?php }}?>
        </div>
    </div>
</section>
        <!--end of container--->
@endsection
@section('jscontent')
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('addbyme/js/mian.js')}}"></script>
<!--end of js-->

<script>
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
});

$('.adultnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.childnumber').on('change',function(){
   var package_id = $(this).next('input').val();
   var total = 0;
   total +=  Number($('#adultmoney'+package_id).text()) * Number($('#adultnumber'+package_id).val());
   total +=  Number($('#childmoney'+package_id).text()) * Number($('#childnumber'+package_id).val());
   $('#totalmoney'+package_id).text(total);
});
$('.booknowbuttondiv').on('click',function(){
  $(this).next('input').click();
})

$('.sortby').on('change',function(){
  $('.packagetitle').hide();
  $('.packagedetails').hide();
  $('.'+$("#selcompanyname").val()+'.packagetitle'+'.'+$("#selcountryname").val()).show();
    for(var i=0;;i++)
    {
        if($('.packagetitle:eq( '+i+')').css("display")!='none')
        {
            $('.packagetitle:eq( '+i+')').trigger('click');
            break;
        }    
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
        }
      }
    }
  }
})();

inputNumber($('.input-number1'));
inputNumber($('.input-number2'));
</script>
@endsection