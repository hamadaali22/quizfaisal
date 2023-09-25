<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\ContactInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Admin_Video;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id=Auth::user()->id;
        $users=User::findOrFail($id);
        return view('admin.profile',compact('users'));
    }


    public function updateProfile(Request $request)
    {

        // dd('dddddddsssaaaacc');
         $users= Auth::user();
         // dd($users->id);
         $edit = User::find($users->id);



         if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'img/users';
            $request-> file('photo') ->move($path,$file_name);

            $edit->photo  =$file_nameone;
            File::delete(public_path("assets_admin/img/users/". $edit->photo));

         }else{
            $edit->photo  = $request->url;
         }
         $edit->name    = $request->name;
         // $edit->dateOfBirth  = $request->dateOfBirth;
         $edit->mobile  = $request->mobile;
         // $edit->address  = $request->address;



         $edit->save();


        // $category = Speciality::findOrFail($request->id);

        // $category->update($request->all());

        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function settings()
    {
        $contactInfo=ContactInfo::first();
        return view('admin.settings.settings',compact('contactInfo'));
    }


    public function updateSettings(Request $request)
    {
        $edit = ContactInfo::first();
        if($file1=$request->file('image'))
        {
            $file_extension1 = $request -> file('image') -> getClientOriginalExtension();
            $file_name1 = 'image'.time().'.'.$file_extension1;
            $file_nameone1 = $file_name1;
            $path1 = 'img/settings';
            $request-> file('image') ->move($path1,$file_name1);
            $edit->image  = $file_nameone1;
        }else{
            $edit->image  = $edit->image;
        }
        if($file2=$request->file('logo'))
        {
            $file_extension2 = $request -> file('logo') -> getClientOriginalExtension();
            $file_name2 = 'logo'.time().'.'.$file_extension2;
            $file_nameone2 = $file_name2;
            $path2 = 'img/settings';
            $request-> file('logo') ->move($path2,$file_name2);
            $edit->logo  = $file_nameone2;
        }else{
            $edit->logo  = $edit->logo;
        }

        if($file3=$request->file('favicon'))
        {
            $file_extension3 = $request -> file('favicon') -> getClientOriginalExtension();
            $file_name3 = 'favicon'.time().'.'. $file_extension3;
            $file_nameone3 = $file_name3;
            $path3 = 'img/settings';
            $request-> file('favicon') ->move($path3,$file_name3);
            $edit->favicon  = $file_nameone3;
        }else{
            $edit->favicon  = $edit->favicon;
        }
        if($filea1=$request->file('a1'))
        {
            $file_extensiona1 = $request -> file('a1') -> getClientOriginalExtension();
            $file_namea1 = 'a1'.time().'.'. $file_extensiona1;
            $file_nameonea1 = $file_namea1;
            $patha1 = 'img/settings';
            $request-> file('a1') ->move($patha1,$file_namea1);
            $edit->a1  = $file_nameonea1;
        }else{
            $edit->a1  = $edit->a1;
        }
        if($filea2=$request->file('a2'))
        {
            $file_extensiona2 = $request -> file('a2') -> getClientOriginalExtension();
            $file_namea2 = 'a2'.time().'.'. $file_extensiona2;
            $file_nameonea2 = $file_namea2;
            $patha2 = 'img/settings';
            $request-> file('a2') ->move($patha2,$file_namea2);
            $edit->a2  = $file_nameonea2;
        }else{
            $edit->a2  = $edit->a2;
        }
        if($fileb1=$request->file('b1'))
        {
            $file_extensionb1 = $request -> file('b1') -> getClientOriginalExtension();
            $file_nameb1 = 'b1'.time().'.'. $file_extensionb1;
            $file_nameoneb1 = $file_nameb1;
            $pathb1 = 'img/settings';
            $request-> file('b1') ->move($pathb1,$file_nameb1);
            $edit->b1  = $file_nameoneb1;
        }else{
            $edit->b1  = $edit->b1;
        }

        if($fileb2=$request->file('b2'))
        {
            $file_extensionb2 = $request -> file('b2') -> getClientOriginalExtension();
            $file_nameb2 = 'b2'.time().'.'. $file_extensionb2;
            $file_nameoneb2 = $file_nameb2;
            $pathb2 = 'img/settings';
            $request-> file('b2') ->move($pathb2,$file_nameb2);
            $edit->b2  = $file_nameoneb2;
        }else{
            $edit->b2  = $edit->b2;
        }
        if($filec1=$request->file('c1'))
        {
            $file_extensionc1 = $request -> file('c1') -> getClientOriginalExtension();
            $file_namec1 = 'c1'.time().'.'. $file_extensionc1;
            $file_nameonec1 = $file_namec1;
            $pathc1 = 'img/settings';
            $request-> file('c1') ->move($pathc1,$file_namec1);
            $edit->c1  = $file_nameonec1;
        }else{
            $edit->c1  = $edit->c1;
        }
        if($filem1=$request->file('m1'))
        {
            $file_extensionm1 = $request -> file('m1') -> getClientOriginalExtension();
            $file_namem1 = 'm1'.time().'.'. $file_extensionm1;
            $file_nameonem1 = $file_namem1;
            $pathm1 = 'img/settings';
            $request-> file('m1') ->move($pathm1,$file_namem1);
            $edit->m1  = $file_nameonem1;
        }else{
            $edit->m1  = $edit->m1;
        }
        $edit->title = $request->title;
        $edit->about = $request->about;
        $edit->level_desc  = $request->level_desc;
        $edit->exam_desc  = $request->exam_desc;
        $edit->save();
        return back()->with("message", 'updated ');
    }

    public function updateContactData(Request $request)
    {
         // $userId = 1;
         $edit = ContactInfo::first();

         // dd($request->all());
         $edit->phone  = $request->phone;
         $edit->email  = $request->email;
         $edit->address_ar  = $request->address_ar;
         $edit->address_en  = $request->address_en;
         $edit->longitude  = $request->longitude;
         $edit->latitude  = $request->latitude;
         $edit->save();

        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function allAdminVideo()
    {
        $admin_videos=Admin_Video::get();
        return view('admin.settings.all_video',compact('admin_videos'));
    }
    public function addAdminVideo(Request $request)
    {
        $this->validate($request, [
            'url'     => 'required',
            'title'     => 'required',
        ]);
        $add = new Admin_Video;
        // if($file=$request->file('url'))
        // {
        //     $file_extension = $request -> file('url') -> getClientOriginalExtension();
        //     $file_name = time().'.'.$file_extension;
        //     $file_nameone = $file_name;
        //     $path = 'assets_admin/img/settings/video';
        //     $request-> file('url') ->move($path,$file_name);
        //     $add->url  = $file_name;
        // }
        $add->url = $request->url;
        $add->title  = $request->title;
        $add->save();

        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function deleteAdminVideo(Request $request)
    {
        // dd($request->id);
        $delete_video = Admin_Video::find($request->id);
        $delete_video->delete();
        return back()->with("message",'تم الحذف بنجاح');
    }
    public function updatePrivacy(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->privacy_ar  = $request->privacy_ar;
        $edit->privacy_en  = $request->privacy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateAgreement(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->agreements_ar  = $request->agreements_ar;
         $edit->agreements_en  = $request->agreements_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function agreement_student()
    {
        $contactInfo=ContactInfo::first();
        return view('admin.settings.agreement_student',compact('contactInfo'));
    }
    public function updateAgreement_student(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->agreements_student_ar  = $request->agreements_student_ar;
         $edit->agreements_student_en  = $request->agreements_student_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateTerms(Request $request)
    {
        $edit = ContactInfo::first();
         $edit->terms_ar  = $request->terms_ar;
         $edit->terms_en  = $request->terms_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }


     public function updateReturn_policy(Request $request)
    {
        $edit = ContactInfo::first();
        // dd('csdsd');
        $edit->return_policy_ar  = $request->return_policy_ar;
        $edit->return_policy_en  = $request->return_policy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function updateCancellationPolicy(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->cancellation_policy_ar  = $request->cancellation_policy_ar;
        $edit->cancellation_policy_en  = $request->cancellation_policy_en;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function updateDeliveryPolicy(Request $request)
    {
        // dd('ffff');
        $edit = ContactInfo::first();
         $edit->delivery_ar  = $request->delivery_ar;
         $edit->delivery_en  = $request->delivery_en;
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }

    public function certificatePrice()
    {
        $contactInfo=ContactInfo::first();
        return view('admin.settings.certificate',compact('contactInfo'));
    }
    public function updateCertificatePrice(Request $request)
    {
        $edit = ContactInfo::first();
        $edit->certificate_price  = $request->certificate_price;
        $edit->live_certificate  = $request->live_certificate;
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح');
    }
    public function changePassword(Request $request){
        $user=Auth::user();
        $this->validate($request, [
            'current-password'     => 'required',
            'new-password'     => 'required',
            // 'confirm_password' => 'required|same:new_password',
        ]);
        // dd('ugutg');
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            return redirect()->back()->with("error","كلمة المرور الحالية لا تتطابق مع كلمة المرور التي قدمتها. حاول مرة اخرى.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","لا يمكن أن تكون كلمة المرور الجديدة هي نفسها كلمة مرورك الحالية. الرجاء اختيار كلمة مرور مختلفة.");
        }

        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("message","تم تغيير الرقم السري بنجاح !");
    }
}
