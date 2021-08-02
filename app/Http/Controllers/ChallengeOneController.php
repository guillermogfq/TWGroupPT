<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChallengeOneController extends Controller
{

    public function challengeOneOne(Invoice $invoice){

        $total_price = $invoice->products->sum(function($product){
            return $product->price * $product->quantity;
        });

        $response = new \stdClass();
        $response->code = Response::HTTP_OK;
        $response->message = 'Total price has been successfully obtained';
        $response->data = array('total_price' => $total_price);
        return response()->json($response, Response::HTTP_OK);
    }

    public function challengeOneTwo()
    {
        $invoices = Invoice::all();
        $filter_data = $invoices->filter(function($invoice){

            return $invoice->products->where('quantity', '>', 100)->count() > 0;
        });
        $ids_data = $filter_data->map(function ($invoice) {
            return $invoice->id;
        });

        $response = new \stdClass();
        $response->code = Response::HTTP_OK;
        $response->message = 'IDs invoices has been successfully obtained';
        $response->data = array('ids' => $ids_data->values());
        return response()->json($response, Response::HTTP_OK);
    }

    public function challengeOneTreeA()
    {
        $products = Product::all();
        $filter_data = $products->filter(function ($product) {
            return ($product->price * $product->quantity) > 1000000;
        });
        $names_data = $filter_data->map(function ($product) {
            return $product->name;
        });

        $response = new \stdClass();
        $response->code = Response::HTTP_OK;
        $response->message = 'Names products has been successfully obtained';
        $response->data = array('names' => $names_data->values());
        return response()->json($response, Response::HTTP_OK);
    }

    public function challengeOneTreeB()
    {
        $products = Product::all();
        $filter_data = $products->filter(function ($product) {
            return $product->price > 1000000;
        });
        $names_data = $filter_data->map(function ($product) {
            return $product->name;
        });

        $response = new \stdClass();
        $response->code = Response::HTTP_OK;
        $response->message = 'Names products has been successfully obtained';
        $response->data = array('names' => $names_data->all());
        return response()->json($response, Response::HTTP_OK);
    }
}
