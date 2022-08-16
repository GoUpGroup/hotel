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
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                </div>
                            </td>
                            <td class="table-user">
                                <a href="javascript:void(0);" class="text-body fw-semibold">مراد</a>
                            </td>
                            <td>
                                738115430
                            </td>
                            <td>
                                mur@ggh.com
                            </td>
                             
                             
                            <td>
                                
                                <span class="badge badge-success-lighten">نشط</span>

                               
                                    <span class="badge badge-danger-lighten">غير نشط</span>
                                

                            <td>
                                <a href="" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                
                            </td>
                        </tr>

                        

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
        <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="return false" novalidate="novalidate">

        <div class="col-12 col-md-6 fv-plugins-icon-container">
        <label class="form-label" for="modalAddressFirstName">اسم الموظف</label>
        <input type="text" id="modalAddressFirstName" name="hotelName" class="form-control" placeholder="يرجى ادخال اسم الموظف">
        <div class="fv-plugins-message-container invalid-feedback"></div></div>
           
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="modalAddressLastName"> الموبايل</label>
            <input type="text" id="modalAddressLastName" name="mobil" class="form-control" placeholder="يرجى ادخال رقم الموبايل الخاص بالموظف">
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
            <label class="form-label" for="modalAddressLastName">اسم المستخدم</label>
            <input type="text" id="modalAddressLastName" name="userName" class="form-control" placeholder="يرجى ادخال اسم المستخدم الخاص بالموظف">
          <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <div class="col-12 col-md-6 fv-plugins-icon-container">
            <label class="form-label" for="modalAddressLastName">كلمة المرور</label>
            <input type="text" id="modalAddressLastName" name="password" class="form-control" placeholder="يرجى ادخال  كلمة المرور الخاص بالموظف  ">
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
