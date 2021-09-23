<!doctype html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8">
<title>Follow Company</title>
</head>

<body>
 

  


  <div class="container">
    <table style="max-width: 820px;">
      <thead>
        <tr>
          <th><img src="{{asset('addbyme/images/logo.png')}}"></th>
        </tr>
      </thead>
      <tbody>
        <tr><td style="display: block;color: #253858;font-size: 30px;font-weight: 700;line-height: 1;margin-top: 30px;">إلى {{$user1->fname}} {{$user1->lname}}</td></tr>
        <tr><td style="display: block;color: #253858;font-size: 48px;font-weight: 700;line-height: 1;margin-top: 30px;">تم اضافة عروض جديدة من قبل</td></tr>
        <tr><td style="display: block;width: 92px;height: 92px;border: 2px solid black;border-radius: 50%;margin: auto;"><img src="{{asset('upload/photo/'.$package[0]->company_photo)}}" style="    width: 100%; border-radius: 50%;   height: 92px;"></td></tr>
        <tr style="text-align: center;">
          <td style="font-size: 30px;color: #393939;font-weight: 700;">
          {{$package[0]->travel_agency_name}}<img src="{{asset('addbyme/images/Capture.png')}}">
          </td>
        </tr>
        <tr style="text-align: center;">
          
          <?php if($package[0]->whatsapp != '') {?>
             <td style="display: inline-block;width: 30px;height: 30px;border-radius: 50%;font-size: 19px;margin: 5px;"><a href="{{$package[0]->whatsapp}}"><img src="{{asset('addbyme/images/whatsapp.svg')}}" style="width:30px;"></a></td>
          <?php }?>
          <?php if($package[0]->instagram != '') {?>
             <td style="display: inline-block;width: 30px;height: 30px;border-radius: 50%;font-size: 19px;margin: 5px;"><a href="{{$package[0]->instagram}}"><img src="{{asset('addbyme/images/t-4.png')}}" style="width:30px;"></a></td>
          <?php }?>
          <?php if($package[0]->facebook != '') {?>
              <td style="display: inline-block;width: 30px;height: 30px;border-radius: 50%;font-size: 19px;margin: 5px;"><a href="{{$package[0]->facebook}}"><img src="{{asset('addbyme/images/t-3.png')}}" style="width:30px;"></a></td>
          <?php }?>
          <?php if($package[0]->twitter != '') {?>
              <td style="display: inline-block;width: 30px;height: 30px;border-radius: 50%;font-size: 19px;margin: 5px;"><a href="{{$package[0]->twitter}}"><img src="{{asset('addbyme/images/t-1.png')}}" style="width:30px;"></a></td>
          <?php }?>
          <?php if($package[0]->youtube != '') {?>
              <td style="display: inline-block;width: 30px;height: 30px;border-radius: 50%;font-size: 19px;margin: 5px;"><a href="{{$package[0]->youtube}}"><img src="{{asset('addbyme/images/t-5.png')}}" style="width:30px;"></a></td>
          <?php }?>  
        </tr>
      </tbody>
      <?php foreach($package as $packageone){?>
<tbody style="background: linear-gradient(90deg, #0069C7 39.09%, #1999C1 100%), #FFFFFF;display: inline-block;width: 80%;padding:20px 20px 20px 20px;margin: 30px 0;">
        <tr style="display: inline-block;width: 40%;">
            <td style="display: block;font-size: 24px;color: white;margin-bottom: 10px;">{{$packageone->countrt}}</td>
            <td style="display: block;font-size: 19px;color: white;margin-bottom: 10px;">{{$packageone->subject}}</td>
            <td style="font-size: 20px;color: white;">الفندق:</td>
            <?php if($packageone->hotelrate > 0){?>
                <td><span style="color: #FFC80A;">★ </span></td>
            <?php }else{?>
                <td><span style="color: #E2E2E2;">★ </span></td>
            <?php }?>
            <?php if($packageone->hotelrate > 1){?>
                <td><span style="color: #FFC80A;">★ </span></td>
            <?php }else{?>
                <td><span style="color: #E2E2E2;">★ </span></td>
            <?php }?>
            <?php if($packageone->hotelrate > 2){?>
                <td><span style="color: #FFC80A;">★ </span></td>
            <?php }else{?>
                <td><span style="color: #E2E2E2;">★ </span></td>
            <?php }?>
            <?php if($packageone->hotelrate > 3){?>
                <td><span style="color: #FFC80A;">★ </span></td>
            <?php }else{?>
                <td><span style="color: #E2E2E2;">★ </span></td>
            <?php }?>
            <?php if($packageone->hotelrate > 4){?>
                <td><span style="color: #FFC80A;">★ </span></td>
            <?php }else{?>
                <td><span style="color: #E2E2E2;">★ </span></td>
            <?php }?>
        </tr>
        <tr style="display: inline-block;width: 30%;text-align: center;">
          <td style="display: block;font-size: 22px;color: white;">من</td>
          <td style="display: block;color: white;"><i style="font-size: 30px;" class="fas fa-plane-departure"></i></td>
          <td style="display: block;color: white;position: relative;"><i style="position: absolute;top: 8px;left: 57px;" class="fas fa-calendar-week"></i><input type="text" id="datepicker1" value="{{$packageone->from}}" style="width: 60%;border: 2px solid #FFFFFF;
    padding-left: 40px;border-radius: 20px;background-color: transparent;color: white;     padding: 10px;"></p></td>
        </tr>
         <tr style="display: inline-block;width: 28%;text-align: center;">
          <td style="display: block;color: white;font-size: 22px;">الى</td>
          <td style="display: block;color: white;"><i style="font-size: 30px;" class="fas fa-plane-arrival"></i></td>
          <td style="display: block;color: white;position: relative;"><i style="position: absolute;top: 8px;left: 57px;" class="fas fa-calendar-week"></i><input type="text" id="datepicker2" value="{{$packageone->until}}" style="width: 60%;border: 2px solid #FFFFFF;
    padding-left: 40px;border-radius: 20px;background-color: transparent;color: white;     padding: 10px;"></p></td>
        </tr>
      </tbody>
      <tbody style="display: inline-block;width: 12%;">
      <tr style="display: inline-block;width: 100%;">
        <td style="display: block;background-color: #F2F2F2;font-size: 28px;padding: 66px 0;text-align: center;"><a style="color: #404040;font-weight: 700; text-decoration:none;" href="http://nalsahel.com/">التفاصيل</a></td>
      </tr>
  </tbody>
      <?php }?>

    <tbody>
      <tr>
        <td style="font-size: 45px;background-color: #409A16;border-radius: 11px;padding-left: 10px;display: block;margin: 30px auto;width: 25%;text-align: center;font-weight: 700;"><a style="color: white; text-decoration:none;" href="http://nalsahel.com/">التفاصيل</a></td>
      </tr>
    <tr style="text-align: center;">
      <td><img src="{{asset('addbyme/images/logo.png')}}"></td>
    </tr>
    
    <tr style="display: block;padding: 20px 0;width: 50%;margin: 0 auto;text-align: -webkit-center;border-top: 1px solid #253858;">
        <td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fa fa-facebook-f"></i></a></td>
        <td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fa fa-twitter"></i></a></td>
        <td><a style="display: inline-block;color: #253858;padding: 0 10px;" href="#"><i class="fa fa-instagram"></i></a></td>
      </tr>
      </tbody>
    </table>
  </div>






</body>
</html>
