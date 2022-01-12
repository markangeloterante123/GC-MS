<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 hero " style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),url({{ asset('img/background-3.png') }})" >
    <div class="container card-hero">
        <div class="container-logo">
            {{ $logo }}
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/image-1.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <div class="sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg content-pad">
                    
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
