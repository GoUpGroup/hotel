<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Escort;
use App\Models\Booking;
use App\Models\Policies;
use App\Models\Blocklist;
use App\Models\OwnerHotel;
use App\Models\Nationality;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlocklistRequest;
use App\Http\Requests\UpdateBlocklistRequest;

class BlocklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $nationalities = Nationality::get();
            $blocklistPersons = Blocklist::with("nationality")->orderBy('id', 'desc')->get();
            $hotelsNo = count(Hotel::get());
            $visitorsNoNo =count(Booking::get());
            $escortsNo = count(Escort::get());
        
            return view("admin.blocklist.list")
                    ->with(['nationalities'=>$nationalities,
                            'blocklistPersons'=>$blocklistPersons,
                            'hotelsNo'=>$hotelsNo,
                            'visitorsNo'=>$visitorsNo,
                            'escortsNo'=>$escortsNo]);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
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
     * @param  \App\Http\Requests\StoreBlocklistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlocklistRequest $request)
    {
        
     try{
        $newPerson = new Blocklist();
        $newPerson->name = $request->name;
        $nationalityID = (int)$request->nationality_id;
        $newPerson->nationality_id = $nationalityID;
        $newPerson->passport_no=$request->passport_no;
        $newPerson->identity_no=$request->identity_no;

        if($newPerson->save())
        return redirect()->route('listBlocklist')->with(['success' => 'تم اضافة البيانات بنجاح']);

        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function show(Blocklist $blocklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Blocklist $blocklist, $personId)
    {


        $nationalities = Nationality::get();
        $person = Blocklist::with("nationality")->where('id',$personId)->get();
        return view('admin.blocklist.edit')
                ->with(['person'=>$person,
                        'nationalities'=>$nationalities,]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlocklistRequest  $request
     * @param  \App\Models\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlocklistRequest $request,$personId )
    {
        
        try{
        $newPerson = Blocklist::with("nationality")->where('id',$personId)->get();
      
        $newPerson[0]->name = $request->name;
        $nationalityID = (int)$request->nationality_id;
        $newPerson[0]->nationality_id = $nationalityID;
        $newPerson[0]->passport_no=$request->passport_no;
        $newPerson[0]->identity_no=$request->identity_no;
        if($newPerson[0]->update())
        return redirect()->route('listBlocklist')->with(['success' => 'تم اضافة البيانات بنجاح']);

        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    }

    }

    
     /**
     * @param mixed $PoliceId
     * this function used convert is_active from 1 to -1 and reverse
     * @return [boolean]
     */
    public function toggle($personId)
    {
        try {
            $person = Blocklist::find($personId);
            $person->is_active *= -1;
            if ($person->save())
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

}
