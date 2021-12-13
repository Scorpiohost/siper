@extends('layouts.layout')

@section('title')
    Pergudangan - Barang
@endsection

@section('name')
    Tambah Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang</li>
        <li class="active">
            <a href="barang">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang
            </a>
        </li>
        <li>
            <a href="barang-out">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Keluar
            </a>
        </li>
        <li>
            <a href="barang-in">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Masuk
            </a>
        </li>
        <li>
        <li class="menu-title">Jenis Barang</li>
        <li>
            <a href="jenis-barang">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Jenis Barang
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Bcode" type="text" :value="$kode" />
            <x-forms.input label="Nama" type="text" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Jenis</label>
                <select name="Jenis" id="Jenis" class="form-control @error('Jenis') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($jenis as $result)
                        <option value="{{ $result->id }}">{{ $result->jenis }}</option>
                    @endforeach
                </select>
            </div>
            @error('Jenis')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <x-forms.input label="Stok" type="number" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="barang">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
