@extends('layouts.layout')

@section('title')
    Pergudangan - Barang
@endsection

@section('name')
    Barang Masuk
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang</li>
        <li>
            <a href="{{ url('barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('barang-out') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Keluar
            </a>
        </li>
        <li class="active">
            <a href="{{ url('barang-in') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Masuk
            </a>
        </li>
        <li>
        <li class="menu-title">Jenis Barang</li>
        <li>
            <a href="{{ url('jenis-barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-table" />
                Jenis Barang
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='barang-in/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

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
