<?php

return [
    'orders' => [
        "label" => "Import Orders",
        "permission_required" => "import-orders",
        "files" => [
            "ds_sheet" => [
                "label" => "DS Sheet",
                "headers_to_db" => [
                    'Order Date'       => 'order_date',
                    'Channel'          => 'channel',
                    'SKU'              => 'sku',
                    'Item Description' => 'item_description',
                    'Origin'           => 'origin',
                    'SO#'              => 'so_num',
                    'Total Price'      => 'total_price',
                    'Cost'             => 'cost',
                    'Shipping Cost'    => 'shipping_cost',
                    'Profit'           => 'profit'
                ],
            ],

        ],
    ],
];
