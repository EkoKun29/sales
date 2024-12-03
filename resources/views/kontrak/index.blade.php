@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">DataTables</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">DataTables</li>
      </ol>
    </div>

    <!-- Row -->
    <div class="row">
      <!-- DataTable with Hover -->
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
          </div>
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>Tanggal Penawaran</th>
                  <th>Nama Sales</th>
                  <th>Nama Customer</th>
                  <th>Produk</th>
                  <th>Nama Kontrak</th>
                  <th>Konsep</th>
                  <th>Detail Target</th>
                  <th>Bonus</th>
                  <th>Checklist MFK</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                </tr>
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