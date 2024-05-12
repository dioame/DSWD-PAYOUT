<?php

namespace App\Imports;

use App\Models\Admin\Payroll;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PayrollImports implements ToModel, WithStartRow
{
    public $params;
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Payroll([
            'payroll_no' => $row[0], // assuming payroll_no is in the first column
            'name' => $row[1],       // assuming name is in the second column
            'barangay' => $row[2],
            'municipality' => $row[3],
            'modality' => $this->params['modality'],
            'year'=> $this->params['year'],
            'uploaded_by' => $this->params['id_number']
        ]);
    }

    public function startRow(): int
    {
        return 2; // Skip the first row (header)
    }
}
