@php
    $user = auth()->user();
@endphp

        <section class="section ">
          <div class="">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                @foreach($data as $info)
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
                      @if($op->options == $info->position)
                        <div class="user-information">
                          <h2>{{ $info->position }}</h2>
                          <p>{{ $op->description }}</p>
                        </div>
                      @endif
                    @endforeach
                  </div>
                </div>
                @endforeach
                <!-- User Salary Informations -->
                <div class="card">
                  <div class="card-header">
                    <h4><i class="fa fa-history"></i> Salary History </h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <!--Accordion wrapper-->
                        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                          
                              <div class="card">
                                  <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                                      aria-controls="collapseOne1">
                                      <h5 class="mb-0 " style="color:#02b075;">
                                        Salary<i class="fas fa-angle-down rotate-icon"></i>
                                      </h5>
                                    </a>
                                  </div>
                                  <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                                    data-parent="#accordionEx">
                                    <div class="card-body">
                                      <div class="row">
                                        @foreach($history as $his)
                                          @if($his->user_id == $userId)
                                            @if($his->status == 1)
                                              <!-- accordion  -->
                                              <div class="accordion-wrapper">
                                                <button class="toggles" >{{ $his->type }} - ₱ {{ number_format($his->salary, 2) }}<i class="fas fa-plus icon"></i></button>
                                                <div class="content">
                                                  <h3>Salary: ₱ {{ number_format($his->salary, 2) }}</h3>
                                                  <h3>Type: {{ $his->type }}</h3>
                                                  <h3>Effective Date:  {{ Carbon\Carbon::parse($his->effective_date)->format('M. d, Y') }}</h3>
                                                  <h3>End Date:   {{ Carbon\Carbon::parse($his->end_date)->format('M. d, Y') }}</h3>

                                                  <span>Notes</span>
                                                  <p>{{ $his->notes }}</p>
                                                  
                                                  @if($user->is_admin == 1)
                                                    <form action="{{ url('setting/salary/edit/'.$his->id) }}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <button type="submit" class="btn-button-2">Replace</button>
                                                    </form>
                                                  @endif
                                                </div>
                                              </div>
                                              
                                            @endif
                                          @endif
                                        @endforeach 
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              
                              <div class="card">
                                <div class="card-header" role="tab" id="headingTwo2">
                                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                    aria-expanded="false" aria-controls="collapseTwo2">
                                    <h5 class="mb-0" style="color:#02b075;">
                                      History<i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                  </a>
                                </div>
                                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                  data-parent="#accordionEx">
                                  <div class="card-body">
                                    <div class="row">
                                        @foreach($history as $his)
                                          @if($his->user_id == $userId)
                                            @if($his->status == 0)
                                            <div class="accordion-wrapper">
                                                <button class="toggles" >
                                                  {{ $his->type }}
                                                  - ₱ {{ number_format($his->salary, 2) }}
                                                  <i class="fas fa-plus icon"></i>
                                                </button>
                                                <div class="content">
                                                  <h3>Salary: ₱ {{ number_format($his->salary, 2) }}</h3>
                                                  <h3>Type: {{ $his->type }}</h3>
                                                  <h3>Effective Date:  {{ Carbon\Carbon::parse($his->effective_date)->format('M. d, Y') }}</h3>
                                                  <h3>End Date:   {{ Carbon\Carbon::parse($his->end_date)->format('M. d, Y') }}</h3>

                                                  <span>Notes</span>
                                                  <p>{{ $his->notes }}</p>
                                                </div>
                                              </div>
                                            @endif
                                          @endif
                                        @endforeach 
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      
                        <!-- End Accordion  -->

                    </div>
                  </div>
                  @if($user->is_admin == 1)
                    <div class="card-header">
                        <h4><i class="fa fa-plus-circle"></i> Add Employee Salary</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('setting/salary/update/'.$userId) }}" id="form" method="post" class="needs-validation" novalidate="" >
                              @method('PUT')
                              @csrf
                            <div class="row">

                                <div class="form-group col-md-6 col-12">
                                    <input 
                                        type="text" 
                                        name="salary" 
                                        id="salary" 
                                        class="form-control"
                                        required=""
                                    >
                                    <label>Salary</label>

                                    <div class="invalid-feedback">
                                        Please fill in the Salary Info
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <select name="type" id="type" class="form-control">
                                      @foreach($opt as $op)
                                        @if($op->type == 3)
                                          <option value="{{ $op->options }}">{{ $op->options }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                    <label>Type</label>
                                    <div class="invalid-feedback">
                                        Please Select Type of Salary
                                    </div>
                                </div>

                                <label class="label-comment">Comments</label>
                                <div class="form-group col-md-12 col-12">  
                                    <textarea name="notes" id="notes" class="form-control" cols="30" rows="10" require="">
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Please add comment
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                  
                                    <input 
                                        type="date" 
                                        name="effective_date" 
                                        id="effective_date" 
                                        class="form-control"
                                        required=""
                                    >
                                    <label class="label-2">Effective Date</label>
                                    <div class="invalid-feedback">
                                        Please Fill Effective Date
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                  
                                    <input 
                                        type="date" 
                                        name="end_date" 
                                        id="end_date" 
                                        class="form-control"
                                        required=""
                                    >
                                    <label class="label-2">End Date</label>
                                    <div class="invalid-feedback">
                                        Please Fill End Date
                                    </div>
                                </div>
                            </div>    
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn-button-2">Add Salary</button>
                      </div>
                    </form>
                  @endif
                </div>
                <!-- Salary Div End here -->
              </div>
              <!-- Another Row -->
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card {{ $info->file == 0 ? 'border-warning':'' }}">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                
                @foreach($data as $info) 
                  @if($info->file == 0)
                      <h6 class="alert alert-danger">No 201 File Record</h6>
                  @endif 
                @endforeach

                @foreach($data as $info) 
                  <form action="{{ url('update/user/info/'.$userId) }}" method="post" class="needs-validation" novalidate="">
                    @method('PUT')
                    @csrf
                      <div class="card-header">
                        <h4><i class="fa fa-archive"></i> Personal  </h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-5 col-12">
                              
                              <input 
                                type="text" 
                                name="first_name" 
                                id="first_name" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->first_name }}" 
                                required=""
                              >
                              <label>First Name</label>

                              <!-- || $info->update_request == 0 -->
                              <div class="invalid-feedback">
                                Please fill in the first name
                              </div>
                            </div>
                          
                            <div class="form-group col-md-4 col-12">
                              
                              <input 
                                type="text"
                                name="last_name"
                                id="last_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->last_name }}"
                                required=""
                              >
                              <label>Last Name</label>
                              <div class="invalid-feedback">
                                Please fill in the last name
                              </div>
                            </div>
                            <div class="form-group col-md-3 col-12">
                              
                              <input 
                                type="text" 
                                name="middle_name"
                                id="middle_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->middle_name }}" 
                              >
                              <label>Middle Name</label>
                              <div class="invalid-feedback">
                                Please fill in the Middle name
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              

                              @if($user->is_admin == 1)
                                <input 
                                  type="date" 
                                  name="birthday" 
                                  id="birthday" 
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->birthday)->format('Y-m-d') }}" 
                                >
                              @else
                                <input 
                                  type="text" 
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->birthday)->format('F d, Y') }}" 
                                >
                              @endif
                              <label>Birthday</label>
                              <div class="invalid-feedback">
                                Please fill in the Birthday
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              
                                @if($user->is_admin == 1)
                                  <select name="gender" id="gender" class="form-control " >
                                    @if(empty($info->gender ))
                                      <option value="{{ $info->gender }}">Select Gender</option>
                                      <option value="Female">Female</option>
                                    @else
                                      <option value="{{ $info->gender }}">{{ $info->gender }}</option>
                                    @endif
                                    @if ($info->gender == "Male")
                                      <option value="Female">Female</option>
                                    @else
                                      <option value="Male">Male</option>
                                    @endif                                
                                  </select>
                                @else
                                  <input 
                                    type="text" 
                                    class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                    value="{{ $info->gender }}" 
                                  >
                                @endif
                                <label>Gender</label>
                              <div class="invalid-feedback">
                                Please Select in the Gender
                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="card-header">
                        <h4><i class="fa fa-folder-open"></i> Employee Record</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              
                              @if($user->is_admin == 1)
                                <select name="position" id="position" class="form-control">
                                    <option value="{{ $info->position }}">{{ $info->position }}</option>
                                    @foreach($opt as $op)
                                      @if($op->options != $info->position && $op->type == 2)
                                        <option value="{{ $op->options }}">{{ $op->options }}</option>
                                      @endif
                                    @endforeach
                                </select>
                                <label>Position</label>
                                <div class="invalid-feedback">
                                  Please fill in the Employee Position
                                </div>
                              @else
                                @if($op->type == 2)  
                                  <input 
                                    type="text"
                                    class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                    value="{{ $info->position }}"
                                  >
                                @else
                                  <input 
                                    type="text"
                                    class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                    value="Need Update"
                                  >
                                @endif
                                <label>Position</label>
                              @endif
                              
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              
                              @if($user->is_admin == 1)
                                <select name="employement_status" id="employement_status" class="form-control">
                                    
                                    <option value="{{ $info->employement_status }}">{{ $info->employement_status }}</option>
                                    @foreach($opt as $op)
                                      @if($op->options != $info->employement_status && $op->type == 1)
                                        <option value="{{ $op->options }}">{{ $op->options }}</option>
                                      @endif
                                    @endforeach
                                </select>
                                <label>Employment Status</label>
                                <div class="invalid-feedback">
                                  Please select employee status
                                </div>
                              @else
                                @if($op->type == 1)  
                                  <input 
                                    type="text"
                                    class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                    value="{{ $info->employement_status }}" 
                                  >
                                @else
                                  <input 
                                    type="text"
                                    class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                    value="Need Update" 
                                  >
                                @endif
                                <label>Employment Status</label>
                              @endif
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              
                              @if($user->is_admin == 1)
                                <input 
                                  type="date" 
                                  name="date_hired" 
                                  id="date_hired" 
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->date_hired)->format('Y-m-d') }}" 
                                  required=""
                                >
                              @else 
                                <input 
                                  type="text"
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->date_hired)->format('F m, Y') }}" 
                                >
                              @endif
                              <label>Date Hired</label>
                              <div class="invalid-feedback">
                                Please fill in the Date Hired
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              
                              @if($user->is_admin == 1)
                                <input 
                                  type="date" 
                                  name="date_end"
                                  id="date_end"
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->date_end)->format('Y-m-d') }}" 
                                  required=""
                                >
                              @else 
                                <input 
                                  type="text"
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ Carbon\Carbon::parse($info->date_end)->format('F m, Y') }}" 
                                >
                              @endif
                              <label>End Contract Date</label>
                              <div class="invalid-feedback">
                                Please fill in the Status
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-12">
                              
                              <input 
                                type="text" 
                                name="pay_slip_link" 
                                id="pay_slip_link" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->pay_slip_link }}" 
                                required=""
                              >
                              <label>Payslip</label>
                              <div class="invalid-feedback">
                                Please fill in the Payslip URL
                              </div>
                            </div>
                          </div>
                      </div>
                    @if($user->is_admin == 1 || $info->update_request == 1)
                      <div class="card-header">
                        <h4><i class="fa fa-phone"></i> Employee Contact</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="email" 
                                id="email" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->email }}" 
                                required=""
                              >
                              <label>Personal Email</label>
                              <div class="invalid-feedback">
                                Please fill in the Personal Email
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text"
                                name="work_email"
                                id="work_email" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->work_email }}" 
                              >
                              <label>Company Email</label>
                              <div class="invalid-feedback">
                                Please fill in the Company Email
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="phone_no" 
                                id="phone_no" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->phone_no }}" 
                              >
                              <label>Phone No</label>
                              <div class="invalid-feedback">
                                Please fill in the Phone No
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="cel_no"
                                id="cel_no"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->cel_no }}" 
                                required=""
                              >
                              <label>Cellphone No</label>
                              <div class="invalid-feedback">
                                Please fill in the Cellphone No
                              </div>
                            </div>
                            <div class="form-group col-12">
                              
                              <input 
                                type="text" 
                                name="address_1"
                                id="address_1"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->address_1 }}" 
                                required=""
                              >
                              <label>Current Address</label>
                              <div class="invalid-feedback">
                                Please fill in the Current Address
                              </div>
                            </div>
                            <div class="form-group col-12">
                              
                              <input 
                                type="text" 
                                name="address_2"
                                id="address_2"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->address_2 }}" 
                              >
                              <label>Address</label>
                              <div class="invalid-feedback">
                                Please fill in the Address
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="card-header">
                        <h4><i class="fa fa-warning"></i> Incased of Emergency</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="emergency_name"
                                id="emergency_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_name }}" 
                                required=""
                              >
                              <label>Name</label>
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="emergency_relation"
                                id="emergency_relation"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_relation }}" 
                                required=""
                              >
                              <label>Relation</label>
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                              
                              <input 
                                type="text" 
                                name="emergency_contact"
                                id="emergency_contact"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_contact }}" 
                                required=""
                              >
                              <label>Emergency Contact</label>
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                        </div>
                      </div>
                      @endif

                    
                    @if(  $user->is_admin == 1 || $info->update_request == 1)
                      <div class="card-footer text-right">
                        <button class="btn-button-2">Save Changes</button>
                      </div>
                    @endif
                  @endforeach

                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>

        @if($user->is_admin == 1)
          <script defer>
              [...document.querySelectorAll(".input-disable")].forEach((element) => {
                  element.classList.toggle('input-able')
              });
          </script>
        @endif