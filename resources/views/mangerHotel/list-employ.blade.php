@extends('admin.layouts.main')

@section('title')
الموظفين
@endsection

@section('css')

@endsection
@section('breadcrumb-item')
عرض  الموظفين
@endsection
@section('breadcrumb-item2')
الموظفين
@endsection
@section('breadcrumb-item2')
الموظفين
@endsection
@section('breadcrumb-item-active')
  الموظفين
@endsection

@section('page-title')
 الموظفين
@endsection

@section('content')

<!-- end page title -->

<div class="row">

    <div class="col-12">
       
        @include('message')

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="mdi mdi-plus-circle me-2"></i>إضافة موظف جديد
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
                            <th>اسم الموظف</th>
                            <th>رقم الموبايل</th>
                            <th>الايميل</th>
                            <th>الحالة</th>
                            <th style="width: 75px;">العمليات</th>
                        </tr>
                        </thead>
                    <tbody>
                        @isset($reciprtions)
                        @foreach ($reciprtions as $reciprtion)
                        <tr>
                            <td></td>
                            <td>@isset($reciprtion->user->name)
                                {{$reciprtion->user->name}}</td>
                                @endisset
                            <td>
                                @isset($reciprtion->user->mobile)
                                {{$reciprtion->user->mobile}}</td>
                                @endisset
                                
                            <td>@isset($reciprtion->user->email)
                                {{$reciprtion->user->email}}
                            @endisset</td>
                            <td>
                            @isset($reciprtion->user->is_active)
                            @if($reciprtion->user->is_active==1)
                            <span class="badge badge-success-lighten">نشط</span>

                            @else
                                <span class="badge badge-danger-lighten">غير نشط</span>
                            @endif
                            @endisset 

                            <td>
                                <a href="{{ route("edit_reciption",$reciprtion->user->id) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                @isset($reciprtion->user->is_active)
                                    @if($reciprtion->user->is_active==1)
                                    <span class="badge badge-success-lighten"></span>
                                    <a href="{{ route("toggle_users",$reciprtion->user->id) }}" class="action-icon"> <i class="uil-eye-slash" ></i></a>
                                    @else
                                    <a href="{{ route("toggle_users",$reciprtion->user->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    @endif
                                    @endisset
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-simple modal-add-new-address">
  <div class="modal-content">
     
    
    <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="address-title">اضافة موظف جديد</h3>
          <p class="address-subtitle">يرجى تعبيئة جميع البيانات</p>
        </div>
        <form method="POST" id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return true" novalidate="novalidate" action="{{route('storeReciption')}}">
            @csrf
        <div class="col-12 col-md-6 fv-plugins-icon-container">
        <label class="form-label" for="name">اسم الموظف</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="يرجى ادخال اسم الموظف">
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
           
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="mobile"> الموبايل</label>
            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="يرجى ادخال رقم الموبايل الخاص بالموظف">
          <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
         
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="modalAddressLastName">البريد الالكتروني</label>
            <input type="text" id="modalAddressLastName" name="email" class="form-control" placeholder="يرجى ادخال  البريد الالكتروني الخاص بالموظف">
          <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class=" col-md-6">
            <label for="inputAddress" class="form-label">الحالة</label>
            <select name="is_active" class="form-select ">
                <option  selected    value="1">نشط</option>
                <option  value="-1">غير نشط</option>
            </select>
        </div>
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="user_name">اسم المستخدم</label>
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="يرجى ادخال اسم المستخدم الخاص بالموظف">
          <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="password">كلمة المرور</label>
            <input type="text" id="password" name="password" class="form-control" placeholder="يرجى ادخال  كلمة المرور الخاص بالموظف  ">
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
