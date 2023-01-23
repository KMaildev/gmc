<?php

namespace App\Imports;

use App\Models\ShippingChassisManagement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShippingChassisManagementImport implements ToModel, WithHeadingRow
{

    public function __construct($arrival_item_id, $purchase_item_id, $purchase_order_id, $arrival_information_id)
    {
        $this->arrival_item_id = $arrival_item_id;
        $this->purchase_item_id = $purchase_item_id;
        $this->purchase_order_id = $purchase_order_id;
        $this->arrival_information_id = $arrival_information_id;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ShippingChassisManagement([
            'product'     => strval($row['product']),
            'type'    => strval($row['type']),
            'model_no'    => strval($row['model_no']),
            'model_year'    => strval($row['model_year']),
            'configuration'    => strval($row['configuration']),
            'body_color'    => strval($row['body_color']),
            'interior_color'    => strval($row['interior_color']),
            'engine_power'    => strval($row['engine_power']),
            'chassis_no'    => strval($row['chassis_no']),
            'weight'    => strval($row['weight']),
            'door'    => strval($row['door']),
            'seater'    => strval($row['seater']),
            'vehicle_no'    => strval($row['vehicle_no']),
            'quantity'    => strval($row['quantity']),
            'remark'    => strval($row['remark']),
            'user_id'    => auth()->user()->id ?? 0,
            'brand_name' => strval($row['brand_name']),
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
            'commodity'    => strval($row['commodity']),
            'id_no'    => strval($row['id_no']),

            'arrival_item_id' => $this->arrival_item_id,
            'purchase_item_id' => $this->purchase_item_id,
            'purchase_order_id' => $this->purchase_order_id,
            'arrival_information_id' => $this->arrival_information_id,
        ]);
    }
}
