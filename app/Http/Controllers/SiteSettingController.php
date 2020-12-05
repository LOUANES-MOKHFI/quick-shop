<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\SiteSettingRequest;
class SiteSettingController extends Controller
{
    public function index(){
   if(Auth::user()->id == 1){
    $sitesetting = SiteSetting::find(1);
    return view('admin.sitesetting',compact('sitesetting'));
 }
      else{
            return view('admin.layouts.error_404');     
             }
    	
    }

    public function store(SiteSettingRequest $request, SiteSetting $sitesetting){
   if($request->hasFile('logo'))
       {
        $sitesetting->logo = $request->file('logo');
      $new_name = rand(). '.' .  $sitesetting->logo->getClientOriginalExtension();
        $sitesetting->logo->move('images/',$new_name);
         $sitesetting->logo = $new_name;
        }

      if($request->hasFile('welcome_photo'))
       {
        $sitesetting->welcome_photo = $request->file('welcome_photo');
      $new_name = rand(). '.' .  $sitesetting->welcome_photo->getClientOriginalExtension();
        $sitesetting->welcome_photo->move('images/',$new_name);
         $sitesetting->welcome_photo = $new_name;
   //$actualite->image = $request->image->store('image');
        }
    $sitesetting->site_name = $request->input('site_name');
    $sitesetting->slegon = $request->input('slegon');
    $sitesetting->adress = $request->input('adress');
    $sitesetting->site_email = $request->input('site_email');
    $sitesetting->site_phone = $request->input('site_phone');
        $sitesetting->save();
          
         session()->flash('success','La modification à étè faite avec succée');

 return redirect('/admin/sitesetting');
}
  
public function update($id,SiteSettingRequest $request){

		$sitesetting = SiteSetting::find($id);

    if($request->hasFile('logo'))
       {
        $sitesetting->logo = $request->file('logo');
      $new_name = rand(). '.' .  $sitesetting->logo->getClientOriginalExtension();
        $sitesetting->logo->move('images/',$new_name);
         $sitesetting->logo = $new_name;
   //$actualite->image = $request->image->store('image');
        }
        if($request->hasFile('welcome_photo'))
       {
        $sitesetting->welcome_photo = $request->file('welcome_photo');
      $new_name = rand(). '.' .  $sitesetting->welcome_photo->getClientOriginalExtension();
        $sitesetting->welcome_photo->move('images/',$new_name);
         $sitesetting->welcome_photo = $new_name;
   //$actualite->image = $request->image->store('image');
        }
    $sitesetting->site_name = $request->input('site_name');
    $sitesetting->slegon = $request->input('slegon');
    $sitesetting->adress = $request->input('adress');
    $sitesetting->site_email = $request->input('site_email');
    $sitesetting->site_phone = $request->input('site_phone');

        $sitesetting->save();
          
          session()->flash('success','La modification à étè faite avec succée');

 return redirect('/admin/sitesetting');
    }
}
