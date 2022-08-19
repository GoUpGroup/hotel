@extends('admin.layouts.main')

@section('title')
لوحة التحكم

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
الرئيسية
@endsection
@section('breadcrumb-item2')
لوحة التحكم
@endsection
@section('breadcrumb-item2')
لوحة التحكم
@endsection
@section('breadcrumb-item-active')
لوحة التحكم
@endsection

@section('page-title')
لوحة التحكم
@endsection

@section('content')

<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-xl-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <span class="mdi mdi-account" style="font-size: 24px;"></span>
                                <h3><span>@isset($visitors)
                                    {{count($visitors)}}
                                    @else 0
                                @endisset</span></h3>
                                <p class="text-muted font-15 mb-0">عدد النزلاء</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <span class="mdi mdi-account-multiple" style="font-size: 24px;"></span>
                                <h3><span>52</span></h3>
                                <p class="text-muted font-15 mb-0">عدد المرافقين</p>
                            </div>
                        </div>
                    </div>

                    



                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->

 <div class="row">

    <div class="col-12">
       
        @include('message')

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="mdi mdi-plus-circle me-2"></i>إضافة نزيل جديد
                </button>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                    <i class="mdi mdi-plus-circle me-2"></i>إضافة مرافق جديد
                </button>
                <!-- <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>اضافة مستخدم جديد</a>
                    </div>

                </div> -->

                <div class="table-responsive">
                     
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead >
                        <tr>
                            <th style="width: 20px;">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                </div>
                            </th>
                            <th>اسم النزيل</th>
                            <td>رقم الطابق</td>
                            <th>رقم الغرفة</th>
                            <th>المرافقين</th>
                            <th>الحالة</th>
                            <th style="width: 75px;">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($visitors)
                            @foreach ($visitors as $gust)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    @isset($gust->visitor_name)
                                        {{$gust->visitor_name}}
                                    @endisset
                                </td>
                                <td>
                                    @isset($gust->room_no)
                                        {{$gust->room_no}}
                                    @endisset
                                  </td>
                                   <td>
                                    @isset($gust->floor_no)
                                        {{$gust->floor_no}}
                                    @endisset
                                  </td>
                                 
                                <td>
                                    <select name="" id="">
                                        @foreach ($gust->escort as $escort)
                                            <option value="">
                                                {{$escort->escort_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>         
                            </tr>     
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- Button trigger modal -->

<!-- Modal 1 -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
    <div class="modal-content">
        
        
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
            <h3 class="address-title">اضافة نزيل جديد</h3>
            <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
            </div>
            <form action="{{route('newBooking')}}" method="POST" id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return true" novalidate="novalidate">
                @csrf
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="visitor_name">اسم النزيل</label>
                <input type="text" id="visitor_name" name="visitor_name" class="form-control" placeholder="يرجى ادخال اسم النزيل">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container center">
                <label class="form-label" for="ationality_id">الجنسية</label>
                <select id="defaultSelect" class="form-select" name="nationality_id">
                    <option value="">اختر الجنسية</option>
                    
                    @isset($nationalities)
                    @foreach ($nationalities as $nationality)
                    <option value=" {{$nationality->id}}"> 
                        @isset ($nationality->nationality){{$nationality->nationality}} @endisset
                    </option>
                    @endforeach
                    @endisset
                  </select>              
                  <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
          
          
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label for="identity_id" class="form-label">نوع الهوية</label>
                <select name="identity_id" class="form-select">
                    <option value=""> اختر نوع الهوية</option>   
                    {{-- @isset($indetityTypes) --}}
                    @foreach ($indetityTypes as $indetityType)
                    <option value=" {{$indetityType->id}}"> 
                       @isset($indetityType->identity_type) {{$indetityType->identity_type}} @endisset
                    </option>
                    @endforeach
                    {{-- @endisset --}}  </select>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="identity_no">رقم الهوية</label>
                <input type="number" id="identity_no" name="identity_no" class="form-control" placeholder="يرجى ادخال رقم الهوية ">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="date_of_entry">وقت وتاريخ النزول في الفندق</label>
                <input type="datetime-local" id="date_of_entry" name="date_of_entry" class="form-control" placeholder="يرجى ادخال وقت وتاريخ النزول">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="date_of_left">وقت وتاريخ المغادرة</label>
                <input type="datetime-local" id="date_of_left" name="date_of_left" class="form-control" placeholder="يرجى ادخال وقت وتاريخ المغادرة">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="room_no">رقم الغرفة</label>
                <input type="number" id="room_no" name="room_no" class="form-control" placeholder="الرجاء ادخال رقم الغرفة">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="floor_no">رقم الطابق</label>
                <input type="number" id="floor_no" name="floor_no" class="form-control" placeholder="الرجاء ادخال رقم الغرفة">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            {{-- <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label for="inputAddress" class="form-label">جهة القدوم</label>
                <select name="destination" class="form-select">
                    <option  selected  value="1">شبوة</option>
                    <option value="-1">المهرة</option>
                    <option value="-1">من خارج اليمن</option>
                </select>
            </div> --}}
          
            {{-- <div class="col-12 col-md-6 fv-plugins-icon-container mt-3">
                <label for="formFile" class="form-label">صورة الهوية</label>
                <input class="form-control" type="file" id="formFile"  name="photoCard">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div> --}}
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
            </div>
            <div></div><input type="hidden"></form>
        </div>
        
    </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
    <div class="modal-content">
        
        
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
            <h3 class="address-title">اضافة مرافق جديد</h3>
            <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
            </div>
            <form method="POST" action="{{route('newEscort')}}" id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return true " novalidate="novalidate">
                @csrf
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label for="inputAddress" class="form-label">  اسم النزيل </label>
                <select name="booking_id" class="form-select">
                    <option value="" >اختار احدى النزلاء</option>
                 @isset($visitors)
                 @foreach ($visitors as $gust)
                 <option value="{{$gust->id}}">{{$gust->visitor_name}} </option>
                 @endforeach
                 @endisset
                    
                    
                </select>
            </div>
            
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="relation">العلاقة</label>
                <input type="text" id="relation" name="relation" class="form-control" placeholder="يرجى ادخال اسم  العلاقة بين المرافق والنزيل">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="escort_name">اسم المرافق</label>
                <input type="text" id="escort_name" name="escort_name" class="form-control" placeholder="يرجى ادخال اسم النزيل">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container center">
                <label class="form-label" for="ationality_id">الجنسية</label>
                <select id="defaultSelect" class="form-select" name="nationality_id">
                    <option value="">اختر الجنسية</option>
                    
                    @isset($nationalities)
                    @foreach ($nationalities as $nationality)
                    <option value=" {{$nationality->id}}"> 
                        @isset ($nationality->nationality){{$nationality->nationality}} @endisset
                    </option>
                    @endforeach
                    @endisset
                  </select>              
                  <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
          
          
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label for="identity_id" class="form-label">نوع الهوية</label>
                <select name="identity_id" class="form-select">
                    <option value=""> اختر نوع الهوية</option>   
                    {{-- @isset($indetityTypes) --}}
                    @foreach ($indetityTypes as $indetityType)
                    <option value=" {{$indetityType->id}}"> 
                       @isset($indetityType->identity_type) {{$indetityType->identity_type}} @endisset
                    </option>
                    @endforeach
                    {{-- @endisset --}}  </select>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="identity_no">رقم الهوية</label>
                <input type="number" id="identity_no" name="identity_no" class="form-control" placeholder="يرجى ادخال رقم الهوية ">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            {{-- <div class="col-12 col-md-6 fv-plugins-icon-container mt-3">
                <label for="formFile" class="form-label">صورة الهوية</label>
                <input class="form-control" type="file" id="formFile"  name="photoCard">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div> --}}
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
            </div>
            <div></div><input type="hidden"></form>
        </div>
        
    </div>
    </div>
</div>
</div>
<!-- container -->

</div>


@endsection

@section('script')
<!-- third party js -->
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="assets/js/pages/demo.customers.js"></script>
<!-- end demo js-->
@endsection
