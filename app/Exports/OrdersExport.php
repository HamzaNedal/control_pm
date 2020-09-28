<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection,WithHeadings,WithMapping
{

    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->orders;
        
    }
    public function map($order): array
    {
        return [
            [
                $order->id,
                $order->getProvider->name,
                $order->getClient->name,  
                $order->title,
                $order->status,
                $order->added_date,
                $order->deadline,
                $order->information,
                $order->number_words,
            ],
           
        ];
    }
    public function headings() :array
    {
        return ["#", "Provider", "Client","Title",'Status','Added date','Deadline','Information','Number words'];
    }

}
