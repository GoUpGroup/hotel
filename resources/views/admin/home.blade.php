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
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>@isset($blocklistPersons)
                                    {{count($blocklistPersons)}}
                                @endisset</span></h3>
                                <p class="text-muted font-15 mb-0">عدد المطلوبين</p>
                            </div>
                        </div>
                    </div>

                 
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>@isset($blocklistPersons)
                                    {{$hotelsNo}}
                                @endisset</span></h3>
                                <p class="text-muted font-15 mb-0">عدد الفنادق</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                <h3><span>@isset($blocklistPersons)
                                    {{$visitorsNo}}
                                @endisset</span></h3>
                                    
                                    <i class="mdi mdi-arrow-up text-success"></i></h3>
                                <p class="text-muted font-15 mb-0">عدد الزوار </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                <h3><span>@isset($blocklistPersons)
                                    {{$escortsNo}}
                                @endisset</span></h3>
                                <p class="text-muted font-15 mb-0"> عدد المرافقين </p>
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
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">المطلوبين الذين تم رصدهم</h4>

                <p> عدد  المطلوبين الذين تم رصدهم<b> 88</b></p>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            {{-- @isset($auctions)
                            @foreach($auctions as $auction) --}}
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">مراد حسن علي العمودي</a></h5>
                                    <span class="text-muted font-13">يسكن في فندق جراند يمن</span>
                                </td>
                                <td>
                                    <span class="text-muted font-13">رقم الهوية</span>
                                    <h5 class="font-14 mt-1 fw-normal">7876544343</h5>
                                </td>
                                <td>
                                    <span class="text-muted font-13">تم رصده</span>
                                    <h5 class="font-14 mt-1 fw-normal"> منذ 3 دقايق</h5>
                                </td>
                                <td>
                                    <span class="text-muted font-13">تم تسكينه من قبل الموظف</span>
                                    <h5 class="font-14 mt-1 fw-normal">مراد حسن العمودي</h5>
                                </td>
                                <td>
                                    <span class="text-muted font-13">الحالة</span> <br>
                                    <span class="badge badge-success-lighten">موجود في الفندق</span>

                                    {{-- <span class="badge badge-danger-lighten">موقف</span> --}}

                                </td>
                                <td>
                                    <span class="text-muted font-13">عدد الفنادق التي سكن فيها</span>
                                    <h5 class="font-14 mt-1 fw-normal">52</h5>
                                </td>
                            </tr>
                            {{-- @endforeach
                            @endisset --}}
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

</div>
<!-- container -->

</div>


@endsection

@section('script')

@endsection
