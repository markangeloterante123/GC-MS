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
                        @foreach($active as $info)
                            @php
                                $date1 = $info->date_given;
                                $date2 = \Carbon\Carbon::now();
                                $dateCon1 = Carbon\Carbon::parse($date1);
                                $dateCon2 = Carbon\Carbon::parse($date2);
                                $days = $dateCon1->diffInDays($dateCon2);
                            @endphp
                            <div class="card">
                                <div class="card-header ">
                                    <h4>{{ $info->name }}</h4>
                                    {{ $days }}
                                </div>
                                <div class="card-body">
                                    <h5><i class="fas fa-times"></i> {{ $info->type_of_offense }}</h5>
                                    <a href="{{ $info->detail_reports }}" target="_blank"> Click here to view the detail report </a>
                                    <a href="{{ url('send/reprimand/'.$info->user_id) }}">View {{ $info->name }} Records</a>
                                </div>
                            </div>
                        @endforeach
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
                        @foreach($answer as $info)
                            @php
                                $date1 = $info->date_given;
                                $date2 = \Carbon\Carbon::now();
                                $dateCon1 = Carbon\Carbon::parse($date1);
                                $dateCon2 = Carbon\Carbon::parse($date2);
                                $days = $dateCon1->diffInDays($dateCon2);
                            @endphp
                            <div class="card">
                                <div class="card-header ">
                                    <h4>{{ $info->name }}</h4>
                                    {{ $days }}
                                </div>
                                <div class="card-body">
                                    <h5><i class="fas fa-times"></i> {{ $info->type_of_offense }}</h5>
                                    <a href="{{ $info->detail_reports }}" target="_blank"> Click here to view the detail report </a>
                                    <a href="{{ url('send/reprimand/'.$info->user_id) }}">View {{ $info->name }} Records</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</x-app-layout>