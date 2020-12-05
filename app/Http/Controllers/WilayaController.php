<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilaya;
use App\Http\Requests\WilayaRequest;
use DB;
class WilayaController extends Controller
{
    public function index(){
    	$wilayas = Wilaya::where('deleted',0)->orderBy('wilaya')->paginate(15);
    	return view('admin.wilaya.index',compact('wilayas'));
    }
    
    public function search_wilaya_admin(WilayaRequest $request){
    	$wilaya = $request->get('wilaya');
    	$wilayas = Wilaya::where('deleted',0)->where('wilaya','Like','%'.$wilaya.'%')->orderBy('wilaya')->paginate(15)->appends('wilaya',$wilaya);
    	return view('admin.wilaya.index',compact('wilayas'));
    }
    
    public function create(){
    	
    	return view('admin.wilaya.add');
    }

    public function store(WilayaRequest $request,Wilaya $wilayas){
         
          if(!$request->has('active'))
          {
           $wilayas -> create([
           'wilaya' => $request->wilaya,
           'prix'   => $request->prix,
           'active' =>0,
            ]);
            }
            else
            {
            $wilayas -> create([
           'wilaya' => $request->wilaya,
           'prix'   => $request->prix,
           'active' =>1,
            ]);
            }
          Session()->flash('l\'insertion de wilaya a étè faite avec succée');
          return redirect('admin/wilaya');

    }

     public function edit($id){
    	$wilaya = Wilaya::where('deleted',0)->where('id',$id)->first();
    	if($wilaya === null){
         return view('admin.layouts.error_404');
    	}else{
          return view('admin.wilaya.edit',compact('wilaya'));
    	}	
    }

     public function update(WilayaRequest $request,$id){
          
          $wilaya = Wilaya::where('deleted',0)->where('id',$id)->first();
           DB::beginTransaction();
           if(!$request->has('active')){
            $wilaya->active = 0;
            $wilaya->save();
            // $request->request->add(['active' => 0]);
          }
          else{
           //$request->request->add(['active' => 1]);
            $wilaya->active = 1;
            $wilaya->save();

          }
          $wilaya -> update([
           'wilaya' => $request->wilaya,
           'prix'   => $request->prix,
            ]);
            DB::commit();
          Session()->flash('la modification de wilaya a étè faite avec succée');
          return redirect('admin/wilaya');

    }
    public function destroy($id){
           $wilaya = Wilaya::find($id);
           $wilaya->deleted = 1;
           $wilaya->save();
           Session()->flash('la Supression de wilaya a étè faite avec succée');
          return redirect('admin/wilaya');
    }
    public function show(){}

    public function getPrice()
    {
        $id = $_GET['id'];
        $wilaya = Wilaya::find($id);
        return $wilaya;
  
    }
}
