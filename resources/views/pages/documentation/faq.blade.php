@php
    $user = auth()->user();
@endphp

<x-app-layout>
    <x-slot name="header_content">
        <h2>{{ __('System Documentation') }}</h2>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('setting.options') }}">Documentation</a></div>
        </div>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('System Documentation') }}
        </h2>
    </x-slot>

    <section class="section">
        <div class="row mt-sm-4">
           <div class="col-md-6 col-12">
             
                   <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTree">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseRec" aria-expanded="true"
                                                        aria-controls="collapseRec">
                                <h3 class="mb-0 " style="color:#02b075;">
                                Create Account  <i class="fas fa-angle-down rotate-icon"></i>
                                </h3>
                                </a>
                                
                            </div>
                            <div id="collapseRec" class="collapse" role="tabpanel" aria-labelledby="headingTree"
                                                    data-parent="#accordionEx">
                                <div class="card-body">
                                    <p>GoCrayons Management System (GCMS) has 3 ways to create an account first is Users manually register on the system landing page.</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- 1st -->
                                        <div class="accordion-wrapper">
                                                <button class="toggles" >
                                                    Manual Registration <i class="fas fa-plus icon"></i>
                                                </button>
                                            <div class="content">          
                                                <h2 style="padding-top:30px;">Details</h2>
                                                <p>Go to the landing page and click the Register Now fill up the registration form using your company Email. </p>
                                                <img src="{{ asset('img/faq-registration/registration_1.PNG') }}" alt="registration">
                                            </div>
                                        </div>
                                        <!-- 2nd -->
                                        <div class="accordion-wrapper">
                                                <button class="toggles" >
                                                    Admin Create User Account <i class="fas fa-plus icon"></i>
                                                </button>
                                            <div class="content">          
                                                <h2 style="padding-top:30px;">Details</h2>
                                                <p>Go to the landing page and click the Register Now fill up the registration form using your company Email. </p>
                                                <img src="{{ asset('img/faq-registration/registration_1.PNG') }}" alt="registration">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
           </div>
           <div class="col-md-6 col-12">
               
           </div>
        </div>
    </section>

</x-app-layout>