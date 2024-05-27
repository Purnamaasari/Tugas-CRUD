<?php

namespace App\Http\Livewire;

use App\Models\Productt;
use Livewire\Component;

class ProducttForm extends Component
{
    public $name;
    public $price;

    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
    ];

    public function store()
    {
        $this->validate();

        Productt::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->reset();

        $this->emit('producttStore');
    }

    public function render()
    {
        return view('livewire.productt-form');
    }
}
