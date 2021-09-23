<html>
    
<?php  
$path_image = public_path('addbyme/images/');
$path_image1 = public_path('upload/photo/');
$path_image2 = public_path('upload/qr/');
$path_image3 = public_path('addbyme2/images/');
$path_image4 = public_path('addbyme2/fonts/');?>
<head>
    <!--title-->
    <title>Home-Table</title>
    <!--end of title-->

    <!--meta-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--end of meta-->
</head>
<style>
    body{ font-family: 'sf_pro_displayregular'!important; margin:0px; padding:0px;}

    @font-face {
        font-family: 'sf_pro_displayregular';
        src: url('../../../public/addbyme2/fonts/fontsfree-net-sfprodisplay-regular-webfont.woff2') format('woff2'),
            url('../../../public/addbyme2/fonts/fontsfree-net-sfprodisplay-regular-webfont.woff') format('woff');
        font-weight: normal;
        font-style: normal;

    }
</style>
<body style="font-family: 'sf_pro_displayregular'!important;margin:0px; padding:0px;">

<div class="maindiv" style="width:100%; margin: auto; background-color:#FBFCFD; padding: 0px 15px;">
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="color:#253858; text-align:left; padding-bottom: 5px; width:30%;"> 
                    <?php if($company->photo == 'CompanyDefault.png'){?>
                    <img src="{{$path_image3.'logo2.png'}}" style=" width:130px;">
                    <?php }else{?>
                    <img src="{{$path_image1.$company->photo}}" style=" width:130px;">
                    <?php }?>
                </td>
                <td style="font-size: 12px; color:#253858; text-align:center;width:40%;">
                    <b style="padding-top:28px;  padding-left: 20px;    font-size: 16px;">Reservation Confirmation<br/> <span style="font-size:14px;">ITINERARY RECEIPT</span>
                </td>
                <td style="font-size: 12px; color:#253858; text-align:right;  width:30%;">Date of Issue <span style="padding-left:10px;"><?php echo Date('d/m/Y');?></span></td>
            </tr>
        </tbody>
    </table>
    <div style="background-color:#D7D7D7;height:2px;width:100%;text-align:center;">
    </div>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="color: #253858; font-size:15px; font-weight:bold;padding: 10px 0px;width:50%;">Booking confirmation No: <b style="padding-left:15px; color:#000;"> #{{$request->appointmentid}}</b></td>
                <td colspan="2" style="text-align:right;width:50%;"><span style="color:#253858; background-color:#FFE380; padding: 2px 10px; font-size:12px;font-weight:bold; letter-spacing: 1px; text-transform:capitalize;">{{$package->id}}</span></td>
            </tr>
        </tbody>
    </table>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td colspan="3" style="background-color:#1561A8; color:#fff;">
                    <span style="display: flex;padding: 10px 5px 5px 5px; font-size:14px; font-weight:800;letter-spacing:1px;">Outbound Information <img style="padding-left:6px; position: relative;top: -5px;width:30px;" src="{{$path_image3.'icon.png'}}"></span>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px;">From</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center; width:33%;"type="text" name="text" value="{{$package->o_country}}/{{$package->o_air_country}}/{{$package->o_air_city}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px;">To</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_city}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Flight</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_more}}">
                </td>
            </tr>
            <tr>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Departure Date</span>
                    <br/>
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_departure}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Departure Time</span>
                    <br/>
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_departure_time}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">ArrivalTime</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_arrival_time}}">
                </td>
            </tr>
            <tr>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Airline</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->o_airline}}">
                </td>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Class</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="Economy">
                </td>
                <td  style="width:33%;">
                </td>
            </tr>
        </tbody>
    </table>
    <?php if($package->inbound == 'on'){ ?>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td colspan="3" style="background-color:#1561A8; color:#fff;">
                    <span style="display: flex;padding: 10px 5px 5px 5px; font-size:14px; font-weight:800;letter-spacing:1px;">Return Information <img style="padding-left:6px; position: relative;top: -5px;width:30px;" src="{{$path_image3.'icon.png'}}"></span>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">From</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_country}}/{{$package->i_air_country}}/{{$package->i_air_city}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px;">To</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_city}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Flight</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_more}}">
                </td>
            </tr>
            <tr>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Departure Date</span>
                    <br/>
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_departure}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Departure Time</span>
                    <br/>
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_departure_time}}">
                </td>
                <td style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">ArrivalTime</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_arrival_time}}">
                </td>
            </tr>
            <tr>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Airline</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="{{$package->i_airline}}">
                </td>
                <td  style="width:33%;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">Class</span>
                    <br/> 
                    <input style="background-color:#F0F0F0; border: 0px;padding: 13px 10px;text-align: center;width:33%;"type="text" name="text" value="Economy">
                </td>
                <td  style="width:33%;">
                </td>
            </tr>
        </tbody>
    </table>
    <?php }?>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td  style="width:33%;">
                </td>
                <td  style="width:33%;">
                </td>
                <td  style="width:33%;text-align: center;">
                    <span style="font-size:14px; font-weight:bold; color:#253858; letter-spacing:1px; ">PNR</span>
                    <br/> 
                    <img src="{{$path_image2.$name}}" style="width:150px;">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="background-color:#1561A8; color:#fff; padding:10px 5px;">
                    <span style="font-size:14px; font-weight:800;letter-spacing:1px;">Name of Travellers</span>
                </td>
            </tr>

            <tr style="background-image: {{$path_image3.'imagebg.png'}}; background-color:#fff;     background-repeat: no-repeat; background-position: center;">
                <td colspan="3" style="color: #253858; font-size:14px; line-height:30px; padding-left:20px; padding-right:20px;padding-bottom:60px;padding-top:15px;">
                    <?php foreach($visitors as $visitor){?>
                        <span>-{{$visitor->first_name}}/{{$visitor->last_name}}/{{$visitor->sex}}/{{$visitor->type}}</span>
                        <br/>
                    <?php }?>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td colspan="3">
                    <span style="display:flex;">
                        <img src="{{$path_image3.'unnamed.png'}}">
                        <b style="position: relative;top: 3px;left: 16px;letter-spacing: 1px;">Please Note</b>
                    </span>
                </td>
            </tr>

            <tr style="background-color:#F8F8F8">
                <td colspan="2" style="padding:20px; color:#000000; font-size:14px; letter-spacing:1px; font-weight:600;">Counter will be closed before 1 hour before the flight’s scheduled departure time</td>
                <td style="text-align: center;">
                    <img src="{{$path_image3.'unnamed1.png'}}"> 
                    <br/>
                    <span >Baggage allowance</span> 
                    <br/>
                    <span style=" color:#3685e7;">30 KG maximum</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; color:#FE1F1F; font-size:14px; font-weight:bold;letter-spacing:1px; padding:20px 20px; padding-bottom:30px;">يجب الحضور قبل ٣ ساعات الى المطار </td>
            </tr>
        </tbody>
    </table>
    
    <div style="background-color:black;height:1px;width:100%;text-align:center;">
    </div>
    <table class="table-responsive" style="width:100%;border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="font-size:12px; color:#000; padding:10px 0px; widht:60%;">Notice: Carriage and other services provided by the carrier are subject to General Condition of carriage which are hereby incorporated by reference</td>
                <td style="text-align: center; font-size:12px; font-weight:bold; letter-spacing: 1px;widht:20%;">
                    <span >Baghdad</span>
                    <br/>
                    <span>Turkey</span>
                </td>
                <td style="text-align: left; font-size:12px; font-weight:bold; letter-spacing: 1px;widht:20%;">
                    <span><img src="{{$path_image3.'phone.png'}}"> 07722272999</span> 
                </td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>