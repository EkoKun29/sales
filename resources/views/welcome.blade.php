@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data MSK Koor {{ Auth::user()->name }}</h1>
    </div>

    <!-- Row for all three cards -->
    <div class="row">
        <!-- Card 1 - Original Data Table -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data MSK Perhari</h6>
                </div>
                <!-- Table -->
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Tgl Awal Penawaran</th>
                                <th>Tgl Penawaran Berjalan</th>
                                <th>Penawaran Ke</th>
                                <th>Tanggal DO</th>
                                <th>Sales</th>
                                <th>Customer</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Jenis MSK</th>
                                <th>Nama Kontrak</th>
                                <th>Checklist DO</th>
                            </tr>
                        </thead>
                        <tbody id="card1-body">
                            @forelse ($DataApi as $o)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $o->tanggal_penawaran_awal }}</td>
                                <td>{{ $o->tanggal_penawaran_berjalan }}</td>
                                <td>{{ $o->penawaran_ke }}</td>
                                <td>{{ $o->tanggal_do }}</td>
                                <td>{{ $o->nama_sales }}</td>
                                <td>{{ $o->nama_customer }}</td>
                                <td>{{ $o->nama_produk }}</td>
                                <td>{{ $o->total_qty }}</td>
                                <td>{{ $o->jenis_msk }}</td>
                                <td>{{ $o->nama_kontrak }}</td>
                                <td style="text-align:center;">{{ $o->checklist_do }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center">Data tidak tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card 2 - tabel kosong -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Data MSK per Hari 2</h6>
                </div>
                <!-- Table -->
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableCard2">
                        <thead class="thead-light">
                          <tr>
                            <th>No</th>
                            <th>Tgl Awal Penawaran</th>
                            <th>Tgl Penawaran Berjalan</th>
                            <th>Penawaran Ke</th>
                            <th>Tanggal DO</th>
                            <th>Sales</th>
                            <th>Customer</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Jenis MSK</th>
                            <th>Nama Kontrak</th>
                            <th>Checklist DO</th>
                        </tr>
                        </thead>
                        <tbody id="card2-body">
                          @forelse ($DataApi as $o)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $o->tanggal_penawaran_awal }}</td>
                              <td>{{ $o->tanggal_penawaran_berjalan }}</td>
                              <td>{{ $o->penawaran_ke }}</td>
                              <td>{{ $o->tanggal_do }}</td>
                              <td>{{ $o->nama_sales }}</td>
                              <td>{{ $o->nama_customer }}</td>
                              <td>{{ $o->nama_produk }}</td>
                              <td>{{ $o->total_qty }}</td>
                              <td>{{ $o->jenis_msk }}</td>
                              <td>{{ $o->nama_kontrak }}</td>
                              <td style="text-align:center;">{{ $o->checklist_do }}</td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="12" class="text-center">Data tidak tersedia.</td>
                          </tr>
                          @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card 3 - tabel kosong -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-danger">Data MSK per Hari 3</h6>
                </div>
                <!-- Table -->
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableCard3">
                        <thead class="thead-light">
                          <tr>
                            <th>No</th>
                            <th>Tgl Awal Penawaran</th>
                            <th>Tgl Penawaran Berjalan</th>
                            <th>Penawaran Ke</th>
                            <th>Tanggal DO</th>
                            <th>Sales</th>
                            <th>Customer</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Jenis MSK</th>
                            <th>Nama Kontrak</th>
                            <th>Checklist DO</th>
                        </tr>
                        </thead>
                        <tbody id="card3-body">
                          @forelse ($DataApi as $o)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $o->tanggal_penawaran_awal }}</td>
                              <td>{{ $o->tanggal_penawaran_berjalan }}</td>
                              <td>{{ $o->penawaran_ke }}</td>
                              <td>{{ $o->tanggal_do }}</td>
                              <td>{{ $o->nama_sales }}</td>
                              <td>{{ $o->nama_customer }}</td>
                              <td>{{ $o->nama_produk }}</td>
                              <td>{{ $o->total_qty }}</td>
                              <td>{{ $o->jenis_msk }}</td>
                              <td>{{ $o->nama_kontrak }}</td>
                              <td style="text-align:center;">{{ $o->checklist_do }}</td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="12" class="text-center">Data tidak tersedia.</td>
                          </tr>
                          @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apa kamu ingin keluar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function () {
      $('#dataTableHover').DataTable();
      $('#dataTableCard2').DataTable();
      $('#dataTableCard3').DataTable();

      // Fungsi untuk load ulang isi tbody per card
      function reloadCard(cardId) {
          $.ajax({
              url: window.location.href,
              type: 'GET',
              success: function (data) {
                  const html = $(data);
                  // Ambil ulang isi tbody dari card terkait
                  const newBody = html.find(`#${cardId}`).html();
                  $(`#${cardId}`).html(newBody);
              }
          });
      }

      // Auto reload setiap 5 detik per card
      setInterval(() => reloadCard('card1-body'), 5000);
      setInterval(() => reloadCard('card2-body'), 5000);
      setInterval(() => reloadCard('card3-body'), 5000);
  });
</script>
@endpush