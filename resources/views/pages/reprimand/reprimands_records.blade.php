@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Repremands Records') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Repremands Records') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>Active Repremand Records</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                        @foreach($active as $info)
                            <div class="card-body">  
                                    @php
                                        $date1 = $info->date_given;
                                        $date2 = \Carbon\Carbon::now();
                                        $dateCon1 = Carbon\Carbon::parse($date1);
                                        $dateCon2 = Carbon\Carbon::parse($date2);
                                        $days = $dateCon1->diffInDays($dateCon2);
                                    @endphp
                                    <span class="btn  {{ $days > 2 ? 'btn-danger':'btn-warning'}} btn-notification"> <i class="fa fa-calendar"></i>
                                        @if($days == 0)
                                            New
                                        @else
                                            {{$days}} days ago
                                        @endif
                                    </span>
                                    <div class="card">
                                        <div class="card-header ">
                                            <h4>Employee Name: {{ $info->name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="padding-top:30px;">Click here to <a href="{{ url('send/reprimand/'.$info->user_id) }}">View Details</a></h3>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                        </div>      
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>Submitted Written Reports</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            @foreach($answer as $info)
                                <div class="card-body">
                                    @php
                                        $date1 = $info->explanation_date;
                                        $date2 = \Carbon\Carbon::now();
                                        $dateCon1 = Carbon\Carbon::parse($date1);
                                        $dateCon2 = Carbon\Carbon::parse($date2);
                                        $days = $dateCon1->diffInDays($dateCon2);
                                    @endphp
                                    <span class="btn  {{ $days > 2 ? 'btn-info':'btn-success'}} btn-notification"> <i class="fa fa-bell-o"></i>
                                        @if($days == 0)
                                            Recently Submitted
                                        @else
                                            {{$days}} days ago
                                        @endif
                                    </span>
                                    <div class="card">      
                                        <div class="card-header ">
                                            <h4>{{ $info->name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="padding-top:30px;">Click here to <a href="{{ url('send/reprimand/'.$info->user_id) }}">View Details</a></h3>
                                        </div>
                                    </div>     
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</x-app-layout>