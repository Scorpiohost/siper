@extends('layouts.layout')

@section('title')
    Pergudangan - Barang
@endsection

@section('name')
    Barang
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang</li>
        <li class="active">
            <a href="{{ url('gudang/barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop"/>
                Barang </a>
        </li>
        <li>
            <a href="{{ url('gudang/barang-out') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link"/>
                Barang Keluar </a>
        </li>
        <li>
            <a href="{{ url('gudang/barang-in') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link"/>
                Barang Masuk </a>
        </li>
        <li>
            <li class="menu-title">Jenis Barang</li>
            <li>
                <a href="{{ url('gudang/jenis-barang') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-table"/>
                    Jenis Barang </a>
            </li>
            </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='gudang/barang/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Barang">
        <x-tables.datatables :thead="['Bcode', 'Nama', 'Jenis', 'Stok', 'Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->bcode }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->jenis }}</td>
                    <td>{{ $result->stok }}</td>
                    <td>
                        <x-components.link link='gudang/barang/edit/{{ $result->bcode }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('gudang/barang/delete/'.$result->bcode) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
