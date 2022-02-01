<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Livewire\WithPagination;
use App\Traits\WithDataTable;

class Userfulldata extends Component
{
    use WithPagination;
    use WithDataTable;

    public $perPage = 100;
    public $search = '';
    public $sortField = "file_records.employee_id";
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
        return view('livewire.userfulldata',[
            'user' => User::withTrashed()
                    ->leftjoin('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('users.name','LIKE',$query)
                    ->orwhere('file_records.last_name','LIKE',$query)
                    ->orwhere('file_records.first_name','LIKE',$query)
                    ->orwhere('file_records.employee_id','LIKE',$query)
                    ->orwhere('file_records.contracts','LIKE',$query)
                    ->orwhere('file_records.contract_status','LIKE',$query)
                    ->orderBy($this->sortField, $this->sortAsc)
                    ->paginate($this->perPage)
        ], ['table'=> 'employee_id']);
    }
}
