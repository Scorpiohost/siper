@extends('layouts.layout')

@section('title')
    Keuangan - Dashboard
@endsection

@section('name')
    Keuangan
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Keuangan</li>
            <li class="active">
                <a href="{{ url('keuangan') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-book" />
                    Keuangan
                </a>
            </li>
        </li>
        <li class="menu-title">Barang</li>
        <li>
            <a href="{{ url('keuangan/barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang Masuk
            </a>
        </li>
    </li>
    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='keuangan/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Data Keuangan">
        <x-tables.datatables :thead="['Tcode', 'Transaksi', 'Pengeluaran', 'Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->tcode }}</td>
                    <td>{{ $result->transaksi }}</td>
                    <td>{{ $result->pengeluaran }}</td>
                    <td>
                        <x-components.link link='keuangan/edit/{{ $result->tcode }}'>
                            <x-components.primary_button>
                                Edit
                            </x-components.primary_button>
                        </x-components.link>
                        <x-components.d_link href="{{ url('keuangan/delete/' . $result->tcode) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
