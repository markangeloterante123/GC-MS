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

            <div class="{{ $user->is_admin == 1 ? 'col-md-7':'col-12'}} col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-info-circle"></i> Code of Conducts Informations </h4>
                    </div>
                    <div class="card-body">
                        @foreach($data as $info)
                                <!-- start here -->
                                <div class="accordion md-accordion" id="accordionEx{{ $info->id }}" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="headingTree">
                                            <a data-toggle="collapse" data-parent="#accordionEx{{ $info->id }}" href="#collapseRec{{ $info->id }}" aria-expanded="true"
                                                        aria-controls="collapseRec{{ $info->id }}">
                                            <h3 class="mb-0 " style="color:#02b075;">
                                            {{ $info->type_of_offense }}<i class="fas fa-angle-down rotate-icon"></i>
                                            </h3>
                                            </a>
                                        </div>
                                        <div id="collapseRec{{ $info->id }}" class="collapse" role="tabpanel" aria-labelledby="headingTree"
                                                    data-parent="#accordionEx{{ $info->id }}">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="accordion-wrapper">
                                                        <button class="toggles" >
                                                            View Details  <i class="fas fa-plus icon"></i>
                                                        </button>
                                                    <div class="content">
                                                        <h3>Date Issued: <span>{{ \Carbon\carbon::parse( $info->created_at )->format('F, j  Y') }}</span></h3>
                                                        <h3>Author By: <span>{{ $info->author_by }}</span> </h3>
                                                        
                                                        <h2 style="padding-top:30px;">Details</h2>
                                                        {!! $info->details !!}

                                                        <p>{!! $info->no_of_offense !!}</p>        

                                                    </div>
                                                </div>
                                            </div>
                                            @if($user->is_admin == 1)
                                                <div class="card-footer footer-display text-right">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <form action="{{ url('/reprimand/delete/'.$info->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-button-2">Remove</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-6 btn-pad">
                                                            <a href="{{ url('/reprimand/edit/'.$info->id) }}" class="btn-button-2 ">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- end here -->
                        @endforeach 
                    </div>
                </div>
            </div>
    

            @if($user->is_admin == 1)
                <div class="col-md-5 col-12">
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

                                    <label class="label-comment">Offense Detail</label>
                                    <div class="form-group col-12">
                                        <textarea name="details" class="form-control" id="details_reprimand" cols="30" rows="10" required="">
                                        </textarea>
                                        <div class="invalid-feedback">
                                            Please fill in the Offense details
                                        </div>
                                    </div>
                                    
                                    <label class="label-comment">No of Offense regulations</label>
                                    <div class="form-group col-12">
                                        <textarea name="no_of_offense" class="form-control" id="no_of_offense_reprimand" cols="30" rows="10" required="">
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