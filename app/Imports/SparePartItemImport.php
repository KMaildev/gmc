<?php

namespace App\Imports;

use App\SparePartItem as AppSparePartItem;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class SparePartItemImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.spare_part_number' => 'required',
            '*.spare_parts_name' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            AppSparePartItem::create([
                'part_number'     => strval($row['spare_part_number']),
                'part_name'    => strval($row['spare_parts_name'] ?? ''),
                'remark'    => strval($row['remark'] ?? ''),

                'user_id'    => auth()->user()->id,
                'created_at'    => date('Y-m-d h:i:s'),
                'updated_at'    => date('Y-m-d h:i:s'),
            ]);
        }
    }
}
