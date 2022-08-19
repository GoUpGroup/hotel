<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReciptionRequest;
use App\Http\Requests\UpdateReciptionRequest;
use App\Models\OwnerHotel;
use App\Models\Reciption;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReciptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mangerId = Auth::user()->id;
        try {

            $owner = OwnerHotel::with("hotel")->where('user_id', $mangerId)->get();
            $hotelId = $owner[0]->hotel[0]->id;
            $reciprtions = Reciption::with("user")->where('hotel_id', $hotelId)->get();
            return view('mangerHotel.list-employ')
                ->with('reciprtions', $reciprtions);

        } catch (\Throwable$th) {
            $reciprtions = [];
            return view('mangerHotel.list-employ')
                ->with('reciprtions', $reciprtions);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReciptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReciptionRequest $request)
    {

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->user_name = $request->user_name;
        $newUser->email = $request->email;
        $newUser->role = 1;
        $newUser->password = Hash::make($request->password);
        $newUser->mobile = $request->mobile;
        $newUser->is_active = $request->is_active;
        // $newUser->address = 'اليمن';
        if ($newUser->save()) {
            $user = User::orderBy('id', 'desc')->first();
            $ownerID = Auth::user()->id;

            try {
                $owner = OwnerHotel::with("hotel")->where('user_id', $ownerID)->get();
                $hotelId = $owner[0]->hotel[0]->id;
                $newReciption = new Reciption();
                $newReciption->user_id = $user->id;
                $newReciption->hotel_id = $hotelId;
                if ($newReciption->save()) {
                    return redirect()->back()->with(['success' => 'تمت اضافة الموظف بنجاح ']);
                }

                return redirect()->back()->with(['error' => 'عذرا لم يتم اضافة الموظف ']);

            } catch (\Throwable$th) {
                return redirect()->back()->with(['error' => 'عذرا ليس لديك فندق']);

            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reciption  $reciption
     * @return \Illuminate\Http\Response
     */
    public function show(Reciption $reciption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reciption  $reciption
     * @return \Illuminate\Http\Response
     */
    public function edit(Reciption $reciption, $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReciptionRequest  $request
     * @param  \App\Models\Reciption  $reciption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReciptionRequest $request, Reciption $reciption)
    {
        //
    }

}
