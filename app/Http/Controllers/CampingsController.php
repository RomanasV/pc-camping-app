<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Camping;

class CampingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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
            'stars' => 'required|max:255',
            'website' => 'required',
            'placeholder_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('placeholder_image')) {
            $uploaded_image_name = $request->file('placeholder_image')->getClientOriginalName();
            $image_name = pathinfo($uploaded_image_name, PATHINFO_FILENAME);
            $image_extension = $request->file('placeholder_image')->getClientOriginalExtension();
            $image_name_to_store = $image_name . '_' . time() . '.' . $image_extension;
            $path = $request->file('placeholder_image')->storeAs('public/placeholder_images', $image_name_to_store);
        } else {
            $image_name_to_store = 'default_placeholder.jpg';
        }

        $camping = new Camping;
        $camping->name = $request->input('name');
        $camping->city = $request->input('city');
        $camping->country = $request->input('country');
        $camping->stars = $request->input('stars');
        $camping->website = $request->input('website');
        $camping->user_id = auth()->user()->id;
        $camping->placeholder_image = $image_name_to_store;
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
            'stars' => 'required|max:255',
            'website' => 'required',
            'placeholder_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('placeholder_image')) {
            $uploaded_image_name = $request->file('placeholder_image')->getClientOriginalName();
            $image_name = pathinfo($uploaded_image_name, PATHINFO_FILENAME);
            $image_extension = $request->file('placeholder_image')->getClientOriginalExtension();
            $image_name_to_store = $image_name . '_' . time() . '.' . $image_extension;
            $path = $request->file('placeholder_image')->storeAs('public/placeholder_images', $image_name_to_store);
        }

        $camping = Camping::find($id);
        $camping->name = $request->input('name');
        $camping->city = $request->input('city');
        $camping->country = $request->input('country');
        $camping->stars = $request->input('stars');
        $camping->website = $request->input('website');
        if($request->hasFile('placeholder_image')) {
            Storage::delete('/public/placeholder_images/' . $camping->placeholder_image);
            $camping->placeholder_image = $image_name_to_store;
        }
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

        if($camping->placeholder_image != 'default_placeholder.jpg'){
            Storage::delete('/public/placeholder_images/' . $camping->placeholder_image);
        }

        $camping->delete();
        return redirect('/campings')->with('success', 'Camping Removed :(');
    }
}
