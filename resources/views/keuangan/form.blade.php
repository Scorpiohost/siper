@extends('layouts.layout')

@section('title')
    Keuangan - Dashboard
@endsection

@section('name')
    Tambah Data
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
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Tcode" type="text" :value="$kode" />
            <x-forms.input label="Transaksi" type="text" />
            <x-forms.input label="Pengeluaran" type="text" />
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
