@php
    $userAcc = auth()->user();
@endphp


<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <div class="p-8 pt-4 mt-2 bg-white" >
        <div class="flex pb-4 -ml-3">
            
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
            <!-- <div class="col search-div form-group">
                <input wire:model="search" class="form-control search-input" type="text" placeholder="Search...">
            </div> -->
        </div>

        <div class="row" >
                
            <div class="table-responsive">
                <table 
                    data-toggle="table" 
                    data-search="true" 
                    data-show-columns="true" 
                    data-show-toggle="true"
                    class="table table-bordered table-striped text-sm text-gray-600" 
                >
                    <thead id="thead-sticky">
                        <tr>
                            <th style="min-width:160px">Account Status</th>
                            <th style="min-width:160px">Employee ID</th>
                            <th style="min-width:180px">Last Name</th>
                            <th style="min-width:180px">First Name</th>
                            <th style="min-width:160px">Middle Name</th>
                            <th style="min-width:180px">Designation</th>
                            <th style="min-width:200px">Type of Contract</th>
                            <th style="min-width:180px">Contract</th>
                            <th style="min-width:400px">Notes</th>
                            <th style="min-width:180px">Date Hired</th>
                            <th style="min-width:230px">Probitionary Extension</th>
                            <th style="min-width:200px">Regular Date</th>
                            <th style="min-width:180px">Contract Status</th>
                            <th style="min-width:180px">No of services</th>
                            <th style="min-width:180px">SIL Entitlement</th>
                            <th style="min-width:150px">Birthday</th>
                            <th  style="min-width:100px">Age</th>
                            <th style="min-width:130px">Gender</th>
                            <th style="min-width:150px">Civil Status</th>
                            <th style="min-width:150px">Mobile No</th>
                            <th style="min-width:150px">Email</th>
                            <th style="min-width:150px">Personal Email</th>
                            <th style="min-width:200px">Account No</th>
                            <th style="min-width:200px">TIN</th>
                            <th style="min-width:200px">Philhealth</th>
                            <th style="min-width:200px">SSS</th>
                            <th style="min-width:200px">Pag-ibig</th>
                            <th style="min-width:200px">HMO</th>
                            <th style="min-width:400px">Home Address</th>
                            <th style="min-width:350px">Contact person incase of Emergency 1:</th>
                            <th style="min-width:180px">Relation 1:</th>
                            <th style="min-width:180px">Contact No 1:</th>
                            <th style="min-width:350px">Contact person incase of Emergency 2:</th>
                            <th style="min-width:180px">Relation 2:</th>
                            <th style="min-width:180px">Contact No 2:</th>
                            <th style="min-width:300px">Pay slip link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                            <tr>
                                <td>
                                    @if($data->deleted_at === NULL)
                                        <span class="btn btn-success" style="border-radius:50px;"><i class="fa fa-check"></i> Employeed</span>
                                    @else
                                        <span class="btn btn-danger" style="border-radius:50px;"><i class="fa fa-times"></i> No Access</span>
                                    @endif
                                </td>
                                <td style="min-width:160px">
                                    ID: 
                                    @if($data->employee_id <= 99)
                                        0{{$data->employee_id}}
                                    @else 
                                        {{$data->employee_id}}
                                    @endif
                                </td>
                                <td style="min-width:180px">{{ $data->last_name }}</td>
                                <td style="min-width:180px">{{ $data->first_name }}</td>
                                <td style="min-width:160px">{{ $data->middle_name }}</td>
                                <td style="min-width:180px">{{ $data->designation }}</td>
                                <td style="min-width:200px">{{ $data->type_of_contract }}</td>
                                <td style="min-width:180px">{{ $data->contracts }}</td>
                                <td style="min-width:400px">{{ $data->notes }}</td>
                                <td style="min-width:180px">{{ Carbon\Carbon::parse($data->date_hired)->format('F d, Y') }}</td>
                                <td style="min-width:230px">{{ Carbon\Carbon::parse($data->proby_extension)->format('F d, Y') }}</td>
                                <td style="min-width:200px">{{ Carbon\Carbon::parse($data->regular_date)->format('F d, Y') }}</td>
                                <td style="min-width:180px">{{ $data->contract_status }}</td>
                                <td style="min-width:180px">{{ $data->no_of_service }}</td>
                                <td style="min-width:180px">{{ $data->sil_entitlement }}</td>
                                <td style="min-width:150px">{{ Carbon\Carbon::parse($data->birthday)->format('F d, Y') }}</td>
                                <td style="min-width:100px">{{ $data->age }}</td>
                                <td style="min-width:130px">{{ $data->gender }}</td>
                                <td style="min-width:150px">{{ $data->marital_status }}</td>
                                <td style="min-width:150px">{{ $data->cel_no }}</td>
                                <td style="min-width:150px">{{ $data->work_email }}</td>
                                <td style="min-width:150px">{{ $data->personal_email }}</td>
                                <td style="min-width:200px">{{ $data->account_number }}</td>
                                <td style="min-width:200px">{{ $data->TIN }}</td>
                                <td style="min-width:200px">{{ $data->philhealth }}</td>
                                <td style="min-width:200px">{{ $data->sss }}</td>
                                <td style="min-width:200px">{{ $data->pagibig }}</td>
                                <td style="min-width:200px">{{ $data->hmo }}</td>
                                <td style="min-width:400px">{{ $data->address_1 }}</td>
                                <td style="min-width:350px">{{ $data->emergency_name }}</td>
                                <td style="min-width:180px">{{ $data->emergency_relation }}</td>
                                <td style="min-width:180px">{{ $data->emergency_contact }}</td>
                                <td style="min-width:350px">{{ $data->emergency_name2 }}</td>
                                <td style="min-width:180px">{{ $data->emergency_relation2 }}</td>
                                <td style="min-width:180px">{{ $data->emergency_contact2 }}</td>
                                <td style="min-width:300px">{{ $data->pay_slip_link }}</td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
                                 
            
        </div>
        
        <div id="table_pagination" class="py-3">
           {{ $user->links() }}
        </div>
        
    </div>
</div>





