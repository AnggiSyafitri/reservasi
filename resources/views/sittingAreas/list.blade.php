@extends('layouts.admin')
@section('main-content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Manage</h4>
            <span>Sitting Areas</span>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <a href="{{ route('sittingAreas.create') }}" class="btn btn-primary">Add Sitting Area</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger my-3" role="alert">
                    {{ session('error') }}
                  </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success my-3" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                <div class="table-responsive">
                    <table id="datatables" class="display table table-striped" style="min-width: 845px">
                        <thead class="">
                            <tr class="text-white border-bottom-0">
                                <th class="">Name</th>
                                <th class="">capacity</th>
                                <th class="">Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $sittingArea)
                            <tr>
                                <td>{{ $sittingArea->name }}</td>
                                <td>{{ $sittingArea->capacity }}</td>
                                <td class="p-3">
                                    <img src="{{ '/uploads/sittingAreas/'.$sittingArea->image }}" width="128" class="img-fluid rounded" alt="">
                                </td>
                                <td class="">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('sittingAreas.edit', $sittingArea->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                        {{-- <button class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button> --}}
                                        {{-- <button class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button> --}}
                                        <form action="{{ route('sittingAreas.destroy', $sittingArea->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i></button>
                                        </form>
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


@endsection
@section('script')
<script>
    $("#datatables").dataTable()
</script>
<style>
    table.dataTable.no-footer {
        border-bottom: 0 !important;
    }
    .dataTable.no-footer tfoot th,
    .dataTable.no-footer tfoot th,
    .dataTable.no-footer tfoot td {
        border-bottom: none;
    }
    .dataTable.no-footer thead th{
        border-bottom: solid 1px #f0f1f5
    }
</style>
@endsection
