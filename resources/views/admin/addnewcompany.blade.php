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
                <?php $g = 1;$k=1;foreach($companies as $compnay){?>
                    <div class="row linkprofile">
                        <input type="hidden" value="#profile{{$g}}">
                        <div class="col m6">
                            <p>{{$compnay->travel_agency_name}}</p>
                        </div>
                        
                        <div class="col m6">
                            <p>{{$compnay->city}} {{$compnay->area}}</p>
                        </div>
                    </div>
                    <?php $k=$g;$g++;}?>
            </div>
        </div>
    </div>
    <div class="col s18 m9">
        <div class="card">
            <div class="card-content">
            <?php $g =1;foreach($companies as $compnay) {?>
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
                                    <span>Mobile Number</span>
                                </div>
                                <div class="col m6">
                                    <span>{{$compnay->mobile_number}}</span>
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
                        </div>
                        <div class="row">
                            <div class="col m3" style="text-align:left">
                                <?php if($g > 1){?>
                                <a class="waves-effect waves-light btn-large linkprofile"><input type="hidden" value="#profile{{$g-1}}"><i class="material-icons left">skip_previous</i>Previous CP</a>         
                                <?php }?>
                            </div>
                            <div class="col m3" style="text-align:center">
                                <a class="waves-effect waves-light btn-large green approvecompnay">Approve</a> 
                                <input type="hidden" value="{{$compnay->id}}">
                            </div>
                            <div class="col m3" style="text-align:center">
                                <a class="waves-effect waves-light btn-large black declinecompnay">Decline</a> 
                                <input type="hidden" value="{{$compnay->id}}">
                            </div>
                            <div class="col m3" style="text-align:right">
                                <?php if($g < $k){?>
                                <a class="waves-effect waves-light btn-large linkprofile"><input type="hidden" value="#profile{{$g+1}}"><i class="material-icons right">skip_next</i>Next CP</a>
                                <?php }?>
                            </div>   
                        </div>
                    </div>
            <?php $g++;}?>
            </div>
        </div>
    </div>
</div>
<input id="saveid"  type="hidden">
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
    $('.approvecompnay').on('click',function(){
        var id = $(this).next('input').val();
        $(this).addClass("doctorapproved");
        $('#saveid').val(id);
        $.ajax({
            type:'post',
            url:'/admin/approvecompnay',
            data: {
                "id":  $('#saveid').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                $('.doctorapproved').removeClass('approvedoctor');
                $('.doctorapproved').text('Approved');
            },
            failure:function(){
            }
        });
    });
    $('.declinecompnay').on('click',function(){
        
        if (confirm('Are you sure?')) {
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
                    $('.declineapproved').parent('div').parent('div').find('.approvedoctor').addClass('doctorapproved');
                    $('.doctorapproved').removeClass('approvedoctor');
                    $('.doctorapproved').hide();
                },
                failure:function(){
                }
            });
        }
        else
        {

        }
    });
</script>
@endsection
