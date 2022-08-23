<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use App\Models\OwnerHotel;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreOwnerHotelRequest;
use App\Http\Requests\UpdateOwnerHotelRequest;

class OwnerHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::with(["owner"])->get();
        $hotels = OwnerHotel::with(["hotel","user"])->get();
     
        // return $hotels;
        $nationalities  = Nationality::get();
        $indetityTypes = IdentityType::get();
        return view('admin.hotels.list')
                ->with(['hotels'=>$hotels,
                        'indetityTypes'=>$indetityTypes,
                        'nationalities'=>$nationalities,
                        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerHotelRequest $request)
    {
        try{
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->user_name = $request->user_name;
        $newUser->email = $request->email;
        $newUser->role=2;
        $newUser->password=Hash::make($request->password);
        $newUser->address = $request->address;
        $newUser->phone = $request->phone;
        $newUser->mobile = $request->mobile;
        if($newUser->save()){
            $user = User::orderBy('id', 'desc')->first();
            $newOwner = new OwnerHotel();
            $newOwner->user_id = $user->id;
            $newOwner->identity_id = $request->identity_id;
            $newOwner->nationality_id = $request->nationality_id;
            $newOwner->identity_no = $request->identity_no;
            if($newOwner->save()){
                $ownerHotel = OwnerHotel::orderBy('id','desc')->first();
                $newHotel  = new Hotel();
                $newHotel->owner_hotel_id = $ownerHotel->id;
                $newHotel->hotel_phone = $request->hotel_phone;
                $newHotel->hotel_address = $request->hotel_address;
                $newHotel->hotelName = $request->hotelName;
                $newHotel->lisciens_no = $request->lisciens_no;
                
                if($newHotel->save())
                    return redirect()->back()->with(['success' => 'تمت اضافة نزيل الفندق بنجاح ']);
                return redirect()->back()->with(['error' => 'عذرا لم يتم اضافة النزيل ']);
            }//end if owner save() 
        }//end user save()

        }//end try
            catch (\Throwable$th) {
                return redirect()->back()->with(['error' => 'عذرا هناك خطاء في تخزين البيانات']);
    
            
            }
           
            
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OwnerHotel  $ownerHotel
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerHotel $ownerHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OwnerHotel  $ownerHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerHotel $ownerHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerHotelRequest  $request
     * @param  \App\Models\OwnerHotel  $ownerHotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerHotelRequest $request, OwnerHotel $ownerHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OwnerHotel  $ownerHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerHotel $ownerHotel)
    {
        //
    }
}
