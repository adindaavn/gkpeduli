<div class="modal fade" id="modal-catatan" tabindex="-1" role="dialog" aria-labelledby="modal-catatanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Catatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: transparent;">
                    <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                </button>
            </div>
            <form action="{{ route('catatan.store') }}" method="POST">
                @csrf
                <div id="method"></div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="m-2">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" />
                            @error('tanggal')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="jam">jam</label>
                            <input type="time" name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" pattern="([0-1]{1}[0-9]{1}|20|21|22|23):[0-5]{1}[0-9]{1}" value="{{ old('jam') }}" />
                            @error('jam')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="lokasi">lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" placeholder="Toko Bunga" />
                            @error('lokasi')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="suhu">Suhu Tubuh</label>
                            <div class="input-group">
                                <input type="number" name="suhu" id="suhu" class="form-control @error('suhu') is-invalid @enderror" value="{{ old('suhu') }}" placeholder="34.5" step="0.1" />
                                <span class="input-group-text" style="background-color: transparent;">°C</span>
                            </div>
                            @error('suhu')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <div class="modal-footer justify-content-between mx-2">
                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Daftar</button>
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!-- End Modal -->