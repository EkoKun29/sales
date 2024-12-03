@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">RepeatOrder</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Msk Repeat</li>
        <li class="breadcrumb-item active" aria-current="page">Repeat Order</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Repeat Order</h6>
            <div style="float: right">
                <a href="{{ route('_repeat-order-sync') }}" class="btn btn-primary">Sinkronisasi Data</a>
            </div>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Tanggal Penawaran</th>
                  <th>Sales</th>
                  <th>Customer</th>
                  <th>Produk</th>
                  <th>Tgl Penj.Akhir</th>
                  <th>Qty Penj.Akhir</th>
                  <th>Duz/Zak</th>
                  <th>Btl/Bks</th>
                  <th>Total Qty</th>
                  <th>Checklist DO</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order as $o)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $o->tanggal_penawaran }}</td>
                <td>{{ $o->sales }}</td>
                <td>{{ $o->customer }}</td>
                <td>{{ $o->produk }}</td>
                <td>{{ $o->tanggal_akhir_penjualan }}</td>
                <td>{{ $o->qty_penjualan_akhir }}</td>
                <td>{{ $o->duz }}</td>
                <td>{{ $o->btl }}</td>
                <td>{{ $o->total_qty }}</td>
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

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#dataTableHover').DataTable();
        });
    </script>
    
@endpush