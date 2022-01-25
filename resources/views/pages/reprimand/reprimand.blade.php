@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Code of Conducts') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Code of Conducts') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">

            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-info-circle"></i> Code of Conducts Informations </h4>
                    </div>
                    <div class="card-body">
                        @foreach($data as $info)
                            <div class="card">
                                <div class="card-header">
                                    <h1><i class="fa fa-check-square"></i> {{ $info->type_of_offense }}</h1>
                                </div>
                                
                                <div class="card-body">
                                    <h2>Details</h2>
                                    <p>{{ $info->details }}</p>

                                    <h2>No of Offense</h2>
                                    <p>{{ $info->no_of_offense }}</p>
                                    <span>{{ $info->author_by }}</span>
                                </div>
                                
                                @if($user->is_admin == 1)
                                    <div class="card-footer">
                                        <form action="{{ url('/reprimand/delete/'.$info->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="submit" class="btn btn-danger">Remove</a>
                                        </form>
                                        <a href="{{ url('/reprimand/edit/'.$info->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                @endif
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
    

            @if($user->is_admin == 1)
                <div class="col-md-6 col-12">
                    <div class="card">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                        <div class="card-header">
                            <h4><i class="fas fa-plus"></i> Add code of conducts</h4>
                        </div>

                        <form action="{{ url('/reprimand/add/'.$user->name) }}" method="post"  class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-body"> 
                                <div class="row">

                                    <div class="form-group col-12">
                                        <input 
                                            type="text" 
                                            name="type_of_offense"
                                            id="type_of_offense"
                                            class="form-control" 
                                            required=""
                                        >
                                        <label>Type of Offense</label>
                                        <div class="invalid-feedback">
                                            Please fill in the Title
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <textarea name="details" class="form-control" id="details" cols="30" rows="10" required="">
                                        </textarea>
                                        <label>Offense details</label>
                                        <div class="invalid-feedback">
                                            Please fill in the Offense details
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <textarea name="no_of_offense" class="form-control" id="no_of_offense" cols="30" rows="10" required="">
                                        </textarea>
                                        <label>No of Offense</label>
                                        <div class="invalid-feedback">
                                            Please fill in no of Offense
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn-button-2">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </section>

</x-app-layout>