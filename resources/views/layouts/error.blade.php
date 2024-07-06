
@if($errors->any())
    @foreach($errors->all() as $errors)
        <div class="text-danger fw-semibold">
            {{$errors}}
        </div>
    @endforeach
@endif
