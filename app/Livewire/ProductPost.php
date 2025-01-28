<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPost extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name_product;
    public $date;
    public $desc;
    public $updateButton = false;
    
    public $product_id;


    public function save()
    {
        $rules = [
            'name_product' => 'required',
            'date' => 'required',
            'desc' => 'required',
        ];
        $pesan = [
            'name_product.required'=>'Nama Produk Wajib diisi',
            'date.required'=>'Tanggal Wajib diisi',
            'desc.required'=>'Deskripsi Wajib diisi',
        ];
        $validate = $this->validate($rules, $pesan);
        product::create($validate);

        return redirect()->route('live-link')->with(
            'message',
            'Product Meta Created!'
        );
    }

    public function edit($id)
    {
        $data = product::find($id);
        $this->name_product = $data->name_product;
        $this->date = $data->date;
        $this->desc = $data->desc;

        $this->updateButton = true;

        $this->product_id = $id;
    }

    public function update()
    {
        $rules = [
            'name_product' => 'required',
            'date' => 'required',
            'desc' => 'required',
        ];
        $pesan = [
            'name_product.required'=>'Nama Produk Wajib diisi',
            'date.required'=>'Tanggal Wajib diisi',
            'desc.required'=>'Deskripsi Wajib diisi',
        ];

        $validate = $this->validate($rules, $pesan);

        $data = product::find($this->product_id);
        $data->update($validate);

        return redirect()->route('live-link')->with(
            'message',
            'Product Meta Created!'
        );
    }

    public function clear()
    {
        $this->name_product = '';
        $this->date = '';
        $this->desc = '';

        $this->updateButton = false;
        
        $this->product_id = '';
    }

    public function render()
    {
        $dataProduct = product::orderBy('updated_at', 'desc')
        ->paginate(5);

        return view('livewire.product-post', ['dataProduct'=>$dataProduct]);
    }
}
