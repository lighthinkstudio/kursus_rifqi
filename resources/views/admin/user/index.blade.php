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
                            <td width="20%" class="text-center">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalPassword{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-key"></i>
									</button>
									<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#Detail{{ $data->id }}" data-backdrop="static">
										<i class="fas fa-eye"></i>
									</button>
									<a href="{{ route('admin.edit_user', $data->id) }}" class="btn btn-sm btn-outline-warning">
										<i class="fas fa-edit"></i>
									</a>
									<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#Hapus{{ $data->id }}">
										<i class="fas fa-trash"></i>
									</button>
								</div>
							</td>
							@include('admin.user.password')
							@include('admin.user.detail')
							@include('admin.user.delete')
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