@extends('layouts.layout')

@section('title')
    Pemasaran - Pelanggan
@endsection

@section('name')
    Pelanggan
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang Dikirim</li>
            <li>
                <a href="{{ url('barang-dikirim') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Barang Dikirim
                </a>
            </li>
        </li>

        <li class="menu-title">Kurir</li>
            <li>
                <a href="{{ url('kurir') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Kurir
                </a>
            </li>
        </li>

        <li class="menu-title">Pelanggan</li>
            <li class="active">
                <a href="{{ url('pelanggan') }}">
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
            <x-components.link link='pelanggan/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Pelanggan">
        <x-tables.datatables :thead="['No', 'Nama', 'Alamat', 'Telepon', 'Aksi']">
            @foreach ($pelanggan as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->alamat }}</td>
                    <td>{{ $result->tlp }}</td>
                    <td>
                        <x-components.link link='pelanggan/edit/{{ $result->id }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('pelanggan/delete/' . $result->id) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
