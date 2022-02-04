<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GCMS</title>
        <link rel="shortcut icon" href="{{ asset('img/logo-1.png') }}">

        @isset($meta)
            {{ $meta }}
        @endisset

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@400;600;700&family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/notyf/notyf.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
        <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
        
       
        <!-- Editor -->	
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

        <livewire:styles />

        <!-- Scripts -->
        <script defer src="{{ asset('vendor/alpine.js') }}"></script>

        

    </head>
    <body class="antialiased">
        <div id="app">
            <div class="main-wrapper">
                @include('components.navbar')
                @include('components.sidebar')

                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                      <div class="section-header">
                        @isset($header_content)
                            {{ $header_content }}
                        @else
                            {{ __('Profile Information') }}
                        @endisset
                      </div>

                      <div class="section-body">
                        {{ $slot }}
                      </div>
                    </section>
                  </div>
            </div>
        </div>

        @stack('modals')

        <div class="modal fade" tabindex="-1" role="dialog" id="uploadCSVUser">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Import Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>

                    @elseif(Session::has('failed'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-groups">
                            <label for="file">Choose File</label>
                            <input type="file" name="file" class="form-control" required="" accept="csv,xlsx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Records</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="salaryHistory">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Salary Records</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('salary') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>

                    @elseif(Session::has('failed'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-groups">
                            <label for="file">Choose File</label>
                            <input type="file" name="file" class="form-control" required="" accept="csv,xlsx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Records</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- tirediness Modal -->
        
        <div class="modal fade" tabindex="-1" role="dialog" id="uploadTirediness">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tirediness Records</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('tirediness.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>

                    @elseif(Session::has('failed'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-groups">
                            <label for="file">Choose File</label>
                            <input type="file" name="file" class="form-control" required="" accept="csv,xlsx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Records</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Absences -->
        <div class="modal fade" tabindex="-1" role="dialog" id="uploadAbsences">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Absences Records</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('absences.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>

                    @elseif(Session::has('failed'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form-groups">
                            <label for="file">Choose File</label>
                            <input type="file" name="file" class="form-control" required="" accept="csv,xlsx">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload Records</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
        <script defer async src="{{ asset('stisla/js/modules/popper.js') }}"></script>
        <script defer async src="{{ asset('stisla/js/modules/tooltip.js') }}"></script>
        <script src="{{ asset('stisla/js/modules/bootstrap.min.js') }}"></script>
        <script defer src="{{ asset('stisla/js/modules/jquery.nicescroll.min.js') }}"></script>
        <script defer src="{{ asset('stisla/js/modules/moment.min.js') }}"></script>
        <script defer src="{{ asset('stisla/js/modules/marked.min.js') }}"></script>
        <script defer src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
        <script defer src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
        <script defer src="{{ asset('stisla/js/modules/chart.min.js') }}"></script>
        <script defer src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        

        <script src="{{ asset('stisla/js/stisla.js') }}"></script>
        <script src="{{ asset('stisla/js/scripts.js') }}"></script>
        <!-- Modal Assets -->
        <script src="{{ asset('stisla/js/page/bootstrap-modal.js') }}"></script>

        <livewire:scripts />

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}"></script>
       
        
        @isset($script)
            {{ $script }}
        @endisset      
        
    </body>
</html>
