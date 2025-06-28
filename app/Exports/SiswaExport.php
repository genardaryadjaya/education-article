<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select('nama', 'nis', 'kelas', 'alamat')->get();
    }

    public function headings(): array
    {
        return [
            'Nama', 'NIS', 'Kelas', 'Alamat'
        ];
    }
}
