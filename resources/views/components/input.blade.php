@props(['label', 'type' => 'text', 'name'])
<div class="form-outline mb-4 col-lg-10 mx-auto">
    <input {{ $attributes }} type="{{ $type }}" id="{{ $label }}" class="form-control text-white" name="{{$name}}" />
    <label class="form-label text-white" name="{{ $label }}" for="{{ $label }}">{{ $label }}</label>
    {{-- @error('name')
        div
    @enderror --}}
</div>