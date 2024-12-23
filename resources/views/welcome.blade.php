@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
  <!-- Header -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data MSK Koor {{ Auth::user()->name }}</h1>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data MSK Perhari</h6>
          {{-- @if(in_array(Auth::user()->role, ["1", "2", "3", "4", "5"]))
          <div style="float: right">
            <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
          </div>
          @endif --}}
        </div>

        <!-- Table -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Tanggal Awal Penawaran</th>
                {{-- <th>Tanggal Ordinal</th> --}}
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
            <tbody>
              @forelse ($DataApi as $o)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $o->tgl_penawaran }}</td> <!-- Menggunakan tgl_penawaran -->
                {{-- <td>{{ $o->tanggal_do }}</td> --}}
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
                <td colspan="9" class="text-center">Data tidak tersedia.</td>
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
          <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
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
  });
</script>
@endpush
