@extends('layouts.layout')

@section('title')
    Produksi - Pabrik
@endsection

@section('name')
    Edit Data
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
            <a href="{{ url('penjadwalan') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Penjadwalan
            </a>
        </li>
        <li>
        <li class="menu-title">Pabrik</li>
        <li class="active">
            <a href="{{ url('pabrik') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Pabrik
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Edit Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Kodepabrik" type="text" :value="$data->kodepabrik" />
            <x-forms.v_input label="Pabrik" type="text" :value="$data->pabrik" />
            <x-forms.v_input label="Lokasi" type="text" :value="$data->lokasi" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="pabrik">
                <x-components.danger_button type="button">
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
