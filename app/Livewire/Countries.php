<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\Continent;
use Carbon\Carbon;
use function Laravel\Prompts\alert;

class Countries extends Component
{
    public $continent,$country_name,$capital_city;
    public function render()
    {
        return view('livewire.countries',[
            'continents' => Continent::orderBy('continent_name','asc')->get(),
            'countries' =>Country::orderBy('country_name','asc')->get()
        ]);
    }//end method

    public function OpenAddCountryModal()
    {
        $this->continent = '';
        $this->country_name='';
        $this->capital_city='';
        $this->resetValidation();
        $this->dispatch('OpenAddCountryModal');

    }//end method

    public function save(){
        $this->validate([
            'continent' => 'required',
            'country_name' => 'required',
            'capital_city' => 'required|unique:countries'
        ]);
        $save = Country::query()->insert([
           'continent_id' =>  $this->continent,
            'country_name'=> $this->country_name,
            'capital_city'=> $this->capital_city,
            'created_at'=>Carbon::now()
        ]);
        if($save){
            $this->resetValidation();
            $this->dispatch('CloseAddCountryModal');

        }
    }//end method
}
