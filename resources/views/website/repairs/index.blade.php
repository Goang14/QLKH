@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="w-100 title-screen">Quản lý sữa chữa</div>
                        <div class="flex-shrink-1">
                            <button type="button" class="btn btn-primary w-90px" data-bs-toggle="modal"
                                data-bs-target="#createRepair">
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
                                <div class="input-group">
                                    <input id="search-repair" type="text" class="form-control" placeholder="Tìm kiếm"
                                        value="">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
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
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Nội dung sửa chữa</th>
                                        <th scope="col">Thời gian bảo hành</th>
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
@endsection

@section('script')

<script>

    // $(document).ready(function() {
    //     loadData();
    // });
    // let keyword = '';

    // function addParameterToURL(page) {
    //     let url = `{{ route('suppliers.search') }}?page=${page}`;
    //     if (keyword !== '') {
    //         url +=`&keyword=${keyword}`
    //     }
    //     return url;
    // }

    // function loadData(page = 1) {
    //     var search = $('#search-supplier').val();
    //     let url = addParameterToURL(page);
    //     $.ajax({
    //         url: url,
    //         type: 'GET',
    //         dataType: 'json',
    //     }).done(function(response) {
    //         let dataTable = $('#suppliers-datatable #data-table-body').empty();
    //         // render table data
    //         $.each(response.data, function(index, item) {
    //             let row = `<tr id="tr-${item.id}" style="vertical-align: middle">
    //             <td>${item.id}</td>
    //             <td>${item.name}</td>
    //             <td>${item.contact_name}</td>
    //             <td class="text-center">${item.phone}</td>
    //             <td class="text-center">${item.email}</td>
    //             <td class="text-center">${item.address}</td>
    //             <td class="text-center">
    //                 <button
    //                     type="button"
    //                     data-bs-toggle="modal" data-bs-target="#update-modal"
    //                     class="btn btn-warning btn-sm"
    //                     onclick="fillModal('${item.id}')">
    //                     <i class="bi bi-pencil-square"></i>
    //                 </button>
    //             </td>
    //         </tr>`;
    //             dataTable.append(row);
    //         });
    //         $('#suppliers-datatable #pagination-links').html(pagination(response.pagination, 'loadData'));
    //     }).fail(function(err) {
    //         const errors = err?.responseJSON?.errors;
    //         if (typeof errors === 'object' && errors !== null && !(errors instanceof Array)) {
    //             for (var key in errors) {
    //                 if (errors.hasOwnProperty(key)) {
    //                     $(`#${key}`).addClass('is-invalid');
    //                     $(`#error_${key}`).text(errors[key]);
    //                     $(`#error_${key}`).addClass('d-block');
    //                 }
    //             }
    //         }
    //     });
    // }

    // $('#suppliers-datatable #search-supplier').keyup(function(event) {
    //     keyword = event?.target?.value ?? '';
    //     loadData();
    // });
</script>
@endsection
