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
                    <img src="{{ $info->profile_photo_url }}" alt="{{ $info->name }}" style="width:130px; height:130px;" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Date Hired</div>
                        <div class="profile-widget-item-value">{{ \Carbon\Carbon::parse($info->date_hired)->format('j F, Y')}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Use Email</div>
                        <div class="profile-widget-item-value">{{ $info->email }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">
                        {{ $info->name }} 
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> 
                            {{ $info->position }}
                        </div>    
                    </div>

                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              @endforeach

              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                
                @if($data->count() <= 0)
                    <h6 class="alert alert-danger">No 201 File Records</h6>
                @endif 

                @foreach($data as $info) 
                  <form action="{{ url('update/user/info/'.$info->user_id) }}" method="post" class="needs-validation" novalidate="">
                    @method('PUT')
                    @csrf
                      <div class="card-header">
                        <h4><i class="fa fa-user-circle"></i> Personal  </h4>
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
                              <input 
                                type="date" 
                                name="birthday" 
                                id="birthday" 
                                class="form-control " 
                                value="{{ Carbon\Carbon::parse($info->birthday)->format('Y-m-d') }}" 
                              >
                              <div class="invalid-feedback">
                                Please fill in the Birthday
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Gender</label>
                              <select name="gender" id="gender" class="form-control " >
                                <option value="{{ $info->gender }}">{{ $info->gender }}</option>
                                @if ($info->gender == "Male")
                                  <option value="Female">Female</option>
                                @else
                                  <option value="Male">Male</option>
                                @endif
                              </select>

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
                              <input 
                                type="text" 
                                name="position" 
                                id="position" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->position }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Employee Position
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>Employment Status</label>
                              <input 
                                type="text"
                                name="employement_status"
                                id="employement_status" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ $info->employement_status }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please select employee status
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Date Hired</label>
                              <input 
                                type="date" 
                                name="date_hired" 
                                id="date_hired" 
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ Carbon\Carbon::parse($info->date_hired)->format('Y-m-d') }}" 
                                required=""
                              >
                              <div class="invalid-feedback">
                                Please fill in the Date Hired
                              </div>
                            </div>                   
                            <div class="form-group col-md-6 col-12">
                              <label>End Contract Date</label>
                              <input 
                                type="date" 
                                name="date_end"
                                id="date_end"
                                class="form-control {{ $user->is_admin == 1 || $info->update_request == 0 ? 'input-disable':''}}" 
                                value="{{ Carbon\Carbon::parse($info->date_end)->format('Y-m-d') }}" 
                                required=""
                              >
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

                    @endforeach
                   @if(  $user->is_admin == 1 || $info->update_request == 1)
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  @endif
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