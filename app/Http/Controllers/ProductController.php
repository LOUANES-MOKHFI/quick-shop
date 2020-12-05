<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SousCategory;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
 public function index(){
       
          
        $products = Product::where('deleted',0)->where('confirmation_admin',1)->orderBy('marque')->paginate(20);
      return view('admin.product.index',compact('products'));
        
    }
     public function product_not_confirmed(){
       
          
        $products = Product::where('deleted',0)->where('confirmation_admin',0)->orderBy('marque')->paginate(20);
      return view('admin.product.product-not-confirmed',compact('products'));
        
    }
    
    public function search_product_admin(Request $request){
    	$product = $request->get('product');
$id_user = Auth::user()->id;
    	$products = Product::where('deleted',0)->where('id_user',$id_user)
       ->where('name','Like','%'.$product.'%')
       ->Orwhere('marque','Like','%'.$product.'%')
       ->Orwhere('pays_production','Like','%'.$product.'%')->orderBy('name')
       ->paginate(20)->appends('product',$product);
    	return view('admin.product.index',compact('products'));
    }
    
    public function create(){
    	
    	return view('admin.product.add');
    }

    public function store(ProductRequest $request,Product $product){
     $id_user = Auth::user()->id;
     if($id_user == 1)
        {
$product->confirmation_admin = 1;

        }else{
$product->confirmation_admin = 0;

        }

        $product->name = $request->input('name');

 if($request->hasFile('image_principale'))
       {
       $product->image_principale = $request->file('image_principale');
       $new_name = rand(). '.' . $product->image_principale->getClientOriginalExtension();
        $product->image_principale->move('product/',$new_name);
        $product->image_principale = $new_name;
        }
        if($request->hasFile('image1'))
       {
       $product->image1 = $request->file('image1');
       $new_name = rand(). '.' . $product->image1->getClientOriginalExtension();
        $product->image1->move('product/',$new_name);
        $product->image1 = $new_name;
        }
         if($request->hasFile('image2'))
       {
       $product->image2 = $request->file('image2');
       $new_name = rand(). '.' . $product->image2->getClientOriginalExtension();
        $product->image2->move('product/',$new_name);
        $product->image2 = $new_name;
        }
         if($request->hasFile('image3'))
       {
       $product->image3 = $request->file('image3');
       $new_name = rand(). '.' . $product->image3->getClientOriginalExtension();
        $product->image3->move('product/',$new_name);
        $product->image3 = $new_name;
        }
        if($request->hasFile('image4'))
       {
       $product->image4 = $request->file('image4');
       $new_name = rand(). '.' . $product->image4->getClientOriginalExtension();
        $product->image4->move('product/',$new_name);
        $product->image4 = $new_name;
        }

        $product->marque = $request->input('marque');
        $product->designation = $request->input('designation');
        $product->reference = $request->input('reference');
        $product->pays_production = $request->input('pays_production');
        $product->poids = $request->input('poids');
        $product->prix = $request->input('prix');
        $product->prix_promo = $request->input('prix_promo');
        $product->qte = $request->input('qte');
        $product->description = $request->input('description');
        $product->id_category = $request->input('id_category');
        $product->id_souscategory = $request->input('id_souscategory');
        $product->id_user = $id_user;

          $product->save();
          Session()->flash('l\'insertion de produit a étè faite avec succée');
          return redirect('admin/product');

    }

     public function edit($id){
       $id_user = Auth::user()->id;
    	$product = Product::where('deleted',0)->where('id',$id)->where('id_user',$id_user)->first();
    	if($product === null){
         return view('admin.layouts.error_404');
    	}else{
          return view('admin.Product.edit',compact('product'));
    	}
    	
    }

     public function update(Request $request,$id){
          
          $product = Product::where('deleted',0)->where('id',$id)->first();
         $id_user = Auth::user()->id;
        $product->name = $request->input('name');

 if($request->hasFile('image_principale'))
       {
       $product->image_principale = $request->file('image_principale');
       $new_name = rand(). '.' . $product->image1->getClientOriginalExtension();
        $product->image_principale->move('product/',$new_name);
        $product->image_principale = $new_name;
        }
        if($request->hasFile('image1'))
       {
       $product->image1 = $request->file('image1');
       $new_name = rand(). '.' . $product->image1->getClientOriginalExtension();
        $product->image1->move('product/',$new_name);
        $product->image1 = $new_name;
        }
         if($request->hasFile('image2'))
       {
       $product->image2 = $request->file('image2');
       $new_name = rand(). '.' . $product->image2->getClientOriginalExtension();
        $product->image2->move('product/',$new_name);
        $product->image2 = $new_name;
        }
         if($request->hasFile('image3'))
       {
       $product->image3 = $request->file('image3');
       $new_name = rand(). '.' . $product->image3->getClientOriginalExtension();
        $product->image3->move('product/',$new_name);
        $product->image3 = $new_name;
        }
        if($request->hasFile('image4'))
       {
       $product->image4 = $request->file('image4');
       $new_name = rand(). '.' . $product->image4->getClientOriginalExtension();
        $product->image4->move('product/',$new_name);
        $product->image4 = $new_name;
        }

        $product->marque = $request->input('marque');
        $product->designation = $request->input('designation');
        $product->reference = $request->input('reference');
        $product->pays_production = $request->input('pays_production');
        $product->poids = $request->input('poids');
        $product->prix = $request->input('prix');
        $product->prix_promo = $request->input('prix_promo');
        $product->qte = $request->input('qte');
        $product->description = $request->input('description');
        $product->id_category = $request->input('id_category');
        $product->id_souscategory = $request->input('id_souscategory');
        $product->id_user = $id_user;
                  $product->save();

          Session()->flash('la modification de produit a étè faite avec succée');
          return redirect('admin/product');

    }
   
    public function destroy($id){
           $product = Product::find($id);
           $product->deleted = 1;
           $product->save();
           Session()->flash('la Supression de produit a étè faite avec succée');
          return redirect('admin/product');
    }

    public function show($id){
      $id_user = Auth::user()->id;
    	   $product = Product::where('id',$id)->where('id_user',$id_user)->where('deleted',0)->first();
            if($product === null){
         return view('admin.layouts.error_404');
    	}else{
          return view('admin.product.show',compact('product'));
    }
}


 public function all_products(){
       
        $products = Product::where('deleted',0)->where('confirmation_admin',1)->where('prix_promo',null)->paginate(18);

        $min_prix = Product::min('prix');
        $max_prix = Product::max('prix');
         
      return view('user.all-products',compact('products','min_prix','max_prix'));
        
    }
     public function all_products_in_promo(){
       
        $products = Product::where('deleted',0)->where('prix_promo','!=',null)->paginate(18);
         
        $min_prix = Product::min('prix');
        $max_prix = Product::max('prix');
         
      return view('user.all-products-in-promo',compact('products','min_prix','max_prix'));
        
    }
   public function search_product(Request $request){
      $product = $request->get('product');
      $products = Product::where('deleted',0)->where('confirmation_admin',1)
       ->where('name','Like','%'.$product.'%')
       ->Orwhere('marque','Like','%'.$product.'%')
       ->Orwhere('pays_production','Like','%'.$product.'%')->orderBy('name')
       ->paginate(18)->appends('product',$product);
       $min_prix = Product::min('prix');
        $max_prix = Product::max('prix');

      return view('user.all-products',compact('products','min_prix','max_prix'));
    }
    
