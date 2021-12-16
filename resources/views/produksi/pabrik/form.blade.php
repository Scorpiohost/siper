@extends('layouts.layout')

@section('title')
    Produksi - Pabrik
@endsection

@section('name')
    Tambah Data
@endsection

@extends('layouts.layout')

@section('title')
    Produksi - Pabrik
@endsection

@section('name')
    Dashboard
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Penjadwalan</li>
        <li>
            <a href="{{ url('produksi/penjadwalan') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Penjadwalan
            </a>
        </li>
        <li>
        <li class="menu-title">Pabrik</li>
        <li class="active">
            <a href="{{ url('produksi/pabrik') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Pabrik
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('js')
    <x-components.sweetalert />
@endsection

@section('content')
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Kodepabrik" type="text" :value="$kode" />
            <x-forms.input label="Pabrik" type="text" />
            <x-forms.input label="Lokasi" type="text" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="produksi/pabrik">
                <x-components.danger_button type="button">
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
