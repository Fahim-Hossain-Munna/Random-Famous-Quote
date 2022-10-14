<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Quote;
use Livewire\Component;

class Makelive extends Component
{
    public function refresh(){
        return;
    }

    public function render()
    {
        $quote_data = Quote::inRandomOrder()->limit(5)->get();
        $count = Quote::all();
        return view('livewire.frontend.makelive',compact('quote_data' ,'count'));
    }
}
