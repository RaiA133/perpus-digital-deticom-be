@section('title') {{ 'Admin' }}@endsection
@extends('.admin.layout')
@section('content')


<!-- Left side columns -->
<div class="row">

    <!-- Total Mapaba -->
    <div class="col">
        <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Pasca <span>| Mapaba</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $user_mapaba }}</h6>
                        <span class="text-primary small pt-1 fw-bold"></span><span
                            class="text-muted small pt-2 ps-1"></span>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- End Mapaba-->


    <!-- pkd Card -->
    <div class="col">
        <div class="card info-card sales-card">
            <div class="card-body">
                <h5 class="card-title">Kader <span>| PKD</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $user_pkd }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pkd Card -->

    <!-- pkl Card -->
    <div class="col">
        <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Kader <span>| PKL</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $user_pkl }}</h6>
                        <span class="text-danger small pt-1 fw-bold"></span> <span
                            class="text-muted small pt-2 ps-1"></span>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- End pkl Card -->

    <!-- pkl Card -->
    <div class="col">
        <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Kader <span>| PKN</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $user_pkn }}</h6>
                        <span class="text-danger small pt-1 fw-bold"></span> <span
                            class="text-muted small pt-2 ps-1"></span>

                    </div>
                </div>
            </div>

        </div>
    </div><!-- End pkl Card -->

            @endsection
