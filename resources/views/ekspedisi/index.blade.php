@extends('layouts.master')
@section('title', 'OS Support | Master Ekspedisi')
@section('menu', 'MASTER EKSPEDISI')
@section('content')

<!-- <div class="row row-button-nav">
  <div class="col-md-6">
    <a href="" id="btn-view" class="button-nav nav-active"><span><i class="fas fa-eye"></i></span>VIEW</a>
    <a href="" id="btn-new" class="button-nav"><span><i class="far fa-plus-square"></i></span>NEW</a>
    <a href="" id="btn-print" class="button-nav"><span><i class="fas fa-print"></i></span>PRINT</a>
    <a href="" id="btn-pdf" class="button-nav"><span><i class="fas fa-file-pdf"></i></span>PDF</a>
    <a href="" id="btn-excel" class="button-nav"><span><i class="fas fa-file-excel"></i></span>XLS</a>
  </div>
</div> -->

  <!-- /.card-body -->
  <div class="card">
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
          <div class="col-sm-12">
            <table id="datatable" class="table table-hover">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Code</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Name</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Active</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Created By</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Created On</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Updated By</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Updated On</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Action</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
<!-- /.card-body -->
</div>

@endsection

@push('scripts')
  <script src="{{ asset('/custom/js/scriptEkspedisi.js') }}"></script>
@endpush