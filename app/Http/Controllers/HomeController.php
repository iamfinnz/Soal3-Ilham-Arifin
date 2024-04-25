<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangDataExport;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $jumlahBarang = Barang::count();
        $jumlahUser = User::count();
        $barang = barang::all();
        return view('home.index', compact('barang', 'jumlahBarang', 'jumlahUser'));
    }

    public function create()
    {
        $user = User::all();
        return view('home.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required|min:3|max:255',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = Barang::create([
            'kode_barang' => $request->input('kode_barang'),
            'nama_barang' => $request->input('nama_barang'),
            'kategori' => $request->input('kategori'),
            'stok' => $request->input('stok'),
            'harga' => $request->input('harga'),
            'gambar' => $request->input('gambar'),
        ]);

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img-barang/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }

        return redirect('/home')->with('status', 'Berhasil menambahkan barang');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('home.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required|min:3|max:255',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $barang->kode_barang = $request->input('kode_barang');
        $barang->nama_barang = $request->input('nama_barang');
        $barang->kategori = $request->input('kategori');
        $barang->stok = $request->input('stok');
        $barang->harga = $request->input('harga');
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('img-barang/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $barang->save();


        return redirect('/home')->with('status', 'Berhasil update data barang');
    }

    public function destroy($id)
    {
        Barang::destroy($id);

        return redirect()->route('home')
            ->with('status', 'Berhasil hapus data barang');
    }

    public function exportToExcel()
    {
        $barang = Barang::all();

        // Proses data
        $barangArray = [];
        foreach ($barang as $key => $data) {
            $barangArray[] = [
                'kode_barang' => $data['kode_barang'],
                'nama_barang' => $data['nama_barang'],
                'kategori' => $data['kategori'],
                'stok' => $data['stok'],
                'harga' => $data['harga'],
                'gambar' => $data['gambar'],
            ];
        }

        // Tentukan heading yang diinginkan
        $headings = [
            'ID', 'Kode Barang', 'Nama Barang', 'Kategori', 'Stok', 'Harga', 'Nama File Gambar'
        ];

        // Export riwayat ke Excel
        return Excel::download(new BarangDataExport($barangArray, $headings), 'Data Barang.xlsx');
    }
}
