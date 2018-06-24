<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use illuminate\Http\Request;
use App\User;
use App\Product;
use App\ProductDetail;
use App\Product_images;
// use Request\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function addProduct(Request $request)
	{
		if($request->method()=="GET"){
			return view('add-product');
		}else{
			$data = $request->all();
			$product = new Product;
			$array_rec = array(
				'product_name'=> $data['name']
			);

			Product::create($array_rec);
			\Session::flash('msg-success', 'Product is successfully added!'); 
			return redirect('/product');

			// $product->product_name = $data['name'];

			// $product->save();
		}
	}	

	public function addProductDetails(Request $request)
	{
		if($request->method()=="GET"){
			$product_data = Product::all();
			return view('add-product-details',compact('product_data'));
		}else{
			$data = $request->all();
			$product_details = new ProductDetail;
			$this->validate($request, [
				// check validtion for image or file
					  'file_upload' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
			]);
				  
			if($file = $request->hasFile('file_upload')) {
					$file = $request->file('file_upload') ;
					$fileNameExt = $request->file('file_upload')->getClientOriginalName();
					$fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
					$fileExt = $request->file('file_upload')->getClientOriginalExtension();
					$fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
					$destinationPath = public_path().'/images/' ;
					$file->move($destinationPath,$fileNameToStore);
					$product_details->images = $fileNameToStore ;
			}
			$product_details->p_id 		=  $data['product_name'];
			$product_details->color 	=  $data['color'];
			$product_details->price 	=  $data['price'];
			$product_details->quantity 	=  $data['quantity'];
			$product_details->size 		=  $data['product_size'];
			
			$product_details->save() ;	
			\Session::flash('msg-success', 'Product details is save successfully!'); 
			return redirect('/product_details');

		}
	}
	
	public function view_product(Request $request)
	{
		if($request->method()=="GET"){
			$product_detail = Product::all();
			// $product_detail = $product_detail[0]->ProductDetail;
			return view('view-product',compact('product_detail'));
		}else{
			$data = $request->all();
			// dd($data);
			$product_details = ProductDetail::WHERE("id" , $data['id'])->first();
			$product = ProductDetail::WHERE("p_id" , $data['p_id'])->get();
			return view('view-product-details',compact('product_details', 'product'));

		}
	}

	public function details_product(Request $request)
	{
		$data = $request->all();
		$product_details = ProductDetail::WHERE("id" , $data['id'])->first();
			$product = ProductDetail::WHERE("p_id" , $product_details['p_id'])->get();
			return view('information',compact('product_details', 'product'));
	}
}
