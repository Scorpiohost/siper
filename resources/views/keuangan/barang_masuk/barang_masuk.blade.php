@extends('layouts.layout')

@section('title')
    Keuangan
@endsection

@section('name')
    Barang Masuk
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Keuangan</li>
            <li>
                <a href="{{ url('keuangan') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-book" />
                    Keuangan
                </a>
            </li>
        </li>
        <li class="menu-title">Barang</li>
        <li class="active">
            <a href="{{ url('keuangan/barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang Masuk
            </a>
        </li>
    </li>
    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Barang Masuk">
        <x-tables.datatables :thead="['Tcodein', 'Bcode', 'Nama', 'Qty', 'Tanggal']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->tcodein }}</td>
                    <td>{{ $result->bcode }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->qty }}</td>
                    <td>{{ $result->tanggal }}</td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
