@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Edit Reprimand') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reprimand') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">
            <div class="col-md-6 col-12">
                <div class="card">
                    @if (session('update'))
                        <h6 class="alert alert-success">{{ session('update') }}</h6>
                    @endif
                    <div class="card-header">
                        <h4> <i class="fas fa-edit"></i> Update Reprimand</h4>
                    </div>

                    <form action="{{ url('/reprimand/update/'.$data->id) }}" method="post"  class="needs-validation" novalidate="">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group col-12">
                                        <input 
                                            type="text" 
                                            name="type_of_offense"
                                            id="type_of_offense"
                                            value="{{ $data->type_of_offense }}"
                                            class="form-control" 
                                            required=""
                                        >
                                        <label>Type of Offense</label>
                                        <div class="invalid-feedback">
                                            Please fill in the Title
                                        </div>
                                    </div>

                                    <label class="label-comment">Offense details</label>
                                    <div class="form-group col-12">
                                        <textarea name="details" class="form-control" id="details-edit" cols="30" rows="10" required="">
                                            {{ $data->details }}
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Please fill in the Offense details
                                        </div>
                                    </div>

                                    <label class="label-comment">No of Offense</label>
                                    <div class="form-group col-12">
                                        <textarea name="no_of_offense" class="form-control" id="no_of_offense-edit" cols="30" rows="10" required="">
                                            {{ $data->no_of_offense }}
                                        </textarea>
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

                                    <label class="label-comment">Offense details</label>
                                    <div class="form-group col-12">
                                        <textarea name="details" class="form-control" id="details-edit-1" cols="30" rows="10" required="">
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Please fill in the Offense details
                                        </div>
                                    </div>

                                    <label class="label-comment">No of Offense</label>
                                    <div class="form-group col-12">
                                        <textarea name="no_of_offense" class="form-control" id="no_of_offense-edit-2" cols="30" rows="10" required="">
                                        </textarea>
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