<?php

namespace App\Http\Controllers;

use App\Models\cctv;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:cctv-list|cctv-create|cctv-edit|cctv-delete', ['only' => ['index','show']]);
         $this->middleware('permission:cctv-create', ['only' => ['create','store']]);
         $this->middleware('permission:cctv-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:cctv-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cctvs = cctv::latest()->paginate(5);
        return view('home.index',compact('cctvs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
