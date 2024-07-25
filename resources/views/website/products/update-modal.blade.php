<!-- Modal create employee -->
<div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProduct" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserModalLabel"><b>Sửa thông tin sửa chữa</b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="updateProductNew" class="needs-validation">
                    @csrf
                    <input name="id_product" type="hidden" id="id_product">
                    <input name="id_customer" type="hidden" id="id_customer">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <label for="name_product" class="form-label">Tên sản phẩm
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="name_product" type="text" class="form-control" id="name_product">
                            <span id="error_name_product" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="supplier_id" class="form-label">Tên nhà cung cấp
                                <span class="badge bg-danger"></span>
                            </label>
                            <select name="supplier_id" class="form-control" id="supplier_id">
                                <option value="">Vui lòng chọn</option>
                                @foreach ($data as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <span id="error_supplier_id" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Giá
                                <span class="badge bg-danger"></span>
                            </label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="1.000.000">
                            <span id="error_price" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Số lượng
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="quantity" type="number" class="form-control" id="quantity" min="1" step="any" />
                            <span id="error_quantity" class="invalid-feedback"></span>
                        </div>
                        {{-- <div class="col-md-6 mb-3">
                            <label for="quantity_min" class="form-label">Số lượng MIN
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="quantity_min" type="number" class="form-control" id="quantity_min" min="1" step="any" >
                            <span id="error_quantity_min" class="invalid-feedback"></span>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Mô tả
                                <span class="badge bg-danger"></span>
                            </label>
                            <textarea name="description" type="text" class="form-control" id="description"></textarea>
                            <span id="error_description" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3 pe-2">
                            <label for="image" class="form-label">Hình ảnh
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="image" type="file" class="form-control" id="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" alt=" hình ảnh" width="150" height="150" />
                            <span id="error_image" class="invalid-feedback"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary"
                    onclick="updateProduct()">Lưu</button>
            </div>
        </div>
    </div>
</div>


<script>
    function updateProduct(){
        let formData = new FormData($('form#updateProductNew')[0]);
        let url = `{{ route('product.update') }}`;

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
                $('#updateProduct').modal('hide');
                loadData();
            }).fail(function(err) {
                console.error(err);
            }).always(function(always) {
                alwaysAjax('updateProductNew', always);
        })
    }
</script>
