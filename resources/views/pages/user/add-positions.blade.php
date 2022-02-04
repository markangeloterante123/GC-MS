<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('Profile') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Setting</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">

            <!--  -->
            <div class="col-md-6 col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-list-ol"></i> Employee Contract  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 2)
                                    <div class="accordion-wrapper">
                                        <button class="toggles" >{{$info->options}}<i class="fas fa-plus icon"></i></button>
                                        <div class="content">
                                            <span>Description</span>
                                            <p>{!! $info->description !!}</p>
                                            <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-button-2">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/2') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add Employee Contract</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            
                                            <input 
                                                type="text" 
                                                name="options" 
                                                id="options" 
                                                class="form-control"
                                                required=""
                                            >
                                            <label for="options">Employee Contract</label>
                                            <div class="invalid-feedback">
                                                Please fill up the form
                                            </div>
                                        </div>
                                        <label class="label-comment">Position Task</label>
                                        <div class="form-group col-12">
                                            <textarea name="description" id="description-form" class="form-control" cols="30" rows="10" required="">
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Please add some description
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

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-th-list"></i> Employee Status  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 1)
                                    <div class="accordion-wrapper">
                                        <button class="toggles" >{{$info->options}}<i class="fas fa-plus icon"></i></button>
                                        <div class="content">
                                            <span>Description</span>
                                            <p>{!! $info->description !!}</p>
                                            <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-button-2">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/1') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                                <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add Employee Status  </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input 
                                                type="text" 
                                                name="options" 
                                                id="options" 
                                                class="form-control"
                                                required=""
                                            >
                                            <label>Status</label>
                                            <div class="invalid-feedback">
                                                Please fill up the form
                                            </div>
                                        </div>
                                        <label class="label-comment">Notes</label>
                                        <div class="form-group col-12">
                                            <textarea name="description" id="description-form2" class="form-control" cols="30" rows="10" required="">
                                                
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Please fill up the form
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

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-th-list"></i> Position  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 6)
                                    <div class="accordion-wrapper">
                                        <button class="toggles" >{{$info->options}}<i class="fas fa-plus icon"></i></button>
                                        <div class="content">
                                            <span>Description</span>
                                            <p>{!! $info->description !!}</p>
                                            <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-button-2">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/6') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                                <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add Employee Position  </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input 
                                                type="text" 
                                                name="options" 
                                                id="options" 
                                                class="form-control"
                                                required=""
                                            >
                                            <label>Status</label>
                                            <div class="invalid-feedback">
                                                Please fill up the form
                                            </div>
                                        </div>
                                        <label class="label-comment">Notes</label>
                                        <div class="form-group col-12">
                                            <textarea name="description" id="description-form6" class="form-control" cols="30" rows="10" required="">
                                                
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Please fill up the form
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
            <!-- Designation -->

            <div class="col-md-6 col-12">
            <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-list-ol"></i> Type of Designation  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 4)
                                    <div class="accordion-wrapper">
                                        <button class="toggles" >{{$info->options}}<i class="fas fa-plus icon"></i></button>
                                        <div class="content">
                                            <span>Description</span>
                                            <p>{!! $info->description !!}</p>
                                            <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-button-2">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/4') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add Designation   </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input 
                                                type="text" 
                                                name="options" 
                                                id="options" 
                                                class="form-control"
                                                required=""
                                            >
                                            <label for="options">Designation </label>
                                            <div class="invalid-feedback">
                                                Please fill up the form
                                            </div>
                                        </div>
                                        <label class="label-comment">Designation  Info</label>
                                        <div class="form-group col-12">
                                            <textarea name="description" id="description-form4" class="form-control" cols="30" rows="10" required="">
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Please add some description
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

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-list-ol"></i> Type of Contract  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 5)
                                    <div class="accordion-wrapper">
                                        <button class="toggles" >{{$info->options}}<i class="fas fa-plus icon"></i></button>
                                        <div class="content">
                                            <span>Description</span>
                                            <p>{!! $info->description !!}</p>
                                            <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-button-2">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/5') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add type of contract  </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            
                                            <input 
                                                type="text" 
                                                name="options" 
                                                id="options" 
                                                class="form-control"
                                                required=""
                                            >
                                            <label for="options">Contract</label>
                                            <div class="invalid-feedback">
                                                Please fill up the form
                                            </div>
                                        </div>
                                        <label class="label-comment">Contract Info</label>
                                        <div class="form-group col-12">
                                            <textarea name="description" id="description-form3" class="form-control" cols="30" rows="10" required="">
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Please add some description
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

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-list"></i> Salary Type  </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            @foreach($option as $info) 
                                @if($info->type == 3)
                                    <div class="form-group option-container col-12">
                                        <input type="text" name="options" id="options" class="form-control form-holder" value="{{$info->options}}"disabled >
                                        <form action="{{ url('setting/remove/'.$info->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-dl-3 tool remove-option"> <i class="fa fa-16px fa-times text-red-500"></i>
                                                <span class="tooltiptext  bg-danger">Remove Options</span>
                                            </button>
                                        </form>
                                    </div>
                                @endif 
                            @endforeach
                            </div>
                        </div>
                        
                        <form action="{{ url('setting/add/3') }}" method="post" class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                                <div class="card-header">
                                    <h4><i class="fa fa-plus-circle"></i> Add Salary Type  </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                        <input 
                                            type="text" 
                                            name="options" 
                                            id="options" 
                                            class="form-control"
                                            required=""
                                        >
                                        <label>Salary Type</label>
                                        <input type="hidden" name="description" id="description" value="none">
                                        <div class="invalid-feedback">
                                            Please fill up the form
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
           


           

        </div>
    </section>

</x-app-layout>