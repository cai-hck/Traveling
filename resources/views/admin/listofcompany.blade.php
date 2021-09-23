@extends('admin.layout.default')
@section('css')
@endsection


@section('content')
{{-- Tables --}}
<div class="row">
    <div class="col s6 m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title">New Compnay - Activation Process</span>
                <?php $g = 1;$k=1;foreach($companies as $compnay){ if($compnay->company_id == 1 || $compnay->company_id == null){?>
                    <div class="row linkprofile">
                        <input type="hidden" value="#profile{{$g}}">
                        <div class="col m6">
                            <p>{{$compnay->travel_agency_name}}</p>
                        </div>
                        
                        <div class="col m6">
                            <p>{{$compnay->city}} {{$compnay->area}}</p>
                        </div>
                    </div>
                    <?php $k=$g;$g++;}}?>
            </div>
        </div>
    </div>
    <div class="col s18 m9">
        <div class="card">
            <div class="card-content">
            <?php $g =1;foreach($companies as $compnay) { if($compnay->company_id == 1 || $compnay->company_id == null){?>
                    <div class="bigphoto" id="profile{{$g}}" style="display:none">
                        <div style="padding:10px">
                            <div class="row">
                                <div class="col m6">
                                    <span>First Name</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->first_name}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Last Name</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->last_name}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Travel Agency Name</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->travel_agency_name}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Email</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->email}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>ID</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->id}}</span>
                                </div>
                            </div>
                            <?php if(Auth::user()->designation == 'Manager'){?>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Mobile Number</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->mobile_number}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>City</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->city}}</span>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Area</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->area}}</span>
                                </div>
                            </div>
                            <div style="height: 5px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Admin Balance</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->balance}}</span><a class="btn-floating error-bg" onclick="return confirm('Are you sure?')" href="{{ url('/admin/clear/'.$compnay->id)}}" style="text-align:center">Clear</a>
                                </div>
                            </div>
                            <div style="height: 5px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Turkey Visa</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->turkey}}    </span><a class="btn-floating error-bg" onclick="return confirm('Are you sure?')" href="{{ url('/admin/turkey/'.$compnay->id)}}" style="text-align:center">Set</a>
                                </div>
                            </div>
                            <div style="height: 5px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Add Flight</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="addflight" class="setstatus" <?php if($compnay->addflight == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Add Package</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="addpackage" class="setstatus" <?php if($compnay->addpackage == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Add Visa</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="addvisa" class="setstatus" <?php if($compnay->addvisa == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m3">
                                    <span>Current Approve User</span>
                                </div>
                                <div class="col m3">
                                    <input type="text" id="oldnumber{{$compnay->id}}" value="{{$compnay->approve_number}}" readonly>
                                </div>
                                <div class="col m3">
                                    <span>User Can Approve User</span>
                                </div>
                                <div class="col m2">
                                    <input type="text" id="number{{$compnay->id}}">
                                </div>
                                <div class="col m1">
                                    <a class="btn-floating error-bg numberset" style="text-align:center" href="#">Set</a>
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                            </div>
                            <?php }?>
                            <div style="height: 5px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Flight Booking</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="bookflight" class="setstatus" <?php if($compnay->bookflight == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Package Booking</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="bookpackage" class="setstatus" <?php if($compnay->bookpackage == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Apply for Visa</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="bookvisa" class="setstatus" <?php if($compnay->bookvisa == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 5px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m6">
                                    <span>Approve</span>
                                </div>
                                <div class="col m6">
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input type="checkbox" name="approve_status" class="approve_status" <?php if($compnay->money_status == 'on'){echo 'checked';}?> value="{{$compnay->id}}">
                                            <span class="lever"></span>
                                            On
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 1px; background: #EFEFF4;"></div>
                            <div class="row">
                                <div class="col m1">
                                    <span>Remain</span>
                                </div>
                                <div class="col m2">
                                    <input type="text" id="remain{{$compnay->id}}" value="{{$compnay->remain}}" readonly>
                                </div>
                                <div class="col m1">
                                    <span>Balance</span>
                                </div>
                                <div class="col m2">
                                    <input type="text" id="balance{{$compnay->id}}" value="{{$compnay->balance}}" readonly>
                                </div>
                                <div class="col m2">
                                    <input type="text" id="addremain{{$compnay->id}}">
                                </div>
                                <div class="col m2">
                                    <a class="btn-floating error-bg addremain" style="text-align:center" href="#">Add</a>
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <div class="col m2">
                                    <a class="btn-floating error-bg clearbalance" style="text-align:center" href="#">Clear</a>
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m3" style="text-align:left">
                                <?php if($g > 1){?>
                                <a class="waves-effect waves-light btn-large linkprofile"><input type="hidden" value="#profile{{$g-1}}"><i class="material-icons left">skip_previous</i>Previous CP</a>
                                <?php }?>
                            </div>
                            <?php if(Auth::user()->designation == 'Manager'){?>
                                <div class="col m3" style="text-align:center">
                                    <a class="waves-effect waves-light btn-large black declinecompnay">Decline</a> 
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <?php if($compnay->status == 'on'){?>
                                <div class="col m3" style="text-align:center">
                                    <a class="waves-effect waves-light btn-large black suspendcompnay">Suspend</a> 
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <?php }else {?>
                                <div class="col m3" style="text-align:center">
                                <a class="waves-effect waves-light btn-large black suspendedcompnay">unSuspend</a> 
                                <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <?php }?>
                            <?php }else {?>
                                <?php if($compnay->status == 'on'){?>
                                <div class="col m6" style="text-align:center">
                                    <a class="waves-effect waves-light btn-large black suspendcompnay">Suspend</a> 
                                    <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <?php }else {?>
                                <div class="col m6" style="text-align:center">
                                <a class="waves-effect waves-light btn-large black suspendedcompnay">unSuspend</a> 
                                <input type="hidden" value="{{$compnay->id}}">
                                </div>
                                <?php }?>
                            <?php }?>
                            <div class="col m3" style="text-align:right">
                                <?php if($g < $k){?>
                                <a class="waves-effect waves-light btn-large linkprofile"><input type="hidden" value="#profile{{$g+1}}"><i class="material-icons right">skip_next</i>Next CP</a>
                                <?php }?>
                            </div>   
                        </div>
                    </div>
            <?php $g++;}}?>
            </div>
        </div>
    </div>
