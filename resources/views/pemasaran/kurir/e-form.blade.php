@extends('layouts.layout')

@section('title')
    Pemasaran - Kurir
@endsection

@section('name')
    Edit Data
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
    <x-cards.card title="Edit Data">
        <x-forms.form action="" method="post">
            <input type="hidden" name="id" value="{{ $kurir->id }}">
            <x-forms.v_input label="Kurir" type="text" :value="$kurir->kurir" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="penjualan/kurir">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
