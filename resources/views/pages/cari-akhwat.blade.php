@extends('layouts.main')

@section('title')
    Daftar Calon Pasangan
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Daftar Calon Pasangan</h2>
    <p class="dashboard-subtitle">Cari dan temukan calon pasangan yang sesuai dengan <br> kriteria yang anda harapkan.</p>
  </div>
  <div class="dashboard-content">
    <button type="button" class="btn btn-success mt-2 mb-3" data-toggle="modal" data-target="#pilihKriteriaModel">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
    </svg> Cari Calon</button>

    <div class="row mt-2">
      <div class="col-12 col-md-12">
        <p class="text-white ml-1">Daftar calon pasangan sesuai dengan kriteria yang anda harapkan</p>
        @if ($jodoh != null)
            @foreach ($jodoh as $item)
            <div class="card card-list">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            {{ $item['nama'] }}
                        </div>
                        <div class="col-4">
                            {{ number_format($item['persentasi'],2) * 100 }}%
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('details-calon' , $item['nama']) }}" class="btn btn-secondary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="card card-list">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-12">
                        Belum ada daftar calon pasangan
                    </div>
                </div>
            </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
</div>

@endsection

@push('prepend')
{{-- modal --}}
<div class="modal fade" id="pilihKriteriaModel" tabindex="-1" aria-labelledby="pilihKriteriaModelLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pilihKriteriaModelLabel">Pilih Kriteria Calon Pasangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cari-akhwat') }}" method="GET">
                    <div class="row">
                        @php
                        $no = 1;
                        @endphp
                        <div class="col-12 mb-3">
                            <h6>{{ $no++ }}. Keterampilan</h6>
                            @foreach ($keterampilan as $item)
                            <div class="form-check mb-2 ml-3 d-inline">
                                <input class="form-check-input" id="{{ $item->keterampilan }}" type="checkbox" value="{{ $item->keterampilan }}" name="keterampilan[]">
                                <label class="form-check-label" for="{{ $item->keterampilan }}">
                                    {{ $item->keterampilan }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Asal Suku Ibu</h6>
                            <select class="custom-select" name="sukuibu">
                            @foreach ($suku as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="sukuibu" value="{{ $item->suku }}"
                                    id="{{ $item->suku }}">
                                <label class="form-check-label" for="{{ $item->suku }}">
                                    {{ $item->suku }}
                                </label>
                            </div> --}}
                                
                                <option value="{{ $item->suku }}">{{ $item->suku }}</option>
                                
                            @endforeach
                            </select>
                        </div>


                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Asal Suku Bapak</h6>
                            <select class="custom-select" name="sukubapak">
                            @foreach ($suku as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="sukubapak" value="{{ $item->suku }}"
                                    id="{{ $item->suku }}">
                                <label class="form-check-label" for="{{ $item->suku }}">
                                    {{ $item->suku }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->suku }}">{{ $item->suku }}</option>

                            @endforeach
                            </select>

                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Tinggi badan (berdasarkan range)</h6>
                            <select class="custom-select" name="tinggi">
                            @foreach ($tinggi as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="tinggi" id="{{ $item->tinggi }}"
                                    value="{{ $item->tinggi }}">
                                @if ($item->tinggi == "pendek")
                                <label class="form-check-label" for="{{ $item->tinggi }}">
                                    Pendek : 140 - 153 cm
                                </label>
                                @endif
                                @if ($item->tinggi == "sedang")
                                <label class="form-check-label" for="{{ $item->tinggi }}">
                                    Sedang : 154 - 166 cm
                                </label>
                                @endif
                                @if ($item->tinggi == "tinggi")
                                <label class="form-check-label" for="{{ $item->tinggi }}">
                                    Tinggi : 167 - 180 cm
                                </label>
                                @endif
                            </div> --}}
                            <option value="{{ $item->tinggi }}">
                            @if($item->tinggi == "pendek") Pendek : 140 - 153 cm @elseif($item->tinggi == "sedang") Sedang : 154 - 166 cm @else Tinggi : 167 - 180 cm @endif
                            </option>

                            @endforeach
                            </select>

                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Berat badan (berdasarkan range)</h6>
                            <select class="custom-select" name="tubuh">
                            @foreach ($tubuh as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="tubuh" id="{{ $item->tubuh }}"
                                    value="{{ $item->tubuh }}">
                                @if ($item->tubuh == "kurus")
                                <label class="form-check-label" for="{{ $item->tubuh }}">
                                    Kurus : 45 - 54 kg
                                </label>
                                @endif
                                @if ($item->tubuh == "normal")
                                <label class="form-check-label" for="{{ $item->tubuh }}">
                                    Normal : 55 - 64 kg
                                </label>
                                @endif
                                @if ($item->tubuh == "gemuk")
                                <label class="form-check-label" for="{{ $item->tubuh }}">
                                    Gemuk : 65 - 75 kg
                                </label>
                                @endif
                            </div> --}}
                                <option value="{{ $item->tubuh }}">
                                @if($item->tubuh == "kurus") Kurus : 45 - 54 kg @elseif($item->tubuh == "normal") Normal : 55 - 64 kg @else Gemuk : 65 - 75 kg @endif
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Organisasi</h6>
                            <select class="custom-select" name="organisasi">
                            @foreach ($organisasi as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="organisasi"
                                    id="{{ $item->organisasi }}" value="{{ $item->organisasi }}">
                                <label class="form-check-label" for="{{ $item->organisasi }}">
                                    {{ $item->organisasi }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->organisasi }}">{{ $item->organisasi }}</option>

                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Pendidikan</h6>
                            <select class="custom-select" name="pendidikan">

                            @foreach ($pendidikan as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="pendidikan"
                                    id="{{ $item->pendidikan }}" value="{{ $item->pendidikan }}">
                                <label class="form-check-label" for="{{ $item->pendidikan }}">
                                    {{ $item->pendidikan }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->pendidikan }}">{{ $item->pendidikan }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Jenis Rambut</h6>
                            <select class="custom-select" name="rambut">
                            @foreach ($rambut as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="rambut" id="{{ $item->rambut }}"
                                    value="{{ $item->rambut }}">
                                <label class="form-check-label" for="{{ $item->rambut }}">
                                    {{ $item->rambut }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->rambut }}">{{ $item->rambut }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Warna Kulit</h6>
                            <select class="custom-select" name="kulit">
                            @foreach ($kulit as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="kulit" id="{{ $item->kulit }}"
                                    value="{{ $item->kulit }}">
                                <label class="form-check-label" for="{{ $item->kulit }}">
                                    {{ $item->kulit }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->kulit }}">{{ $item->kulit }}</option>

                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Pekerjaan</h6>
                            <select class="custom-select" name="pekerjaan">

                            @foreach ($pekerjaan as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="pekerjaan"
                                    id="{{ $item->pekerjaan }}" value="{{ $item->pekerjaan }}">
                                <label class="form-check-label" for="{{ $item->pekerjaan }}">
                                    {{ $item->pekerjaan }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->pekerjaan }}">{{ $item->pekerjaan }}</option>

                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Golongan Darah</h6>
                            <select class="custom-select" name="darah">

                            @foreach ($darah as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="darah" id="{{ $item->darah }}"
                                    value="{{ $item->darah }}">
                                <label class="form-check-label" for="{{ $item->darah }}">
                                    {{ $item->darah }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->darah }}">{{ $item->darah }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Bentuk Wajah</h6>
                            <select class="custom-select" name="wajah">
                            @foreach ($wajah as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="wajah" id="{{ $item->wajah }}"
                                    value="{{ $item->wajah }}">
                                <label class="form-check-label" for="{{ $item->wajah }}">
                                    {{ $item->wajah }}
                                </label>
                            </div> --}}
                            <option value="{{ $item->wajah }}">{{ $item->wajah }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <h6>{{ $no++ }}. Usia Nikah Ideal</h6>
                            <select class="custom-select" name="usia">
                            @foreach ($nikah as $item)
                            {{-- <div class="form-check mb-2 ml-3">
                                <input class="form-check-input" type="radio" name="usia" id="{{ $item->usia }}"
                                    value="{{ $item->usia }}">
                                @if ($item->usia == "ideal")
                                <label class="form-check-label" for="{{ $item->usia }}">
                                    Ideal : 19 - 25 Tahun
                                </label>
                                @endif
                                @if ($item->usia == "cukup")
                                <label class="form-check-label" for="{{ $item->usia }}">
                                    Cukup : 26 - 30 Tahun
                                </label>
                                @endif
                                @if ($item->usia == "waspada")
                                <label class="form-check-label" for="{{ $item->usia }}">
                                    Waspada : 31 - Tak terhingga tahun
                                </label>
                                @endif
                            </div> --}}
                                <option value="{{ $item->usia }}">
                                @if($item->usia == "ideal") Ideal : 19 - 25 Tahun @elseif($item->usia == "cukup") Cukup : 26 - 30 Tahun @else Waspada : 31 - Tak terhingga tahun @endif
                                </option>
                            @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success px-5" name="search">Cari Pasangan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush
