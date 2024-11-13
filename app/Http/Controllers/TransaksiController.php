<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Product;
use App\Models\TblCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $best = Product::where('quantity_out', '>=', 5)->get();
        $data = Product::paginate(15);
        $countKeranjang = TblCart::where(['idUser' => 'guest123', 'status' => 0])->count();

        return view('pelanggan.page.home', [
            'title' => 'Home',
            'data' => $data,
            'best' => $best,
            'count' => $countKeranjang,
        ]);
    }

    /**
     * Add product to cart.
     */
    public function addTocart(Request $request)
    {
        $request->validate([
            'idProduct' => 'required|exists:products,id', // Validasi ID produk
        ]);

        $idProduct = $request->input('idProduct');
        $product = Product::find($idProduct);

        if (!$product) {
            return redirect('/')->with('error', 'Product not found');
        }

        // Check if product already in cart
        $existingCart = TblCart::where([
            'idUser' => 'guest123',
            'id_barang' => $idProduct,
            'status' => 0
        ])->first();

        if ($existingCart) {
            // Update quantity if product already in cart
            $existingCart->increment('qty', 1);
        } else {
            // Add to cart if not already present
            TblCart::create([
                'idUser' => 'guest123',
                'id_barang' => $idProduct,
                'qty' => 1,
                'price' => $product->harga,
            ]);
        }

        return redirect('/')->with('success', 'Product added to cart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        // Implement store logic here
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        // Implement show logic here
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        // Implement edit logic here
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        // Implement update logic here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        // Implement destroy logic here
    }
}
