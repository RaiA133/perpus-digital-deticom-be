@section('title') {{ 'Profile' }}@endsection
@extends('user.layout')
@section('content')
    
<div class="container my-4" style="padding-top: 5rem">
  
  <header class="py-5 px-3 bg-white">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/img/'. $profile->img) }}" alt="Profile Image" class="rounded-circle mr-4 profile-image-desktop" style="width: 125px; height: 125px; object-fit: cover;">
            <div class="d-flex flex-column">
                <h1 class="h4 font-weight-bold">
                  {{ $profile->username }} 
                  @if($profile->centang == '1')
                    <i class="fas fa-check-circle text-primary"></i>
                  @endif
                </h1>
                <div class="d-flex align-items-center">
                    <span class="mr-4"><strong>{{ $countperpus }}</strong> library</span>
                </div>
                <p class="mt-2">{{ $profile->bio }}</p>
            </div>
        </div>
    </div>
</header>

	<br>
	<section class="galeri">
		<div class="galeri-info">
			<div class="li-2">
				<ul class="list-inline">
					<li><b><hr></b></li>
					<li><b></b></li>
					<li><b>{{ $countperpus }}</b> Buku Terbaru</li>
					<li><b></b>dari {{ $profile->username }}</li>
          <li><b><hr></b></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="galeri-grid">

        @foreach ($profilegaleri as $item)
        <div class="galeri-item">
          <img src="{{ asset('storage/img/'. $item->img) }}" alt="Gallery Image" class="img-fluid">
        </div>
      @endforeach

			</div>
		</div>
  </div>
	</section>

  @endsection
