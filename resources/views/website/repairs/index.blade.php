@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="w-100 title-screen">Quản lý thông tin</div>
                        <div class="flex-shrink-1">
                            <button type="button" class="btn btn-primary w-90px" data-bs-toggle="modal"
                                data-bs-target="#createRepair" onclick="clearModal()">
                                Thêm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="repair-datatable">
                        <div class="row mb-3">
                            <div class="col-12 col-sm-6 col-xl-4 pe-0">
                                <label for="project_client" class="form-label m-0">Tìm kiếm</label>
                                <div class="row pt-3">
                                    <div class="col-5">
                                        <select name="" id="" class="form-select">
                                            <option value="">Vui lòng chọn</option>
                                            @foreach ($service as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-7">
                                        <div class="input-group">
                                            <input id="search-repair" type="text" class="form-control" placeholder="Tìm kiếm"
                                                value="">
                                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-container">
                            {{-- table data --}}
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Dịch vụ</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Thời gian bảo hành</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Chức năng</th>
                                      </tr>
                                </thead>
                                <tbody id="data-table-body">
                                </tbody>
                            </table>
                        </div>
                        <div id="pagination-links">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('website.repairs.create-modal')
    @include('website.repairs.update-modal')
@endsection

@section('script')

<script>

    $(document).ready(function() {
        loadData();
    });
    let keyword = '';
    let repairsData = {};

    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    function addParameterToURL(page) {
        let url = `{{ route('repairs.search') }}?page=${page}`;
        if (keyword !== '') {
            url +=`&keyword=${keyword}`
        }
        return url;
    }

    function loadData(page = 1) {
        var search = $('#search-supplier').val();
        let url = addParameterToURL(page);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
        }).done(function(response) {
            let dataTable = $('#repair-datatable #data-table-body').empty();
            // render table data
            $.each(response.data, function(index, item) {
                let row = `<tr id="tr-${item.id}" style="vertical-align: middle">
                <td>${++index}</td>
                <td>${item.name}</td>
                <td>${item.phone}</td>
                <td>${item.type == 1 ? "Bán hàng" : item.type == 2 ? "Bán máy - " + item.product_name  : item.type == 3 ? "Sửa chữa" : "Cầm đồ"}</td>
                <td class="text-center">${item.repair_content ?? ''}</td>
                <td class="text-center">
                    ${formatDate(item.start_guarantee)} - ${formatDate(item.end_guarantee)}
                </td>
                <td class="text-center">${item.address}</td>
                <td class="text-center">
                    <button
                        type="button"
                        data-bs-toggle="modal" data-bs-target="#updateRepair"
                        class="btn btn-warning btn-sm"
                        onclick="fillModal('${item.id}')">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <form action="{{ route('repair.delete', ['id' => ':id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>`;
                row = row.replace(':id', item.id);
                dataTable.append(row);
                repairsData[`${item.id}`] = item;
            });
            $('#repair-datatable #pagination-links').html(pagination(response.pagination, 'loadData'));
        }).fail(function(err) {
            const errors = err?.responseJSON?.errors;
            if (typeof errors === 'object' && errors !== null && !(errors instanceof Array)) {
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#error_${key}`).text(errors[key]);
                        $(`#error_${key}`).addClass('d-block');
                    }
                }
            }
        });
    }

    $('#repair-datatable #search-repair').keyup(function(event) {
        keyword = event?.target?.value ?? '';
        loadData();
    });

    function clearModal(){
        $('#createRepair #name_customer').val('');
        $('#createRepair #phone').val('');
        $('#createRepair #email').val('');
        $('#createRepair #address').val('');
        $('#createRepair #type').val('');
        $('#createRepair #repair_content').val('');
        $('#createRepair #start_guarantee').val('');
        $('#createRepair #end_guarantee').val('');
    }

    function fillModal(id) {
        $('#id_customer').val(repairsData[`${id}`]['customer_id']);
        $('#id_repair').val(id);
        let start_guarantee = repairsData[`${id}`]['start_guarantee'].replace(' 00:00:00', '');
        let end_guarantee = repairsData[`${id}`]['end_guarantee'].replace(' 00:00:00', '');

        $('#updateRepair').modal('show');
        if (id) {
            $('#updateRepairNew #name_customer').val(repairsData[`${id}`]['name']);
            $('#updateRepairNew #phone').val(repairsData[`${id}`]['phone']);
            $('#updateRepairNew #email').val(repairsData[`${id}`]['email']);
            $('#updateRepairNew #address').val(repairsData[`${id}`]['address']);
            $('#updateRepairNew #type').val(repairsData[`${id}`]['type']);
            $('#updateRepairNew #repair_content').val(repairsData[`${id}`]['repair_content']);
            $('#updateRepairNew #start_guarantee').val(start_guarantee);
            $('#updateRepairNew #end_guarantee').val(end_guarantee);
        }
    }
</script>
@endsection
