<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use App\Models\IdentityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IdentityTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $identityTypes = IdentityType::orderBy('id', 'desc')->get();
          
           
            return view("admin.identity_type.list_identity-type")->with("identityTypes", $identityTypes);
                   
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
        $identityType = new IdentityType();
        $identityType->identity_type = $request->identity_type;

        if($identityType->save())
        return redirect()->route('listIdentityType')->with(['success' => 'تم اضافة البيانات بنجاح']);

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
    public function edit($identityTypeId)
    {
        try {

            $identityType = IdentityType::find($identityTypeId);
            return view('admin.identity_type.edit_dentity-type')->with('identityType', $identityType);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $identityTypeId )
    {
        
        try{
            $identityType = IdentityType::find($identityTypeId);
            $identityType->identity_type = $request->identity_type;
            $identityType->is_active = $request->is_active;
        if($identityType->update())
        return redirect()->route('listIdentityType')->with(['success' => 'تم اضافة البيانات بنجاح']);

        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    } catch (\Throwable $error) {
        return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
    }

    }

    
     /**
     * @param mixed $identityTypeId
     * this function used convert is_active from 1 to -1 and reverse
     * @return [boolean]
     */
    public function toggle($identityTypeId)
    {
        try {
            $identityType = IdentityType::find($identityTypeId);
            $identityType->is_active *= -1;
            if ($identityType->save())
                return back()->with(['success' => 'تم تحديث البيانات بنجاح']);

            return back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        } catch (\Throwable $error) {
            return redirect()->back()->with(['error' => 'عذرا هناك خطا لم تتم اضافة البيانات']);
        }
    }

}
