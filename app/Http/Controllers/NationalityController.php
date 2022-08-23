<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Nationalitis = Nationality::orderBy('id', 'desc')->get();
          
        //    return $Nationalitis;
            return view("admin.nationality.list_nationality")->with("Nationalitis", $Nationalitis);
                   
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
     try{
        $newNationality = new Nationality();
        $newNationality->nationality = $request->nationality;

        if($newNationality->save())
        return redirect()->route('listNationality')->with(['success' => 'تم اضافة البيانات بنجاح']);

        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    }
    }

    /**
     * Display the specified resource.
     *
      * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @return \Illuminate\Http\Response
     */
    public function edit($NationalityId)
    {
        try {
            $nationality = Nationality::find($NationalityId);
            return view('admin.nationality.edit_nationality')->with('nationality', $nationality);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NationalityId )
    {
        
        try{
            $nationality = Nationality::find($NationalityId);
            $nationality->nationality = $request->nationality;
            $nationality->is_active = $request->is_active;
        if($nationality->update())
        return redirect()->route('listNationality')->with(['success' => 'تم اضافة البيانات بنجاح']);

        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    }

    }

    
     /**
     * @param mixed $NationalityId
     * this function used convert is_active from 1 to -1 and reverse
     * @return [boolean]
     */
    public function toggle($NationalityId)
    {
        try {
            $Nationality = Nationality::find($NationalityId);
            $Nationality->is_active *= -1;
            if ($Nationality->save())
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }
}
