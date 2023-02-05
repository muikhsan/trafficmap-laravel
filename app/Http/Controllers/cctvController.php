<?php

namespace App\Http\Controllers;

use App\Models\cctv;
use Illuminate\Http\Request;

class cctvController extends Controller
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
        return view('cctvs.index',compact('cctvs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cctvs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'lokasi' => 'required',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180',
            'embed' => 'required',
        ]);

        cctv::create($request->all());

        return redirect()->route('cctvs.index')
                        ->with('success','cctv created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravel\Models\cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function show(cctv $cctv)
    {
        return view('cctvs.show',compact('cctv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Models\cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function edit(cctv $cctv)
    {
        return view('cctvs.edit',compact('cctv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Models\cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cctv $cctv)
    {
         request()->validate([
            'lokasi' => 'required',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180',
            'embed' => 'required',
        ]);

        $cctv->update($request->all());

        return redirect()->route('cctvs.index')
                        ->with('success','cctv updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Models\cctv  $cctv
     * @return \Illuminate\Http\Response
     */
    public function destroy(cctv $cctv)
    {
        $cctv->delete();
        return redirect()->route('cctvs.index')
                        ->with('success','cctv deleted successfully');
    }
}
