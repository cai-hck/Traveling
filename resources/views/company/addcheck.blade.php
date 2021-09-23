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
                            <li><a href="{{url('/addcheck')}}" id="pleasecheck" class="active1" style="<?php if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on'){echo 'display:none';}?>">اضافة /  التحقق من الرصيد (كروبات)</a></li>
                            <li><a href="{{url('/bookednew')}}" style="<?php if($company->addpackage != 'on'){echo 'display:none';}?>">العروض التي تمّ حجزها (خاص بالشركات)</a></li>
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
                <div class="box bg-gradient">
                    <div class="row rowmar Destinationpdd bor-bottom bgrow">
                        <div class="col-md-12">
                            <div class="boxtitle">
                                <h4>إضافة / التحقق من الرصيد</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bookingname">

                        <div class="row rowmar marbott03">
                            <div class="col-md-6 textright">
                                <div class="passport">
                                    <h4>تصنيف حسب</h4>
                                </div>

                                <div class="passport4">
                                    <select class="form-control Sort" id="sortby">
                                        <option value="id">الكل</option>
                                        <option value="id" style="display:none">الحساب (الأعلى الى الأقل)</option>
                                        <option value="id" style="display:none">الحساب (الأقل الى الأعلى)</option>
                                        <option value="notapprove">( عدم تأكيد التعامل)</option>
                                        <option value="approved">(تأكيد التعامل)</option>
                                        <option value="id" style="display:none">(الرصيد المتبقي)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="passport3">
                                    <h4>بحث عن طريق رقم معرّف الشركة ID</h4>

                                    <form class="form-inline">
                                        <div class="input-group">
                                        <input type="number" class="form-control" id="filterbyid">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div style="height:2px;width:100%;background-color:black;"></div>
                        <?php $co = 0;foreach($companylist as $companyone){
                                    $st = 0;
                                    foreach($moneylist as $money)
                                    {
                                        if($companyone->id == $money->approve_id)
                                        {
                                            $st = 1;
                                            break;
                                        }
                                    }
                                if($st == 0){
                                ?>
                                <div class=" bor-bottom normalpdd id{{$companyone->id}} id notapprove">
                                    <div class="row rowmar">
                                        <div class="col-md-6">
                                            <div class="row rowmar checkblance">
                                                <div class="col-md-4 paddimages11">
                                                    <div class="circlemain">
                                                        <img src="{{asset('upload/photo/'.$companyone->photo)}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="Company">
                                                        <h4>{{$companyone->travel_agency_name}}  <img src="{{asset('addbyme/images/badge.png')}}"></h4>
                                                        <div class="checkblancebox">
                                                            <input type="checkbox" class="apprvoecheck" id="checkbox{{$companyone->id}}" name="" value="{{$companyone->id}}">
                                                            <label><span>عدم تأكيد التعامل</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="blance3">
                                                <h4>الحساب</h4>
                                                <p>$0</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="blance3">
                                                <h4>الرصيد المتبقي</h4>
                                                <p class="bgp01">$0</p> <span class="plusefa" style="display:none;"> <i class="fa fa-plus"></i> </span>
                                                <input type="hidden" value="{{$companyone->id}}">
                                                <input type="hidden" value="{{$companyone->travel_agency_name}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row rowmar">
                                        <div class="col-md-6">
                                            <a href="javaScript:void(0);" class="btn btndet">ID {{$companyone->id}}</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="javaScript:void(0);" class="btn btndet clearbutton" style="background-color:red;display:none;" >تصفير</a>
                                            <input type="hidden" value="{{$companyone->id}}">
                                            <input type="hidden" value="0">
                                            <input type="hidden" value="{{$companyone->travel_agency_name}}">
                                        </div>

                                    </div>
                                </div>
                        <?php } else {?>
                                <div class=" bor-bottom normalpdd id{{$companyone->id}} id <?php if($money->status == 'on'){echo 'approved';}else{echo 'notapprove';}?>">
                                    <div class="row rowmar">
                                        <div class="col-md-6">
                                            <div class="row rowmar checkblance">
                                                <div class="col-md-4 paddimages11">
                                                    <div class="circlemain">
                                                        <img src="{{asset('upload/photo/'.$companyone->photo)}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="Company">
                                                        <h4>{{$companyone->travel_agency_name}}  <img src="{{asset('addbyme/images/badge.png')}}"></h4>
                                                        <div class="checkblancebox">
                                                            <?php if($money->status == 'on'){$co++;?>
                                                            <input type="checkbox" class="apprvoecheck" id="checkbox{{$companyone->id}}" name="" value="{{$companyone->id}}" checked>
                                                            <label ><span>تأكيد التعامل</span></label>
                                                            <?php }else {?>
                                                            <input type="checkbox" class="apprvoecheck" id="checkbox{{$companyone->id}}" name="" value="{{$companyone->id}}">
                                                            <label ><span>عدم تأكيد التعامل</span></label>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="blance3">
                                                <h4>الحساب</h4>
                                                <p>${{$money->balance}}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="blance3">
                                                <h4>الرصيد المتبقي</h4>
                                                <p class="bgp01">${{$money->remain}}</p> <span class="plusefa" style="display:none;"> <i class="fa fa-plus"></i> </span>
                                                <input type="hidden" value="{{$companyone->id}}">
                                                <input type="hidden" value="{{$companyone->travel_agency_name}}">
                                                
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row rowmar">
                                        <div class="col-md-6">
                                            <a href="javaScript:void(0);" class="btn btndet">ID {{$companyone->id}}</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="javaScript:void(0);" class="btn btndet clearbutton" style="background-color:red; display:none;">تصفير</a>
                                            <input type="hidden" value="{{$companyone->id}}">
                                            <input type="hidden" value="{{$money->balance}}">
                                            <input type="hidden" value="{{$companyone->travel_agency_name}}">
                                            
                                        </div>

                                    </div>
                                </div>
                        <?php }}?>
                    </div>

                </div>
            </div>
            <!--end of col-md-8-->
          </div>
      </div>

</section>
<input type="hidden" id="approve_company_id">
<div class="modal fade" id="myModal11">
    <div class="modal-dialog modal-dialog-centered">
        <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <div class="modal-content" style="border-radius: 2.3rem;"> 
            <div class="modal-header d-block" >
                <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                <p style="text-align:center!important;font-size: x-large;">Eidt Credit to <span id="addmoney_company_id"></span></p>
            </div>
            <!-- Modal body -->
            <div class="modal-body w-100 text-center"> 
                <div class="row text-center" style="display: block;">
                    <span style="    font-size: 60px;">$</span><input type="number" id="addmoneynumber"style="    padding-top: 10px;   height: 50px;   text-align: center;   font-size: 35px;   width: 210px;}" min="1" value="1">
                </div>
            </div>  
            <!-- Modal footer -->
            <div class="modal-footer conts" style="    justify-content: center;">
                <div class="row" style="text-align:center;">
                    <div class="col-md-6">
                        <button id="confirmmodal"  style="color:white;    width: 200px;    height: 50px;    background: red;     border: none;   border-radius: 3%;    font-size: x-large;">+</button>
                    </div>
                    <div class="col-md-6">
                        <button id="cancelmodal" style="color:white;    width: 200px;    height: 50px;    background: #409A16;      border: none;  border-radius: 3%;    font-size: x-large;">-</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<a id="addmoney" data-toggle="modal" data-target="#myModal11"></a>
<div class="modal fade" id="myModal1111">
    <div class="modal-dialog modal-dialog-centered">
        <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <div class="modal-content" style="border-radius: 2.3rem;"> 
            <div class="modal-header d-block" >
                <img src="{{asset('addbyme/images/logo.png')}}" class="img-fluid">
                <p style="text-align:center!important;font-size: 20px;">هل متأكد من تصفير حساب شركة <span id="company_name"></span>? </p>
            </div>
            <!-- Modal body -->
            <div class="modal-body w-100 text-center"> 
                <div class="row text-center" style="display: block;font-size: 60px;">
                    <span  id="balancenumber" style="    padding-top: 10px;   height: 50px;   text-align: center;    width: 210px;"></span>
                </div>
                <div class="row text-center" style="display: block;">
                    <span style="    font-size: 20px;background-color:red;color:white;padding-right:10px;padding-left:10px;    border-radius: 10px;    padding-top: 5px;  padding-bottom: 0px;">للتنويه بعد تأكيد تصفير الحساب لا يمكنك تغييره</span>
                </div>
            </div>  
            <!-- Modal footer -->
            <div class="modal-footer conts" style="    justify-content: center;">
                <div class="row" style="text-align:center;">
                    <div class="col-md-6">
                        <button id="confirmmodal_1"  style="color:white;    width: 200px;    height: 50px;    background: red;     border: none;   border-radius: 3%;    font-size: x-large;">نعم</button>
                    </div>
                    <div class="col-md-6">
                        <button id="cancelmodal_1" style="color:white;    width: 200px;    height: 50px;    background: #409A16;      border: none;  border-radius: 3%;    font-size: x-large;">لا</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
<a id="clearmoney" data-toggle="modal" data-target="#myModal1111"></a>
<input type="hidden" id="approve_number" value="{{$company->approve_number}}">
<input type="hidden" id="approve_number_c" value="{{$co}}">
@endsection
@section('jscontent')
<script>
    /*$('.apprvoecheck').on('click',function(){
        $('#approve_company_id').val($(this).val());
        if($(this).next('label').find('span').text()  == 'تأكيد التعامل')
        {
            $.ajax({
                type:'post',
                url:'/approvecheck',
                data: {
                    "company_id": $('#approve_company_id').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {
                },
                failure:function(){
                }
            });
            $(this).next('label').find('span').text('عدم تأكيد التعامل');
            $(this).closest('.normalpdd').addClass('notapprove');
            $(this).closest('.normalpdd').removeClass('approved');
            var  s =  Number($('#approve_number_c').val());
            s--;
            $('#approve_number_c').val(s);
        }
        else if(Number($('#approve_number').val()) > Number($('#approve_number_c').val()))
        {
            $.ajax({
                type:'post',
                url:'/approvecheck',
                data: {
                    "company_id": $('#approve_company_id').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {
                },
                failure:function(){
                }
            });
            $(this).next('label').find('span').text('تأكيد التعامل');
            $(this).closest('.normalpdd').addClass('approved');
            $(this).closest('.normalpdd').removeClass('notapprove');
            var  s =  Number($('#approve_number_c').val());
            s++;
            $('#approve_number_c').val(s);
        }
        else
        {
            alert("You can't approve more.");
            $(this). prop("checked", false);
        }
    })
    $('.plusefa').on('click',function(){
        $('#approve_company_id').val($(this).next('input').val());
        $('#addmoney_company_id').text($(this).next('input').next('input').val());
        $('#addmoney').click();
    });
    $('#cancelmodal').on('click',function(){
        $('#myModal11').modal('toggle');
        $.ajax({
            type:'post',
            url:'/deletemoney',
            data: {
                "company_id": $('#approve_company_id').val(),
                "money_number": $('#addmoneynumber').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {
                $("#pleasecheck").get(0).click();
            },
            failure:function(){
            }
        });
    });
    $('#confirmmodal').on('click',function(){
        $('#myModal11').modal('toggle');
        $.ajax({
            type:'post',
            url:'/addmoney',
            data: {
                "company_id": $('#approve_company_id').val(),
                "money_number": $('#addmoneynumber').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {
                $("#pleasecheck").get(0).click();
            },
            failure:function(){
            }
        });
    });
    $('.clearbutton').on('click',function(){
        $('#approve_company_id').val($(this).next('input').val());
        $('#balancenumber').text('$'+$(this).next('input').next('input').val());
        $('#company_name').text($(this).next('input').next('input').next('input').val());
        $('#clearmoney').get(0).click();
    })
    $('#confirmmodal_1').on('click',function(){
        $('#myModal1111').modal('toggle');
        $.ajax({
            type:'post',
            url:'/clearmoney',
            data: {
                "company_id": $('#approve_company_id').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {
                $("#pleasecheck").get(0).click();
            },
            failure:function(){
            }
        });
    });
    $('#cancelmodal_1').on('click',function(){
        $('#myModal1111').modal('toggle');
        
    });*/
    $('#filterbyid').on('input',function(){
        $('.id').hide();
        $('.id'+$('#filterbyid').val()+'.'+$('#sortby').val()).show();
    });
    $('#sortby').on('change',function(){
        $('.id').hide();
        $('.id'+$('#filterbyid').val()+'.'+$('#sortby').val()).show();
    })
</script>
@endsection