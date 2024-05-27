<?php

namespace App\Http\Livewire;

use App\Models\Productt;
use Livewire\Component;
use Livewire\WithPagination;

class ProducttTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;
    public $name;
    public $price;

    protected $listeners = ['producttStore' => 'render', 'producttDestroy' => 'producttDestroyer'];

    public function render()
    {
        return view('livewire.productt-table', [
            'products' => Productt::orderBy('id', 'desc')->paginate(5)
        ]);
    }

    public function producttUpdate()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $data = [
            'name' => $this->name,
            'price' => $this->price,
        ];

        Productt::where('id', $this->product_id)->update($data);

        $this->reset(['product_id', 'name', 'price']);

        $this->emit('producttStore');
    }

    public function producttDestroyer()
    {
        Productt::find($this->product_id)->delete();
    }

    public function producttDelete($id)
    {
        $this->product_id = $id;
        $product = Productt::find($id);
        $this->dispatchBrowserEvent('producttDeleteConfirmation', ['productt' => $product]);
    }

    public function producttEdit($product)
    {
        $this->product_id = $product['id'];
        $this->name = $product['name'];
        $this->price = $product['price'];
    }
}
