@if ($errors->has($fieldname))
    <span class="" role="alert">
        <strong>{{ $errors->first($fieldname) }}</strong>
    </span>
@endif