<div class="modal fade" id="Detail{{ $data->id }}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Pengguna</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row mb-3">
					<label for="name" class="col-md-3"></label>
					<div class="col-md-9">
						<div id="imagePreview">
							<img src="@if(!empty($data->foto)) {{ asset('storage/assets/uploads/images/' . $data->foto) }} @else {{ asset('assets/images/icons/user.png') }} @endif" alt="Image">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-md-3">USERNAME</label>
					<div class="col-md-9">
						<input type="text" name="username" class="form-control" value="{{ $data->username }}" placeholder="USERNAME" disabled="">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-md-3">NAMA LENGKAP</label>
					<div class="col-md-9">
						<input type="text" name="nama" class="form-control text-uppercase" value="{{ $data->nama }}" placeholder="Nama lengkap" disabled="">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-md-3">EMAIL</label>
					<div class="col-md-9">
						<input type="email" name="email" class="form-control" value="{{ $data->email }}" placeholder="Email" disabled="">
					</div>
				</div>
				<div class="form-group row">
					<label for="status" class="col-md-3">STATUS</label>
					<div class="col-md-9">
						<input type="text" name="status" class="form-control" value="{{ Str::headline($data->status) }}" placeholder="Status" disabled="">
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-end">
				<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
					<i class="fas fa-times"></i> Close
				</button>
				<a href="{{ route('admin.edit_user', $data->id) }}" class="btn btn-outline-warning">
					<i class="fas fa-edit"></i> Edit
				</a>
			</div>
		</div>
	</div>
</div>

<style>
	#imagePreview {
		width: 120px;
		height: 120px;
		background-position: center center;
		background-size: cover;
		-webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
		display: inline-block;
	}
	#imagePreview img {
		width: 100%;
		height: auto;
	}
</style>