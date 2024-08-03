<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class OrderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] === 'order_date') return null;

        return new Order([
            'order_date' => $this->convertExcelSerialDate($row[0]),
            'channel' => $row[1],
            'sku' => $row[2],
            'item_description' => $row[3],
            'origin' => $row[4],
            'so_num' => $row[5],
            'total_price' => $row[6],
            'cost' => $row[7],
            'shipping_cost' => $row[8],
            'profit' => $row[9],
        ]);
    }

    protected function convertExcelSerialDate($serialDate)
    {
        $baseDate = \DateTime::createFromFormat('Y-m-d', '1900-01-01');

        $days = $serialDate - 2;
        $date = $baseDate->modify("+$days days");

        return $date->format('Y-m-d');
    }
}
