<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvoicesExport implements FromCollection,WithHeadings,WithMapping
{
    protected $invoices;

    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->invoices;
        
    }
    public function map($invoice): array
    {
        if($invoice->provider_id == auth()->user()->id){
            return [
                [
                    $invoice->id,
                    $invoice->down_payment,
                    $invoice->payment_method,
                    asset($invoice->file),
                ],
            ];

        }else{
            return [
                [
                    $invoice->id,
                    $invoice->getProvider->name,
                    $invoice->down_payment,
                    $invoice->payment_method,
                    asset($invoice->file),
                ],
            ];
        }
        
           
        
    }
    public function headings() :array
    {
        if(auth()->user()->role == 'provider'){
            return ["#","Down payment",'Payment method','Receipt'];
        } 
            return ["#", "Name","Down payment",'Payment method','Receipt'];
        
    }
}
