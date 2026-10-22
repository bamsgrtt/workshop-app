<?php

namespace App\Http\Controllers\Praktikum\Acara30;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function invoice(Order $order)
    {
        $order->load(['items.product', 'customer']);

        $pdf = Pdf::loadView('acara30.invoices.invoice', [
            'invoice' => $order,
        ]);

        return $pdf->download('invoice_' . $order->id . '.pdf');
    }
}
