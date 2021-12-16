@extends('layouts.layout')

@section('title')
    Manajer - Users
@endsection

@section('name')
    Users
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Keuangan</li>
            <li>
                <a href="{{ url('manajer/keuangan') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-book" />
                    Keuangan
                </a>
            </li>
        </li>
        <li class="menu-title">Produksi</li>
            <li>
                <a href="{{ url('manajer/produksi') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Produksi
                </a>
            </li>
        </li>
        <li class="menu-title">Users</li>
            <li class="active">
                <a href="{{ url('manajer/user') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-users" />
                    Users
                </a>
            </li>
        </li>
    </x-sidebar.sidebar>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mb-4 ">
            <x-components.link link='manajer/user/tambah'>
                <x-components.primary_button>
                    Tambah Data
                </x-components.primary_button>
            </x-components.link>
        </div>
    </div>

    <x-cards.card title="Barang">
        <x-tables.datatables :thead="['No', 'Nama',  'Bagian', 'Aksi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->nama }}</td>
                    <td>{{ $result->bagian }}</td>
                    <td>
                        <x-components.d_link href="{{ url('manajer/user/delete/' . $result->id) }}" />
                    </td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
