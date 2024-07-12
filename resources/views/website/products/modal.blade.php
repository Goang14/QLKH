<!-- Modal create employee -->
<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createProduct" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createUserModalLabel">Tạo sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="createProductNew" class="needs-validation">
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
                        <div class="col-md-6 mb-3">
                            <label for="quantity_min" class="form-label">Số lượng MIN
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="quantity_min" type="number" class="form-control" id="quantity_min" min="1" step="any" >
                            <span id="error_quantity_min" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Hình ảnh
                                <span class="badge bg-danger"></span>
                            </label>
                            <input name="image" type="file" class="form-control" id="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" alt=" hình ảnh" width="150" height="150" />
                            <span id="error_image" class="invalid-feedback"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Mô tả
                                <span class="badge bg-danger"></span>
                            </label>
                            <textarea name="description" type="text" class="form-control" id="description"></textarea>
                            <span id="error_description" class="invalid-feedback"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary"
                    onclick="createProduct()">Lưu</button>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    document.getElementById('price').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/\D/g, '');
        value = new Intl.NumberFormat('de-DE').format(value);
        e.target.value = value;
    });


    function createProduct(){
        let formData = new FormData($('form#createProductNew')[0]);
        let url = "12"
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
                $('#createProduct').modal('hide');
                loadData();
            }).fail(function(err) {
                console.error(err);
            }).always(function(always) {
                alwaysAjax('createProductNew', always);
        })
    }
</script>
@endsection
