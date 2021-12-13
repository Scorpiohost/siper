<table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
        @foreach ($thead as $result)
            <th>{{ $result }}</th>
        @endforeach
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
