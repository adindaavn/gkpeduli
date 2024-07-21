@extends('templates/header')
@section('content')
<!-- App body starts -->
<div class="app-body">
    <!-- Container starts -->
    <div class="container-fluid">
        <!-- Row start -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        @php
                        $nik = Auth::user()->nik;
                        @endphp
                        @foreach ($users as $user)
                        @if ($user->nik === $nik)
                        <h3 class="card-title text-info fw-bold mb-3">Halo, {{ $user->nama }}!</h3>
                        @endif
                        @endforeach
                        <p class="m-0">Selamat datang di Peduli Diri. Yuk, mulai catat perjalananmu</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="icon-box lg col-3 rounded-3 bg-light">
                                <i class="bi bi-calendar2 text-info fs-2"></i>
                            </div>
                            <div class="mx-4 col-9">
                                <p class="mb-2 lh-1 d-flex align-items-center">
                                </p>
                                <h2 class="fw-bold mb-2">Catatan Perjalanan</h2>
                                <h6 class="m-0 fw-normal opacity-50 mb-2">Liat catatan perjalananmu</h6>
                                <a href="{{ url('catatan') }}" type="button" class="btn btn-outline-info m-3 float-md-end">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="icon-box lg col-3 rounded-3 bg-light">
                                <i class="bi bi-stickies text-info fs-2"></i>
                            </div>
                            <div class="mx-4 col-9">
                                <p class="mb-2 lh-1 d-flex align-items-center">
                                </p>
                                <h2 class="fw-bold mb-2">Buat Catatan</h2>
                                <h6 class="m-0 fw-normal opacity-50 mb-2">Tambah catatan perjalananmu</h6>
                                <a href="{{ url('catatan') }}" class="btn btn-outline-info m-3 float-md-end">
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Container ends -->
</div>
<!-- App body ends -->
@endsection