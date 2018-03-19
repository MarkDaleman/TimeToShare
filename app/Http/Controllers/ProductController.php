<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use App\Product;
use Illuminate\Support\Facades\Input;
use DB;


class ProductController extends Controller
{
    public function create(Request $request)
    {
        $share_holder_name = Input::get('search');
        $share_holder_id = User::where('name',$share_holder_name) -> first();
        $product = new Product;
        $product->owner_id = Auth::user()->id;
        $product->product_name =  Input::get('product_name');
        $product->share_status = 0;
        $product->share_holder_id = $share_holder_id->id;
        $product->product_returned = 0;
        $product->save();
        $request->session()->flash('status', 'Product toegevoegd!');
        return Redirect::back();
    }

    public function eigenProducten(){
        $results = Product::where('owner_id', Auth::user()->id)
            ->with('share_holder')
            ->get();


        $uitgeleend = Product::where('share_holder_id', Auth::user()->id)
            ->where('share_status', '=',  1)
            ->where('product_returned', '=',  0)
            ->with('share_holder')
            ->get();


        $verzoeken = Product::where('share_holder_id', Auth::user()->id)
            ->where('share_status', '=',  0)
            ->with('share_holder')
            ->get();

        $prod_accepted = Product::where('owner_id', Auth::user()->id)
            ->where('share_status', '=',  1)
            ->where('product_returned', '=',  0)
            ->with('share_holder')
            ->get();

        $prod_geannuleerd =  Product::where('owner_id', Auth::user()->id)
            ->where('share_status', '=',  2)
            ->with('share_holder')
            ->get();

        return view('viewproduct',
                ['products' => $results,
                'verzoeken' => $verzoeken,
                'prod_accepted' => $prod_accepted,
                'uitgeleend' => $uitgeleend,
                    'prod_geannuleerd' => $prod_geannuleerd

                    ]
        );
    }

    public function alleProductenAccepted(){

        $all_prod_accepted = Product::where('share_status', '=',  1)
            ->where('product_returned', '=',  0)
            ->with('share_holder')
            ->get();
        return view('admin', ['all_prod_accepted' => $all_prod_accepted]);
    }

    public function updateShareToAccepted(Request $request, $id){
        Product::where('id', $id)
            ->update(['share_status' => 1]);
        $request->session()->flash('status', 'Task was successful!');
        return Redirect::back();
    }

    public function annuleerProdcut(Request $request, $id){
        Product::where('id', $id)
            ->update(['share_status' => 2]);
        $request->session()->flash('status', 'Task was successful!');
        return Redirect::back();
    }

    public function updateProductReturned(Request $request, $id){
        Product::where('id', $id)
            ->update(['product_returned' => 1]);
        $request->session()->flash('status', 'Task was successful!');
        return Redirect::back();
    }
}
