<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    public function index() 
    {
        $data = product::paginate(10);
        return view ('admin.page.product', [
            'name' => 'Product', 
            'title' => 'Admin Product', 
            'data' => $data,
        ]);
    }

    /**
     * Display a listing of the resource.
     */ 
    public function addModal()  
    {
        return view('admin.modal.addModal',[
            'title' => 'Tambah Data Product',
            'sku'   => 'BRG' . rand(10000, 99999),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreproductRequest $request)
    {
        $data = new product;
        $data->sku               = $request->sku;
        $data->nama_product      = $request->nama;
        $data->type              = $request->type;
        $data->kategory          = $request->kategory ?? '';
        $data->harga             = $request->harga;
        $data->size              = $request->size ?? 'M,L,'; // Default sizes
        $data->quantity          = $request->quantity ?? 0;
        $data->discount          = 10/100;
        $data->is_active         = 1;
        
        if($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd').'_'.$photo->getClientOriginalName();
            $photo->move(public_path('storage/product/'), $filename);
            $data->foto = $filename;
        }

        $data->save();
        Alert::toast('Data Product Berhasil Disimpan', 'success');
        return redirect()->route('product');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = product::findOrFail($id);
        return view (
            'admin.modal.editModal', 
            [
            'title' => 'Edit data Product', 
            'data' => $data,
            ]
        )->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(product $product)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product, $id)
    {
        $data = product::findOrFail($id);

        if($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd').'_'.$photo->getClientOriginalName();
            $photo->move(public_path('storage/product/'), $filename);
            $data->foto = $filename;
    } else {
        $filename = $request -> foto;
    }

        $field = [
            'sku'                       => $request->sku,
            'nama_product'              => $request->nama,
            'type'                      => $request->type,
            'kategory'                  => $request->kategory,
            'harga'                     => $request->harga,
            'size'                      => $request->size,
            'quantity'                  => $request->quantity,
            'discount'                  => 10 / 100,
            'is_active'                 => 1,
            'foto'                      => $filename,
        ];

        $data::where('id',$id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('product');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        //Hapus product
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }

}