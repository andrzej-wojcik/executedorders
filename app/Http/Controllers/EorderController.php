<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eorders;

class EorderController extends Controller
{
    public function show(Eorders $eorder) {
        return view('eorders.show')->with('eorder',$eorder);
    }

    public function store(Request $request){
        Eorders::create($request->only([
            'name',
            'discription',
        ]));
    }
}
