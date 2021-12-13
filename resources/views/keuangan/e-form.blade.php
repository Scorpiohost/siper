@extends('layouts.layout')

@section('title')
    Keuangan - Edit
@endsection

@section('name')
    Edit Data
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
    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Edit Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Tcode" type="text" :value="$kode->tcode" />
            <x-forms.v_input label="Transaksi" type="text" :value="$kode->transaksi" />
            <x-forms.v_input label="Pengeluaran" type="text" :value="$kode->pengeluaran" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="keuangan">
                <x-components.danger_button type="button">
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
