@props(['label', 'type' => 'text'])
<div class="form-outline mb-4 col-lg-10 mx-auto">
    <input {{ $attributes }} type="{{ $type }}" id="{{ $label }}" class="form-control text-white" />
    <label class="form-label text-white" name="{{ $label }}" for="{{ $label }}">{{ $label }}</label>
</div>