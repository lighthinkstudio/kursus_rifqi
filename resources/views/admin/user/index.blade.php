@extends('admin.layouts.adminlte.app')

@section('content')
@include('plugins.datatables_css')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <a href="{{ route('admin.tambah_user')}}" class="btn btn-outline-primary">
					<i class="fas fa-plus"></i> Tambah
				</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatables">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Nama/ Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $no => $data)
                        <tr>
                            <td class="text-center">{{ $no + 1 }}</td>
                            <td>
                                {{ $data->nama }}<br>
                            </td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role }}</td>
                            <td>X</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('plugins.datatables_js')
@endsection