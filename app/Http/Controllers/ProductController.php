<?php

namespace App\Http\Controllers;
use \App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $kategori = "Elektronik";
        $daftarProduk = [
            ['id' => 1, 'nama' => 'Laptop ThinkPad', 'harga' => 12500000],
            ['id' => 2, 'nama' => 'Mouse Wireless', 'harga' => 250000],
            ['id' => 3, 'nama' => 'Mechanical Keyboard', 'harga' => 850000],
        ];
        return view('produk.index', compact('kategori', 'daftarProduk'));
    }

    public function show($id)
    {
        return view('produk.detail', ['id' => $id]);
    }
}