public function get_products_by_category($id,$category){
      $cat = Category::where('id',$id)->where('category',$category)->first();
      if($cat === null){
         return view('layouts.error_404');
      }
      $catname = $cat->category;
      $products = Product::where('deleted',0)->where('confirmation_admin',1)
       ->where('id_category',$id)
       ->paginate(18)->appends('category',$category);
       
       $idcategories = Category::find($id);
       $namecategories = Category::where('category',$category)->first();
       $min_prix = Product::min('prix');
       $max_prix = Product::max('prix');

  if( $idcategories === null || $namecategories === null){
         return view('layouts.error_404');
      }else{
      return view('user.all-products-in-category',compact('products','min_prix','max_prix','catname'));
    }

    }

    public function get_products_by_sub_category($id,$souscategory){
      $subcat = SousCategory::where('id',$id)->where('souscategory',$souscategory)->first();
      if($subcat === null){
         return view('layouts.error_404');
          $subcatname = $subcat->souscategory;
      }
      $products = Product::where('deleted',0)->where('confirmation_admin',1)
       ->where('id_souscategory',$id)
       ->paginate(18)->appends('subcategory',$souscategory);

       $min_prix = Product::min('prix');
        $max_prix = Product::max('prix');

  if($products === null){
         return view('layouts.error_404');
      }else{
      return view('user.all-products-in-sub-category',compact('products','min_prix','max_prix','subcatname'));
    }

    }

    

    public function get_products_by_marque($marque){
      $marque = Product::where('marque',$marque)->first();
      if($marque === null){
         return view('layouts.error_404');
      }
      $products = Product::where('deleted',0)->where('confirmation_admin',1)
       ->where('marque','like','%'.$marque.'%')
       ->paginate(18)->appends('marque',$marque);

       $min_prix = Product::min('prix');
        $max_prix = Product::max('prix');

  if($products === null){
         return view('layouts.error_404');
      }else{
      return view('user.all-products',compact('products','min_prix','max_prix'));
    }

    }

 public function show_product($id,$marque){
         
         $product = Product::where('confirmation_admin',1)->where('id',$id)->where('marque',$marque)->where('deleted',0)->first();
            if($product === null){
         return view('layouts.error_404');
      }else{
        $product->view = $product->view + 1;
        $product->save();
          return view('user.show-product',compact('product'));
    }
}

 public function updateheartCount(){
         
 $id = $_GET['id'];
 $product = Product::find($id);

 $product->heart++;
 $product->save();
}



}
