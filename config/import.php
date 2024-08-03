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
    'clients' => [
        "label" => "Import Clients",
        "permission_required" => "import-clients",
        "files" => [
            "ds_sheet" => [
                "label" => "Client Sheet",
                "headers_to_db" => [
                    'Client Name'      => 'client_name',
                    'Client Email'     => 'client_email',
                    'Phone Number'     => 'phone_number',
                    'Address'          => 'address',
                    'City'             => 'city',
                    'State'            => 'state',
                    'Zip Code'         => 'zip_code',
                    'Country'          => 'country',
                    'Joined Date'      => 'joined_date',
                ],
            ],
        ],
    ],
    'products' => [
        "label" => "Import Products",
        "permission_required" => "import-products",
        "files" => [
            "ds_sheet" => [
                "label" => "Product Sheet",
                "headers_to_db" => [
                    'Product Name'     => 'product_name',
                    'Product SKU'      => 'product_sku',
                    'Category'         => 'category',
                    'Price'            => 'price',
                    'Stock Quantity'   => 'stock_quantity',
                    'Supplier'         => 'supplier',
                    'Date Added'       => 'date_added',
                    'Description'      => 'description',
                ],
            ],
        ],
    ],
];
