<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camping;

class CampingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campings_by_date_desc = Camping::orderBy('created_at', 'desc')->paginate(2);
        $campings_by_date_asc = Camping::orderBy('created_at', 'asc')->take(2)->get();
        $campings = [
            'campings_by_date_desc' => $campings_by_date_desc,
            'campings_by_date_asc' => $campings_by_date_asc,
        ];

        return view('campings.index')->with('campings', $campings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $camping = new Camping;
        $camping->name = $request->input('name');
        $camping->city = $request->input('city');
        $camping->country = $request->input('country');
        $camping->save();

        return redirect('/campings')->with('success', 'Camping Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camping = Camping::find($id);
        return view('campings.show')->with('camping', $camping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camping = Camping::find($id);
        return view('campings.edit')->with('camping', $camping);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $camping = Camping::find($id);
        $camping->name = $request->input('name');
        $camping->city = $request->input('city');
        $camping->country = $request->input('country');
        $camping->save();

        return redirect('/campings')->with('success', 'Camping Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camping = Camping::find($id);
        $camping->delete();
        return redirect('/campings')->with('success', 'Camping Removed :(');
    }
}