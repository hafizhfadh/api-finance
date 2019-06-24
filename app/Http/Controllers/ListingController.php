<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Listing;
use App\User;
use Auth;

class ListingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get all the list from this user
        $listing = Listing::all();

        return response()->json(['listing' => $listing]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'list_name' => 'required|max:255',
            'distance' => 'required',
            'user_id' => 'required'
        ]);

        $Listing = new Listing;

        $Listing->list_name = $request->list_name;
        $Listing->distance = $request->distance;
        $Listing->user_id = $request->user_id;

        if($Listing->save()){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'list_name' => 'required|max:255',
            'list_id' => 'required',
            'distance' => 'required'

        ]);

        $Listing = Listing::findOrFail($request->id);

        $Listing->list_name = $request->list_name;
        $Listing->distance = $request->distance;

        if($Listing->save()){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $listing = Listing::findOrFail($request->id);
        if ($listing->delete()) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'fail']);
        }
    }
}
