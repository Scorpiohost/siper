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
        <li>
            <a href="{{ url('gudang/barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang
            </a>
        </li>
        <li class="active">
            <a href="{{ url('gudang/barang-out') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Keluar
            </a>
        </li>
        <li>
            <a href="{{ url('gudang/barang-in') }}">
                <x-components.fontawesome icon="menu-icon fa fa-external-link" />
                Barang Masuk
            </a>
        </li>
        <li>
        <li class="menu-title">Jenis Barang</li>
        <li>
            <a href="{{ url('gudang/jenis-barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-table" />
                Jenis Barang
            </a>
        </li>
        </li>

    </x-sidebar.sidebar>
@endsection


@section('content')
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Tcodeout" type="text" :value="$kode" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Bcode</label>
                <select name="Bcode" id="Bcode" class="form-control @error('Bcode') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($barang as $result)
                        <option value="{{ $result->bcode }}">{{ $result->bcode }} - {{ $result->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('Bcode')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <x-forms.input label="Qty" type="number" />
            <x-forms.input label="Tanggal" type="date" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="gudang/barang-out">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
