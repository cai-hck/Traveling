<!doctype html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8">
<title>Approve Company</title>

</head>

<body>
 
 
  <div class="container">
  	<table style="max-width: 600px;">
    <thead>
      <tr>
        <th style="color: #253858;font-size: 26px;font-weight: 500;display: block;margin-bottom: 30px;">إلى {{$name}}</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="color: #253858;font-size: 30px;font-weight: 700;line-height: 1;">تم تفعيل حسابك بنجاح<img src="{{asset('addbyme/images/confirmed.png')}}" style="margin-left: 20px;"></td>
      </tr>
      <tr>
        <td style="color: #253858;font-size: 26px;font-weight: 500;display: block;margin-top: 30px;">يمكنك تسجيل الدخول باستخدام البيانات التالية</td>
      </tr>
      <tr style="display: block;margin-top: 30px;">
        <td style="display: block;color: #253858;font-size: 26px;margin:0 0 20px 0px;font-weight: 500;">اسم المستخدم:<span style="margin-left: 20px;background-color: #547CAB;color: white;font-weight: 500;padding: 5px 10px;">{{$email}}</span></td>
      </tr>
      <tr>
      	<td style="color: #253858;font-size: 26px;font-weight: 700;display: block;margin-top: 30px;">يمكنك تسجيل الدخول باستخدام الرابط التالي</td>
      </tr>
      <tr>
      	<td style="font-size: 26px;font-weight: 700;display: block;margin: 10px auto;width: 50%;"><a style="color: #253858;" href="https://nalsahel.com/">https://nalsahel.com/</a></td>
      </tr>
      <tr style="border-bottom: 1px solid #253858;">
      	<td style="display: block;margin: 10px auto;width: 50%;"><img src="{{asset('addbyme/images/logo.png')}}"></td>
      </tr>
      <tr style="display: block;padding: 20px 0;width: 50%;margin: 0 auto;text-align: -webkit-center;">
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-facebook-f"></i></a></td>
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-twitter"></i></a></td>
      	<td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fab fa-instagram"></i></a></td>
      </tr>
    </tbody>
  </table>
  </div>
    
</body>
</html>
