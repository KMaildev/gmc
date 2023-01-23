<?php

namespace App\Imports;

use App\Models\Customers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CustomerImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.name' => 'required',
            '*.dealer_code' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            Customers::create([
                'name'     => $row['name'],
                'company_name'     => $row['company_name'],
                'dealer_code'     => $row['dealer_code'],
                'city'     => $row['city'],
                'address'     => $row['address'],
                'phone'     => $row['phone'],
                'email'     => $row['email'],
                'description'     => $row['description'],
                'dealer_or_hp'     => 'dealer',
                'dealer_customer_id'     => 0,

                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
            ]);
        }
    }
}
