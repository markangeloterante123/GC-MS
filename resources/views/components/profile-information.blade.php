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
                    <img src="{{ asset($info->profile_photo_url) }}" alt="{{ $info->name }}" style="width:130px; height:130px; border:2px solid #fff;" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label title-label">Date Hired</div>
                        <div class="profile-widget-item-value title-value">{{ \Carbon\Carbon::parse($info->date_hired)->format('j F, Y')}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label title-label">Use Email</div>
                        <div class="profile-widget-item-value title-value">{{ $info->email }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name title-value">
                        {{ $info->name }} 
                        <div class="text-muted d-inline font-weight-normal ">
                            <div class="slash"></div> 
                            {{ $info->position }}
                        </div>    
                    </div>
                    <div class="profile-info">
                      <h2>Name: {{ $info->name }}</h2>
                      <h3>{{ $info->email }}</h3>
                      <span>{{ $info->position }}</span>
                    </div>
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
                                      <h5 class="mb-0">
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
                                              <div class="form-group option-container col-md-6 col-6">
                                                <label>{{ $his->type }}</label>
                                                <input type="text" name="options" id="options" class="form-control form-holder" value="₱ {{ number_format($his->salary, 2) }}" disabled >
                                              
                                                <form action="{{ url('setting/salary/edit/'.$his->id) }}" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <button type="submit" class="btn-dl-3 tool remove-option"> <i class="fa fa-16px fa-times text-red-500"></i>
                                                      <span class="tooltiptext  bg-danger">Update</span>
                                                  </button>
                                                </form>
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
                                    <h5 class="mb-0">
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
                                              <div class="form-group option-container col-md-6 col-6">
                                                <label>{{ $his->type }}</label>
                                                <input type="text" name="options" id="options" class="form-control form-holder" value="₱ {{ number_format($his->salary, 2) }}" disabled >
                                              
                                                <form action="{{ url('setting/salary/edit/'.$his->id) }}" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <button type="submit" class="btn-dl-3 tool remove-option"> <i class="fa fa-16px fa-times text-red-500"></i>
                                                      <span class="tooltiptext  bg-danger">Update</span>
                                                  </button>
                                                </form>
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
                                  <label>Salary</label>
                                    <input 
                                        type="text" 
                                        name="salary" 
                                        id="salary" 
                                        class="form-control"
                                        required=""
                                    >
                                    <div class="invalid-feedback">
                                        Please fill in the Salary Info
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                  <label>Type</label>
                                    <select name="type" id="type" class="form-control">
                                      @foreach($opt as $op)
                                        @if($op->type == 3)
                                          <option value="{{ $op->options }}">{{ $op->options }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Type of Salary
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-12">
                                  <label>Comments</label>
                                    <textarea name="notes" id="notes" class="form-control" cols="30" rows="10" >
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Please add comment
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                  <label>Effective Date</label>
                                    <input 
                                        type="date" 
                                        name="effective_date" 
                                        id="effective_date" 
                                        class="form-control"
                                        required=""
                                    >
                                    <div class="invalid-feedback">
                                        Please Fill Effective Date
                                    </div>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                  <label>End Date</label>
                                    <input 
                                        type="date" 
                                        name="end_date" 
                                        id="end_date" 
                                        class="form-control"
                                        required=""
                                    >
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
                <div class="card">
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
                              <label>First Name</label>
                              <input 
                                type="text" 
                                name="first_name" 
                                id="first_name" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->first_name }}" 
                                required=""
                              >
                              <!-- || $info->update_request == 0 -->
                              <div class="invalid-feedback">
                                Please fill in the first name
                              </div>
                            </div>
                          
                            <div class="form-group col-md-4 col-12">
                              <label>Last Name</label>
                              <input 
                                type="text"
                                name="last_name"
                                id="last_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->last_name }}"
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the last name
                              </div>
                            </div>
                            <div class="form-group col-md-3 col-12">
                              <label>Middle Name</label>
                              <input 
                                type="text" 
                                name="middle_name"
                                id="middle_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->middle_name }}" 
                              >
                              <div class="invalid-feedback">
                                Please fill in the Middle name
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Birthday</label>

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

                              <div class="invalid-feedback">
                                Please fill in the Birthday
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Gender</label>
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
                              <label>Position</label>
                              @if($user->is_admin == 1)
                                <select name="position" id="position" class="form-control">
                                    <option value="{{ $info->position }}">{{ $info->position }}</option>
                                    @foreach($opt as $op)
                                      @if($op->options != $info->position && $op->type == 2)
                                        <option value="{{ $op->options }}">{{ $op->options }}</option>
                                      @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                  Please fill in the Employee Position
                                </div>
                              @else
                                <input 
                                  type="text"
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ $info->position }}"
                                >
                              @endif
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Employment Status</label>
                              @if($user->is_admin == 1)
                                <select name="employement_status" id="employement_status" class="form-control">
                                    <option value="{{ $info->position }}">{{ $info->employement_status }}</option>
                                    @foreach($opt as $op)
                                      @if($op->options != $info->employement_status && $op->type == 1)
                                        <option value="{{ $op->options }}">{{ $op->options }}</option>
                                      @endif
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                  Please select employee status
                                </div>
                              @else
                                <input 
                                  type="text"
                                  class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                  value="{{ $info->employement_status }}" 
                                >
                              @endif
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Date Hired</label>
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

                              <div class="invalid-feedback">
                                Please fill in the Date Hired
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>End Contract Date</label>
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

                              <div class="invalid-feedback">
                                Please fill in the Status
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-12">
                              <label>Payslip</label>
                              <input 
                                type="text" 
                                name="pay_slip_link" 
                                id="pay_slip_link" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->pay_slip_link }}" 
                                required=""
                              >
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
                              <label>Personal Email</label>
                              <input 
                                type="text" 
                                name="email" 
                                id="email" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->email }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Personal Email
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Company Email</label>
                              <input 
                                type="text"
                                name="work_email"
                                id="work_email" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->work_email }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Company Email
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Phone No</label>
                              <input 
                                type="text" 
                                name="phone_no" 
                                id="phone_no" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->phone_no }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Phone No
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Cellphone No</label>
                              <input 
                                type="text" 
                                name="cel_no"
                                id="cel_no"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->cel_no }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Cellphone No
                              </div>
                            </div>
                            <div class="form-group col-12">
                              <label>Current Address</label>
                              <input 
                                type="text" 
                                name="address_1"
                                id="address_1"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->address_1 }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Current Address
                              </div>
                            </div>
                            <div class="form-group col-12">
                              <label>Address</label>
                              <input 
                                type="text" 
                                name="address_2"
                                id="address_2"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->address_2 }}" 
                                required=""
                              >
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
                              <label>Name</label>
                              <input 
                                type="text" 
                                name="emergency_name"
                                id="emergency_name"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_name }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label>Relation</label>
                              <input 
                                type="text" 
                                name="emergency_relation"
                                id="emergency_relation"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_relation }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                              <label>Emergency Contact</label>
                              <input 
                                type="text" 
                                name="emergency_contact"
                                id="emergency_contact"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->emergency_contact }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                          </div>
                        </div>
                      </div>
                      @endif

                    
                    @if(  $user->is_admin == 1 || $info->update_request == 1)
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
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