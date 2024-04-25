<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangDataExport implements FromCollection, WithHeadings
{
    protected $barang;
    protected $headings;
    public $timestamps = false;

    public function __construct(array $barang, array $headings)
    {
        $this->barang = $barang;
        $this->headings = $headings;
    }

    public function collection()
    {
        return barang::all();
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
