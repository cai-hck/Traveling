$(document).ready(function(){
    $('#resetmodal').click();
    $('#createaccountform').submit(function() {
        if($('#companyemailstatus').val() == 'good')
            return true;
        $.ajax({
            type:'post',
            url:'/emailcheck',
            data: {
                "email":$('#companyemail').val(),
                "_token":$('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {
                if(data == 'same')
                {      
                    $('#myModal3').modal('toggle');
                    $('#aftercreateaccount').click();
                    setTimeout(
                        function() {
                            $('#companyemailstatus').val('good');
                            $('#createaccountform').submit()
                        },
                        3000);
                }
                else
                {
                    alert('Already have same email.');
                    $('#companyemailstatus').val('bad');
                }           
                
            },
            failure:function(){
            }
        });
        return false; // return false to cancel form action
    });
    $('#loginform').submit(function() {
        if($('#loginstatus').val() == 'good')
            return true;
        $.ajax({
            type:'post',
            url:'/loginstatus',
            data: {
                "email":$('#loginemail').val(),
                "password":$('#myInput2').val(),
                "_token":$('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) { 
                if(data == 'same')
                {      
                    $('#loginstatus').val('good');
                    $('#loginform').submit()
                }
                else
                {
                    alert('Please input carefully.');
                    $('#loginstatus').val('bad');
                }           
                
            },
            failure:function(){
            }
        });
        return false; // return false to cancel form action
    });
    $('.datepickerall').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#admincity').on('change',function(){
        $.ajax({
            type:'post',
            url:'/getadminarea',
            data: {
                "arabic": $('#admincity').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $("#adminarea").empty();
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='" + data[i]['arabic']+"'>" + data[i]['arabic']+"</option>";
                }
                $("#adminarea").append(html);
            },
            failure:function(){
            }
        });
    })
    $('.visitorcity').on('change',function(){
        $.ajax({
            type:'post',
            url:'/getvisitorarea',
            data: {
                "arabic": $('.visitorcity').val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) {                  
                var data = JSON.parse(data);
                var html ="";
                $(".visitorarea").empty();
                for(var i =0;i<data.length;i++)
                {
                    html +="<option value='" + data[i]['arabic']+"'>" + data[i]['arabic']+"</option>";
                }
                $(".visitorarea").append(html);
            },
            failure:function(){
            }
        });
    })
    $('#forgotpasswordform').submit(function(){
        $.ajax({
            type:'post',
            url:'/forgotstatus',
            data: {
                "email":$('#forgotemail').val(),
                "_token":$('meta[name="csrf-token"]').attr('content'),
            },
            success:function(data) { 
                if(data == 'same')
                {      
                    alert('Please input email correctly.');
                }
                else
                {
                    alert('Please check your eamil Account.');
                }           
                
            },
            failure:function(){
            }
        });
        return false;
    });
    $('#resetpasswordform').submit(function() {
        if($('#newpassword').val() != $('#retypepassword').val())
        {
            alert('Please check password again.')
            return false; // return false to cancel form action
        }
        return true;
    });
    $('.followbutton').on('click',function(){
        $('#followcompanyname').text($(this).next('input').val());
        $('#followcompanyname1').text($(this).next('input').val());
        $('#followcompanyid').val($(this).next('input').next('input').val());
        $('#followmodal').click();
    })
});
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction2() {
    var x = document.getElementById("myInput2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction3() {
    var x = document.getElementById("newpassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function myFunction4() {
    var x = document.getElementById("retypepassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
function createaccountmodal() {
    $('#myModal5').modal('toggle');
    $('#createaccountbutton').click();
}
function createaccountmodal1() {
    $('#myModal13').modal('toggle');
    $('#createaccountbutton').click();
}
function forgotmodal() {
    $('#myModal5').modal('toggle');
    $('#forgotmodal').click();
}
function loginmodal() {
    $('#myModal3').modal('toggle');
    $('#loginbutton').click();
}