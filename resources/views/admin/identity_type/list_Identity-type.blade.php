@extends('admin.layouts.main')

@section('title')
    عرض الهويات

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
    الهويات
@endsection
@section('breadcrumb-item2')
    عرض الهويات
@endsection

@section('breadcrumb-item-active')
الهويات
@endsection

@section('page-title')
    عرض الهويات
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- @if(session()->has('success'))
            <div class="alert alert-danger success-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session()->get('success') }} </strong>
            </div>
            @endif --}}
            @include('message')

            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus-circle me-2"></i>إضافة هوية جديد
                    </button>
                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>

                                <th># </th>
                                <th>اسم الهوية</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($identityTypes as $identityType)


                            <tr>
                                <td class="table-user">
                                    {{  $loop->iteration }}
                                </td>
                                <td>
                                    {{$identityType->identity_type}}
                                </td>
                                <td>
                                    @if($identityType->is_active==1)
                                    <span class="badge badge-success-lighten">نشط</span>
                                    @else
                                        <span class="badge badge-danger-lighten">غير نشط</span>
                                    @endif
                                </td>




                                <td>
                                    <a href="{{ route("edit_identity_type",$identityType->id) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @isset($identityType->is_active)
                                    @if($identityType->is_active==1)
                                    <span class="badge badge-success-lighten"></span>
                                    <a href="{{ route("toggle_identity_type",$identityType->id) }}" class="action-icon"> <i class="uil-eye-slash" ></i></a>
                                    @else
                                    <a href="{{ route("toggle_identity_type",$identityType->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
    <!-- end row -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
      <div class="modal-content">
         
        
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
              <h3 class="address-title">اضافة هوية جديد</h3>
              <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
            </div>
            <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"   novalidate="novalidate" method="POST" action="{{ route('store_identity_type') }}" >
                @csrf
              <div class="col-12 col-md-12 fv-plugins-icon-container">
                <label class="form-label" for="identity_type">اسم الهوية</label>
                {{-- <input type="text" id="identity_type" name="identity_type" class="form-control" placeholder="يرجى ادخال نوع الهوية "> --}}
                <select name="identity_type"class="form-control" id="identity_type">
                    <option value="بطاقة شخصية">بطاقة شخصية </option>
                    <option value="جواز سفر"> جواز سفر</option>
                    <option value="اقامة"> اقامة</option>
                    <option value="اخرى">اخرى</option>
                 </select>
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
              
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
    <!-- bundle -->
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
    
        myModal.addEventListener('shown.bs.modal', function () {
      myInput.focus()
    })
    

    <!-- third party js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->

    <!-- end demo js-->


@endsection
