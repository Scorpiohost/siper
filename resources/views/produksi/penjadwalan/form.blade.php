@extends('layouts.layout')

@section('title')
    Produksi - Penjadwalan
@endsection

@section('name')
    Tambah Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Penjadwalan</li>
        <li class="active">
            <a href="{{ url('produksi/penjadwalan') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Penjadwalan
            </a>
        </li>
        <li>
        <li class="menu-title">Pabrik</li>
        <li>
            <a href="{{ url('produksi/pabrik') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Pabrik
            </a>
        </li>
        </li>


    </x-sidebar.sidebar>
@endsection

@section('content')
    <x-cards.card title="Tambah Data">
        <x-forms.form action="" method="post">
            <x-forms.r_input label="Kodeproduksi" type="text" :value="$kode" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Barang</label>
                <select name="Barang" id="Barang" class="form-control @error('Barang') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($barang as $result)
                        <option value="{{ $result->bcode }}">{{ $result->bcode }} - {{ $result->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('Barang')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Pabrik</label>
                <select name="Pabrik" id="Pabrik" class="form-control @error('Pabrik') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($pabrik as $result)
                        <option value="{{ $result->kodepabrik }}">{{ $result->kodepabrik }} - {{ $result->pabrik }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('Pabrik')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <x-forms.input label="Mulai" type="date" />
            <x-forms.input label="Selesai" type="date" />
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
