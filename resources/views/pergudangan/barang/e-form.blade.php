@extends('layouts.layout')

@section('title')
    Pergudangan - Barang
@endsection

@section('name')
    Edit Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang</li>
        <li class="active">
            <a href="{{ url('gudang/barang') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Barang
            </a>
        </li>
        <li>
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
    <x-cards.card title="Edit Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Bcode" type="text" :value="$kode->bcode" />
            <x-forms.v_input label="Nama" type="text" :value="$kode->nama" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Jenis</label>
                <select name="Jenis" id="Jenis" class="form-control @error('Jenis') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($jenis as $result)
                        <option value="{{ $kode->id_jenis }}" @if ($kode->id_jenis == $result->id) selected @endif>{{ $result->jenis }}</option>
                    @endforeach
                </select>
            </div>
            @error('Jenis')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <x-forms.v_input label="Stok" type="number" :value="$kode->stok" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="gudang/{{ url('gudang/') }}barang">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
