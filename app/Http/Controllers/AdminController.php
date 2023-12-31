<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function product()
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype = '1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return view('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        $data=new product;

        $image = $request->file;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage', $imagename);

        $data->image = $imagename;

        $data->title = $request->title;

        $data->price = $request->price;

        $data->description = $request->title;

        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully');

    }

    public function showproducts()
    {
        $data = product::all();
        return view('admin.showproduct', compact('data'));
    }

    public function deleteproduct($id)
    {
        $data = product::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Product deleted succesfully'); 
    }

    public function updateview(Request $request, $id)
    {
        $data = product::find($id);
        return view('admin.updateview', compact('data'));
    }


    public function updateproduct(Request $request, $id)
    {
        $data = product::find($id);

        $image = $request->file;

        if($image)
        {
            $imagename = time().".".$image->getClientOriginalExtension();
            $request->file->move('productimage', $imagename);
            $data->image = $imagename;
        }


        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->save();

        return redirect()->back()->with('message', 'Update Sucessfully');
    }

    public function showorder()
    {
        $order = new order;

        // $user = auth()->user();

        $data = order::all();
        // $data->status = 'Delivered';

        return view('admin.showorder', compact('data'));
    }

    public function updatestatus($id)
    {
        $order = order::find($id);

        $order->status='Delivered';
        
        $order->save();

        return redirect()->back();
    }



}