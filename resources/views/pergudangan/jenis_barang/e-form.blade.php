@extends('layouts.layout')

@section('title')
    Pergudangan - Jenis Barang
@endsection

@section('name')
    Edit Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang</li>
        <li>
            <a href="{{ url('barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang
            </a>
        </li>
        <li>
            <a href="{{ url('barang-out') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang Keluar
            </a>
        </li>
        <li>
            <a href="{{ url('barang-in') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang Masuk
            </a>
        </li>
        <li>
        <li class="menu-title">Jenis Barang</li>
        <li class="active">
            <a href="{{ url('/jenis-barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Jenis Barang
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Edit Data">
        <x-forms.form action="" method="post">
            <input type="hidden" name="id" value="{{ $jenis_barang->id }}">
            <x-forms.v_input label="Jenis" type="text" :value="$jenis_barang->jenis" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="jenis-barang">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
