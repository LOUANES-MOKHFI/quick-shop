<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsletterRequest;
use App\NewsletterSubscriber;
//use Excel;
use Maatwebsite\Excel\Facades\Excel;
class NewsletterController extends Controller
{
   public function checksubscribe(Request $request){
    if($request->ajax()){
    	$data = $request->all();
    	  //print_r($data);
    	$subscribeCount = NewsletterSubscriber::where('email',$data['email'])->count();
    	if($subscribeCount>0){
    		echo "exist";
    	}
    }
   }
public function addsubscribe(Request $request){
    if($request->ajax()){
    	$data = $request->all();
    	  //print_r($data);
    	$subscribeCount = NewsletterSubscriber::where('email',$data['email'])->count();
    	if($subscribeCount>0){
    		echo "exist";
    	}else{
    		$newsletter = new NewsletterSubscriber;
    		$newsletter->email = $data['email'];
    		$newsletter->status = 1;
    		$newsletter->save();
    		echo "Enregistre";
    	}
    }
   }

   public function view(){
     $newsletters = NewsletterSubscriber::paginate(15);
     return view('admin.newsletter.index',compact('newsletters'));
   }

public function export_excel(){
    $newsletters = NewsletterSubscriber::select('id','email','created_at')->orderBy('id','Desc')->get();
    $newsletters = json_encode(json_decode($newsletters),true);
     return Excel::create('newsletter'.rand(),function($excel) use($newsletters){
     	$excel->sheet('mySheet',function($sheet) use ($newsletters){
     		$sheet->fromArray($newsletters);
     	});
     })->download('xlsx');
   }

}
