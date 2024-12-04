@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data MSK Koor {{ Auth::user()->name }}</h1>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data MSK Perhari</h6>

          @if(Auth::user()->role == "1")
            <div style="float: right">
              <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
            </div>
          @elseif(Auth::user()->role == "2")
            <!-- For role 2, show a different button or content if needed -->
            <div style="float: right">
              <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
            </div>
          @elseif(Auth::user()->role == "3")
            <!-- Role 3 specific content -->
            <div style="float: right">
              <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
            </div>
          @elseif(Auth::user()->role == "4")
            <!-- Role 4 specific content -->
            <div style="float: right">
              <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
            </div>
          @elseif(Auth::user()->role == "5")
            <!-- Role 5 specific content -->
            <div style="float: right">
              <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Update Data</a>
            </div>
          @endif
        </div>

        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Tanggal Penawaran</th>
                <th>Tanggal DO</th>
                <th>Sales</th>
                <th>Customer</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Jenis MSK</th>
                <th>Checklist DO</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $o)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $o->tanggal_penawaran }}</td>
                <td>{{ $o->tanggal_do }}</td>
                <td>{{ $o->sales }}</td>
                <td>{{ $o->customer }}</td>
                <td>{{ $o->produk }}</td>
                <td>{{ $o->qty}}</td>
                <td>{{ $o->msk }}</td>
                <td>{{ $o->checklist_do }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    </div>
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
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
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#dataTableHover').DataTable();
        });
    </script>
    
@endpush