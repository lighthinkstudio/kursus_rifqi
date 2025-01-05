<div class="modal fade" id="modalPassword{{ $data->id }}" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.password_user', $data->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group row">
            <label for="password" class="col-lg-4">PASSWORD BARU</label>
            <div class="col-lg-8">
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password baru">
              @error('password')
              <em class="text-danger">{{ $message }}</em>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="password_confirmation" class="col-lg-4">KONFIRMASI PASSWORD BARU</label>
            <div class="col-lg-8">
              <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Konfirmasi password baru">
              @error('password_confirmation')
              <em class="text-danger">{{ $message }}</em>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-outline-warning">
            <i class="fas fa-save"></i> Update
          </button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->