<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reciption;
use App\Models\OwnerHotel;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reciprtion = Reciption::where('user_id',Auth::user()->id)->get();
        if(count($reciprtion)==0)
                {
                    $owner = OwnerHotel::with("hotel")->where('user_id',Auth::user()->id)->get();
                    $hotel_id = $owner[0]->hotel[0]->id;
                }
        else{
            $hotel_id =  $reciprtion[0]->hotel_id;
        }
       
        $visitors = Booking::where('hotel_id', $hotel_id )->get();        $nationalities = Nationality::get();
 
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
        // try {
            $newBooking = new Booking();
            $newBooking->reciption_id = Auth::user()->id;
           

            $reciprtion = Reciption::where('user_id',Auth::user()->id)->get();
            if(count($reciprtion)==0)
            {
                $owner = OwnerHotel::with("hotel")->where('user_id',Auth::user()->id)->get();
                $hotel_id = $owner[0]->hotel[0]->id;
            }
            else{
                $hotel_id =  $reciprtion[0]->hotel_id;
            }
            $newBooking->hotel_id = $hotel_id;
            $newBooking->visitor_name = $request->visitor_name;
            $newBooking->nationality_id = $request->nationality_id;

            $newBooking->identity_id = $request->identity_id;
            $newBooking->identity_no = $request->identity_no;
            $newBooking->room_no = $request->room_no;
            $newBooking->floor_no = $request->floor_no;
            if($newBooking->save())
                return redirect()->back()->with(['success' => 'تمت اضافة نزيل الفندق بنجاح ']);
            return redirect()->back()->with(['error' => 'عذرا لم يتم اضافة النزيل ']);
        // } catch (\Throwable$th) {
        //     return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تخزين البيانات']);

        // }

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
