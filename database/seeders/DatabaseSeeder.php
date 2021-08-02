<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Guillermo Fuentes';
        $user->email = 'guillermofuentesquijada@gmail.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();

        $invoice = new Invoice();
        $invoice->date = now();
        $invoice->user_id = $user->id;
        $invoice->seller_id = 1;
        $invoice->type = 'Venta de Productos';
        $invoice->save();

        $product = new Product();
        $product->invoice_id = $invoice->id;
        $product->name = "Computador";
        $product->quantity = 2;
        $product->price = 349990;
        $product->save();

        $product = new Product();
        $product->invoice_id = $invoice->id;
        $product->name = "Impresora";
        $product->quantity = 4;
        $product->price = 129990;
        $product->save();

        $product = new Product();
        $product->invoice_id = $invoice->id;
        $product->name = "Memoria USB (8 GB)";
        $product->quantity = 120;
        $product->price = 4990;
        $product->save();

        $product = new Product();
        $product->invoice_id = $invoice->id;
        $product->name = "Monitor 27 pulgadas";
        $product->quantity = 20;
        $product->price = 158990;
        $product->save();
    }
}
