@extends('layouts.layout')

@section('title')
    Pemasaran - Barang Dikirim
@endsection

@section('name')
    Tambah Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Barang Dikirim</li>
            <li class="active">
                <a href="{{ url('barang-dikirim') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Barang Dikirim
                </a>
            </li>
        </li>

        <li class="menu-title">Kurir</li>
            <li>
                <a href="{{ url('kurir') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                    Kurir
                </a>
            </li>
        </li>

        <li class="menu-title">Pelanggan</li>
            <li>
                <a href="{{ url('pelanggan') }}">
                    <x-components.fontawesome icon="menu-icon fa fa-table" />
                    Pelanggan
                </a>
            </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.input label="Koderesi" type="text" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Tcodeout</label>
                <select name="Tcodeout" id="Tcodeout" class="form-control @error('Tcodeout') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($barang_keluar as $result)
                        <option value="{{ $result->tcodeout }}">{{ $result->tcodeout }}</option>
                    @endforeach
                </select>
            </div>
            @error('Tcodeout')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Pelanggan</label>
                <select name="Pelanggan" id="Pelanggan" class="form-control @error('Pelanggan') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($pelanggan as $result)
                        <option value="{{ $result->id }}">{{ $result->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('Pelanggan')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Kurir</label>
                <select name="Kurir" id="Kurir" class="form-control @error('Kurir') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($kurir as $result)
                        <option value="{{ $result->id }}">{{ $result->kurir }}</option>
                    @endforeach
                </select>
            </div>
            @error('Kurir')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror


            <x-forms.input label="Dikirim" type="date" />
            <x-components.primary_button>
                Submit
            </x-components.primary_button>
            <x-components.link link="barang-dikirim">
                <x-components.danger_button>
                    Batal
                </x-components.danger_button>
            </x-components.link>
        </x-forms.form>
    </x-cards.card>
@endsection