</div>
<input id="saveid"  type="hidden">
<input id="savename"  type="hidden">
@endsection
@section('jsPostApp')        

<script>
    $('.linkprofile').on('click',function(){
        var id = $(this).find('input').val();
        $('.showphoto').hide();
        $('.bigphoto').removeClass('showphoto');
        $(id).addClass('showphoto');
        $(id).show();
    })
    $('.declinecompnay').on('click',function(){
        if (confirm('Are you sure?')) {
            // Save it!
            var id = $(this).next('input').val();
            $(this).addClass("declineapproved");
            $('#saveid').val(id);
            $.ajax({
                type:'post',
                url:'/admin/declinecompnay',
                data: {
                    "id":  $('#saveid').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {                  
                    $('.declineapproved').removeClass('declinedoctor');
                    $('.declineapproved').text('Declined');
                },
                failure:function(){
                }
            });
        } else {
            // Do nothing!
        }
        
    });
    $('.suspendcompnay').on('click',function(){
        if (confirm('Are you sure?')) {
            // Save it!
            var id = $(this).next('input').val();
            $(this).addClass("suspendedcompnay1");
            $('#saveid').val(id);
            $.ajax({
                type:'post',
                url:'/admin/suspendcompnay',
                data: {
                    "id":  $('#saveid').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {                  
                    $('.suspendedcompnay1').removeClass('suspendcompnay');
                    $('.suspendedcompnay1').text('unSuspend');
                    $('.suspendedcompnay1').addClass("suspendedcompnay");
                    $('.suspendedcompnay').removeClass('suspendedcompnay1');
                },
                failure:function(){
                }
            });
        } else {
            // Do nothing!
        }
        
    });
    $('.suspendedcompnay').on('click',function(){
        if (confirm('Are you sure?')) {
            // Save it!
            var id = $(this).next('input').val();
            $(this).addClass("suspendcompnay1");
            $('#saveid').val(id);
            $.ajax({
                type:'post',
                url:'/admin/unsuspendcompnay',
                data: {
                    "id":  $('#saveid').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {                  
                    $('.suspendcompnay1').removeClass('suspendedcompnay');
                    $('.suspendcompnay1').text('Suspend');
                    $('.suspendcompnay1').addClass("suspendcompnay");
                    $('.suspendcompnay').removeClass('suspendcompnay1');
                },
                failure:function(){
                }
            });
        } else {
            // Do nothing!
        }
        
    });
    $('.setstatus').on('change',function(){
            var id = $(this).val();
            $('#saveid').val(id);
            $('#savename').val($(this).attr('name'));
            $.ajax({
                type:'post',
                url:'/admin/setcompanystatus',
                data: {
                    "id":  $('#saveid').val(),
                    "name":  $('#savename').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {                  
                },
                failure:function(){
                }
            });
    })
    $('.numberset').on('click',function(){
            var id = $(this).next('input').val();
            $('#saveid').val(id);
            $('#savename').val($('#number'+id).val());
            $.ajax({
                type:'post',
                url:'/admin/setcompanynumber',
                data: {
                    "id":  $('#saveid').val(),
                    "name":  $('#savename').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {      
                    var id = $('#saveid').val();
                    $('#oldnumber'+id).val($('#savename').val());
                },
                failure:function(){
                }
            });
    })
    $('.approve_status').on('click',function(){
            var id = $(this).val();
            $('#saveid').val(id);
            $.ajax({
                type:'post',
                url:'/admin/approvecheck',
                data: {
                    "company_id":  $('#saveid').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {      
                },
                failure:function(){
                }
            });
    })
    $('.addremain').on('click',function(){
        var id = $(this).next('input').val();
        $('#saveid').val(id);
        $('#savename').val($('#addremain'+id).val());
        $.ajax({
            type:'post',
            url:'/admin/addmoney',
            data: {
                "company_id":  $('#saveid').val(),
                "money_number":  $('#savename').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {      
                var id = $('#saveid').val();
                $('#remain'+id).val(Number($('#remain'+id).val())+Number($('#savename').val()));
            },
            failure:function(){
            }
        });
    })
    $('.clearbalance').on('click',function(){
            var id = $(this).next('input').val();
            $('#saveid').val(id);
            $.ajax({
                type:'post',
                url:'/admin/clearmoney',
                data: {
                    "company_id":  $('#saveid').val(),
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data) {   
                    var id = $('#saveid').val();
                    $('#remain'+id).val(Number($('#remain'+id).val())+Number($('#balance'+id).val()));   
                    $('#balance'+id).val(0);
                },
                failure:function(){
                }
            });
    })
</script>
@endsection
