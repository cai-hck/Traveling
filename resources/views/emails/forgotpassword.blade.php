<!doctype html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8">
<title>Forgot Password</title>

</head>

<body>


  
  <div class="container">
  	<table style="max-width: 850px;">
  		<thead style="text-align: center;">
  			<tr>
  				<th><img src="{{asset('addbyme/images/logo.png')}}"></th>
  			</tr>
  		</thead>
  		<tbody>
  			<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 45px;">إلى {{$user->name}}</td></tr>
  			<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 45px;">لإعادة تعيين كلممة المرور لحسابك, يرجى الضغط على الرابط التالي:</td></tr>
  			<tr><td style="display: block;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 30px;"><a style="color: #253858;" href="{{url('https://nalsahel.com/resetpassword/'. $user->api_token)}}">https://nalsahel.com/resetpassword/{{$user->api_token}}</a></td></tr>
  			<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 45px;">لمعلومات:</td></tr>
  			<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 45px;">
			  اسم المستخدم       <span>: {{$user->email}}</span>
</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 45px;">
		 تاريخ الطلب <span>: <?php 
                  $monthNum  = date('m'); 
                  $dayNum  = date('d'); 
                  $yearNum  = date('Y'); 
                  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                  $dateObj1   = DateTime::createFromFormat('!d', $dayNum);
                  $monthName = $dateObj->format('F');
                  $dayName = $dateObj1->format('D');
                  echo $dayName.','.$dayNum.' '.$monthName.' '.$yearNum;
                  ?>
                    </span>
</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 40px;">اذا لم يكن الرابط قابل للنقر فيرجى استنساخ الرابط في عنوان محرك البحث
</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 20px;">
		 اذا كان لديك اي اسألة او استفسارات فيرجى الاتصال بنا من خلال الرابط التالي

</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 40px;">
 Sincerely,
</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 20px;">
		 فريق العراقي للسفر والسياحة
</td></tr>
 		<tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 20px;margin-bottom: 30px;">
 <a style="color: #253858;" href="https://nalsahel.com">https://nalsahel.com</a>
</td></tr>
		<tr style="text-align: center;">
			<td style="display: block;margin: 10px auto;width: 50%;"><img src="{{asset('addbyme/images/logo.png')}}"></td>
		</tr>
 		<tr style="text-align: center;"><td style="display: block;color: #253858;font-size: 24px;font-weight: 600;line-height: 1;margin-top: 20px;margin-bottom: 30px;">
		 فريق العراقي للسفر والسياحة
</td></tr>
 		<tr style="display: block;padding: 20px 0;width: 50%;margin: 0 auto;text-align: -webkit-center;border-top: 1px solid #253858;">
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-facebook-f"></i></a></td>
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-twitter"></i></a></td>
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-instagram"></i></a></td>
      </tr>
  		</tbody>
  	</table>
  </div>
  

	
</body>
</html>
