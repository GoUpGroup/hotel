<?php

namespace App\Http\Controllers;

use App\Models\Escort;
use App\Http\Requests\StoreEscortRequest;
use App\Http\Requests\UpdateEscortRequest;

class EscortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEscortRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEscortRequest $request)
    {
        try{ 
            $newEscort = new Escort();
            $newEscort->booking_id = $request->booking_id;
            $newEscort->escort_name = $request->escort_name;
            $newEscort->relation = $request->relation;
            $newEscort->nationality_id = $request->nationality_id;
            $newEscort->identity_id = $request->identity_id;
            $newEscort->identity_no = $request->identity_no;
            $newEscort->room_no = $request->room_no;
            $newEscort->floor_no = $request->floor_no;
            if($newEscort->save())
                return redirect()->back()->with(['success' => 'تمت مرافق نزيل الفندق بنجاح ']);
            return redirect()->back()->with(['error' => 'عذرا لم يتم اضافة مرافق النزيل ']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تخزين البيانات']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function show(Escort $escort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function edit(Escort $escort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEscortRequest  $request
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEscortRequest $request, Escort $escort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escort  $escort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escort $escort)
    {
        //
    }
}
