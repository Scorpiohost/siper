<div class="form-group">
    <label for="{{ $label }}" class=" form-control-label">{{ $label }}</label><input
        type="{{ $type }}" id="nf-email" name="{{ $label }}" placeholder="Masukan {{ $label }}"
        class="@error($label) is-invalid @enderror form-control">
</div>
@error($label)
    <div>
        <p style="color:red">{{ $message }}</p>
    </div>
@enderror
