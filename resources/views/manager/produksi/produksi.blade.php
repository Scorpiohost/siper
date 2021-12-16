@extends('layouts.layout')

@section('title')
    Manajer - Produksi
@endsection

@section('name')
    Produksi
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
            <li class="active">
                <a href="{{ url('manajer/produksi') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Produksi
                </a>
            </li>
        </li>
        <li class="menu-title">Users</li>
            <li>
                <a href="{{ url('manajer/user') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-users" />
                    Users
                </a>
            </li>
        </li>
    </x-sidebar.sidebar>
@endsection

@section('content')


    <x-cards.card title="Produksi">
        <x-tables.datatables :thead="['Kodeproduksi', 'Bcode',  'Pabrik','Estimasi']">
            @foreach ($data as $result)
                <tr>
                    <td>{{ $result->kodeproduksi }}</td>
                    <td>{{ $result->bcode }}</td>
                    <td>{{ $result->pabrik }}</td>
                    <td>{{ $result->estimasi }} Hari</td>
                </tr>
            @endforeach
        </x-tables.datatables>
    </x-cards.card>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection
