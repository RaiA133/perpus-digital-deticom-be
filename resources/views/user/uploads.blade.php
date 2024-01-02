@section('title') {{ 'Profile' }}@endsection
@extends('user.layout')
@section('content')

<div class="container my-4" style="padding-top: 4rem">
    <main id="main" class="main">

        <div class="pagetitle mt-4">
            <h1>Tambah Buku</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">{{ $user->role->role }}</li>
                    <li class="breadcrumb-item active">foto</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">

                        <div class="card-body pt-3">

                            <div class="container">
                                <h4 class="text-center my-4">Tambah Buku Perpustakaan</h4>

                                <form action="/profile/perpus/storeperpus" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <label for="pdf">Masukan Buku Pdf/ Karya Tulis Word atau Karya Ilmiah
                                        Lainnya</label>
                                    <input type="file" class="form-control my-4" name="pdf" id="pdf"
                                        accept="application/pdf,application/vnd.ms-word">

                                    <label for="image">Masukan Cover Buku</label>
                                    <input type="file" class="form-control my-4" name="image" id="image">
                                    <div class="my-3"></div>
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" class="form-control" name="judul" id="judul"
                                        placeholder="Max 15 Huruf">

                                    <label for="penulis">Penulis Buku</label>
                                    <input type="text" class="form-control" name="penulis" id="penulis">
                                    <div class="my-3"></div>

                                    <label for="penerbit">Penerbit Buku</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit">
                                    <div class="my-3"></div>

                                    <label for="thn_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" name="thn_terbit" id="thn_terbit">
                                    <div class="my-3"></div>

                                    <label for="isbn">Nomor ISBN</label>
                                    <input type="text" class="form-control" name="isbn" id="isbn">
                                    <div class="my-3"></div>

                                    <label for="bahasa">Bahasa Yang Digunakan</label>
                                    <input type="text" class="form-control" name="bahasa" id="bahasa">
                                    <div class="my-3"></div>


                                    <label for="categorybook_id">Category Buku</label>
                                    <select name="categorybook_id" class="form-select" required
                                        aria-label="categorybook_id">
                                        <option value="1">--- Category Buku ---</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="my-3"></div>

                                    <label for="halaman">Jumlah Halaman</label>
                                    <input type="number" class="form-control" name="halaman" id="halaman">
                                    <div class="my-3"></div>

                                    <label for="deskripsi">Deskripsi Buku</label>
                                    <textarea name="deskripsi" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <div class="my-3"></div>


                                    <div class="my-3">
                                        <button type="submit" class="btn btn-primary btn-sm mx-3">Upload
                                            Buku</button>
                                    </div>
                                </form>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>


                </div>

            </div>
</div>
</section>

</main><!-- End #main -->
</div>

{{-- script for chart  --}}
<script src="/assets/vendor/chart.js/chart.umd.js"></script>
<script src="/assets/vendor/echarts/echarts.min.js"></script>

{{-- script untuk editor post txt area  --}}
<script src="/assets/vendor/tinymce/tinymce.min.js"></script>


{{-- script untuk ckfinder  --}}
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            image: {
                // You need to configure the image toolbar, too, so it uses the new style buttons.
                toolbar: ['imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full',
                    'imageStyle:alignRight'
                ],

                styles: [
                    // This option is equal to a situation where no style is applied.
                    'full',

                    // This represents an image aligned to the left.
                    'alignLeft',

                    // This represents an image aligned to the right.
                    'alignRight'
                ]
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                    '|',
                    'blockQuote',
                    'insertTable',
                    'undo',
                    'redo',
                    'CKFinder',
                    'mediaEmbed'
                ]
            },
            language: 'ru',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
        })
        .catch(function (error) {
            console.error(error);
        });

</script>
@endsection
