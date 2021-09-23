<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\city;
use App\area;
use App\after_doctor_signup;
use App\company;
use App\contact;
use App\offercountry;
use App\offercity;
use App\package;
use App\visitor;
use App\appointment;
use App\package_photo;
use App\newpackage;
use App\flight;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Mail;
use App\Mail\contactcompany;
use App\Mail\forgotpassword;
use App\Mail\bookcomfimed;
use App\Mail\followcompany;

use Twilio\Jwt\ClientToken;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
      $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            if(Auth::user() != '')
                return redirect('/profile');  
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();
     /*    $offercountry = offercountry::select()->get();
        $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                ->where('offer_until', '>=', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->where('companies.status','on')
                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                ->get();
    //    dd($package);
        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $company = company::select()->get();
        $package_photo = package_photo::select()->get();*/
        $newpackage = newpackage::select('newpackages.*','offercountries.id as country_id')
                        ->where('offer_until', '>=', date('Y-m-d'))
                        ->where('seat','>' ,0)
                        ->leftjoin('offercountries','offercountries.arabic','=','newpackages.country')
                        ->get();
        $flight = flight::select('flights.*','offercities.id as city_id','offercities.country_id as flight_country_id','offercountries.id as country_id')
                    ->where('o_until', '>=', date('Y-m-d'))    
                    ->where('seat','>' ,0)        
                    ->leftjoin('offercities','offercities.arabic','=','flights.o_air_city')
                    ->leftjoin('offercountries','offercountries.arabic','=','flights.o_air_country')
                    ->get();
        $offercountry = offercountry::select('offercountries.*','newpackages.id as newpackage_id')
                    ->where('offer_until', '>=', date('Y-m-d'))
                    ->where('seat','>' ,0)
                    ->leftjoin('newpackages','newpackages.country','=','offercountries.arabic')
                    ->orderBy('offercountries.id', 'asc')
                    ->get();

        $offercity = offercity::select('offercities.*','flights.id as flight_id','offercountries.arabic as country_arabic')
                    ->where('o_until', '>=', date('Y-m-d'))    
                    ->where('seat','>' ,0)     
                    ->leftjoin('flights','flights.o_air_city','=','offercities.arabic')
                    ->leftjoin('offercountries','offercountries.id','=','offercities.country_id')
                    ->orderBy('offercities.id', 'asc')
                    ->get();
        return view('home')
                ->with('after_company_signup', $after_company_signup)
                ->with('cities', $city)
                ->with('flights', $flight)
                ->with('newpackages', $newpackage)
                ->with('offercountries', $offercountry)
                ->with('offercities', $offercity)
                ->with('status','Latest');
    }
    public function addappointment(Request $request)
    {
        $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();
        $package = package::select('packages.*','companies.travel_agency_name','companies.address','companies.travel_agency_phone_number','companies.start_date'
        ,'companies.end_date' ,'companies.start_time'  ,'companies.end_time')
                ->where('packages.id',$request->package_id)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->first();
        if(($request->adult+$request->child+$request->childbed+$request->infant)==0)
            $request->adult = 1;
        $request->mobile_number = '+964'.$request->mobile_number;

        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        if($request->single == 'on')
        {
            $request->child = 0;
            $request->childbed = 0;
            $request->infant = 0;
        }
        return view('booking')
                ->with('after_company_signup', $after_company_signup)
                ->with('cities', $city)
                ->with('package', $package)
                ->with('appointment', $request)
                ->with('package1', $package1)
                ->with('package2', $package2)
                ->with('package3', $package3)
                ->with('status','booking');
    }
    public function contactus(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->name;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->status = 'not_check';
        $contact->save();
        return back();
    }
    




    /*login controller */
    public function loginstatus(Request $request)
    {
        $user = User::select()->where('email',$request->email)->get();
        $company = company::select()->where('email',$request->email)->get();
        if($user->count() == 0 || $company->count() == 0){
            echo 'no';
        }
        else if(base64_decode($company[0]->password) == $request->password){
            echo 'same';
        }
        else{
            echo 'no';
        }
    }
    public function accountlogin(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $remember = $request['remember'];

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // The user is being remembered...
            //Update online status            
            $user = Auth::user();
            $user->save();
            return redirect('/profile');            
        }
        return back();
    }
    public function emailcheck(Request $request)
    {
        $user = User::select()->where('email',$request->email)->get();
        $company = company::select()->where('email',$request->email)->get();
        if($user->count()> 0 || $company->count()> 0){
            echo 'no';
        }
        else
        {
            echo 'same';
        }
    }
    public function forgotstatus(Request $request)
    {
        $user = User::select()->where('email',$request->email)->get();
        $company = company::select()->where('email',$request->email)->get();
        if($user->count()> 0 || $company->count()> 0){
            echo 'no';
            Mail::to($request->email)->send(new forgotpassword($user[0]));
        }
        else
        {
            echo 'same';
        }
    }

    public function resetpassword($token)
    {
        $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();
        $offercountry = offercountry::select()->get();
        $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                ->where('offer_until', '>=', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->where('companies.status','on')
                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                ->get();
    //    dd($package);
        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $company = company::select()->get();
        $package_photo = package_photo::select()->get();
        return view('welcome')
                ->with('after_company_signup', $after_company_signup)
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('packages', $package)
                ->with('companies', $company)
                ->with('package_photos', $package_photo)
                ->with('package1', $package1)
                ->with('package2', $package2)
                ->with('package3', $package3)
                ->with('token', $token)
                ->with('status','reset');
    }
    public function resetnewpassword(Request $request)
    {
        $user = user::select()->where('api_token',$request->token)->first();
        $company = company::select()->where('email',$user->email)->first();
        $company->password = base64_encode($request->newpasword);
        $company->save();
        
        $user->password = bcrypt(base64_decode($company->password));
        $user->save();
        return redirect('/');
    }
    public function createaccount(Request $request)
    {
        $company = new company();
        $company->first_name = $request->first_name;
        $company->last_name = $request->last_name;
        $company->travel_agency_name = $request->travel_agency_name;
        $company->city = $request->city;
        $company->area = $request->area;
        $company->mobile_number = $request->mobile_number;
        $company->email = $request->email;
        $company->password = base64_encode($request->password);
        $company->status = 'not';
        $company->photo = 'CompanyDefault.png';
        $company->save();
        return back();
    }
    public function getvisitorarea(Request $request)
    {
        $area = area::select()->where('city',$request->arabic)->get();
        return json_encode($area);
    }
    public function getvisitorarea1(Request $request)
    {
        if($request->id == '')
        {
            $request->arabic = 'no';
        }
        else
        {
            $city = city::select()->where('id',$request->id)->first();
            $request->arabic = $city->arabic;
        }
        $area = area::select()->where('city',$request->arabic)->get();
        return json_encode($area);
    }
    public function listofcompany()
    {   
        $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();

        $company = company::select('companies.*','cities.id as city_id','areas.id as area_id')
                    ->where('status','on')
                    ->leftjoin('cities','cities.arabic','=','companies.city')
                    ->leftjoin('areas','areas.arabic','=','companies.area')
                    ->get();
        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        return view('listofcompany')
                ->with('after_company_signup', $after_company_signup)
                ->with('companies', $company)
                ->with('cities', $city)
                ->with('status','good')
                ->with('package1', $package1)
                ->with('package2', $package2)
                ->with('package3', $package3)
                ->with('status','listofcompany');
    }
    public function getadminarea(Request $request)
    {
        $area = area::select()->where('city',$request->arabic)->get();
        return json_encode($area);
    }
    public function contactcompany(Request $request)
    {
        $company = company::select()->where('id',$request->company_id)->first();
        Mail::to($company->email)->send(new contactcompany($request->first_name,$request->user_email,$request->message));
        
    }
    public function sendsms1(Request $request)
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        if($request->verifycode =='no')
            $code = rand(1000, 9999);
        else
            $code = $request->verifycode;
        try
        {
            $client = new Client(['auth' => [$accountSid, $authToken]]);
            $result = $client->post('https://api.twilio.com/2010-04-01/Accounts/'.$accountSid.'/Messages.json',
            ['form_params' => [
            'Body' => 'IRAQ TRAVEL booking verification CODE: '.$code, //set message body
            'To' => $request->contact_number,
            'From' => '+19166194425' //we get this number from twilio
            ]]);
            return $code;
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
    public function addvisitor(Request $request)
    {
        $visitor = New visitor;
        $visitor->first_name = $request->first_name;
        $visitor->last_name = $request->last_name;
        $visitor->type = $request->type;
        $visitor->day_of_birth = $request->day_of_birth;
        $visitor->pssport_no = $request->pssport_no;
        $visitor->passport_issue_date = $request->passport_issue_date;
        $visitor->passport_expire_date = $request->passport_expire_date;
        $visitor->appointment_id = $request->appointment_id;
        $visitor->status = $request->status;
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
            $image = $request->file('image');
            $name = rand(100000, 999999).$_FILES["image"]["name"];
            $destinationPath = public_path('/upload/passport');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $visitor->photo = $name;
        }
        else
        {
            $visitor->photo = 'Passport.png';
        }
        $visitor->personal = $request->personal;
        if ($request->hasFile('personalphoto')) {
            $this->validate($request, [
                'personalphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
            $image = $request->file('personalphoto');
            $name = rand(100000, 999999).$_FILES["personalphoto"]["name"];
            $destinationPath = public_path('/upload/visa');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $visitor->personalphoto = $name;
        }
        else
        {
            
            $visitor->personalphoto = 'falsephoto.png';
        }
        $visitor->save();
    }
    public function addappointmentall(Request $request)
    {
        $appointment = New appointment;
        $appointment->name = $request->name;
        $appointment->last_name = $request->last_name;
        $appointment->mobile_number = $request->mobile_number;
        $appointment->email = $request->email;
        $appointment->company_id = $request->company_id;
        $appointment->package_id = $request->package_id;
        $appointment->adult = $request->adultnumber;
        $appointment->single = $request->single;
        $appointment->childbed = $request->childbednumber;
        $appointment->child = $request->childnumber;
        $appointment->infant = $request->infantnumber;
        
        if($request->childbednumber == '')
            $appointment->childbed = 0;
        if($request->childnumber == '')
            $appointment->child = 0;
        if($request->infantnumber == '')
            $appointment->infant = 0;
        $appointment->status = 'good';
        $appointment->save();
       
        $package = package::select('packages.*','companies.travel_agency_name','companies.address','companies.travel_agency_phone_number','companies.start_date'
        ,'companies.end_date' ,'companies.start_time'  ,'companies.end_time')
                ->where('packages.id',$request->package_id)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->first();
        Mail::to($request->email)->send(new bookcomfimed($package,$appointment->id));
        $visitors = visitor::select()->where('status',$request->test)->get();
        foreach($visitors as $visitor)
        {
            $visitor->appointment_id = $appointment->id;
            $visitor->status = 'good';
            $visitor->save();
        }
        echo $appointment->id;
    }
    public function getlocationbyip(Request $request)
    {
        $clientIP = \Request::ip();
        $data = \Location::get($clientIP);
        $city = city::select()->get();
        
        $i = 0;
        foreach($city  as $cityone)
        {
            if($cityone->english == $data->cityName)
            {
                $i = 1;
            }
        }
        if($i == 1)
            echo $data->cityName;
        else   
            echo "yet";
    }
    public function getareabyip(Request $request)
    {
        $clientIP = \Request::ip();
        $data = \Location::get($clientIP);
        $city = city::select('english',$data->cityName)->first();
        $area = area::select()->where('city',$city->english)->get();
        $i = 0;
        foreach($area  as $areaone)
        {
            if($areaone->english == $data->regionName)
            {
                $i = 1;
            }
        }
        if($i == 1)
            echo $data->regionName;
        else   
            echo "yet";
    }
    public function checkcompanypackage($id)
    {
        $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();
        $offercountry = offercountry::select()->get();
        $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                ->where('offer_until', '>=', date('Y-m-d'))
                ->where('company_id',$id)
                ->orderBy('id', 'desc')
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->where('companies.status','on')
                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                ->get();
        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $company = company::select()->where('id',$id)->get();
        $package_photo = package_photo::select()->get();
        return view('welcome')
                ->with('after_company_signup', $after_company_signup)
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('packages', $package)
                ->with('companies', $company)
                ->with('status','company')
                ->with('package_photos', $package_photo)
                ->with('package1', $package1)
                ->with('package2', $package2)
                ->with('package3', $package3);
    }
    public function packagesearch(Request $request)
    {
        $city = city::select()->get();
        $after_company_signup = after_doctor_signup::select()->first();
        $offercountry = offercountry::select()
                            ->where('arabic','!=',$request->offercountry)
                            ->get();
        if($request->offercountry != 'destination')
        {
                $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                                ->where('offer_until', '>=', date('Y-m-d'))
                                ->where('country',$request->offercountry)
                                ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                                ->leftjoin('companies','companies.id','=','packages.company_id')
                                ->where('companies.status','on')
                                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                                ->get();
                if($request->offer == 'newest')
                {
                    $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                                ->where('offer_until', '>=', date('Y-m-d'))
                                ->where('country',$request->offercountry)
                                ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                                ->orderBy('id', 'desc')
                                ->leftjoin('companies','companies.id','=','packages.company_id')
                                ->where('companies.status','on')
                                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                                ->get();
                }
                if($request->offer == 'oldest')
                {
                    $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                                ->where('offer_until', '>=', date('Y-m-d'))
                                ->where('country',$request->offercountry)
                                ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                                ->orderBy('id', 'asc')
                                ->leftjoin('companies','companies.id','=','packages.company_id')
                                ->where('companies.status','on')
                                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                                ->get();
                }
                if($request->price == 'lth')
                {
                    $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                                ->where('offer_until', '>=', date('Y-m-d'))
                                ->where('country',$request->offercountry)
                                ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                                ->orderBy('adult', 'asc')
                                ->leftjoin('companies','companies.id','=','packages.company_id')
                                ->where('companies.status','on')
                                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                                ->get();
                }
                if($request->price == 'htl')
                {
                    $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                        ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                                ->where('offer_until', '>=', date('Y-m-d'))
                                ->where('country',$request->offercountry)
                                ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                                ->orderBy('adult', 'desc')
                                ->leftjoin('companies','companies.id','=','packages.company_id')
                                ->where('companies.status','on')
                                ->leftjoin('offercities','offercities.arabic','=','packages.city')
                                ->get();
                }
        }
        else
        {
            $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
            ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                    ->where('offer_until', '>=', date('Y-m-d'))
                    ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                    ->orderBy('id', 'desc')
                    ->leftjoin('companies','companies.id','=','packages.company_id')
                    ->where('companies.status','on')
                    ->leftjoin('offercities','offercities.arabic','=','packages.city')
                    ->get();
            if($request->offer == 'newest')
            {
                $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                    ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                            ->where('offer_until', '>=', date('Y-m-d'))
                            ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                            ->orderBy('id', 'desc')
                            ->leftjoin('companies','companies.id','=','packages.company_id')
                            ->where('companies.status','on')
                            ->leftjoin('offercities','offercities.arabic','=','packages.city')
                            ->get();
            }
            if($request->offer == 'oldest')
            {
                $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                    ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                            ->where('offer_until', '>=', date('Y-m-d'))
                            ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                            ->orderBy('id', 'asc')
                            ->leftjoin('companies','companies.id','=','packages.company_id')
                            ->where('companies.status','on')
                            ->leftjoin('offercities','offercities.arabic','=','packages.city')
                            ->get();
            }
            if($request->price == 'lth')
            {
                $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                    ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                            ->where('offer_until', '>=', date('Y-m-d'))
                            ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                            ->orderBy('adult', 'asc')
                            ->leftjoin('companies','companies.id','=','packages.company_id')
                            ->where('companies.status','on')
                            ->leftjoin('offercities','offercities.arabic','=','packages.city')
                            ->get();
            }
            if($request->price == 'htl')
            {
                $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
                    ,'companies.youtube','companies.whatsapp','companies.qr','offercities.id as offercity_id')
                            ->where('offer_until', '>=', date('Y-m-d'))
                            ->where('from','>=',date('Y-m-d',strtotime($request->find_start)))
                            ->orderBy('adult', 'desc')
                            ->leftjoin('companies','companies.id','=','packages.company_id')
                            ->where('companies.status','on')
                            ->leftjoin('offercities','offercities.arabic','=','packages.city')
                            ->get();
            }
        }
        
        $offercountrycurrent = offercountry::select()
                            ->where('arabic',$request->offercountry)
                            ->first();
        if( $offercountrycurrent != '')
            $offercity = offercity::select()->where('country_id',$offercountrycurrent->id)->get();
        else
            $offercity = '';
        $company = company::select()->get();
        $package1 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+1)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package2 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+2)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package3 = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo')
                ->whereMonth('from', date('m')+3)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        $package_photo = package_photo::select()->get();
        return view('welcome')
                ->with('after_company_signup', $after_company_signup)
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('offercities', $offercity)
                ->with('packages', $package)
                ->with('companies', $company)
                ->with('request', $request)
                ->with('status','search')
                ->with('package_photos', $package_photo)
                ->with('package1', $package1)
                ->with('package2', $package2)
                ->with('package3', $package3);
    }
    public function followcompany(Request $request)
    {
        $package = package::select('packages.*','companies.travel_agency_name','companies.photo as company_photo','companies.facebook','companies.twitter','companies.instagram'
        ,'companies.youtube','companies.whatsapp')
                ->where('offer_until', '>=', date('Y-m-d'))
                ->where('company_id', $request->company_id)
                ->orderBy('id', 'desc')
                ->take(10)
                ->leftjoin('companies','companies.id','=','packages.company_id')
                ->get();
        if($package->count()>0)
            Mail::to($request->email)->send(new followcompany( $package,$request));
        return back();
    }
}
