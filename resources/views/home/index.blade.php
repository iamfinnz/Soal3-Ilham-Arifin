<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--   CSS Toastr   -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>
            Dashboard | Website Manajemen Inventory
        </title>
    </head>
    @extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

    @section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Barang</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $jumlahBarang }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('home')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow-primary text-center rounded-circle">
                                    <i class="fa fa-dashboard text-lg opacity-10 mb-2" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $jumlahUser }}
                                    </h5>
                                    <p class="mb-0">
                                        <a class="text-success text-sm font-weight-bolder" href="{{ url('user')}}">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-secondary shadow-danger text-center rounded-circle">
                                    <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Tabel Barang</h5>
                        <a class="btn btn-primary btn-rounded float-start mt-4" href="{{ url('create') }}">
                            <i class="fa fa-plus me-sm-1"></i>
                            <span class="d-sm-inline d-none">Tambah</span>
                        </a>
                        <a class="btn btn-success btn-rounded float-end mt-4" href="{{ url('export-excel') }}">
                            <i class="fa fa-file-export me-sm-1"></i>
                            <span class="d-sm-inline d-none">Export Excel</span>
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 m-4">
                            <table class="table align-items-center mb-0" id="tb_barang">
                                <thead>
                                    <tr>
                                        <th class="text-center font-weight-bolder">
                                            No</th>
                                        <th class="text-center font-weight-bolder ps-2">
                                            Gambar</th>
                                        <th class="text-center font-weight-bolder">
                                            Kode Barang</th>
                                        <th class="text-center font-weight-bolder">
                                            Nama Barang</th>
                                        <th class="text-center font-weight-bolder">
                                            Kategori</th>
                                        <th class="text-center font-weight-bolder">
                                            Stok</th>
                                        <th class="text-center font-weight-bolder">
                                            Harga</th>
                                        <th class="text-center font-weight-bolder">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @php $i=1; @endphp
                                    @forelse ($barang as $key => $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset('img-barang/'.$data->gambar) }}" style="width: 100px;" alt="">
                                        </td>
                                        <td>{{ $data->kode_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>Rp. {{ $data->harga }}</td>
                                        <td>
                                            <a href="{{ route('home.edit', $data->id) }}" class="btn btn-sm btn-secondary btn-rounded">
                                                <i class="fa fa-edit"></i>
                                                <span class="d-sm-inline d-none">Edit</span>
                                            </a>
                                            <form action="{{ route('home.destroy', $data->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger btn-rounded" onclick="return confirm('Anda yakin ingin menghapus data barang ini?')"> <i class="fa fa-close me-sm-1"></i>
                                                    Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Toastr -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                            <script>
                                @if(Session::has('status'))
                                toastr.success("{{ Session::get('status') }}")
                                @endif
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    </html>