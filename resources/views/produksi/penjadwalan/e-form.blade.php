@extends('layouts.layout')

@section('title')
    Produksi - Penjadwalan
@endsection

@section('name')
    Edit Data
@endsection

@section('sidebar')
    <x-sidebar.sidebar>
        <li class="menu-title">Penjadwalan</li>
        <li class="active">
            <a href="{{ url('penjadwalan') }}">
                <x-components.fontawesome icon="menu-icon fa fa-laptop" />
                Penjadwalan
            </a>
        </li>
        <li>
        <li class="menu-title">Pabrik</li>
        <li>
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
            <x-forms.r_input label="Kodeproduksi" type="text" :value="$kode->kodeproduksi" />

            <div class="form-group">
                <label for="multiple-select" class=" form-control-label">Bcode</label>
                <select name="Barang" id="Barang" class="form-control @error('Barang') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    @foreach ($barang as $result)
                        <option value="{{ $result->bcode }}" @if ($kode->bcode == $result->bcode) selected @endif>{{ $result->bcode }} - {{ $result->nama }}</option>
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
                        <option value="{{ $result->kodepabrik }}" @if ($kodepabrik->kodepabrik == $result->kodepabrik) selected @endif>{{ $result->kodepabrik }} - {{ $result->pabrik }}</option>
                    @endforeach
                </select>
            </div>
            @error('Pabrik')
                <div>
                    <p style="color:red">{{ $message }}</p>
                </div>
            @enderror

            <x-forms.v_input label="Mulai" type="date" :value="$kode->tanggal_mulai" />
            <x-forms.v_input label="Selesai" type="date" :value="$kode->tanggal_selesai" />
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
