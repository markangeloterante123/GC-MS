@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Announcement') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Announcement') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">

            <div class="col-12">
                @if (session('status_delete'))
                    <h6 class="alert alert-danger">{{ session('status_delete') }}</h6>
                @endif
            </div>
            <div class="col-md-6 col-12">
                @foreach($data as $info)
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-info-circle"></i> {{ $info->memo_title }} </h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $info->author_by }} / {{ $info->created_at }}</h4>
                                </div>
                                <div class="card-body">
                                    <p>{{ $info->content }}</p>
                                </div>
                                @if($user->is_admin == 1)
                                    <div class="card-footer">
                                        <form action="{{ url('/memo/delete/'.$info->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')</a>
                                            <button class="btn btn-danger">Remove </button>
                                        </form>
                                        <a href="{{ url('/memo/edit/'.$info->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="table_pagination" class="py-3">
                    {{ $data->links() }}
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

                                    <div class="form-group col-12">
                                        <textarea name="content" class="form-control" id="content" cols="30" rows="10" required="">
                                        </textarea>
                                        <label>No of content</label>
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