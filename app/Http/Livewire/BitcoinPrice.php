<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BitcoinPrice extends Component
{
    public $price;
    public function render()
    {
        return view('livewire.bitcoin-price');
    }
    public function getPrice()
    {
        $this->price=123.456;
    }
}
