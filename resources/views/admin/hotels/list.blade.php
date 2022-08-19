
@extends('admin.layouts.main')

@section('title')
    لوحة التحكم |المستخدمين

@endsection
@section('first-css')
    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

@endsection

@section('css')


@endsection
@section('breadcrumb-item')
    الفنادق
@endsection
@section('breadcrumb-item2')
    عرض الفنادق
@endsection
@section('breadcrumb-item-active')
    الفنادق
@endsection

@section('page-title')
    عرض جميع الفنادق
@endsection

@section('content')

    <div class="row">

        <div class="col-12">
           
            @include('message')

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus-circle me-2"></i>إضافة فندق جديد
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
                                <th>اسم الفندق</th>
                                <th>اسم المالك</th>
                                <th>رقم الهاتف</th>
                                <th>العنوان</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td>@isset($hotel->hotel[0]->hotelName) @endisset{{$hotel->hotel[0]->hotelName}}</td>
                                <td>@isset($hotel->user->name) @endisset{{$hotel->user->name}}</td>
                                <td>@isset($hotel->hotel[0]->hotel_phone) @endisset{{$hotel->hotel[0]->hotel_phone}}</td>
                                <td>@isset($hotel->hotel[0]->hotel_address) @endisset{{$hotel->hotel[0]->hotel_address}}</td>
                                <td>
                                   @isset($hotel->user->is_active)
                                   @if($hotel->user->is_active==1)
                                   <span class="badge badge-success-lighten">مصرح</span>

                                   @else
                                       <span class="badge badge-danger-lighten">غير مصرح </span>
                                   @endif
                                   @endisset

                                <td>
                                    <a href="{{ route("edithotel",$hotel->id) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @isset($hotel->is_active)
                                        @if($hotel->is_active==1)
                                        <span class="badge badge-success-lighten"></span>
                                        <a href="{{ route("toggle_users",$hotel->id) }}" class="action-icon"> <i class="uil-eye-slash" ></i></a>
                                        @else
                                        <a href="{{ route("toggle_users",$hotel->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        @endif
                                        @endisset
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content">
         
        
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="address-title">اضافة فندق جديد</h3>
              <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
            </div>
            <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return true" novalidate="novalidate" action="{{route('storeOwnerHotel')}}">
    
              <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressFirstName">اسم الفندق</label>
                <input type="text" id="modalAddressFirstName" name="hotelName" class="form-control" placeholder="يرجى ادخال اسم الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
              <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName">اسم المالك</label>
                <input type="text" id="modalAddressLastName" name="name" class="form-control" placeholder="يرجى ادخال اسم مالك الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="lisciens_no">رقم تصريح الفندق</label>
                <input type="number" id="lisciens_no" name="lisciens_no" class="form-control" placeholder="رقم تصريح الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName">عنوان الفندق</label>
                <input type="text" id="modalAddressLastName" name="hotel_address" class="form-control" placeholder="عنوان الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName"> الهاتف</label>
                <input type="number" id="modalAddressLastName" name="phone" class="form-control" placeholder="يرجى ادخال رقم الهاتف الخاص بالفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName"> الموبايل</label>
                <input type="number" id="modalAddressLastName" name="mobile" class="form-control" placeholder="يرجى ادخال رقم الموبايل الخاص بالمالك">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="hotel_phone">تلفون الفندق</label>
                <input type="number" id="hotel_phone" name="hotel_phone" class="form-control" placeholder="يرجى ادخال اسم مالك الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName">العنوان</label>
                <input type="text" id="modalAddressLastName" name="address" class="form-control" placeholder="يرجى ادخال عنوان الفندق">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="email">البريد الالكتروني</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="يرجى ادخال  البريد الالكتروني الخاص بالمالك">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="user_name">اسم المستخدم</label>
                <input type="text" id="user_name" name="user_name" class="form-control" placeholder="يرجى ادخال اسم المستخدم الخاص بالمدير">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName">كلمة المرور</label>
                <input type="text" id="modalAddressLastName" name="password" class="form-control" placeholder="يرجى ادخال  كلمة المرور الخاص بالمدير  ">
              <div class="fv-plugins-message-container invalid-feedback"></div> 
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
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
                <label class="form-label" for="ationality_id">نوع الهوية</label>
                <select id="defaultSelect" class="form-select" name="identity_id">
                    <option value=""> اختر نوع الهوية</option>
                    
                    {{-- @isset($indetityTypes) --}}
                    @foreach ($indetityTypes as $indetityType)
                    <option value=" {{$indetityType->id}}"> 
                       @isset($indetityType->identity_type) {{$indetityType->identity_type}} @endisset
                    </option>
                    @endforeach
                    {{-- @endisset --}}
                  </select>              
                  <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressLastName"> رقم الهوية</label>
                <input type="identity_no" id="identity_no" name="identity_no" class="form-control" placeholder="يرجى ادخال رقم الموبايل الخاص بالمالك">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
              </div>
            <div></div><input type="hidden"></form>
          </div>
        
      </div>
    </div>
  </div>
  


@endsection

@section('script')
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

</script>


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


