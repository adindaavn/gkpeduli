<?php

namespace App\Imports;

use App\Models\CatatanPerjalanan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CatatanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dateValue = intval($row['tanggal']); // Assuming 'tanggal' is the date column
        $dateObject = Date::excelToDateTimeObject($dateValue);
        $formattedDate = $dateObject->format('Y-m-d'); // Adjust format as needed

        // dd($formattedDate);
        return new CatatanPerjalanan([
            'nik' => auth()->user()->nik, 
            'tanggal' => $formattedDate, 
            'jam' => $row['waktu'], 
            'lokasi' => $row['lokasi'], 
            'suhu' => $row['suhu_tubuh'],

        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
