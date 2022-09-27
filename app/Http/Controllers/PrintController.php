<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use charlieuki\ReceiptPrinter\ReceiptPrinter;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;

class PrintController extends Controller
{
    public static function test($items)
    {

        // Set params
        // $mid = '123123456';
        $store_name = "ROSSIE'S COLLECTION";
        $store_address = 'ABEKA TOTAL';
        // $store_phone = '1234567890';
        // $store_email = 'yourmart@email.com';
        // $store_website = 'yourmart.com';
        // $tax_percentage = 10;
        // $transaction_id = 'TX123ABC456';
        $currency = 'GHC';
        // $image_path = 'logo.png';

        // Set items
        // $items = [
        //     [
        //         'name' => 'Mesmerize',
        //         'qty' => 2,
        //         'price' => 14,
        //     ],
        //     [
        //         'name' => 'Odyssey',
        //         'qty' => 1,
        //         'price' => 100,
        //     ],
        //     [
        //         'name' => 'Polo',
        //         'qty' => 3,
        //         'price' => 450,
        //     ],
        //     [
        //         'name' => 'MAYA BROOKE',
        //         'qty' => 3,
        //         'price' => 350,
        //     ],
        // ];

        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set store info
        $printer->setStore( $store_name, $store_address);

        // Set currency
        $printer->setCurrency($currency);

        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price']
            );
        }
        // Set tax
        // $printer->setTax($tax_percentage);

        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        // $printer->setTransactionID($transaction_id);

        // Set logo
        // Uncomment the line below if $image_path is defined
        //$printer->setLogo($image_path);

        // Set QR code
        // $printer->setQRcode([
        //     'tid' => $transaction_id,
        // ]);

        // Print receipt
        // $printer->printReceipt();
        $with_items = true;
        if ($printer->printer) {
            // Get total, subtotal, etc
            $subtotal = $printer->getPrintableSummary('Subtotal', $printer->subtotal);
            $discount = $printer->getPrintableSummary('Discount', $printer->tax);
            $total = $printer->getPrintableSummary('TOTAL', $printer->grandtotal, true);
            // $header = $printer->getPrintableHeader(
            //     'TID: ' . $printer->transaction_id,
            //     'MID: ' . $printer->store->getMID()
            // );
            $footer = "Thank you for shopping!\n";
            // Init printer settings
            $printer->printer->initialize();
            $printer->printer->selectPrintMode();
            // Set margins
            $printer->printer->setPrintLeftMargin(1);
            // Print receipt headers
            $printer->printer->setJustification(Printer::JUSTIFY_CENTER);
            // Print logo
            $printer->printLogo();
            $printer->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->printer->feed(2);
            $printer->printer->text("{$printer->store->getName()}\n");
            $printer->printer->selectPrintMode();
            $printer->printer->text("{$printer->store->getAddress()}\n");
            // $printer->printer->text($header . "\n");
            $printer->printer->feed();
            // Print receipt title
            $printer->printer->setEmphasis(true);
            $printer->printer->text("RECEIPT\n");
            $printer->printer->setEmphasis(false);
            $printer->printer->feed();
            // Print items
            if ($with_items) {
                $printer->printer->setJustification(Printer::JUSTIFY_LEFT);
                foreach ($printer->items as $item) {
                    $printer->printDashedLine();
                    $printer->printer->text($item);
                }
                $printer->printDashedLine();
                $printer->printer->feed();
            }
            // Print subtotal
            $printer->printer->setEmphasis(true);
            $printer->printer->text($subtotal);
            $printer->printer->setEmphasis(false);
            $printer->printer->feed();
            // Print tax
            $printer->printer->text($discount);
            $printer->printer->feed(2);
            // Print grand total
            $printer->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer->printer->text($total);
            $printer->printer->feed();
            $printer->printer->selectPrintMode();
            // Print qr code
            $printer->printQRcode();
            // Print receipt footer
            $printer->printer->feed();
            $printer->printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->printer->text($footer);
            $printer->printer->feed();
            // Print receipt date
            $printer->printer->text(date('j F Y H:i:s'));
            $printer->printer->feed(2);
            // Cut the receipt
            $printer->printer->cut();
            $printer->printer->close();
        } else {
            throw new Exception('Printer has not been initialized.');
        }
    }


    public static function print()
    {

        // Set params
        // $mid = '123123456';
        $store_name = "ROSSIES'S COLLECTION";
        $store_address = 'ABEKA TOTAL';
        // $store_phone = '1234567890';
        // $store_email = 'yourmart@email.com';
        // $store_website = 'yourmart.com';
        // $tax_percentage = 10;
        $transaction_id = 'TX123abc';
        $currency = 'GHC ';
        // $image_path = 'logo.png';

        // Set items
        $items = [
            [
                'name' => 'French Fries (tera)',
                'qty' => 2,
                'price' => 65000,
            ],
            [
                'name' => 'Roasted Milk Tea (large)',
                'qty' => 1,
                'price' => 24000,
            ],
            [
                'name' => 'Honey Lime (large)',
                'qty' => 3,
                'price' => 10000,
            ],
            [
                'name' => 'Jasmine Tea (grande)',
                'qty' => 3,
                'price' => 8000,
            ],
        ];

        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set store info
        $printer->setMyStore( $store_name, $store_address);

        // Set currency
        $printer->setCurrency($currency);

        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price']
            );
        }
        // Set tax
        // $printer->setTax($tax_percentage);

        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        $printer->setTransactionID($transaction_id);

        // Set logo
        // Uncomment the line below if $image_path is defined
        //$printer->setLogo($image_path);

        // Set QR code
        $printer->setQRcode([
            'tid' => $transaction_id,
        ]);

        // Print receipt
        $printer->printReceipt();
    }
}
