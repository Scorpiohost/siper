@extends('layouts.layout')

@section('title')
    Produksi - Penjadwalan
@endsection

@section('name')
    Tambah Data
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
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">       
            <x-forms.input label="Nama" type="text" />
            <x-forms.input label="Email" type="email" />
            <x-forms.input label="Password" type="password" />
            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Bagian</label>
                <select name="Bagian" id="Bagian" class="form-control @error('Bagian') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="manajer">Manager</option>
                    <option value="keuangan">Keuangan</option>
                    <option value="gudang">Gudang</option>
                    <option value="produksi">Produksi</option>
                    <option value="penjualan">Penjualan</option>
                </select>
            </div>
            @error('Bagian')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="produksi/penjadwalan">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
