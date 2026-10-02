@php
    $id = 'field-'.$name;
    $current = $model->value($name);
@endphp
<div class="form-group">
    <label for="{{ $id }}">{{ $field['label'] }}</label>

    @switch($field['type'])
        @case('textarea')
            <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $name === 'body' ? 8 : 4 }}"
                      @class(['form-control', 'is-invalid' => $errors->has($name)])>{{ old($name, $current) }}</textarea>
            @break

        @case('image')
        @case('file')
            @if ($current)
                <div class="current-file">
                    @if ($field['type'] === 'image')
                        <img src="{{ $model->src($name) }}" alt="">
                    @else
                        <a href="{{ $model->src($name) }}" target="_blank" rel="noopener">{{ basename($current) }}</a>
                    @endif
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $id }}-remove" name="remove_{{ $name }}" value="1">
                        <label class="custom-control-label font-weight-normal" for="{{ $id }}-remove">Remove</label>
                    </div>
                </div>
            @endif
            <input type="file" id="{{ $id }}" name="{{ $name }}"
                   accept="{{ $field['type'] === 'image' ? 'image/jpeg,image/png,image/webp,image/gif' : 'application/pdf' }}"
                   @class(['form-control-file', 'is-invalid' => $errors->has($name)])>
            <small class="form-text muted">
                {{ $field['type'] === 'image' ? 'JPG, PNG, WebP or GIF, up to 5 MB' : 'PDF, up to 20 MB' }}{{ $current ? '. Choosing a file replaces the current one.' : '' }}
            </small>
            @break

        @default
            <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $current) }}"
                   @if ($field['type'] === 'url') inputmode="url" @endif
                   @class(['form-control', 'is-invalid' => $errors->has($name)])>
    @endswitch

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
