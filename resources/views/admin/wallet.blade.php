@extends('admin.layouts.main')

@section('title')
التقارير

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
التقارير
@endsection
@section('breadcrumb-item2')
عرض التقارير  
@endsection

@section('breadcrumb-item-active')
التقارير
@endsection

@section('page-title')
التقارير
@endsection

@section('content')
 

<div class="row">
    <div class="col-12">
        @include('message')
        <div class="card">
            <div class="card-body">
                {{-- @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session()->get('error') }} </strong>
                </div>
                @endif --}}
                <form method="post" action=" ">
                    @csrf
                <div class="row">

                    <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="modalAddressFirstName">اسم النزيل</label>
                        <input type="text" id="modalAddressFirstName" name="hotelName" class="form-control" placeholder="يرجى ادخال اسم النزيل">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">الجنسية</label>
                        <select name="is_active" class="form-select mb-3">
                            <option >الكل</option>
                            <option >غير يمني</option>
                        </select>
                    </div>
                      <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="modalAddressLastName">رقم الهوية</label>
                        <input type="text" id="modalAddressLastName" name="owner" class="form-control" placeholder="يرجى ادخال رقم الهوية">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">نوع الهوية</label>
                        <select name="is_active" class="form-select mb-3">
                            <option  value="1">الكل</option>
                            <option  value="-1"> جواز</option>
                        </select>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">جهة القدوم</label>
                        <select name="is_active" class="form-select mb-3">
                            <option  value="1">الكل</option>
                            <option  value="-1"> جواز</option>
                        </select>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">الغرض من الزيارة</label>
                        <select name="is_active" class="form-select mb-3">
                            <option  value="1">الكل</option>
                            <option  value="-1"> جواز</option>
                        </select>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">اسم الفندق</label>
                        <select name="is_active" class="form-select mb-3">
                            <option  value="1">الكل</option>
                            <option  value="-1"> جواز</option>
                        </select>
                    </div>
                    <div class="mb-1 col-12 col-md-6">
                        <label for="inputAddress" class="form-label">نوع الاششخاص</label>
                        <select name="is_active" class="form-select mb-3">
                            <option  value="1">الكل</option>
                            <option  value="-1"> جواز</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="modalAddressFirstName">من  تاريخ</label>
                        <input type="date" id="modalAddressFirstName" name="hotelName" class="form-control" placeholder="يرجى ادخال اسم الفندق">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-12 col-md-6 fv-plugins-icon-container">
                        <label class="form-label" for="modalAddressFirstName">الى  تاريخ</label>
                        <input type="date" id="modalAddressFirstName" name="hotelName" class="form-control" placeholder="يرجى ادخال اسم الفندق">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    
                        
                     

                    <button type="submit" class="btn btn-primary mt-4">عرض</button>

                </div>
                </form>
                <!-- end row -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>




@endsection

@section('script')

@endsection