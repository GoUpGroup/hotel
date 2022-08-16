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

                    <form method="post" action="{{route('update_policies',$policies->id)}}">
                        @csrf
                    <div class="row">

                            <div class="mb-3 col-12 col-md-6">
                                <label for="inputAddress" class="form-label">اسم الشخص</label>
                                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ $policies->name }}" placeholder="يرجى ادخال اسم الشخص المطلوب">
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="inputAddress" class="form-label">جهة القدوم</label>
                                <select id="defaultSelect" class="form-select" name="state" value="{{ $policies->state }}">
                                    <option>اختر احد المدن</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>      
                             </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalAddressLastName">رقم البطاقة</label>
                                <input type="text" id="modalAddressLastName" name="numberCard"  value="{{ $policies->numberCard }}" class="form-control" placeholder="يرجى ادخال رقم البطاقة  ">
                              <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            
                            <div class="col-12 col-md-6 fv-plugins-icon-container">
                                <label class="form-label" for="modalAddressLastName"> رقم الجواز</label>
                                <input type="text" id="modalAddressLastName" name="numberPassport"  value="{{ $policies->numberPassport }}" class="form-control" placeholder="يرجى ادخال رقم  الجواز">
                              <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container mt-3">
                                <label class="form-label" for="modalAddressLastName"> صورة البطاقة</label>
                                <input class="form-control" type="file" id="formFile"  name="photoCard" value="{{ $policies->photoCard }}">
                               <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <div class="col-12 col-md-6 fv-plugins-icon-container mt-3">
                                <label for="formFile" class="form-label"> صورةالجواز</label>
                                <input class="form-control" type="file" id="formFile"  name="photoPassport" value="{{ $policies->photoPassport }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        <div class="mb-1 col-12 col-md-6">
                            <label for="inputAddress" class="form-label">الحالة</label>
                            <select name="is_active" class="form-select mb-3">
                                <option @if($policies->is_active==1) selected @endif value="1">نشط</option>
                                <option @if($policies->is_active==-1) selected @endif value="-1">غير نشط</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">تعديل</button>

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


