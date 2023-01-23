<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.product' => 'required',
            '*.brand_name' => 'required',
            '*.quantity' => 'numeric',
            '*.amount_usd' => 'numeric',
            '*.exchange_rate' => 'numeric',
            '*.adjustment_value_ad' => 'numeric',
            '*.commercial_tax_percent' => 'numeric',
            '*.maccs_service_fee' => 'numeric',
            '*.security_fee' => 'numeric',
            '*.redemption_fine' => 'numeric',
            '*.advance_tax_percent' => 'numeric',
        ])->validate();

        foreach ($rows as $row) {
            Products::create([
                'product'     => $row['product'],
                'type'    => $row['type'],
                'model_no'    => $row['model_no'],
                'model_year'    => $row['model_year'],
                'configuration'    => $row['configuration'],
                'body_color'    => $row['body_color'],
                'interior_color'    => $row['interior_color'],
                'engine_power'    => $row['engine_power'],
                'chessi_no'    => $row['chessi_no'],
                'weight'    => $row['weight'],
                'door'    => $row['door'],
                'seater'    => $row['seater'],
                'vehicle_no'    => $row['vehicle_no'],
                'quantity'    => $row['quantity'],
                'remark'    => $row['remark'],

                'user_id'    => auth()->user()->id,
                'brand_id'    => 0,
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),

                'brand_name'    => $row['brand_name'],
                'commodity'    => strval($row['commodity']),
                'id_no'    => strval($row['id_no']),
                'unit'    => strval($row['unit']),

                'amount_usd'    => $row['amount_usd'],
                'exchange_rate'    => $row['exchange_rate'],
                'adjustment_value_ad'    => $row['adjustment_value_ad'],
                'import_duty_other_tax_percent'    => $row['import_duty_other_tax_percent'],
                'commercial_tax_percent'    => $row['commercial_tax_percent'],
                'maccs_service_fee'    => $row['maccs_service_fee'],
                'security_fee'    => $row['security_fee'],
                'redemption_fine'    => $row['redemption_fine'],
                'advance_tax_percent'    => $row['advance_tax_percent'],
                'import_date'    => date('Y-m-d h:i:s'),
            ]);
        }
    }
}
