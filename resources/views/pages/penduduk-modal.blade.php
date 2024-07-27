<div class="modal fade" id="modal-penduduk" tabindex="-1" role="dialog" aria-labelledby="modal-pendudukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: transparent;">
                    <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                </button>
            </div>
            <form action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div id="method"></div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="m-2">
                            <label class="form-label" for="nik">NIK</label>
                            <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="1234567891234567" />
                            @error('nik')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Budi" />
                            @error('nama')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="PIK 3" />
                            @error('alamat')
                            <div class="alert alert danger p-0 ">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="m-2">
                            <label class="form-label" for="jk">Jenis Kelamin</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="l" value="L" value="{{ old('jk') }}" />
                                <label class="form-check-label" for="l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="p" value="P" value="{{ old('jk') }}" />
                                <label class="form-check-label" for="p">Perempuan</label>
                            </div>
                            @error('jk')
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

<!-- import modal -->
<div class="modal fade" id="import-penduduk" tabindex="-1" role="dialog" aria-labelledby="import-pendudukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Import Excel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: transparent;">
                    <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                </button>
            </div>
            <form action="{{ route('import-penduduk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="m-2">
                            <label class="form-label" for="import">File Excel</label>
                            <input type="file" name="import" id="import" class="form-control @error('import') is-invalid @enderror" />
                            <p class="m-1 text-secondary">
                                heading rows format = NIK, Nama, Jenis Kelamin, Alamat
                                <br>
                                data diambil mulai dari row ke-tiga
                            </p>
                            @error('import')
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
                    <button type="submit" class="btn btn-info">Upload</button>
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>