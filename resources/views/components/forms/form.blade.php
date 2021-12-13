<form action="{{ $action }}" method="{{ $method }}" class="form-horizontal">
    @csrf
    {{ $slot }}
</form>
