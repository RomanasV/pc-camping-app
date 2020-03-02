<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Camping;
use App\Http\Resources\Camping as CampingResource;

class CampingsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campings = Camping::orderBy('created_at', 'desc')->paginate(4);
        return CampingResource::collection($campings);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $campings = Camping::orderBy('ranking', 'desc')->take(5)->get();
        return CampingResource::collection($campings);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCity($name)
    {
        $campings = Camping::where('city', $name)->orderBy('created_at', 'desc')->paginate(4);
        return CampingResource::collection($campings);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCountry($name)
    {
        $campings = Camping::where('country', $name)->orderBy('created_at', 'desc')->paginate(4);
        return CampingResource::collection($campings);
    }

}
