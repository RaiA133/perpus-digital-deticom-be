@section('title') {{ 'Perpus', 'allcategorybooks' }}@endsection
@extends('/user/layout')
@section('content')
<div class="text-center my-5 pt-3">
    <h4 class="pt-5">Perpustakaan Digital</h4>
    <div class="container card info-card sales-card mt-5">
      <div class="flex justify-center px-2"> 

        <div class="my-4 col-12 col-sm-8 col-md-6">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search.....">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                      </button>
                      <ul class="dropdown-menu">
                        @foreach ($allcategorybooks as $category)
                          <li><a class="dropdown-item" href="?category={{ $category->id }}">{{ $category->title }}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <button class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="row gap-3 mb-3 flex justify-content-center" style="margin-left:0">
          @foreach ($perpus as $perp)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/img/'.$perp['image']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($perp->judul, 15) }}</h5>
                    <p class="card-text">
                      <b>Category : {{ $perp->categorybooks->title }}</b>
                      <br>
                      {{ $perp->deskripsi }}
                    </p> 
                    <a href="/perpus/details/{{ $perp->id }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
            @endforeach
        </div>

      </div>
    </div>
</div>
@endsection

