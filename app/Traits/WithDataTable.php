<?php

namespace App\Traits;


trait WithDataTable {
    
    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Create New Account',
                            'export' => route('export'),
                            'export_text' => 'Export',
                            'import_modal'=> '#uploadCSVUser',
                            'import_text'=>'Import',
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}