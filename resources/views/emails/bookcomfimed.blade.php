<!doctype html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8">
<title>Booking Comfimed</title>
<link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="container">
  	<table style="max-width: 800px;">
  		<thead>
  			<tr>
  				<th>
  					<img src="{{asset('addbyme/images/logo.png')}}">
  				</th>
  			</tr>
  			<tr style="text-align:-webkit-center;display: block;margin-top: 30px;margin-bottom: 30px;">
  				<th>
  					<img src="{{asset('addbyme/images/confirmed.png')}}">
  				</th>
  			</tr>
  			<tr style="text-align: center;">
  				<th style="color: #253858;font-size: 40px;font-weight: 700;">تم تأكيد الحجز</th>
  			</tr>
  			<tr style="text-align: center;">
  				<th style="color: #253858;font-size: 28px;font-weight: 600;"><span>رقم تأكيد الحجز هو :</span><span style="background-color: #D22261;border-radius: 10px;padding: 5px 10px;color: white;font-weight: 600;margin-left: 10px;"> #{{$goodid}}</span></th>
  			</tr>
  		</thead>
  		<tbody>
  			<tr>
  				<td style="color: #253858;font-size: 28px;font-weight: 700;display: block;margin-top: 30px;">لإجراء عملية الدفع يرجى زيارة مقر الشركة ({{$package->travel_agency_name}}) قبل انتهاء مدة العرض في {{date('d/m/Y')}}</td>
  			</tr>
  			<tr>
  				<th style="display: block;color: #393939;font-size: 26px;line-height: 40px;margin-top: 25px;text-align: right;">عنوان الشركة</th>
  				<td style="display: block;color: #393939;font-size: 22px;line-height: 50px;">{{$package->address}}</td>
  			</tr>
  			<tr>
  				<th style="display: block;color: #393939;font-size: 26px;line-height: 40px;margin-top: 25px;text-align: right;">رقم الهاتف</th>
  				<td style="display: block;color: #393939;font-size: 22px;line-height: 50px;">{{$package->travel_agency_phone_number}}</td>
  			</tr>
  			<tr>
  				<th style="display: block;color: #393939;font-size: 26px;line-height: 40px;margin-top: 25px;text-align: right;">ساعات العمل</th>
  				<td style="display: block;color: #393939;font-size: 22px;line-height: 50px;">{{$package->start_date}} - {{$package->end_date}}   
            {{$package->start_time % 12 }}:00<?php if($package->start_time >12){echo 'PM';}else if($package->start_time >0 &&$package->start_time <=12){echo 'AM';}?> 
            - {{$package->end_time % 12 }}:00<?php if($package->end_time >12){echo 'PM';}else if($package->end_time >0 &&$package->end_time <=12){echo 'AM';}?></td>
  			</tr>
  			<tr style="text-align: center;display: block;margin-top: 30px;">
  				<td style="display: inline-block;font-size: 18px;margin-right: 10px;">شارك</td>
  				<td style="display: inline-block;border-radius: 50%;width: 30px;height: 30px;margin: 0 3px;"><a style="color: white;font-size: 13px;" href="#"><img src="{{asset('addbyme/images/t-3.png')}}" style="width:30px;"></a></td>
  				<td style="display: inline-block;border-radius: 50%;width: 30px;height: 30px;margin: 0 3px;"><a style="color: white;font-size: 13px;" href="#"><img src="{{asset('addbyme/images/t-1.png')}}" style="width:30px;"></a></td>
  				<td style="display: inline-block;border-radius: 50%;width: 30px;height: 30px;margin: 0 3px;"><a style="color: white;font-size: 13px;" href="#"><img src="{{asset('addbyme/images/whatsapp.svg')}}" style="width:30px;"></a></td>
  			</tr>
  		</tbody>
  	</table>
  </div>
  
</body>
</html>
