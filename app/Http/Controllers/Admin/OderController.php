<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class OderController extends Controller
{
    public function index(){
        $cusromer = Customer::orderByDesc('id')->paginate(5) ;
        return view('admin.oders.index',['customers' => $cusromer ]);
    }
    public function destroy($id){
        Customer::whereId($id)->delete();
        return back();
    }
}
