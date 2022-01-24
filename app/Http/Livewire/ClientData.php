<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClientInformation;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Livewire\WithPagination;
use App\Traits\WithDataTable;

class ClientData extends Component
{
    use WithPagination;
    use WithDataTable;

    public $perPage = 100;
    public $search = '';
    public $sortField = "id";
    public $sortAsc = "desc";

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = $this->swapCheck();
        } else {
            $this->sortAsc = "asc";
        }
        $this->sortField = $field;
    }

    public function swapCheck()
    {
        return $this->sortAsc === 'asc' ? 'desc' :'asc'; 
    }

    public function render()
    {
        $query = '%'.$this->search.'%';
        return view('livewire.client-data', [
            'client' => ClientInformation::where('contact_person','LIKE',$query)
                ->orWhere('contact_person','LIKE',$query)
                ->orWhere('acount_name','LIKE',$query)
                ->orWhere('email','LIKE',$query)
                ->orWhere('client_status','LIKE',$query)
                ->orderBy($this->sortField, $this->sortAsc)
                ->paginate($this->perPage)
        ]);
    }
}
