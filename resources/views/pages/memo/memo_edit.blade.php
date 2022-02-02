@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Edit Announcement') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Announcement') }}
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
                            <h4><i class="fa fa-edit"></i> Edit Memo</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/memo/update/'.$data->id) }}" method="post"  class="needs-validation" novalidate="">
                                @method('PUT')
                                @csrf
                                <div class="card-body"> 
                                    <div class="row">

                                        <div class="form-group col-12">
                                            <input 
                                                type="text" 
                                                name="memo_title"
                                                id="memo_title"
                                                class="form-control" 
                                                value="{{ $data->memo_title }}"
                                                required=""
                                            >
                                            <label>Title</label>
                                            <div class="invalid-feedback">
                                                Please fill in the Title
                                            </div>
                                        </div>
                                        <label class="label-comment">No of content</label>
                                        <div class="form-group col-12">
                                            <textarea name="content" class="form-control" id="content-edit-memo" cols="30" rows="10" required="">
                                                {{ $data->content }}
                                            </textarea>
                                            
                                            <div class="invalid-feedback">
                                                Please fill in content
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
            </div>

            @if($user->is_admin == 1)
                <div class="col-md-6 col-12">
                    <div class="card">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                        <div class="card-header">
                            <h4><i class="fas fa-plus"></i> Post Memo</h4>
                        </div>

                        <form action="{{ url('/memo/add/'.$user->name) }}" method="post"  class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-body"> 
                                <div class="row">

                                    <div class="form-group col-12">
                                        <input 
                                            type="text" 
                                            name="memo_title"
                                            id="memo_title"
                                            class="form-control" 
                                            required=""
                                        >
                                        <label>Title</label>
                                        <div class="invalid-feedback">
                                            Please fill in the Title
                                        </div>
                                    </div>
                                    <label class="label-comment">No of content</label>
                                    <div class="form-group col-12">
                                        <textarea name="content" class="form-control" id="content-edit-memo2" cols="30" rows="10" required="">
                                        </textarea>
                                        
                                        <div class="invalid-feedback">
                                            Please fill in content
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