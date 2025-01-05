<div class="modal fade" id="Hapus{{ $data->id }}">
  <div class="modal-dialog" style=" margin-top: 10%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          Yakin ingin menghapus data pengguna <b>{{ $data->nama }}</b>?
        </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('admin.hapus_user', $data->id) }}" method="POST" class="form-horizontal">
          @csrf
          @method('DELETE')
          <button type="submit" name="submit" class="btn btn-outline-danger">
            <i class="fas fa-trash"></i> Ya, Hapus data ini
          </button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Close
          </button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->