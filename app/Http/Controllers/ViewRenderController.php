<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewRenderController extends Controller
{
    public function view()
    {
        return view('view');
    }
    public function viewRender(Request $request)
    {
        $viewRender = view('viewRend')->render();
    return response()->json(array('success' => true, 'html'=>$viewRender));
    }
}
