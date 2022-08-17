@extends('admin.layouts.main')

@section('title')
    عرض المطلوبين

@endsection

@section('css')

@endsection
@section('breadcrumb-item')
    المطلوبين
@endsection
@section('breadcrumb-item2')
    عرض المطلوبين
@endsection

@section('breadcrumb-item-active')
    المطلوبين
@endsection

@section('page-title')
    عرض المطلوبين
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus-circle me-2"></i>إضافة مطلوب جديد
                    </button>
                    
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @include('message')

                    {{-- <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route("add_blocklistPersons") }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>إضافة مطلوب جديد</a>
                        </div>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap" id="products-datatable">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الهوية</th>
                                <th>الجنسية</th>
                                <th>الحالة</th>
                                <th style="width: 75px;">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blocklistPersons as $person)


                            <tr>
                                <td class="table-user">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{$person->name}}</td>
                                <td>{{$person->passport_no}}</td>
                                <td>{{$person->nationality->nationality}}</td>
                                
                                <td>
                                    @if($person->is_active==1)
                                    <span class="badge badge-success-lighten">تم القبض عليه</span>
                                    @else
                                        <span class="badge badge-danger-lighten">مطلوب امني</span>
                                    @endif
                                </td>




                                <td>
                                    <a href="{{ route("edit_blocklistPersons",$person->id) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @isset($person->is_active)
                                    @if($person->is_active==1)
                                    <span class="badge badge-success-lighten"></span>
                                    <a href="{{ route("toggle_blocklistPersons",$person->id) }}" class="action-icon"> <i class="uil-eye-slash" ></i></a>
                                    @else
                                    <a href="{{ route("toggle_blocklistPersons",$person->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
              <h3 class="address-title">اضافة مطلوب جديد</h3>
              <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
            </div>
            <form method="POST" action="{{route('storeblocklist')}}" id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"  novalidate="novalidate">
                @csrf
              <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="modalAddressFirstName">اسم الشخص</label>
                <input type="text" id="modalAddressFirstName" name="name" class="form-control" placeholder="يرجى ادخال اسم الشخص المطلوب">
              <div class="fv-plugins-message-container invalid-feedback"></div></div>
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
                <label class="form-label" for="identity_no">رقم البطاقة</label>
                <input type="number" id="identity_no" name="identity_no" class="form-control" placeholder="يرجى ادخال رقم البطاقة  ">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            
            <div class="col-12 col-md-6 fv-plugins-icon-container">
                <label class="form-label" for="passport_no"> رقم الجواز</label>
                <input type="number" id="passport_no" name="passport_no" class="form-control" placeholder="يرجى ادخال رقم  الجواز">
              <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
             
              <div class="col-12 text-center ">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">اضافة</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">الغاء</button>
              </div>
            <div></div><input type="hidden">
        </form>    
          </div>
        
      </div>
    </div>
  </div>
@endsection

@section('script')
    <!-- bundle -->


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
