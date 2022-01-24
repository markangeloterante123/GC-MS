
@php
    $userAcc = auth()->user();
@endphp

<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" >
        <div class="flex pb-4 -ml-3">
            <a href="#"  class="-ml- btn btn-primary shadow-none">
                <span class="fas fa-plus"></span> Add Client Informations
            </a>
            <a data-toggle="modal" data-target="#" class="ml-2 btn btn-info shadow-none">
                <span class="fas fa-file-import"></span> Import Clients
            </a>
            <a href="#" class="ml-2 btn btn-success shadow-none">
                <span class="fas fa-file-export"></span> Export Clients
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
                        <tr>
                            <th><a wire:click.prevent="sortBy('id')" role="button" href="#">ID
                                    @include('components.sort-icon', ['field' => 'id'])
                                </a>
                            </th>
                            <th><a wire:click.prevent="sortBy('contact_person')" role="button" href="#">Client Name
                                    @include('components.sort-icon', ['field' => 'contact_person'])
                                </a>
                            </th>
                            <th><a wire:click.prevent="sortBy('email')" role="button" href="#"> Email
                                    @include('components.sort-icon', ['field' => 'email'])
                                </a>
                            </th>
                            <th><a wire:click.prevent="sortBy('acount_name')" role="button" href="#"> Account Name
                                    @include('components.sort-icon', ['field' => 'acount_name'])
                                </a>
                            </th>
                            <th><a wire:click.prevent="sortBy('client_status')" role="button" href="#"> Status
                                    @include('components.sort-icon', ['field' => 'client_status'])
                                </a>
                            </th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->contact_person }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->acount_name }}</td>
                                <td>{{ $data->client_status }}</td>
                                <td class="whitespace-no-wrap row-action--icon">
                                    <a role="button" href="" class="mr-3 tool"><i class="fa fa-16px fa-folder-open text-green-500"></i> 
                                        <span class="tooltiptext bg-info">View Information</span>
                                    </a>
                                    @if( $userAcc->is_admin == 1)
                                        <a role="button" href="" class="mr-3 tool"><i class="fa fa-16px fa-pen text-red-500"></i> 
                                            <span class="tooltiptext bg-info">Edit Information</span>
                                        </a>   
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="table_pagination" class="py-3">
           {{ $client->links() }}
        </div>
        
    </div>
</div>