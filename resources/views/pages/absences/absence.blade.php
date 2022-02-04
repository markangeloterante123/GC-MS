@php
    $user = auth()->user();
@endphp

<x-app-layout>
    
    <x-slot name="header_content">
        <h1>{{ __('Absences Records') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tirediness.records') }}">Absences Records</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absences') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">

            
            <div class="{{ $user->is_admin == 1 ? 'col-md-9':'col-12'}} col-12">
                <div class="card">
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                         <div class="card">
                            <div class="card-header" role="tab" id="headingTree">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseRec" aria-expanded="true" aria-controls="collapseRec">
                                    <h3 class="mb-0 " style="color:#02b075;">
                                        Year {{ \Carbon\Carbon::now()->format('Y')  }} Absences Records <i class="fas fa-angle-down rotate-icon"></i>
                                    </h3>
                                </a>
                            </div>
                            <div id="collapseRec" class="collapse" role="tabpanel" aria-labelledby="headingTree" data-parent="#accordionEx">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of January  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'January')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Jan, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning " style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of February  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'February')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Feb, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of March  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'March')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Mar, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of April  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'April')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Apr, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of May  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'May')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>May, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of June  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">                                                
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'June')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Jun, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of July  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'July')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Jul, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of August  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'August')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Aug, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of September  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'September')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Sep, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of October  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'October')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Oct, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of November  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'November')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Nov, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="accordion-wrapper">
                                            <button class="toggles" >
                                                    Month of December  <i class="fas fa-plus icon"></i>
                                            </button>
                                                <div class="content">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped text-sm text-gray-600">
                                                            <thead>
                                                                <tr>
                                                                    <th>Entry ID:</th>
                                                                    <th>Date</th>
                                                                    <th>Employee ID</th>
                                                                    <th>Last Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Reason</th>
                                                                    <th>Day</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($records as $record)
                                                                    @if($record->year == \Carbon\Carbon::now()->format('Y') )
                                                                        @if($record->month == 'December')   
                                                                            <tr>
                                                                                <td>{{ $record->entryId}}</td>
                                                                                <td>Dec, {{ $record->date}}</td>
                                                                                <td>
                                                                                    @if($record->employee_id <= 9)
                                                                                        ID: 00{{ $record->employee_id }}
                                                                                    @elseif($record->employee_id <= 99)
                                                                                        ID: 0{{ $record->employee_id }}
                                                                                    @else
                                                                                        ID: {{ $record->employee_id }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{ $record->last_name }}</td>
                                                                                <td>{{ $record->first_name }}</td>
                                                                                <td>{{ $record->reason }}</td>
                                                                                <td>{{ $record->day }}</td>
                                                                                <td><a href="{{ url('send/reprimand/'.$record->user_id) }}" class="btn btn-warning" style="border-radius:50px"><i class="fas fa-arrow-right"></i> </a></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h1><i class="fas fa-list"></i> Absences All Records</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-sm text-gray-600" >
                                <thead>
                                    <tr>
                                        <th>Entry ID:</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Employee ID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($history as $record)
                                        <tr>
                                            <td>{{ $record->entryId}}</td>
                                            <td>{{ $record->month }} {{ $record->date}}, {{ $record->year }}</td>
                                            <td>{{ $record->day }}</td>
                                            <td>
                                                @if($record->employee_id <= 9)
                                                   ID: 00{{ $record->employee_id }}
                                                @elseif($record->employee_id <= 99)
                                                   ID: 0{{ $record->employee_id }}
                                                @else
                                                   ID: {{ $record->employee_id }}
                                                @endif
                                            </td>
                                            <td>{{ $record->last_name }}</td>
                                            <td>{{ $record->first_name }}</td>
                                            <td>{{ $record->reason }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div id="table_pagination" class="py-3">
                            {{ $history->links() }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-12">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header" style="display:flex;justify-content:space-around;">
                        <h4>Add Absences Record</h4>
                        <a data-toggle="modal" data-target="#uploadAbsences" class="btn btn-info" style="border-radius:50px;"><i class="fas fa-plus"></i> Upload</a>
                    </div>
                
                    <form action="{{ url('absences') }}" method="post"  class="needs-validation" novalidate="">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- first field -->
                                <div class="form-group col-12">
                                    <select name="user_id" id="user_id" class="form-control" required="">
                                        <option value=""></option>
                                      @foreach($data as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                      @endforeach
                                    </select>
                                    <label>Employee Name</label>
                                    <div class="invalid-feedback">
                                        Please Select Employee Name
                                    </div>
                                </div>
                                <!-- second field -->
                                <div class="form-group  col-12">
                                    <select name="reason" id="reason" class="form-control" required="">
                                        <option value=""></option>
                                        <option value="Sick">Sick</option>
                                        <option value="Birthday">Birthday</option>
                                        <option value="Relative / Family Birthday">Relative / Family Birthday</option>
                                        <option value="Personal Problem">Personal Problem</option>
                                        <option value="Others">Others</option>
                                        <option value="N/A">N/A</option>
                                        <option value="Tardiness">Tardiness</option>
                                        <option value="Weather">Weather</option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Health">Health</option>
                                    </select>
                                    <label>Reason</label>
                                    <div class="invalid-feedback">
                                            Please fill in the Reason
                                    </div>
                                </div>
                                <!-- 3rd field -->
                                <div class="form-group  col-12">
                                    <input type="date" name="date" id="date" class="form-control" required="">
                                    <label>Date</label>
                                    <div class="invalid-feedback">
                                            Please fill in the Date
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <select name="day_form" id="day_form" class="form-control" required="">
                                        <option value=""></option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                    </select>
                                    <label>Select Day</label>
                                    <div class="invalid-feedback">
                                            Please fill in the Day
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn-button-2">Save</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </section>
</x-app-layout>
