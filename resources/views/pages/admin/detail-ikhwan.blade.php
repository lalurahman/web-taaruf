@extends('layouts.admin')

@section('title')
    Detail Ikhwan
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Detail Ikhwan</h2>
    <p class="dashboard-subtitle">ini detailnya ikhwan</p>
  </div>
  <div class="dashboard-content">
    <div class="row">
      <div class="col-12">
        <a href="{{ route('daftar-ikhwan') }}"
          class="btn btn-secondary px-5 mb-3"
        >
          Kembali
        </a>
        <form action="{{ route('updated-ikhwan') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $ikhwan->id }}">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input
                      type="text"
                      class="form-control"
                      name="name"
                      id="name"
                      value="{{ $ikhwan->name }}"
                      readonly
                    />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      value="{{ $ikhwan->email }}"
                      readonly
                    />
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="biodata">Biodata Ikhwa</label>
                    <div class="row">
                        @if ($ikhwan->details == null)
                          <div class="col-10">
                              <input
                              type="text"
                              class="form-control"
                              name="biodata"
                              id="biodata"
                              value=""
                              readonly
                              />
                          </div>
                          <div class="col-2 mr-auto">
                            <a href="" target="_blank" class="btn btn-secondary">Lihat</a>
                          </div>
                        @else
                          <div class="col-10">
                            <input
                            type="text"
                            class="form-control"
                            name="biodata"
                            id="biodata"
                            value="{{ $ikhwan->details->biodata }}"
                            readonly
                            />
                          </div>
                          <div class="col-2 mr-auto">
                            <a href="{{ url('assets/upload/ikhwan/'. $ikhwan->details->biodata) }}" target="_blank" class="btn btn-secondary">Lihat</a>
                          </div>
                        @endif
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="rekomendasi_murobbi">Surat Rekomendasi Murobbi</label>
                    <div class="row">
                        <div class="col-10">
                            <input
                            type="text"
                            class="form-control"
                            name="rekomendasi_murobbi"
                            id="rekomendasi_murobbi"
                            value="{{ $ikhwan->details->rekomendasi_murobbi }}"
                            readonly
                            />
                        </div>
                        <div class="col-2 mr-auto">
                            <a href="{{ url('assets/upload/ikhwan/'. $ikhwan->details->rekomendasi_murobbi) }}" target="_blank" class="btn btn-secondary">Lihat</a>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="keterangan_nikah">Surat Izin Nikah</label>
                    <div class="row">
                        <div class="col-10">
                            <input
                            type="text"
                            class="form-control"
                            name="keterangan_nikah"
                            id="keterangan_nikah"
                            value="{{ $ikhwan->details->izin_nikah }}"
                            readonly
                            />
                        </div>
                        <div class="col-2 mr-auto">
                            <a href="{{ url('assets/upload/ikhwan/'. $ikhwan->details->izin_nikah) }}" target="_blank" class="btn btn-secondary">Lihat</a>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="keterangan_sehat">Surat Berbadan Sehat</label>
                    <div class="row">
                        <div class="col-10">
                            <input
                            type="text"
                            class="form-control"
                            name="keterangan_sehat"
                            id="keterangan_sehat"
                            value="{{ $ikhwan->details->keterangan_sehat }}"
                            readonly
                            />
                        </div>
                        <div class="col-2 mr-auto">
                            <a href="{{ url('assets/upload/ikhwan/'. $ikhwan->details->keterangan_sehat) }}" target="_blank" class="btn btn-secondary">Lihat</a>
                        </div>
                    </div>
                  </div>
                </div>       
                
              </div>
              @if ($ikhwan->is_active == 0)
                <div class="row">
                  <div class="col text-right"> 
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Sudah Mendapat Pasangan
                    </button>
                  </div>
                </div>
              @endif

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection