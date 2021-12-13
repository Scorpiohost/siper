@extends('layouts.layout')

@section('title')
    Pergudangan - Jenis Barang
@endsection

@section('name')
    Jenis Barang
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
        <li>
            <a href="{{ url('barang-in') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Masuk
            </a>
        </li>
        <li>
        <li class="menu-title">Jenis Barang</li>
        <li class="active">
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
            <x-components.link link='jenis-barang/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Jenis Barang">
        <x-tables.datatables :thead="['No', 'Jenis', 'Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->jenis }}</td>
                    <td>
                        <x-components.link link='jenis-barang/edit/{{ $result->id }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('jenis-barang/delete/'.$result->id) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
