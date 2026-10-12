<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}">
</div>
