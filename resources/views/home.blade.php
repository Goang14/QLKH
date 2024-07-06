@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-12">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <b>KẾT QUẢ BÁN HÀNG HÔM NAY</b><br>
                <div class="d-flex text-center py-4">
                    <div class="col-4">
                        <h5>Số tiền thu nhập</h5>
                        <b>1000.000.000</b>&nbsp;<span>VND</span>
                    </div>
                    <div class="col-4 border-start">
                        <h5>Đơn hàng</h5>
                        <b>10</b>&nbsp;<span>Đơn</span>
                    </div>
                    <div class="col-4 border-start">
                        <h5>So với ngày hôm qua</h5>
                        <b>10</b>&nbsp;<span>%</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-4">
            <div class="shadow p-5 mb-5 bg-white rounded">
                <b>Tổng thu nhập trong tháng</b><br>
                <b>1.000.000.000 VND</b>
            </div>
        </div>
        <div class="col-4">
            <div class="shadow p-5 mb-5 bg-white rounded">
                <b>Tổng thu nhập trong năm</b><br>
                <b>1.000.000.000 VND</b>
            </div>
        </div> --}}
    </div>

    <div>

    </div>
</div>
@endsection
