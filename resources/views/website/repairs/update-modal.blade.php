<!-- Modal create employee -->
<div class="modal fade" id="updateRepair" tabindex="-1" aria-labelledby="updateRepair" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserModalLabel"><b>Sửa thông tin sửa chữa</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="updateRepairNew" class="needs-validation">
                    @csrf
                    <input name="id_repair" type="hidden" id="id_repair">
                    <input name="id_customer" type="hidden" id="id_customer">
                    <div class="row">
                        <div class="col-6">
                            <h5><b>Khách hàng</b></h5>
                            <hr>
                            <div class="col-md-12 mb-3">
                                <label for="name_customer" class="form-label">Tên khách hàng
                                    <span class="badge bg-danger"></span>
                                </label>
                                <input name="name_customer" type="text" class="form-control" id="name_customer">
                                <span id="error_name_customer" class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Số điện thoại
                                    <span class="badge bg-danger"></span>
                                </label>
                                <input name="phone" type="text" class="form-control" id="phone">
                                <span id="error_phone" class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email
                                    <span class="badge bg-danger"></span>
                                </label>
                                <input name="email" type="text" class="form-control" id="email">
                                <span id="error_email" class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Địa chỉ
                                    <span class="badge bg-danger"></span>
                                </label>
                                <input name="address" type="text" class="form-control" id="address">
                                <span id="error_address" class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="type" class="form-label">Loại
                                    <span class="badge bg-danger"></span>
                                </label>
                                <select name="type" id="type" class="form-control" >
                                    <option value="">Vui lòng chọn</option>
                                    @foreach ($service as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <span id="error_type" class="invalid-feedback"></span>
                            </div>
                            <div class="d-name-tel col-md-12 mb-3">
                                <label for="product_id" class="form-label">Tên máy
                                    <span class="badge bg-danger"></span>
                                </label>
                                <select name="product_id" id="product_id" class="form-control" >
                                    <option value="">Vui lòng chọn</option>
                                    @foreach ($product as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <span id="error_product_id" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <h5><b>Nội dung</b></h5>
                            <hr>
                            <div class="col-md-12 mb-3">
                                <label for="repair_content" class="form-label">Nội dung sửa chữa
                                    <span class="badge bg-danger"></span>
                                </label>
                                <textarea name="repair_content" type="text" class="form-control" id="repair_content"></textarea>
                                <span id="error_repair_content" class="invalid-feedback"></span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="guarantee" class="form-label">Thời gian bảo hành
                                    <span class="badge bg-danger"></span>
                                </label>
                                <div class="row">
                                    <div class="col-6">
                                        <input name="start_guarantee" type="date" class="form-control" id="start_guarantee">
                                    </div>
                                    <div class="col-6">
                                        <input name="end_guarantee" type="date" class="form-control" id="end_guarantee">
                                    </div>
                                </div>
                                <span id="error_contact_name" class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary"
                    onclick="updateRepair()">Lưu</button>
            </div>
        </div>
    </div>
</div>

<style>
    .d-name-tel{
        display: none;
    }
</style>

<script>

    $(document).ready(function(){
        $('#type').on('input', function(){
            console.log($(".d-name-tel"));
            if($('#type').val() != 2){
                $(".d-name-tel").css("display","none");
            } else {
                $(".d-name-tel").css("display","block");
            }
        });
    });

    function updateRepair(){
        let formData = new FormData($('form#updateRepairNew')[0]);
        let url = `{{ route('repairs.update') }}`;

        $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function() {
                $('#updateRepair').modal('hide');
                loadData();
            }).fail(function(err) {
                console.error(err);
            }).always(function(always) {
                alwaysAjax('updateRepairNew', always);
        })
    }
</script>
