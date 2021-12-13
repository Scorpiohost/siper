@extends('layouts.layout')

@section('title')
    Produksi - Penjadwalan
@endsection

@section('name')
    Penjadwalan
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Penjadwalan</li>
        <li class="active">
            <a href="{{ url('penjadwalan') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Penjadwalan
            </a>
        </li>
        <li>
        <li class="menu-title">Pabrik</li>
        <li>
            <a href="{{ url('pabrik') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Pabrik
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='penjadwalan/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Barang">
        <x-tables.datatables :thead="['Kodeproduksi', 'Bcode',  'Pabrik','Estimasi', 'Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->kodeproduksi }}</td>
                    <td>{{ $result->bcode }}</td>
                    <td>{{ $result->pabrik }}</td>
                    <td>{{ $result->estimasi }} Hari</td>
                    <td>
                        <x-components.link link='penjadwalan/edit/{{ $result->kodeproduksi }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('penjadwalan/delete/' . $result->kodeproduksi) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
