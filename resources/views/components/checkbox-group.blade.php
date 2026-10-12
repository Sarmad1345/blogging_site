<div class="mb-3">
    @if ($label)
        <label class="d-block form-label">{{ $label }}</label>
    @endif

    @foreach ($items as $item)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tag-{{ $item->id }}" name="{{ $name }}"
                value="{{ $item->id }}" @checked(in_array($item->id, old('tags', $selected)))>
            <label class="form-check-label" for="tag-{{ $item->id }}">
                {{ $item->name }}
            </label>
        </div>
    @endforeach
</div>
