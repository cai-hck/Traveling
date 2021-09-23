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
use App\newpackage;
use App\appointment;
use App\visitor;
use App\contactcompany;
use App\package_photo;
use App\money;
use App\flight;
use App\visastatus;
use App\appoint_status;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportAppointment;
use App\Exports\ExportAppointment1;
use App\Mail\senddoc;
use App\Mail\senddocone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        
        $city = city::select()->get();
        $area = area::select()->where('city',$company->city)->get();

        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        $change = appointment::select('appointments.*','flights.o_departure_time','flights.o_arrival_time','flights.o_country')
            ->where('appointments.status','change')
            ->where('appointments.name',$company->travel_agency_name)
            ->where('appointments.last_name','offer_from_company_flight')
            ->leftjoin('flights','flights.id','appointments.package_id')
            ->get();
        return view('company.profile')
                ->with('cities',$city)
                ->with('areas',$area)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('changes',$change)
                ->with('company',$company);
    }
    public function getadminarea(Request $request)
    {
        $area = area::select()->where('city',$request->arabic)->get();
        return json_encode($area);
    }
    public function updatecompanyprofile(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $company->first_name = $request->first_name;
        $company->last_name = $request->last_name;
        $company->travel_agency_name = $request->travel_agency_name;
        $company->city = $request->city;
        $company->area = $request->area;
        $company->mobile_number = $request->mobile_number;
        $company->email = $request->email;

        $company->travel_agency_phone_number = $request->travel_agency_phone_number;
        $company->address = $request->address;
        $company->service = $request->service;
        $company->more_info = $request->more_info;

        $company->start_time = $request->start_time;
        if($request->start_zone == 'PM')
             $company->start_time += 12;

        $company->end_time = $request->end_time;
        if($request->end_zone == 'PM')
            $company->end_time += 12;

        $company->start_date = $request->start_date;
        $company->end_date = $request->end_date;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->whatsapp = $request->whatsapp;

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
            $image = $request->file('image');
            $name = rand(100000, 999999).$_FILES["image"]["name"];
            $destinationPath = public_path('/upload/photo');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $company->photo = $name;
        }
        $company->save();
        Auth::user()->email = $request->email;
        Auth::user()->save();
        return back();
    }
    public function getoffercity(Request $request)
    {
        $offercountry = offercountry::select()->where('arabic',$request->arabic)->first();
        $offercity = offercity::select()->where('country_id',$offercountry->id)->get();
        return json_encode($offercity);
    }
    public function getoffercity_id(Request $request)
    {
        $offercity = offercity::select()->where('country_id',$request->id)->get();
        return json_encode($offercity);
    }
    public function contact()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.contact')
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function logout()
    {
        Auth::logout(); // log the user out of our application
        return redirect('/'); // redirect the user to the login screen
    }
    public function contactadmin(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $contactcompany = new contactcompany();
        $contactcompany->company_id = $company->id;
        $contactcompany->first_name = $request->first_name;
        $contactcompany->message = $request->message;
        $contactcompany->status = 'not_check';
        $contactcompany->save();
        return redirect('/');
    }
    public function addpackagenew()
    {
        $offercountry = offercountry::select()->get();
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addpackage != 'on')
            return redirect('/');
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.addpackagenew')
                ->with('offercountries',$offercountry)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function editpackagenew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addpackage != 'on')
            return redirect('/');
        $package = newpackage::select()->where('company_id',$company->id)->where('oldid',Null)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editpackagenew')
                ->with('packages',$package)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function addcheck()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on')
            return redirect('/');
        $companylist = company::select()
                        ->where('id','!=',$company->id)
                        ->get();
        $money = money::select()->where('company_id',$company->id)
                        ->get();
        $count = appointment::select()->where('appointments.status','good')
                        ->where('appointments.company_id',$company->id)
                        ->where('appointments.last_name','offer_from_company')
                        ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.addcheck')
                ->with('companylist',$companylist)
                ->with('moneylist',$money)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function bookednew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addpackage != 'on')
            return redirect('/');
        $appointment = appointment::select('appointments.*','packages.country')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->leftjoin('packages','packages.id','=','appointments.package_id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookednew')
                ->with('appointments',$appointment)
                ->with('company',$company)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone);
    }
    public function companyoffer()
    {   
        $city = city::select()->get();
        $companyone = company::select()->where('email',Auth::user()->email)->first();
        if($companyone->bookpackage != 'on')
            return redirect('/');
        $offercountry = offercountry::select()->get();
        $package = newpackage::select('newpackages.*','companies.travel_agency_name','companies.photo as company_photo','offercities.id as offercity_id','offercountries.id as offercountries_id')
                ->where('offer_until', '>=', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->where('seat','>' ,0)
                ->leftjoin('companies','companies.id','=','newpackages.company_id')
                ->where('companies.status','on')
                ->leftjoin('offercities','offercities.arabic','=','newpackages.city')
                ->leftjoin('offercountries','offercountries.arabic','=','newpackages.country')
                ->leftjoin('money','money.company_id','=','newpackages.company_id')
                ->where('money.approve_id',$companyone->id)
                ->where('money.status','on')
                ->get();
        $company = company::select()->get();
        $package_photo = package_photo::select()->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$companyone->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.index')
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('packages', $package)
                ->with('companies', $company)
                ->with('package_photos', $package_photo)
                ->with('companynow', $companyone)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('status','Latest');
    }
    public function addnewpackagenew(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $package = new newpackage();
        $package->company_id =  $company->id;
        $package->country = $request->country;
        $package->city = $request->city;
        $package->from = $request->from;
        $package->until = $request->until;
        $package->star = $request->star;
        $package->subject = $request->subject;

        $package->more_details = $request->more_details;
        $package->seat = $request->seat;
        $package->hotelname = $request->hotelname;

        $package->adult = $request->adult;
        $package->child = $request->child;
        $package->room = $request->room;
        $package->infant = $request->infant;
        $package->singlestatus = $request->singlestatus;
        $package->childbedstatus = $request->childbedstatus;
        $package->roomstatus = $request->roomstatus;
        $package->single = $request->single;
        if($request->single == '')
            $package->single = 0;
        $package->childbed = $request->childbed;
        if($request->childbed == '')
            $package->childbed = 0;
        $package->room = $request->room;
        if($request->room == '')
            $package->room = 0;
        $package->offer_from = $request->offer_from;
        $package->offer_until = $request->offer_until;
        $package->status = 'good';

        
        $package->departure_time = $request->departure_time;
        $package->arrival_time = $request->arrival_time;
        $package->departure_airport = $request->departure_airport;
        $package->arrival_airport = $request->arrival_airport;
        $package->airline = $request->airline;
        $package->departure_time_1 = $request->departure_time_1;
        $package->arrival_time_1 = $request->arrival_time_1;
        $package->departure_airport_1 = $request->departure_airport_1;
        $package->arrival_airport_1 = $request->arrival_airport_1;
        $package->airline_1 = $request->airline_1;

        $package->special = $request->special;
        $package->day = $request->day;
        if($package->special == 'special')
        {
            if($package->day == 'one')
            {
                $company->balance += 5;
            }
            else if($package->day == 'two')
            {
                $company->balance += 8;
            }
            else if($package->day == 'three')
            {
                $company->balance += 12;
            }
            $company->save();
        }
        $package->wesell = $request->wesell;
        $package->yousell = $request->yousell;

        if ($request->hasFile('doc')) {
            $image = $request->file('doc');
            $name = rand(100000, 999999).$_FILES["doc"]["name"];
            $destinationPath = public_path('/upload/doc');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $package->doc = $name;
        }
        $package->save();
        $offercountry = offercountry::select()->where('arabic',$request->country)->get();
        if($offercountry->count() >0)
        {
            $offercity = offercity::select()->where('arabic',$request->city)
                                            ->where('country_id',$offercountry[0]->id)
                                            ->get();
            if($offercity->count() ==0)
            {
                $newoffercity = new offercity();
                $newoffercity->country_id = $offercountry[0]->id;
                $newoffercity->arabic = $request->city;
                $newoffercity->save();
            }
        }
        else
        {
            $newoffercountry = new offercountry();
            $newoffercountry->arabic = $request->country;
            $newoffercountry->save();
            
            $newoffercity = new offercity();
            $newoffercity->country_id = $newoffercountry->id;
            $newoffercity->arabic = $request->city;
            $newoffercity->save();
        }
        package_photo::select()->where('package_id_new',$package->id)->delete();
        if ($request->hasFile('uploadFile')) {
            foreach ($request->file('uploadFile') as $key => $image) {
                $name = rand(10000, 99999).$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/package');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $photo = new package_photo();
                $photo->photo = $name;
                $photo->package_id_new = $package->id;
                $photo->save();
            }
        }
        return redirect('/editpackagenew');
    }
    public function deletepackagenewone($id)
    {
        $package = newpackage::select()->where('id',$id)->first();
        $package->delete();
        return back();
    }
    public function editpackagenewone($id)
    {
        $offercountry = offercountry::select()->get();
        $company = company::select()->where('email',Auth::user()->email)->first();
        $package = newpackage::select()->where('id',$id)->first();
        $package_photo = package_photo::select()->where('package_id_new',$id)->get();
        $offercountryone = offercountry::select()->where('arabic',$package->country)->first();
        $offercity = offercity::select()->where('country_id',$offercountryone->id)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editpackagenewone')
                ->with('package',$package)
                ->with('offercountries',$offercountry)
                ->with('offercities',$offercity)
                ->with('package_photos',$package_photo)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function updatepackagenew(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $package = newpackage::select()->where('id',$request->id)->first();
        $packageold = newpackage::select('newpackages.*','newpackages.id as oldid')->where('id',$request->id)->first();
        $newpacakge = New newpackage();
        $newpacakge = $packageold->replicate();
        $newpacakge->seat = 0;
        $newpacakge->save();
        
        $appointments = appointment::select()
            ->where('appointments.last_name','offer_from_company')
            ->where('appointments.package_id',$package->id)
            ->get();
        foreach($appointments as $appointment)
        {
            $appointment->package_id = $newpacakge->id;
            $appointment->save();
        }

        $package->country = $request->country;
        $package->city = $request->city;
        $package->from = $request->from;
        $package->until = $request->until;
        $package->star = $request->star;
        $package->subject = $request->subject;

        $package->more_details = $request->more_details;
        $package->seat = $request->seat;
        $package->hotelname = $request->hotelname;

        $package->adult = $request->adult;
        $package->child = $request->child;
        $package->infant = $request->infant;
        $package->singlestatus = $request->singlestatus;
        $package->childbedstatus = $request->childbedstatus;
        $package->roomstatus = $request->roomstatus;
        $package->single = $request->single;
        if($request->single == '')
            $package->single = 0;
        $package->childbed = $request->childbed;
        if($request->childbed == '')
            $package->childbed = 0;
        $package->room = $request->room;
        if($request->room == '')
            $package->room = 0;
        $package->offer_from = $request->offer_from;
        $package->offer_until = $request->offer_until;
        $package->status = 'good';

        
        $package->departure_time = $request->departure_time;
        $package->arrival_time = $request->arrival_time;
        $package->departure_airport = $request->departure_airport;
        $package->arrival_airport = $request->arrival_airport;
        $package->airline = $request->airline;
        $package->departure_time_1 = $request->departure_time_1;
        $package->arrival_time_1 = $request->arrival_time_1;
        $package->departure_airport_1 = $request->departure_airport_1;
        $package->arrival_airport_1 = $request->arrival_airport_1;
        $package->airline_1 = $request->airline_1;

        $package->special = $request->special;
        $package->day = $request->day;
        if($package->special == 'special')
        {
            if($package->day == 'one')
            {
                $company->balance += 5;
            }
            else if($package->day == 'two')
            {
                $company->balance += 8;
            }
            else if($package->day == 'three')
            {
                $company->balance += 12;
            }
            $company->save();
        }

        $package->wesell = $request->wesell;
        $package->yousell = $request->yousell;

        if ($request->hasFile('doc')) {
            $image = $request->file('doc');
            $name = rand(100000, 999999).$_FILES["doc"]["name"];
            $destinationPath = public_path('/upload/doc');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $package->doc = $name;
        }
        $package->save();
        $offercountry = offercountry::select()->where('arabic',$request->country)->get();
        if($offercountry->count() >0)
        {
            $offercity = offercity::select()->where('arabic',$request->city)
                                            ->where('country_id',$offercountry[0]->id)
                                            ->get();
            if($offercity->count() ==0)
            {
                $newoffercity = new offercity();
                $newoffercity->country_id = $offercountry[0]->id;
                $newoffercity->arabic = $request->city;
                $newoffercity->save();
            }
        }
        else
        {
            $newoffercountry = new offercountry();
            $newoffercountry->arabic = $request->country;
            $newoffercountry->save();
            
            $newoffercity = new offercity();
            $newoffercity->country_id = $newoffercountry->id;
            $newoffercity->arabic = $request->city;
            $newoffercity->save();
        }
        if ($request->hasFile('uploadFile')) {
            package_photo::select()->where('package_id_new',$package->id)->delete();
            foreach ($request->file('uploadFile') as $key => $image) {
                $name = rand(10000, 99999).$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/package');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $photo = new package_photo();
                $photo->photo = $name;
                $photo->package_id_new = $package->id;
                $photo->save();
            }
        }
        return redirect('/editpackagenew');
    }
    public function addappointmentnew(Request $request)
    {
        $city = city::select()->get();
        $package = newpackage::select('newpackages.*','companies.travel_agency_name','companies.address','companies.travel_agency_phone_number','companies.start_date'
        ,'companies.end_date' ,'companies.start_time'  ,'companies.end_time')
                ->where('newpackages.id',$request->package_id)
                ->leftjoin('companies','companies.id','=','newpackages.company_id')
                ->first();
        if(($request->adult+$request->child+$request->childbed+$request->infant+$request->room)==0)
            $request->adult = 1;
        if($request->single == 'on')
        {
            $request->child = 0;
            $request->childbed = 0;
            $request->infant = 0;
            $request->room = 0;
        }
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                        ->where('company_id',$package->company_id )
                        ->where('approve_id',$company->id)
                        ->first();
        if($money == '')
        {
            $money = money::select()
                        ->where('id','1')
                        ->first();
        }
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.booking')
                    ->with('cities', $city)
                    ->with('package', $package)
                    ->with('appointment', $request)
                    ->with('money',$money)
                    ->with('companynow',$company)
                    ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                    ->with('moneyone',$moneyone)
                    ->with('status','booking');
    }
    public function addvisitornew(Request $request)
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
        $visitor->sex = $request->sex;
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
    public function addappointmentallnew(Request $request)
    {
        
        $ss = visitor::select()->where('status',$request->test)->count();
        if($ss == '')
        {
            return 'Error';
        }
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = New appointment;
        $appointment->name = $company->travel_agency_name;
        $appointment->last_name = 'offer_from_company';
        $appointment->mobile_number = $company->travel_agency_phone_number;
        $appointment->email = $company->email;
        $appointment->company_id = $request->company_id;
        $appointment->package_id = $request->package_id;
        $appointment->adult = $request->adultnumber;
        $appointment->single = $request->single;
        $appointment->childbed = $request->childbednumber;
        $appointment->child = $request->childnumber;
        $appointment->infant = $request->infantnumber;
        $appointment->room = $request->roomnumber;
        
        if($request->childbednumber == '')
            $appointment->childbed = 0;
        if($request->childnumber == '')
            $appointment->child = 0;
        if($request->infantnumber == '')
            $appointment->infant = 0;
        if($request->roomnumber == '')
            $appointment->room = 0;
        $appointment->status = 'good';
        $appointment->save();
       
        $money = money::select()
                ->where('company_id',$request->company_id)
                ->where('approve_id',$company->id)
                ->first();       
        $money->balance +=  $request->totalmoney; 
        $money->remain -=  $request->totalmoney; 
        $money->save();
        if($appointment->childbed >0 || $appointment->adult >0 || $appointment->child >0|| $appointment->room >0)
        {
            $packagenow = newpackage::select()->where('id',$request->package_id)->first();
            $packagenow->seat--;
            $packagenow->save();
        }
        //Mail::to($company->email)->send(new bookcomfimed($package,$appointment->id));
        $visitors = visitor::select()->where('status',$request->test)->get();
        foreach($visitors as $visitor)
        {
            $visitor->appointment_id = $appointment->id;
            $visitor->status = 'good';
            $visitor->save();
        }
        echo $appointment->id;
    }
    public function viewbookednewone($id)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select()->where('id',$id)->first();
        $package = newpackage::select()->where('id',$appointment->package_id)->first();
        $visitor = visitor::select()->where('appointment_id',$id)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookednewone')
                ->with('appointment',$appointment)
                ->with('package',$package)
                ->with('visitors',$visitor)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function approvecheck(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                ->where('company_id',$company->id )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = $company->id;
            $money1->approve_id = $request->company_id;
            $money1->balance = 0;
            $money1->remain = 0;
            $money1->admin_balance = 0;
            $money1->status = 'on';
            $money1->save();
        }
        else if($money->status == 'on')
        {
            $money->status = 'off';
            $money->save();
        }
        else if($money->status == 'off')
        {
            $money->status = 'on';
            $money->save();
        }
    }
    public function addmoney(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                ->where('company_id',$company->id )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = $company->id;
            $money1->approve_id = $request->company_id;
            $money1->balance = 0;
            $money1->remain = $request->money_number;
            $money1->admin_balance = 0;
            $money1->status = 'off';
            $money1->save();
        }
        else
        {
            
            $money->remain += $request->money_number;
            $money->save();
        }
    }
    public function deletemoney(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                ->where('company_id',$company->id )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = $company->id;
            $money1->approve_id = $request->company_id;
            $money1->balance = 0;
            $money1->remain -= $request->money_number;
            $money1->admin_balance = 0;
            $money1->status = 'off';
            $money1->save();
        }
        else
        {
            
            $money->remain -= $request->money_number;
            $money->save();
        }
    }
    public function clearmoney(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                ->where('company_id',$company->id )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = $company->id;
            $money1->approve_id = $request->company_id;
            $money1->balance = 0;
            $money1->remain = 0;
            $money1->admin_balance = 0;
            $money1->status = 'off';
            $money1->save();
        }
        else
        {
            $money->remain += $money->balance;
            $money->balance = 0;
            $money->save();
        }
    }
    public function print(Request $request)
    {
        if($request->type== 'print')
        {
            $package = newpackage::select()->where('id',$request->packageid)->first();
            $company = company::select()->where('email',Auth::user()->email)->first();
            $visitors = visitor::select()->where('appointment_id',$request->appointmentid)->get();
            $string = 'reference number : '.strval($request->appointmentid);
            $name = rand(100000, 999999).$company->id;
            \QrCode::size(500)
                ->format('png')
                ->generate($string, public_path('/upload/qr/'.$name));
            $data = ['package' => $package,'company' => $company,'request' => $request,'visitors' => $visitors,'name' => $name];
           $mpdf = new \Mpdf\Mpdf();
           /*  $mpdf->SetDirectionality('rtl');*/
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML(view('company.print', $data)->render());
            return $mpdf->Output('Details.pdf',\Mpdf\Output\Destination::DOWNLOAD);
             
        }
        else
        {
            $package = newpackage::select()->where('id',$request->packageid)->first();
            $company = company::select()->where('email',Auth::user()->email)->first();
            $visitors = visitor::select()->where('appointment_id',$request->appointmentid)->get();
            $string = 'reference number : '.strval($request->appointmentid);
            $name = rand(100000, 999999).$company->id;
            \QrCode::size(500)
                ->format('png')
                ->generate($string, public_path('/upload/qr/'.$name));
            $data = ['package' => $package,'company' => $company,'request' => $request,'visitors' => $visitors,'name' => $name];
            $mpdf = new \Mpdf\Mpdf();
            /* $mpdf->SetDirectionality('rtl');*/
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML(view('company.print', $data)->render());
            $rd = rand(100000,999999);
            $mpdf->Output('upload/pdf/'.$rd.'Details.pdf',\Mpdf\Output\Destination::FILE);
            Mail::to($request->email)->send(new senddoc($package->doc,$rd.'Details.pdf'));
        }
    }
    public function addflightnew()
    {
        $offercountry = offercountry::select()->get();
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addflight != 'on')
            return redirect('/');
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.addflightnew')
                ->with('offercountries',$offercountry)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function addnewflightnew(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $flight = new flight();
        $flight->company_id =  $company->id;
        $flight->o_air_country = $request->o_air_country;
        $flight->o_air_city = $request->o_air_city;
        $flight->o_country = $request->o_country;
        $flight->o_city = $request->o_city;
        $flight->o_airport = $request->o_airport;
        $flight->o_departure = $request->o_departure;
        $flight->o_arrival = $request->o_arrival;
        $flight->o_departure_time = $request->o_departure_time;
        $flight->o_arrival_time = $request->o_arrival_time;
        $flight->o_airline = $request->o_airline;
        $flight->o_from = $request->o_from;
        $flight->o_until = $request->o_until;
        $flight->o_adult = $request->o_adult;
        $flight->o_child = $request->o_child;
        $flight->o_infant = $request->o_infant;
        $flight->o_adult_b = $request->o_adult_b;
        $flight->o_adult_b_status = $request->o_adult_b_status;
        if($request->o_adult_b == '')
            $flight->o_adult_b = 0;
        $flight->o_child_b = $request->o_child_b;
        $flight->o_child_b_status = $request->o_child_b_status;
        if($request->o_child_b == '')
            $flight->o_child_b = 0;
        $flight->o_infant_b = $request->o_infant_b;
        $flight->o_infant_b_status = $request->o_infant_b_status;
        if($request->o_infant_b == '')
            $flight->o_infant_b = 0;
        $flight->o_more = $request->o_more;

        $flight->inbound = $request->inbound;

        $flight->i_air_country = $request->i_air_country;
        $flight->i_air_city = $request->i_air_city;
        $flight->i_country = $request->i_country;
        $flight->i_city = $request->i_city;
        $flight->i_airport = $request->i_airport;
        $flight->i_departure = $request->i_departure;
        $flight->i_arrival = $request->i_arrival;
        $flight->i_departure_time = $request->i_departure_time;
        $flight->i_arrival_time = $request->i_arrival_time;
        $flight->i_airline = $request->i_airline;
        $flight->i_from = $request->i_from;
        $flight->i_until = $request->i_until;
        $flight->i_adult = $request->i_adult;
        $flight->i_child = $request->i_child;
        $flight->i_infant = $request->i_infant;
        $flight->i_adult_b = $request->i_adult_b;
        $flight->i_adult_b_status = $request->i_adult_b_status;
        if($request->i_adult_b == '')
            $flight->i_adult_b = 0;
        $flight->i_child_b = $request->i_child_b;
        $flight->i_child_b_status = $request->i_child_b_status;
        if($request->i_child_b == '')
            $flight->i_child_b = 0;
        $flight->i_infant_b = $request->i_infant_b;
        $flight->i_infant_b_status = $request->i_infant_b_status;
        if($request->i_infant_b == '')
            $flight->i_infant_b = 0;
        $flight->i_more = $request->i_more;


        $flight->status = 'good';
        $flight->wesell = $request->wesell;
        $flight->yousell = $request->yousell;
        $flight->seat = $request->seat;
        $flight->special = $request->special;
        $flight->day = $request->day;
        if($flight->special == 'special')
        {
            if($flight->day == 'one')
            {
                $company->balance += 5;
            }
            else if($flight->day == 'two')
            {
                $company->balance += 8;
            }
            else if($flight->day == 'three')
            {
                $company->balance += 12;
            }
            $company->save();
        }
        $flight->save();
        
        $offercountry = offercountry::select()->where('arabic',$request->o_air_country)->get();
        if($offercountry->count() >0)
        {
            $offercity = offercity::select()->where('arabic',$request->o_air_city)
                                            ->where('country_id',$offercountry[0]->id)
                                            ->get();
            if($offercity->count() ==0)
            {
                $newoffercity = new offercity();
                $newoffercity->country_id = $offercountry[0]->id;
                $newoffercity->arabic = $request->o_air_city;
                $newoffercity->save();
            }
        }
        else
        {
            $newoffercountry = new offercountry();
            $newoffercountry->arabic = $request->o_air_country;
            $newoffercountry->save();
            
            $newoffercity = new offercity();
            $newoffercity->country_id = $newoffercountry->id;
            $newoffercity->arabic = $request->o_air_city;
            $newoffercity->save();
        }
        if($request->i_air_country != '' && $request->i_air_city != '')
        {
            $offercountry = offercountry::select()->where('arabic',$request->i_air_country)->get();
            if($offercountry->count() >0)
            {
                $offercity = offercity::select()->where('arabic',$request->i_air_city)
                                                ->where('country_id',$offercountry[0]->id)
                                                ->get();
                if($offercity->count() ==0)
                {
                    $newoffercity = new offercity();
                    $newoffercity->country_id = $offercountry[0]->id;
                    $newoffercity->arabic = $request->i_air_city;
                    $newoffercity->save();
                }
            }
            else
            {
                $newoffercountry = new offercountry();
                $newoffercountry->arabic = $request->i_air_country;
                $newoffercountry->save();
                
                $newoffercity = new offercity();
                $newoffercity->country_id = $newoffercountry->id;
                $newoffercity->arabic = $request->i_air_city;
                $newoffercity->save();
            }
        }
        return redirect('/editflightnew');
    }
    public function editflightnew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addflight != 'on')
            return redirect('/');
        $flight = flight::select()->where('company_id',$company->id)->where('oldid',Null)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editflightnew')
                ->with('flights',$flight)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function deleteflightnew($id)
    {
        $flight = flight::select()->where('id',$id)->first();
        $flight->delete();
        return back();
    }
    public function editflightnewone($id)
    {
        $offercountry = offercountry::select()->get();
        $company = company::select()->where('email',Auth::user()->email)->first();
        $flight = flight::select()->where('id',$id)->first();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editflightnewone')
                ->with('flight',$flight)
                ->with('offercountries',$offercountry)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function updateflightnew(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $flight = flight::select()->where('id',$request->id)->first();
        
        $flightold = flight::select('flights.*','flights.id as oldid')->where('id',$request->id)->first();
        $newflight = New flight();
        $newflight = $flightold->replicate();
        $newflight->seat = 0;
        $newflight->save();
        
        $appointments = appointment::select()
            ->where('appointments.last_name','offer_from_company_flight')
            ->where('appointments.package_id',$flight->id)
            ->get();
        foreach($appointments as $appointment)
        {
            $appointment->package_id = $newflight->id;
            $appointment->status = 'change';
            $appointment->save();
        }
        $oldflight = flight::select()->where('oldid',$request->id)->get();
        foreach($oldflight as $oldflightone)
        {
            $appointmentold = appointment::select()
                ->where('appointments.last_name','offer_from_company_flight')
                ->where('appointments.package_id',$oldflightone->id)
                ->get();
            foreach($appointmentold as $appointmentoldone)
            {
                $appointmentoldone->status = 'change';
                $appointmentoldone->save();
            }
        }
        $flight->o_air_country = $request->o_air_country;
        $flight->o_air_city = $request->o_air_city;
        $flight->o_country = $request->o_country;
        $flight->o_city = $request->o_city;
        $flight->o_airport = $request->o_airport;
        $flight->o_departure = $request->o_departure;
        $flight->o_arrival = $request->o_arrival;
        $flight->o_departure_time = $request->o_departure_time;
        $flight->o_arrival_time = $request->o_arrival_time;
        $flight->o_airline = $request->o_airline;
        $flight->o_from = $request->o_from;
        $flight->o_until = $request->o_until;
        $flight->o_adult = $request->o_adult;
        $flight->o_child = $request->o_child;
        $flight->o_infant = $request->o_infant;
        $flight->o_adult_b = $request->o_adult_b;
        $flight->o_adult_b_status = $request->o_adult_b_status;
        if($request->o_adult_b == '')
            $flight->o_adult_b = 0;
        $flight->o_child_b = $request->o_child_b;
        $flight->o_child_b_status = $request->o_child_b_status;
        if($request->o_child_b == '')
            $flight->o_child_b = 0;
        $flight->o_infant_b = $request->o_infant_b;
        $flight->o_infant_b_status = $request->o_infant_b_status;
        if($request->o_infant_b == '')
            $flight->o_infant_b = 0;
        $flight->o_more = $request->o_more;

        $flight->inbound = $request->inbound;

        $flight->i_air_country = $request->i_air_country;
        $flight->i_air_city = $request->i_air_city;
        $flight->i_country = $request->i_country;
        $flight->i_city = $request->i_city;
        $flight->i_airport = $request->i_airport;
        $flight->i_departure = $request->i_departure;
        $flight->i_arrival = $request->i_arrival;
        $flight->i_departure_time = $request->i_departure_time;
        $flight->i_arrival_time = $request->i_arrival_time;
        $flight->i_airline = $request->i_airline;
        $flight->i_from = $request->i_from;
        $flight->i_until = $request->i_until;
        $flight->i_adult = $request->i_adult;
        $flight->i_child = $request->i_child;
        $flight->i_infant = $request->i_infant;
        $flight->i_adult_b = $request->i_adult_b;
        $flight->i_adult_b_status = $request->i_adult_b_status;
        if($request->i_adult_b == '')
            $flight->i_adult_b = 0;
        $flight->i_child_b = $request->i_child_b;
        $flight->i_child_b_status = $request->i_child_b_status;
        if($request->i_child_b == '')
            $flight->i_child_b = 0;
        $flight->i_infant_b = $request->i_infant_b;
        $flight->i_infant_b_status = $request->i_infant_b_status;
        if($request->i_infant_b == '')
            $flight->i_infant_b = 0;
        $flight->i_more = $request->i_more;


        $flight->status = 'good';
        $flight->wesell = $request->wesell;
        $flight->yousell = $request->yousell;

        
        $flight->seat = $request->seat;
        $flight->special = $request->special;
        $flight->day = $request->day;
        if($flight->special == 'special')
        {
            if($flight->day == 'one')
            {
                $company->balance += 5;
            }
            else if($flight->day == 'two')
            {
                $company->balance += 8;
            }
            else if($flight->day == 'three')
            {
                $company->balance += 12;
            }
            $company->save();
        }
        $flight->save();
        $offercountry = offercountry::select()->where('arabic',$request->o_air_country)->get();
        if($offercountry->count() >0)
        {
            $offercity = offercity::select()->where('arabic',$request->o_air_city)
                                            ->where('country_id',$offercountry[0]->id)
                                            ->get();
            if($offercity->count() ==0)
            {
                $newoffercity = new offercity();
                $newoffercity->country_id = $offercountry[0]->id;
                $newoffercity->arabic = $request->o_air_city;
                $newoffercity->save();
            }
        }
        else
        {
            $newoffercountry = new offercountry();
            $newoffercountry->arabic = $request->o_air_country;
            $newoffercountry->save();
            
            $newoffercity = new offercity();
            $newoffercity->country_id = $newoffercountry->id;
            $newoffercity->arabic = $request->o_air_city;
            $newoffercity->save();
        }
        if($request->i_air_country != '' && $request->i_air_city != '')
        {
            $offercountry = offercountry::select()->where('arabic',$request->i_air_country)->get();
            if($offercountry->count() >0)
            {
                $offercity = offercity::select()->where('arabic',$request->i_air_city)
                                                ->where('country_id',$offercountry[0]->id)
                                                ->get();
                if($offercity->count() ==0)
                {
                    $newoffercity = new offercity();
                    $newoffercity->country_id = $offercountry[0]->id;
                    $newoffercity->arabic = $request->i_air_city;
                    $newoffercity->save();
                }
            }
            else
            {
                $newoffercountry = new offercountry();
                $newoffercountry->arabic = $request->i_air_country;
                $newoffercountry->save();
                
                $newoffercity = new offercity();
                $newoffercity->country_id = $newoffercountry->id;
                $newoffercity->arabic = $request->i_air_city;
                $newoffercity->save();
            }
        }
        
        return redirect('/editflightnew');
    }
    public function bookedflightnew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addflight != 'on')
            return redirect('/');
        $appointment = appointment::select('appointments.*','flights.o_country','flights.o_city')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->leftjoin('flights','flights.id','=','appointments.package_id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookedflightnew')
                ->with('appointments',$appointment)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function companyofferflight()
    {   
        $city = city::select()->get();
        $companyone = company::select()->where('email',Auth::user()->email)->first();
        if($companyone->bookflight != 'on')
            return redirect('/');
        $offercountry = offercountry::select()->get();
        $flight = flight::select('flights.*','companies.travel_agency_name','companies.photo as company_photo','offercities.id as offercity_id','offercountries.id as offercountry_id')
                ->where('o_until', '>=', date('Y-m-d'))
                ->orderBy('id', 'desc')
                ->where('seat','>' ,0)
                ->leftjoin('companies','companies.id','=','flights.company_id')
                ->where('companies.status','on')
                ->leftjoin('offercities','offercities.arabic','=','flights.o_air_city')
                ->leftjoin('offercountries','offercountries.arabic','=','flights.o_air_country')
                ->leftjoin('money','money.company_id','=','flights.company_id')
                ->where('money.approve_id',$companyone->id)
                ->where('money.status','on')
                ->get();
        $company = company::select()->get();
        $companynow = company::select()->where('email',Auth::user()->email)->first();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$companyone->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.index1')
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('flights', $flight)
                ->with('companies', $company)
                ->with('companynow', $companynow)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('moneyone',$moneyone)
                ->with('status','Latest');
    }
    public function addappointmentflightnew(Request $request)
    {
        $city = city::select()->get();
        $flight = flight::select('flights.*','companies.travel_agency_name','companies.address','companies.travel_agency_phone_number','companies.start_date'
        ,'companies.end_date' ,'companies.start_time'  ,'companies.end_time')
                ->where('flights.id',$request->flight_id)
                ->leftjoin('companies','companies.id','=','flights.company_id')
                ->first();
        if(($request->adult+$request->child+$request->infant+$request->room)==0)
            $request->adult = 1;
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                        ->where('company_id',$flight->company_id )
                        ->where('approve_id',$company->id)
                        ->first();
        if($money == '')
        {
            $money = money::select()
                        ->where('id','1')
                        ->first();
        }
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.booking1')
                    ->with('cities', $city)
                    ->with('flight', $flight)
                    ->with('appointment', $request)
                    ->with('money',$money)
                    ->with('companynow', $company)
                    ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                    ->with('moneyone',$moneyone)
                    ->with('status','booking');
    }
    public function addappointmentallflightnew(Request $request)
    {
        
        $ss = visitor::select()->where('status',$request->test)->count();
        if($ss == '')
        {
            return 'Error';
        }
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = New appointment;
        $appointment->name = $company->travel_agency_name;
        $appointment->last_name = 'offer_from_company_flight';
        $appointment->mobile_number = $company->travel_agency_phone_number;
        $appointment->email = $company->email;
        $appointment->company_id = $request->company_id;
        $appointment->package_id = $request->flight_id;
        $appointment->adult = $request->adultnumber;
        $appointment->single = $request->single;
        $appointment->child = $request->childnumber;
        $appointment->infant = $request->infantnumber;
        $appointment->room = $request->roomnumber;
        
        if($request->childbedstatus == '')
            $appointment->childbed = 0;
        else
            $appointment->childbed = 1;

        if($request->childnumber == '')
            $appointment->child = 0;
        if($request->infantnumber == '')
            $appointment->infant = 0;
        if($request->roomnumber == '')
            $appointment->room = 0;
        $appointment->status = 'good';
        $appointment->save();
        $money = money::select()
            ->where('company_id',$request->company_id)
            ->where('approve_id',$company->id)
            ->first();       
        $money->balance +=  $request->totalmoney; 
        $money->remain -=  $request->totalmoney; 
        $money->save();      
        if($appointment->adult >0 || $appointment->child >0 || $appointment->room >0)
        {
            $packagenow = flight::select()->where('id',$request->flight_id)->first();
            $packagenow->seat--;
            $packagenow->save(); 
        }  
        //Mail::to($company->email)->send(new bookcomfimed($package,$appointment->id));
        $visitors = visitor::select()->where('status',$request->test)->get();
        foreach($visitors as $visitor)
        {
            $visitor->appointment_id = $appointment->id;
            $visitor->status = 'good';
            $visitor->save();
        }
        echo $appointment->id;
    }
    public function viewbookedflightnewone($id)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select()->where('id',$id)->first();
        $flight = flight::select()->where('id',$appointment->package_id)->first();
        $visitor = visitor::select()->where('appointment_id',$id)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookedflightnewone')
                ->with('appointment',$appointment)
                ->with('flight',$flight)
                ->with('visitors',$visitor)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function printflight(Request $request)
    {
        
        if($request->type== 'print')
        {
            $package = flight::select()->where('id',$request->packageid)->first();
            $company = company::select()->where('email',Auth::user()->email)->first();
            $visitors = visitor::select()->where('appointment_id',$request->appointmentid)->get();
            $string = 'reference number : '.strval($request->appointmentid);
            $name = rand(100000, 999999).$company->id;
            \QrCode::size(500)
                ->format('png')
                ->generate($string, public_path('/upload/qr/'.$name));
            $data = ['package' => $package,'company' => $company,'request' => $request,'visitors' => $visitors,'name' => $name];
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML(view('company.printflight', $data)->render());
            return $mpdf->Output('Details.pdf',\Mpdf\Output\Destination::DOWNLOAD);
        }
        else
        {
            $package = flight::select()->where('id',$request->packageid)->first();
            $company = company::select()->where('email',Auth::user()->email)->first();
            $visitors = visitor::select()->where('appointment_id',$request->appointmentid)->get();
            $string = 'reference number : '.strval($request->appointmentid);
            $name = rand(100000, 999999).$company->id;
            \QrCode::size(500)
                ->format('png')
                ->generate($string, public_path('/upload/qr/'.$name));
            $data = ['package' => $package,'company' => $company,'request' => $request,'visitors' => $visitors,'name' => $name];
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->WriteHTML(view('company.printflight', $data)->render());
            $rd = rand(100000,999999);
            $mpdf->Output('upload/pdf/'.$rd.'Details.pdf',\Mpdf\Output\Destination::FILE);
            Mail::to($request->email)->send(new senddoc('no',$rd.'Details.pdf'));
        }
    }
    public function viewbookednew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select('appointments.*','packages.country','companies.travel_agency_name')
            ->where('appointments.name',$company->travel_agency_name)
            ->where('appointments.last_name','offer_from_company')
            ->leftjoin('packages','packages.id','=','appointments.package_id')
            ->leftjoin('companies','companies.id','=','appointments.company_id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.viewbookednew')
                ->with('appointments',$appointment)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function viewbookedflightnew()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select('appointments.*','flights.o_country','companies.travel_agency_name')
            ->where('appointments.name',$company->travel_agency_name)
            ->where('appointments.last_name','offer_from_company_flight')
            ->leftjoin('flights','flights.id','=','appointments.package_id')
            ->leftjoin('companies','companies.id','=','appointments.company_id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.viewbookedflightnew')
                ->with('appointments',$appointment)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function checkbookednewone($id)
    {
        $appointment = appointment::select()->where('id',$id)->first();
        $appointment->status = "checked";
        $appointment->save();
        return redirect('/bookednew');
    }
    public function checkbookedflightnewone($id)
    {
        $appointment = appointment::select()->where('id',$id)->first();
        $appointment->status = "checked";
        $appointment->save();
        return redirect('/bookedflightnew');
    }
    public function printreport()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $companyall = company::select()
                    ->leftjoin('money','money.company_id','=','companies.id')  
                    ->where('money.approve_id',$company->id) 
                    ->where('money.status','on') 
                    ->get();
        if($company->addpackage != 'on' && $company->addflight != 'on' && $company->addvisa != 'on')
        {
            $companyall = company::select()
                    ->leftjoin('money','money.company_id','=','companies.id')  
                    ->where('money.approve_id',$company->id) 
                    ->where('money.status','on') 
                    ->get();
        }
        else
        {
            $companyall = company::select()
                    ->get();
        }
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.printreport')
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('companies',$companyall)
                ->with('moneyone',$moneyone)
                ->with('company',$company);
    }
    public function expert_excel(Request $request)
    {
        if($request->type == 'Visa')
        {
            $request->id == '';
        }
        if($request->company_name != 'All' && $request->id == '')
        {
            $company = company::select()->where('id',$request->company_name)->first();
            $current_company = company::select()->where('email',Auth::user()->email)->first();
            if($request->type == 'Flight' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('name',$company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Flight' && $request->use == 'Appointment')
            {
            
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$company->id)
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('name',$company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Appointment')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$company->id)
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Visa' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','appoint_statuses.current','visastatuses.cost','visastatuses.cost_1')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('name',$company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_visa')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
                            ->leftjoin('visastatuses','visastatuses.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Visa' && $request->use == 'Appointment')
            {
            
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','appoint_statuses.current','visastatuses.cost','visastatuses.cost_1')
                            ->where('appointments.company_id',$company->id)
                            ->where('appointments.name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_visa')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
                            ->leftjoin('visastatuses','visastatuses.id','=','appointments.package_id')
                            ->get();
            }
        }
        else if($request->company_name == 'All' && $request->id == '')
        {
            $current_company = company::select()->where('email',Auth::user()->email)->first();
            if($request->type == 'Flight' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Flight' && $request->use == 'Appointment')
            {
               
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Appointment')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->get();
                
            }
            if($request->type == 'Visa' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','appoint_statuses.current','visastatuses.cost','visastatuses.cost_1')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('appointments.last_name','offer_from_company_visa')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
                            ->leftjoin('visastatuses','visastatuses.id','=','appointments.package_id')
                            ->get();
            }
            if($request->type == 'Visa' && $request->use == 'Appointment')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','appoint_statuses.current','visastatuses.cost','visastatuses.cost_1')
                            ->where('appointments.name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_visa')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
                            ->leftjoin('visastatuses','visastatuses.id','=','appointments.package_id')
                            ->get();
            }
        }
        else if($request->company_name != 'All' && $request->id != '')
        {
            $company = company::select()->where('id',$request->company_name)->first();
            $current_company = company::select()->where('email',Auth::user()->email)->first();
            if($request->type == 'Flight' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('name',$company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->where('flights.id',$request->id)
                            ->get();
            }
            if($request->type == 'Flight' && $request->use == 'Appointment')
            {
            
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$company->id)
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->where('flights.id',$request->id)
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('name',$company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->where('newpackages.id',$request->id)
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Appointment')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$company->id)
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->where('newpackages.id',$request->id)
                            ->get();
            }
        }
        else if($request->company_name == 'All' && $request->id != '')
        {
            $current_company = company::select()->where('email',Auth::user()->email)->first();
            if($request->type == 'Flight' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->where('flights.id',$request->id)
                            ->get();
            }
            if($request->type == 'Flight' && $request->use == 'Appointment')
            {
               
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','flights.o_airline as airline','flights.i_airline as airline_1',
                'flights.o_air_country as country','flights.o_air_city as city','flights.o_country','flights.o_city','flights.i_country','flights.i_city'
                ,'flights.o_adult as adult','flights.o_child as child','flights.o_infant as infant','flights.o_adult_b','flights.o_child_b','flights.o_infant_b as room')
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company_flight')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('flights','flights.id','=','appointments.package_id')
                            ->where('flights.id',$request->id)
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Provied')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('appointments.company_id',$current_company->id)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->where('newpackages.id',$request->id)
                            ->get();
            }
            if($request->type == 'Package' && $request->use == 'Appointment')
            {
                $appointments = appointment::select('appointments.*','companies.travel_agency_name','visitors.sex','visitors.type','visitors.first_name',
                'visitors.last_name as ln','visitors.pssport_no','visitors.day_of_birth','newpackages.airline','newpackages.airline_1','newpackages.country','newpackages.city'
                ,'newpackages.departure_airport as o_country','newpackages.arrival_airport as o_city','newpackages.departure_airport_1 as i_country','newpackages.arrival_airport_1 as i_city'
                ,'newpackages.adult','newpackages.child','newpackages.infant','newpackages.single','newpackages.childbed','newpackages.room')
                            ->where('name',$current_company->travel_agency_name)
                            ->where('appointments.last_name','offer_from_company')
                            ->where('appointments.created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($request->start_date))))
                            ->where('appointments.created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($request->end_date))))
                            ->leftjoin('companies','companies.id','=','appointments.company_id')
                            ->leftjoin('visitors','visitors.appointment_id','=','appointments.id')
                            ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                            ->where('newpackages.id',$request->id)
                            ->get();
            }
        }     
        if($request->type == 'Visa')
        {
            $ex = new ExportAppointment1;
            $ex->appointment = $appointments;
            return Excel::download($ex, 'users.xlsx');
        }
        $ex = new ExportAppointment;
        $ex->appointment = $appointments;
        return Excel::download($ex, 'users.xlsx');
    } 
    public function visaoffer()
    {   
        $city = city::select()->get();
        $companyone = company::select()->where('email',Auth::user()->email)->first();
        if($companyone->bookvisa != 'on')
            return redirect('/');
        $offercountry = offercountry::select()->get();
        $visa = visastatus::select('visastatuses.*','companies.travel_agency_name','companies.photo as company_photo')
                ->orderBy('id', 'desc')
                ->where('visastatuses.set','on')
                ->leftjoin('companies','companies.id','=','visastatuses.company_id')
                ->where('companies.status','on')
                ->leftjoin('money','money.company_id','=','visastatuses.company_id')
                ->where('money.approve_id',$companyone->id)
                ->where('money.status','on')
                ->get();
        $company = company::select()->get();
        $companynow = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select()->where('appointments.status','good')
            ->where('appointments.last_name','offer_from_company_visa')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$companyone->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$companyone->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.index3')
                ->with('cities', $city)
                ->with('offercountries', $offercountry)
                ->with('visa', $visa)
                ->with('appointment', $appointment)
                ->with('companies', $company)
                ->with('companynow', $companynow)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('moneyone',$moneyone)
                ->with('status','Latest');
    }
    public function editvisa()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addvisa != 'on')
            return redirect('/');
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $visastatus = visastatus::select()
            ->where('company_id',$company->id)->get();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editvisa')
                ->with('visastatus',$visastatus)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function editvisaone($string)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $visastatus = visastatus::select()
                ->where('company_id',$company->id)
                ->where('name',$string)
                ->first();
        if($visastatus == '')
        {
            $visastatus1 = new visastatus();
            $visastatus1->company_id = $company->id;
            $visastatus1->name = $string;
            $visastatus1->cost = 0;
            $visastatus1->days = 0;
            $visastatus1->save();
        }
        else
        {
            $visastatus1 = $visastatus;
        }
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editvisaone')
                ->with('visastatus',$visastatus1)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function updatevisa(Request $request)
    {
        $visastatus = visastatus::select()
                ->where('id',$request->id)
                ->first();
        $visastatus->info = $request->info;
        $visastatus->cost = $request->cost;
        $visastatus->days = $request->days;
        $visastatus->set_1 = $request->set_1;
        $visastatus->days_1 = $request->days_1;
        $visastatus->cost_1 = $request->cost_1;
        $visastatus->save();
        $company = company::select()->where('email',Auth::user()->email)->first();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $visastatus = visastatus::select()
            ->where('company_id',$company->id)->get();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.editvisa')
                ->with('visastatus',$visastatus)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function checkvisa(Request $request)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $visastatus = visastatus::select()
                ->where('company_id',$company->id)
                ->where('name',$request->country)
                ->first();
        if($visastatus == '')
        {
            $visastatus1 = new visastatus();
            $visastatus1->company_id = $company->id;
            $visastatus1->name = $request->country;
            $visastatus1->cost = 0;
            $visastatus1->days = 0;
            $visastatus1->set = 'on';
            $visastatus1->save();
        }
        else if($visastatus->set == 'on')
        {
            $visastatus->set = 'off';
            $visastatus->save();
        }
        else
        {
            $visastatus->set = 'on';
            $visastatus->save();
        }
    }
    public function addappointmentvisa(Request $request)
    {
        $city = city::select()->get();
        $visa = visastatus::select('visastatuses.*','companies.travel_agency_name','companies.address','companies.travel_agency_phone_number','companies.start_date'
        ,'companies.end_date' ,'companies.start_time'  ,'companies.end_time')
                ->where('visastatuses.id',$request->visa_id)
                ->leftjoin('companies','companies.id','=','visastatuses.company_id')
                ->first();
        if($request->adult +$request->child ==0)
            $request->adult = 1;
        $company = company::select()->where('email',Auth::user()->email)->first();
        $money = money::select()
                        ->where('company_id',$visa->company_id )
                        ->where('approve_id',$company->id)
                        ->first();
        if($money == '')
        {
            $money = money::select()
                        ->where('id','1')
                        ->first();
        }
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $cappointment = appointment::select()->where('appointments.status','good')
            ->where('package_id',$request->visa_id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.booking3')
                    ->with('cities', $city)
                    ->with('visa', $visa)
                    ->with('appointment', $request)
                    ->with('cappointment', $cappointment)
                    ->with('money',$money)
                    ->with('companynow',$company)
                    ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                    ->with('moneyone',$moneyone)
                    ->with('status','booking');
    }
    public function addvisitorvisa(Request $request)
    {
        $visitor = New visitor;
        $visitor->first_name = 'name';
        $visitor->last_name = 'name';
        $visitor->type = $request->type;
        $visitor->day_of_birth =  date('Y-m-d');
        $visitor->pssport_no = 'name';
        $visitor->passport_issue_date = date('Y-m-d');
        $visitor->passport_expire_date =  date('Y-m-d');
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
        
        if ($request->hasFile('nationalphoto')) {
            $this->validate($request, [
                'nationalphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
            $image = $request->file('nationalphoto');
            $name = rand(100000, 999999).$_FILES["nationalphoto"]["name"];
            $destinationPath = public_path('/upload/visa');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $visitor->last_name = $name;
        }
        else
        {
            $visitor->last_name = 'falsenational.png';
        }
        $visitor->save();
    }
    public function addappointmentallvisa(Request $request)
    {
        
        $ss = visitor::select()->where('status',$request->test)->count();
        if($ss == '')
        {
            return 'Error';
        }
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = New appointment;
        $appointment->name = $company->travel_agency_name;
        $appointment->last_name = 'offer_from_company_visa';
        $appointment->mobile_number = $company->travel_agency_phone_number;
        $appointment->email = $company->email;
        $appointment->company_id = $request->company_id;
        $appointment->package_id = $request->visa_id;
        $appointment->adult = $request->adultnumber;
        $appointment->single = 0;
        $appointment->child = $request->childnumber;
        $appointment->infant = 0;
        $appointment->room = 0;
        $appointment->childbed = 0;
        $appointment->status = 'good';
        $appointment->save();
        $appoint_status = New appoint_status;
        $appoint_status->appointment_id = $appointment->id;
        $appoint_status->company_id = $request->company_id;
        $appoint_status->current = 'pending';
        $appoint_status->save();
        $money = money::select()
            ->where('company_id',$request->company_id)
            ->where('approve_id',$company->id)
            ->first();       
        $money->balance +=  $request->totalmoney; 
        $money->remain -=  $request->totalmoney; 
        $money->save();      
        //Mail::to($company->email)->send(new bookcomfimed($package,$appointment->id));
        $visitors = visitor::select()->where('status',$request->test)->get();
        foreach($visitors as $visitor)
        {
            $visitor->appointment_id = $appointment->id;
            $visitor->status = 'good';
            $visitor->save();
        }
        echo $appointment->id;
    }
    public function bookedvisa()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        if($company->addvisa != 'on')
            return redirect('/');
        $appointment = appointment::select('appointments.*','appoint_statuses.current','appoint_statuses.file')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
                        ->where('appointments.company_id',$company->id)
                        ->where('appointments.last_name','offer_from_company')
                        ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookedvisa')
                ->with('appointments',$appointment)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function viewbookedvisaone($id)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select()->where('id',$id)->first();
        $status = appoint_status::select()->where('appointment_id',$appointment->id)->first();
        if($appointment->name == 'Turkey')
        {
         /*   $visa = visastatus::select()->where('company_id',$appointment->company_id)
                                        ->where('name','تركيا')
                                        ->first();*/
            $visa = new visastatus;
            $visa->cost = 45;
            $visa->name = "تركيا";
        }
        else
        {
            $visa = visastatus::select()->where('id',$appointment->package_id)->first();
        }
        $visitor = visitor::select()->where('appointment_id',$id)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.bookedvisaone')
                ->with('appointment',$appointment)
                ->with('status',$status)
                ->with('visitors',$visitor)
                ->with('visa',$visa)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function updatevisaoff(Request $request)
    {
        $status = appoint_status::select()->where('appointment_id',$request->id)->first();
        $status->not_approve_info = $request->info;
        $status->save();
        return back();
    }
    public function updatevisaone(Request $request)
    {
        $status = appoint_status::select()->where('appointment_id',$request->id)->first();
        $status->pending_info = $request->info;
        $status->save();
        return back();
    }
    public function updatevisaon(Request $request)
    {
        $status = appoint_status::select()->where('appointment_id',$request->id)->first();
        $status->approve_info = $request->info;
        if ($request->hasFile('doc')) {
            $image = $request->file('doc');
            $name = rand(100000, 999999).$_FILES["doc"]["name"];
            $destinationPath = public_path('/upload/doc');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $status->file = $name;
        }
        $status->save();
        if($request->type == 'send')
        {
            $appointment = appointment::select()->where('id',$request->id)->first();
            Mail::to($appointment->email)->send(new senddocone($status->file));
        }
        return back();
    }
    public function clickcurrent(Request $request)
    {
        $status = appoint_status::select()->where('appointment_id',$request->id)->first();
        $status->current = $request->current;
        $status->save();
        return back();
    }
    public function viewbookedvisa()
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        
        $appointment = appointment::select('appointments.*','appoint_statuses.current','appoint_statuses.file')
            ->where('appointments.name',$company->travel_agency_name)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->orderby('appointments.id', 'desc')
            ->get();
        $count = appointment::select()->where('appointments.status','good')
                        ->where('appointments.company_id',$company->id)
                        ->where('appointments.last_name','offer_from_company')
                        ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.viewbookedvisa')
                ->with('appointments',$appointment)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function viewbookedmyvisaone($id)
    {
        $company = company::select()->where('email',Auth::user()->email)->first();
        $appointment = appointment::select()->where('id',$id)->first();
        $status = appoint_status::select()->where('appointment_id',$appointment->id)->first();
        $visa = visastatus::select()->where('id',$appointment->package_id)->first();
        $visitor = visitor::select()->where('appointment_id',$id)->get();
        $count = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company')
            ->count();
        $count1 = appointment::select()->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_flight')
            ->count();
        $count2 = appointment::select('appointments.*')->where('appointments.status','good')
            ->where('appointments.company_id',$company->id)
            ->where('appointments.last_name','offer_from_company_visa')
            ->leftjoin('appoint_statuses','appoint_statuses.appointment_id','=','appointments.id')
            ->where('appoint_statuses.current','!=','on')
            ->count();
        $moneyone = money::select()
            ->where('company_id',1)
            ->where('approve_id',$company->id)
            ->first();
        if($moneyone == '')
        {
            $moneyone = money::select()
                        ->where('id','1')
                        ->first();
        }
        return view('company.viewbookedvisaone')
                ->with('appointment',$appointment)
                ->with('status',$status)
                ->with('visitors',$visitor)
                ->with('visa',$visa)
                ->with('count',$count)->with('count1',$count1)->with('count2',$count2)->with('count1',$count1)
                ->with('company',$company)
                ->with('moneyone',$moneyone);
    }
    public function deletebookedone($id)
    {
        $appointment = appointment::select()->where('id',$id)->first();
        if($appointment->last_name == 'offer_from_company_flight')
        {
            $package = flight::select()->where('id',$appointment->package_id)->first();
            $balance = $package->o_adult*$appointment->adult
            +$package->o_child*$appointment->child
            +$package->o_infant*$appointment->infant
            +$package->o_adult_b*$appointment->childbed
            +$package->o_child_b*$appointment->room;
        }
        else if($appointment->last_name == 'offer_from_company_visa')
        {
            $package = visastatus::select()->where('id',$appointment->package_id)->first();
            if($package != '')
            {
                $balance = $package->cost*$appointment->adult;
                if($package->cost_1 != '')
                    $balance += $package->cost_1*$appointment->child;
            }
            else
            {
                $appointment->delete();
                return back();
            }
        }
        else if($appointment->last_name == 'offer_from_company')
        {
            $package = newpackage::select()->where('id',$appointment->package_id)->first();
            if($appointment->signle == 'on')
            {
                $balance = $package->signle;
            }
            else
            {
                $balance = $package->adult*$appointment->adult
                +$package->child*$appointment->child
                +$package->infant*$appointment->infant
                +$package->childbed*$appointment->childbed
                +$package->room*$appointment->room;
            }
        }
        $company = company::select()->where('travel_agency_name',$appointment->name)->first();
        $money = money::select()
                ->where('company_id',$appointment->company_id)
                ->where('approve_id',$company->id)
                ->first();       
        $money->balance -=  $balance; 
        $money->remain +=  $balance; 
        $money->save();
        $appointment->delete();
        visitor::select()->where('appointment_id',$id)->delete();
        return back();
    }
    public function changeconfirm($id)
    {
        $appointment = appointment::select()->where('id',$id)->first();
        $appointment->status = 'good';
        $appointment->save();
        return redirect('/');
    }
    
}
