@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Send Reprimand') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reprimand') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">
            
                <div class="col-md-6 col-12">
                    @foreach($userData as $info)
                    <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img src="{{ asset($info->profile_photo_url) }}" alt="{{ $info->name }}" style="width:130px; height:130px; border:3px solid #fff;" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label title-label">Date Hired</div>
                            <div class="profile-widget-item-value title-value">{{ \Carbon\Carbon::parse($info->date_hired)->format('j F, Y')}}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label title-label">Status</div>
                            <div class="profile-widget-item-value title-value">
                                {{ $info->employement_status }}
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name title-value">
                            Name:
                            <div class="text-muted d-inline font-weight-normal ">
                                <div class="slash"></div> 
                                {{ $info->name }}
                            </div>
                        </div>
                        <div class="profile-widget-name title-value">
                            Company Email:
                            <div class="text-muted d-inline font-weight-normal ">
                                <div class="slash"></div> 
                                {{ $info->work_email }}
                            </div>
                        </div>
                        
                        <div class="profile-info">
                        <h2>Name: {{ $info->name }}</h2>
                        <h3>Company Email: {{ $info->work_email }}</h3>
                        <h3>Status: {{ $info->employement_status }}</h3>
                        </div>
                        @foreach($opt as $op) 
                        @if($op->options == $info->designation)
                            <div class="user-information">
                            <h2>{{ $info->designation }}</h2>
                            <p>{{ $op->description }}</p>
                            </div>
                        @endif
                        @endforeach
                    </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-md-6 col-12">

                   
                        <div class="card">
                            @foreach ($reptRecord as $records)
                            <div class="card-header">
                                <h1><i class="fas fa-warning"> {{ $records->type_of_offense }} </i></h1>
                            </div>
                            <div class="card-body">
                                <dic class="card">
                                    <div class="card-header">
                                        <h4>No. of Offense: {{ $records->no_of_offense }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>{{ $records->detail_reports }}</p>
                                    </div>
                                </dic>
                            </div>
                            @endforeach
                        </div>
                    
                </div>

                @if($user->is_admin == 1)
                    <div class="col-md-6 col-12">
                        <div class="card">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card-header">
                                <h4>Send Reprimand</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('/send/user/reprimand/'.$userId) }}" method="post" class="needs-validation" novalidate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="row">  
                                        <input type="hidden" id="issue_by" name="issue_by" value="{{ $user->name }}" > 
                                        <div class="form-group col-md-6 col-12">
                                            <select name="type_of_offense" id="type_of_offense" class="form-control" required="">
                                                @foreach($rept as $info)
                                                    <option value="{{ $info->type_of_offense }}">{{ $info->type_of_offense }}</option>
                                                @endforeach                                        
                                            </select>
                                            <label>Type of Reprimand</label>

                                            <div class="invalid-feedback">
                                                Please fill in the reprimand type
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-12">
                                            <input type="text" name="no_of_offense" id="no_of_offense" class="form-control" required="">
                                            <label>No. of Offense</label>

                                            <div class="invalid-feedback">
                                                Please fill in the reprimand type
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-12">
                                            <input type="date" name="date_given" id="date_given" class="form-control" required="">
                                            <label class="label-2">Date Send</label>
                                            <div class="invalid-feedback">
                                                Please fill the fields
                                            </div>
                                        </div>

                                        <div class="form-group col-12">
                                            <textarea name="detail_reports" id="detail_reports" cols="30" rows="10" class="form-control" required="">
                                            </textarea>
                                            <label class="label-2">Offense Detail Report</label>
                                            <div class="invalid-feedback">
                                                Please fill the fields
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <button class="btn-button-2">Send</button>
                                        </div>
                                   

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

        </div>
    </section>

</x-app-layout>