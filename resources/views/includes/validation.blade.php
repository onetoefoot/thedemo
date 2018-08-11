@if ($errors->has($fieldname))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first($fieldname) }}</strong>
    </span>
@endif