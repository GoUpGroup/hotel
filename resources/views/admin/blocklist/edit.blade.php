@extends('admin.layouts.main')

@section('title')
تعديل شخص مطلوب
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
المطلوبين  
@endsection
@section('breadcrumb-item2')
تعديل على مطلوب
@endsection

@section('breadcrumb-item-active')
    المطلوبين
@endsection

@section('page-title')
       تعديل مطلوب
@endsection

@section('content')
         @if($errors->any())
        @foreach($errors->all() as $err)
            <p>{{$err}}</p>
            @endforeach
        @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>{{ session()->get('error') }} </strong>
                    </div>
                    @endif --}}
                    @include('message')

                    <form method="POST" action="{{route('updateblocklist',$person[0]->id)}}" id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"  novalidate="novalidate">
                        @csrf
                      <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="modalAddressFirstName">اسم الشخص</label>
                        <input type="text" id="modalAddressFirstName" name="name" class="form-control" placeholder="يرجى ادخال اسم الشخص المطلوب" value="{{$person[0]->name}}">
                      <div class="fv-plugins-message-container invalid-feedback"></div></div>
                      <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="ationality_id">الجنسية</label>
                        <select id="defaultSelect" class="form-select" name="nationality_id">
                            <option value="{{$person[0]->nationality->id}}">{{$person[0]->nationality->nationality}}</option>
                            @isset($nationalities)
                            @foreach ($nationalities as $nationality)
                            <option value=" @isset($nationality->id){{$nationality->id}} @endisset"> 
                                @isset ($nationality->nationality){{$nationality->nationality}} @endisset
                            </option>
                            @endforeach
                            @endisset
                          </select>              
                          <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                      <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="identity_no">رقم البطاقة</label>
                        <input type="number" id="identity_no" name="identity_no" class="form-control" placeholder="يرجى ادخال رقم البطاقة  " value="{{$person[0]->identity_no}}">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    
                    <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="passport_no"> رقم الجواز</label>
                        <input type="number" id="passport_no" name="passport_no" class="form-control" placeholder="يرجى ادخال رقم  الجواز" value="{{$person[0]->passport_no}}">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                     
                      <div class="col-12 text-center ">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                      </div>
                    <div></div><input type="hidden">
                </form> 
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>



@endsection

@section('script')

@endsection


