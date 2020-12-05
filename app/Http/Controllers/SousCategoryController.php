<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SousCategory;
use App\Http\Requests\SousCategoryRequest;
use Illuminate\Support\Facades\Auth;
class SousCategoryController extends Controller
{
   public function index(){
    	$souscategory = SousCategory::where('deleted',0)->paginate(15);
    	return view('admin.souscategory.index',compact('souscategory'));
    }
    
    public function search_sous_category_admin(Request $request){
    	$sous_cat = $request->get('souscategory');
    	$souscategory = SousCategory::where('deleted',0)->where('souscategory','Like','%'.$sous_cat.'%')->paginate(15);
    	return view('admin.souscategory.index',compact('souscategory'));
    }

    public function create(){
    	
    	return view('admin.souscategory.add');
    }

    public function store(SousCategoryRequest $request,SousCategory $souscategory){
          $souscategory->souscategory = $request->input('sous_category');

        if($request->hasFile('image'))
       {
        $souscategory->image = $request->file('image');
        $new_name = rand(). '.' . $souscategory->image->getClientOriginalExtension();
        $souscategory->image->move('souscategory/',$new_name);
        $souscategory->image = $new_name;
        }
          $souscategory->id_category = $request->input('id_category'); 
$souscategory->save();

          Session()->flash('l\'insertion de sous categorie a étè faite avec succée');
          return redirect('admin/sous-category');

    }

     public function edit($id){
    	$souscategory = SousCategory::where('deleted',0)->where('id',$id)->first();
    	if($souscategory === null){
         return view('admin.layouts.error_404');
    	}else{
          return view('admin.souscategory.edit',compact('souscategory'));
    	}
    	
    }

     public function update(Request $request,$id){
          $souscategory = SousCategory::where('id',$id)->first();
           $souscategory->souscategory = $request->input('sous_category');

	        if($request->hasFile('image'))
	       {
	        $souscategory->image = $request->file('image');
	        $new_name = rand(). '.' . $souscategory->image->getClientOriginalExtension();
	        $souscategory->image->move('souscategory/',$new_name);
	        $souscategory->image = $new_name;
	        }
          $souscategory->id_category = $request->input('id_category'); 
           $souscategory->save();
          Session()->flash('la modification de sous categorie a étè faite avec succée');
          return redirect('admin/sous-category');

    }
    public function destroy($id){
           $souscategory = SousCategory::find($id);

            $products = $souscategory->Products();
         if(isset($products) && $products->count() > 0)
         {
          return redirect('admin/sous-category')->with('error','Impossible de supprimer cette sous  category');
         }
           $souscategory->deleted = 1;
           $souscategory->save();
           Session()->flash('la Supression de sous categorie a étè faite avec succée');
          return redirect('admin/sous-category');
    }
    public function show($id){
       $souscategory = SousCategory::find($id);
          if($souscategory === null){
         return view('admin.layouts.error_404');
      }else{
          return view('admin.souscategory.show',compact('souscategory'));
        }
    }
}
