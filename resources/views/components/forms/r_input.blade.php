<div class="form-group">
    <label for="{{ $label }}" class=" form-control-label">{{ $label }}</label><input
        type="{{ $type }}" id="nf-email" name="{{ $label }}" value="{{ $value }}"
        class="@error($label) is-invalid @enderror form-control" readonly>
</div>
@error($label)
    <div>
        <p style="color:red">{{ $message }}</p>
    </div>
@enderror
