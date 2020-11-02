@extends('layouts.admin')

@section('title')
    Daftar Ikhwan
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Daftar Ikhwan</h2>
    <p class="dashboard-subtitle">Tambahkan data Ikhwan!</p>
  </div>
  <div class="dashboard-content">
    <div class="row mt-3">
      <div class="col-12 mt-2">
        <ul
          class="nav nav-pills mb-3"
          id="pills-tab"
          role="tablist"
        >
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="pills-ikhwan-active-tab"
              data-toggle="pill"
              href="#pills-ikhwan-active"
              role="tab"
              aria-controls="pills-ikhwan-active"
              aria-selected="true"
              >Sudah Terverifikasi</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="pills-ikhwan-tab"
              data-toggle="pill"
              href="#pills-ikhwan"
              role="tab"
              aria-controls="pills-ikhwan"
              aria-selected="false"
              >Belum Terverifikasi</a
            >
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-ikhwan-active"
            role="tabpanel"
            aria-labelledby="pills-ikhwan-active-tab"
          >
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ikhwan_active as $item)
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                      <a href="{{ route('details-ikhwan', $item->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                      <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                  </tr>
                  @endforeach
                
                
                </tbody>
            </table>
          </div>
          <div
            class="tab-pane fade"
            id="pills-ikhwan"
            role="tabpanel"
            aria-labelledby="pills-ikhwan-tab"
          >
          <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($ikhwan as $item)
              <tr>
                  <th scope="row">1</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>
                      <div class="btn-group">
                          <a href="{{ route('details-ikhwan', $item->id) }}" class="btn btn-primary text-white">Lihat Detail</a>
                          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Verifikasi</a>
                            <a class="dropdown-item text-danger" href="#">Hapus</a>
                            
                          </div>
                      </div>
                  </td>
              </tr>
              @endforeach
            
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection