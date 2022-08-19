<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\IdentityType;
use App\Models\Nationality;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Booking::with("escort")->orderBy('id', 'desc')->get();
        $nationalities = Nationality::get();
 
        $indetityTypes = IdentityType::get();
        return view('admin.dash-user-home')
            ->with(['visitors' => $visitors,
                'indetityTypes' => $indetityTypes,
                'nationalities' => $nationalities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        try {
            $newBooking = new Booking();
            $newBooking->reciption_id = Auth::user()->id;

            $newBooking->visitor_name = $request->visitor_name;
            $newBooking->nationality_id = $request->nationality_id;

            $newBooking->identity_id = $request->identity_id;
            $newBooking->identity_no = $request->identity_no;
           
            $newBooking->date_of_entry = $request->date_of_entry;
            $newBooking->date_of_left = $request->date_of_left;

            $newBooking->room_no = $request->room_no;
            $newBooking->floor_no = $request->floor_no;
            if($newBooking->save())
                return redirect()->back()->with(['success' => 'تمت اضافة نزيل الفندق بنجاح ']);
            return redirect()->back()->with(['error' => 'عذرا لم يتم اضافة النزيل ']);
        } catch (\Throwable$th) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تخزين البيانات']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
