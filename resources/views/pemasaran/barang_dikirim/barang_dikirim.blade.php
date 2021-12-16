@extends('layouts.layout')

@section('title')
    Pemasaran - Barang Dikirim
@endsection

@section('name')
    Barang Dikirim
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang Dikirim</li>
            <li class="active">
                <a href="{{ url('penjualan/barang-dikirim') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Barang Dikirim
                </a>
            </li>
        </li>

        <li class="menu-title">Kurir</li>
            <li>
                <a href="{{ url('penjualan/kurir') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Kurir
                </a>
            </li>
        </li>

        <li class="menu-title">Pelanggan</li>
            <li>
                <a href="{{ url('penjualan/pelanggan') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-table" />
                    Pelanggan
                </a>
            </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='penjualan/barang-dikirim/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Barang Dikirim">
        <x-tables.datatables :thead="['Koderesi', 'Tcodeout', 'Pelanggan', 'Kurir', 'Dikirim','Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->koderesi }}</td>
                    <td>{{ $result->tcodeout }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->kurir }}</td>
                    <td>{{ $result->tanggal_dikirim }}</td>
                    <td>
                        <x-components.link link='penjualan/barang-dikirim/edit/{{ $result->koderesi }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
