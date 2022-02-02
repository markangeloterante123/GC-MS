@php
    $user = auth()->user();
@endphp
@if($user->is_admin == 1)
<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" x-data="window.__controller.dataTableMainController()" x-init="setCallback();">
        <div class="flex pb-4 -ml-3">
            <a href="{{ $data->href->create_new }}"  class="-ml- btn btn-primary shadow-none">
                <span class="fas fa-plus"></span> {{ $data->href->create_new_text }}
            </a>
            <a data-toggle="modal" data-target="{{ $data->href->import_modal }}" class="ml-2 btn btn-info shadow-none">
                <span class="fas fa-file-import"></span> {{ $data->href->import_text }}
            </a>
            <a data-toggle="modal" data-target="#salaryHistory" class="ml-2 btn btn-warning shadow-none">
                <span class="fas fa-file-import"></span> Import Salary Records
            </a>
            <a href="{{ url('fulldata') }}" target="_blank" class="ml-2 btn btn-success shadow-none">
                <span class="fas fa-table"></span> View all records
            </a>
        </div>

        <div class="row mb-4">
            <div class="col form-inline">
                Page: &nbsp;
                <select wire:model="perPage" class="form-control">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                    <option>250</option>
                    <option>500</option>
                </select>
            </div>

            <div class="col search-div form-group">
                <input wire:model="search" class="form-control search-input" type="text" placeholder="Search...">
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-sm text-gray-600">
                    <thead>
                        {{ $head }}
                    </thead>
                    <tbody>
                        {{ $body }}
                    </tbody>
                </table>
            </div>
        </div>

        <div id="table_pagination" class="py-3">
            {{ $model->onEachSide(1)->links() }}
        </div>
        
    </div>
</div>
@endif


