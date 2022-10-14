<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use Carbon\Carbon;
use Livewire\Component;

class Addquote extends Component

{
    // public variables..
    public $name;
    public $quote;
    public $action ;
    public $search ;


    // insert quote data...
    public function insert_quote(){

        Quote::insert([
            'name' => $this->name,
            'quote' => $this->quote,
            'created_at' => Carbon::now()
        ]);
        $this->reset('name');
        $this->reset('quote');
        session()->flash('quote_massage', 'Quote successfully save.');
    }

    // delete quote data function...
    public function deleteit($id){
        Quote::find($id)->delete();

        session()->flash('quote_delete_massage', 'Quote successfully deleted.');
    }

    // save quote data  on model function...
    public function edit_it($edit_id){

      $edit =  Quote::where('id' ,$edit_id)->first();

          $this->name = $edit->name;
          $this->action = $edit->id;
          $this->quote = $edit->quote;

    }

    // when date update input field will be reset function...
    public function cancel(){
        $this->reset('name');
        $this->reset('quote');
    }


    // update data function...
    public function update(){

        $infos = Quote::where('id',$this->action)->update([
            'name' => $this->name,
            'quote' => $this->quote,
            'updated_at' => Carbon::now()
        ]);
        session()->flash('quote_updated_massage', 'Quote successfully updated.');
    }

    public function render()
    {
       $infos = Quote::when($this->search , function($query , $search){
        return $query ->where('name', 'LIKE' ,"%$search%");
       })->paginate(5);
        return view('livewire.addquote', compact('infos'));
    }
}
