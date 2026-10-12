<div class="mb-3">
    @if ($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected(old($name, $selected) == $option->id)>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
