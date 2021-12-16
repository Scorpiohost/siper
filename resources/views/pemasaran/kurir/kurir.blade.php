@extends('layouts.layout')

@section('title')
    Pemasaran - Kurir
@endsection

@section('name')
    Kurir
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang Dikirim</li>
            <li>
                <a href="{{ url('penjualan/barang-dikirim') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Barang Dikirim
                </a>
            </li>
        </li>

        <li class="menu-title">Kurir</li>
            <li class="active">
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
            <x-components.link link='penjualan/kurir/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Kurir">
        <x-tables.datatables :thead="['No', 'Kurir', 'Aksi']">
            @foreach ($kurir as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->kurir }}</td>
                    <td>
                        <x-components.link link='penjualan/kurir/edit/{{ $result->id }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('penjualan/kurir/delete/' . $result->id) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
