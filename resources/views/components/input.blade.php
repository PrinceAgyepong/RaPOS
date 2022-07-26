@props(['label'])
<div class="form-outline mb-4 col-lg-10 mx-auto">
    <input {{ $attributes }} type="text" id="{{ $label }}" class="form-control" />
    <label class="form-label" name="{{ $label }}" for="{{ $label }}">{{ $label }}</label>
</div>