<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            Edit Barang | Website Manajemen Inventory
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Barang'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0">Edit Barang</h5>
                            <a href="{{  url('home') }}" class="btn btn-sm btn-outline-danger btn-rounded ms-auto">
                                <i class="fa fa-arrow-left me-sm-1"></i>
                                <span class="d-sm-inline d-none">Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('home.update', $barang->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" name="kode_barang" value="{{$barang['kode_barang']}}" class="form-control">
                                    @error('kode_barang') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_barang" value="{{$barang['nama_barang']}}" class="form-control">
                                    @error('nama_barang') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <option value="{{$barang['kategori']}}">{{$barang['kategori']}}</option>
                                            <option value="Kategori 1">Kategori 1</option>
                                            <option value="Kategori 2">Kategori 2</option>
                                            <option value="Kategori 3">Kategori 3</option>
                                        </select>
                                        @error('kategori') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" class="form-control" value="{{ $barang['stok'] }}">
                                        @error('stok') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control" value="{{ $barang['harga'] }}">
                                        @error('harga') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" accept=".jpg, .jpeg, .png" class="form-control">*jpg, png, jpeg (maks 2mb)
                                    @error('gambar') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-group mt-5 text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-rounded">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>