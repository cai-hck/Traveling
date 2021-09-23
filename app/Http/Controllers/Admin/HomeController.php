<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Admin;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



use App\city;
use App\area;
use App\after_doctor_signup;
use App\company;
use App\contact;
use App\contactus;
use App\contactcompany;
use App\package;
use App\newpackage;
use App\appointment;
use App\visitor;
use App\money;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\companyapprove;
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home')
                ->with('name','Dashboard');
    }
    public function addnewcompany()
    {
        $company = company::select()->where('status','not')->get();
        return view('admin.addnewcompany')
                ->with('companies',$company)
                ->with('name','Add New Company');
    }
    public function listofcompany()
    {
        $company = company::select('companies.*','money.balance','money.remain','money.company_id','money.status as money_status')
        ->whereIn('companies.status',['on','suspended'])            
                    ->leftjoin('money','money.approve_id','companies.id')
                    ->get();
        return view('admin.listofcompany')
                ->with('companies',$company)
                ->with('name','List of Company');
    }
    public function approvecompnay(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        $company->status = "on";
        $url = "http://travel4iraqi.com/checkcompanypackage/".$company->id;
        $name = rand(100000, 999999).$company->id;
        \QrCode::size(500)
            ->format('png')
            ->generate($url, public_path('/upload/qr/'.$name));
        $company->qr= $name;
        if(Auth::user()->designation == 'Manager')
        {
            
            $company->bookflight= 'on';
            $company->bookpackage= 'on';
            $company->bookvisa= 'on';
        }
        else
        {
            $company->bookflight= 'on';
            $company->bookpackage= 'on';
            $company->bookvisa= 'on';
        }
        $company->approve_number= 100;
        $company->save();
        Mail::to($company->email)->send(new companyapprove($company->email,$company->travel_agency_name));
        
        $user = new User();
        $user->name = $company->travel_agency_name;
        $user->email = $company->email;
        $user->password = bcrypt(base64_decode($company->password));
        $user->save();
    }
    public function declinecompnay(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        $package = package::select()->where('company_id',$request->id)->get();
        $appointment = appointment::select()->where('company_id',$request->id)->get();
        foreach($appointment as $oneappointment)
        {
            visitor::select()->where('appointment_id',$oneappointment->id)->delete();
        }
        $company->delete();
        package::select()->where('company_id',$request->id)->delete();
        newpackage::select()->where('company_id',$request->id)->delete();
        appointment::select()->where('company_id',$request->id)->delete();
    }
    public function suspendcompnay(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        $company->status = 'suspended';
        $company->save();
    }
    public function unsuspendcompnay(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        $company->status = 'on';
        $company->save();
    }
    public function addcity()
    {
        $city = city::select()->get();
        return view('admin.addcity')
                ->with('cities',$city)
                ->with('name','Add City');
    }
    
    public function newcity(Request $request)
    {
        $this->validate($request, [
            'english' => 'required',
            'arabic' => 'required',
          ]);
        $city = new city();
        $city->english = $request->english;
        $city->arabic = $request->arabic;
        $city->save();
        return back();
    }
    public function editcity(Request $request)
    {
        $this->validate($request, [
            'english' => 'required',
            'arabic' => 'required',
          ]);
        $city = city::select()->where('id',$request->id)->first();
        $city->english = $request->english;
        $city->arabic = $request->arabic;
        $city->save();
        return back();
    }
    public function deletecity($id)
    {
        $city = city::select()->where('id',$id)->first();
        $city->delete();
        return back();
    }
    public function addarea()
    {
        $area = area::select()->get();
        $city = city::select()->get();
        return view('admin.addarea')
                ->with('cities',$city)
                ->with('areas',$area)
                ->with('name','Add Aera');
    }
    public function newarea(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'english' => 'required',
            'arabic' => 'required',
        ]);
        $area = new area();
        $area->english = $request->english;
        $area->arabic = $request->arabic;
        $area->city = $request->city;
        $area->save();
        return back();
    }
    public function editarea(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'english' => 'required',
            'arabic' => 'required',
        ]);
        $area = area::select()->where('id',$request->id)->first();
        $area->english = $request->english;
        $area->arabic = $request->arabic;
        $area->city = $request->city;
        $area->save();
        return back();
    }
    public function deletearea($id)
    {
        $area = area::select()->where('id',$id)->first();
        $area->delete();
        return back();
    }
    public function aftercompanysignup()
    {
        $aftercompanysignup = after_doctor_signup::select()->first();
        return view('admin.aftercompanysignup')
                ->with('aftercompanysignup',$aftercompanysignup)
                ->with('name','After Company SignUp');
    }
    public function edit_aftercompanysignup(Request $request)
    {
        $aftercompanysignup = after_doctor_signup::select()->first();
        $aftercompanysignup->content = $request->content;
        $aftercompanysignup->save();
        return back();
    }
    public function contactus()
    {
        $contact = contact::select()->get();
        return view('admin.contactus')
                ->with('contacts',$contact)
                ->with('name','Contact Us');
    }
    public function editcontactus(Request $request)
    {
        $contact = contact::select()->where('id',$request->id)->first();
        $contact->status = "checked";
        $contact->save();
        return back();  
    }
    public function deletecontactus($id)
    {
        $contact = contact::select()->where('id',$id)->first();
        $contact->delete();
        return back();
    }

    public function contactturkey()
    {
        $contact = contactus::select()->get();
        return view('admin.contactturkey')
                ->with('contacts',$contact)
                ->with('name','Contact Turkey');
    }
    public function edit_contact(Request $request)
    {
        $contact = contactus::select()->where('id',$request->id)->first();
        $contact->status = "checked";
        $contact->save();
        return back();  
    }
    public function delete_contact($id)
    {
        $contact = contactus::select()->where('id',$id)->first();
        $contact->delete();
        return back();
    }
    public function contactcompany()
    {
        $contactcompany = contactcompany::select('contactcompanies.*','companies.travel_agency_name','companies.travel_agency_phone_number','companies.email')
                    ->leftjoin('companies','companies.id','=','contactcompanies.company_id')
                    ->get();
        return view('admin.contactcompany')
                ->with('contactcompanies',$contactcompany)
                ->with('name','Contact Us');
    }
    public function editcontactcompany(Request $request)
    {
        $contactcompany = contactcompany::select()->where('id',$request->id)->first();
        $contactcompany->status = "checked";
        $contactcompany->save();
        return back();  
    }
    public function deletecontactcompany($id)
    {
        $contactcompany = contactcompany::select()->where('id',$id)->first();
        $contactcompany->delete();
        return back();
    }
    public function clear($id)
    {
        $company = company::select()->where('id',$id)->first();
        $company->balance = 0;
        $company->save();
        return back();
    }
    public function turkey($id)
    {
        $companies = company::select()->get();
        foreach($companies as $companyone)
        {
            $companyone->turkey = 'off';
            $companyone->save();
        }
        $company = company::select()->where('id',$id)->first();
        $company->turkey = 'on';
        $company->save();
        return back();
    }
    public function package()
    {
        $package = newpackage::select('newpackages.*','companies.travel_agency_name')
                    ->leftjoin('companies','companies.id','=','newpackages.company_id')
                    ->get();
        return view('admin.package')
                ->with('packages',$package)
                ->with('name','List of Packages');
    }
    public function booked()
    {
        $appointment = appointment::select('appointments.*','companies.travel_agency_name'
        ,'newpackages.adult as price_adult','newpackages.child as price_child','newpackages.infant as price_infant',
        'newpackages.childbed as price_childbed','newpackages.single as price_single')
                    ->where('appointments.last_name','offer_from_company')
                    ->leftjoin('companies','companies.id','=','appointments.company_id')
                    ->leftjoin('newpackages','newpackages.id','=','appointments.package_id')
                    ->get();
        return view('admin.booked')
                ->with('appointments',$appointment)
                ->with('name','Booked Details Packages');
    }
    
    public function bookedflight()
    {
        $appointment = appointment::select('appointments.*','companies.travel_agency_name'
        ,'flights.o_adult as price_adult','flights.o_child as price_child','flights.o_infant as price_infant',
        'flights.o_adult_b as price_adult_b','flights.o_child_b as price_child_b','flights.o_infant_b as price_infant_b')
                    ->where('appointments.last_name','offer_from_company_flight')
                    ->leftjoin('companies','companies.id','=','appointments.company_id')
                    ->leftjoin('flights','flights.id','=','appointments.package_id')
                    ->get();
        return view('admin.bookedflight')
                ->with('appointments',$appointment)
                ->with('name','Booked Details Flights');
    }
    public function bookedvisa()
    {
        $appointment = appointment::select('appointments.*','companies.travel_agency_name'
        ,'visastatuses.cost','visastatuses.name as country')
                    ->where('appointments.last_name','offer_from_company_visa')
                    ->leftjoin('companies','companies.id','=','appointments.company_id')
                    ->leftjoin('visastatuses','visastatuses.id','=','appointments.package_id')
                    ->get();
        return view('admin.bookedvisa')
                ->with('appointments',$appointment)
                ->with('name','Booked Details Visa');
    }
    public function setcompanystatus(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        if($request->name == 'addflight')
        {
            if($company->addflight != 'on')
                $company->addflight = 'on';
            else
                $company->addflight = 'off';

        }
        if($request->name == 'addpackage')
        {
            if($company->addpackage != 'on')
                $company->addpackage = 'on';
            else
                $company->addpackage = 'off';

        }
        if($request->name == 'bookflight')
        {
            if($company->bookflight != 'on')
                $company->bookflight = 'on';
            else
                $company->bookflight = 'off';

        }
        if($request->name == 'bookpackage')
        {
            if($company->bookpackage != 'on')
                $company->bookpackage = 'on';
            else
                $company->bookpackage = 'off';

        }
        if($request->name == 'addvisa')
        {
            if($company->addvisa != 'on')
                $company->addvisa = 'on';
            else
                $company->addvisa = 'off';

        }
        if($request->name == 'bookvisa')
        {
            if($company->bookvisa != 'on')
                $company->bookvisa = 'on';
            else
                $company->bookvisa = 'off';

        }
        $company->save();
    }
    public function setcompanynumber(Request $request)
    {
        $company = company::select()->where('id',$request->id)->first();
        $company->approve_number = $request->name;
        $company->save();
    }
    public function addadmin()
    {
        return view('admin.addadmin')
                ->with('name','Add Second Admin');
    }
    public function approvecheck(Request $request)
    {
        $money = money::select()
                ->where('company_id',1)
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = 1;
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
        $money = money::select()
                ->where('company_id',1 )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = 1;
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
    public function clearmoney(Request $request)
    {
        $money = money::select()
                ->where('company_id',1 )
                ->where('approve_id',$request->company_id)
                ->first();
        if($money == '')
        {
            $money1 = new money();
            $money1->company_id = 1;
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
}
