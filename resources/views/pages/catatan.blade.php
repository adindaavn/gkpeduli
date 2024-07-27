@extends('templates/header')
@section('content')
@include('pages/catatan-modal')
<!-- App body starts -->
<div class="app-body">
    <!-- Container starts -->
    <div class="container-fluid">

        <!-- Row start -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title">Catatan Perjalanan</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <div class="d-flex justify-content-between">
                                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                                <button type="button" class="close btn " data-dismiss="alert" aria-hidden="true">&times;</button>
                            </div>
                            {{session('success')}}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <div class="d-flex justify-content-between">
                                <h5><i class="icon fas fa-ban"></i> Data Gagal Disimpan!</h5>
                                <button type="button" class="close btn" data-dismiss="alert" aria-hidden="true">&times;</button>
                            </div>
                            <ul class="list-unstyled m-0">
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-catatan">
                            <i class="bi bi-plus-lg"></i> Isi Catatan
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#import-catatan">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Import Excel
                        </button>
                        <div class="table-responsive mt-3">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
                                        <th>Suhu Tubuh</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $nik = Auth::user()->nik;
                                    @endphp

                                    @foreach ($catatans as $catatan)
                                    @if ($catatan->nik === $nik)
                                    <tr>
                                        <td>{{ $i= (isset($i)?++$i:$i=1) }}</td>
                                        <td>{{ $catatan->tanggal }}</td>
                                        <td>{{ $catatan->jam }}</td>
                                        <td>{{ $catatan->lokasi }}</td>
                                        <td>{{ $catatan->suhu }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn edit-button" type="button" data-toggle="modal" data-target="#modal-catatan" data-mode="edit" data-id="{{ $catatan->id }}" data-tanggal="{{ $catatan->tanggal}}" data-jam="{{ $catatan->jam}}" data-lokasi="{{ $catatan->lokasi}}" data-suhu="{{ $catatan->suhu}}">
                                                    <i class="bi bi-pen"></i>
                                                </button>

                                                <form action="{{ route('catatan.destroy', $catatan->id) }} " method="POST">
                                                    @csrf @method('DELETE') <button type="submit" class="btn delete-data"><i class="bi bi-trash"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

</div>
<!-- Container ends -->
<!-- App body ends -->
@endsection