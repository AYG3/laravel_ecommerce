<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.home');
        }else
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }

    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);

            return view('user.home', compact('data'));
        }   
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if($search=='')
        {
            $data=product::paginate(3);
            return view('user.home', compact('data'));

        }
        else
        {
            $data=product::where('title', 'Like', '%'.$search.'%')->get();
            return view('user.home', compact('data'));
        }
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            $cart = new cart;

            $product=product::find($id);

            // $cart->id = $id;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            
            return redirect()->back()->with('messag', 'Product Added to Cart Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function cart($id)
    {
        $cart = cart::find($id);
        return view('user.cart', compact('data'));
    }
   
}
