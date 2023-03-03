@props(['name'=>null,'value'=>null,'dataOption'=>[]])
@php
    $is_invalid = $errors->has($name) ? ' is-invalid':'';
@endphp
<select 
name="{{ $name }}" 
{{ $attributes->merge([
    'class' => 'form-control form-control-sm'.$is_invalid
]) }}>
    <option value="">Pilih Paket : </option>
    @foreach ( $dataOption as $row)
        @if (old($name, $value) == $row['value'])
            <option value="<?= $row['value'] ?>" selected><?= $row['option'] ?></option>
        @else
            <option value="<?= $row['value'] ?>"><?= $row['option'] ?></option>
        @endif
    @endforeach
</select>
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror