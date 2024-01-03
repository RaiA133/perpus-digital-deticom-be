@section('title') {{ 'User' }}@endsection
@extends('admin.layout')
@section('content')
<div class="card info-card sales-card">
    <div class="container">

        <div class="text-center mt-5">
            <h4>Edit User</h4>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 mb-3">
                <div class="text-center">
                    <img src="{{ asset('storage/img/' . $user->img ) }}" class="rounded" alt="..." style="width: 30%; border-radius:20px;box-shadow: 4px 5px 8px rgba(0, 0, 0, 0.3)">
                </div>
            </div>
            <form action="/admin/user/{{ $user->id }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="kelamin" id="kelamin" class="form-select @error('kelamin') is-invalid @enderror">
                        <option disabled selected>Pilih jenis kelamin</option>
                        <option value="L" {{ $user->kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ $user->kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('kelamin')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="4">{{ $user->alamat }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="text" class="form-control" id="nim" value="{{ $user->nim }}">
                </div>

                <div class="mb-3">
                    <label for="t_lahir" class="form-label">Kota Kelahiran</label>
                    <input type="text" name="t_lahir" class="form-control" id="t_lahir" value="{{ $user->t_lahir }}">
                </div>

                <div class="mb-3">
                    <label for="rayon" class="form-label">Fakultas</label>
                    <select id="rayon_id" name="rayon_id" class="form-select" onchange="showOptions()">
                        <option value="1" {{ $user->rayon_id == '1' ? 'selected' : '' }}>Teknik</option>
                        <option value="2" {{ $user->rayon_id == '2' ? 'selected' : '' }}>Hukum</option>
                        <option value="3" {{ $user->rayon_id == '3' ? 'selected' : '' }}>Ulul Albab</option>
                        <option value="4" {{ $user->rayon_id == '4' ? 'selected' : '' }}>Ekonomi</option>
                        <option value="5" {{ $user->rayon_id == '5' ? 'selected' : '' }}>Fikom</option>
                        <option value="6" {{ $user->rayon_id == '6' ? 'selected' : '' }}>Fkip</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Jurusan</label>
                    <div>
                        <select id="prodi" name="prodi" class="form-select" required>
                            <option disabled selected>== Pilih Jurusan ==</option>
                            <option value="Teknik Informatika"
                                {{ $user->prodi == 'Teknik Informatika' ? 'selected' : '' }}>
                                Teknik Informatika</option>
                            <option value="Teknik Elektro" {{ $user->prodi == 'Teknik Elektro' ? 'selected' : '' }}>
                                Teknik
                                Elektro</option>
                            <option value="Teknik Industri" {{ $user->prodi == 'Teknik Industri' ? 'selected' : '' }}>
                                Teknik
                                Industri</option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="Ilmu Hukum" {{ $user->prodi == 'Ilmu Hukum' ? 'selected' : '' }}>Ilmu Hukum
                            </option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="Agroteknologi" {{ $user->prodi == 'Agroteknologi' ? 'selected' : '' }}>
                                Agroteknologi</option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="PAI" {{ $user->prodi == 'PAI' ? 'selected' : '' }}>PAI</option>
                            <option value="Perbankan Syari'ah"
                                {{ $user->prodi == "Perbankan Syari'ah" ? 'selected' : '' }}>
                                Perbankan Syari'ah</option>
                            <option value="PGMI" {{ $user->prodi == 'PGMI' ? 'selected' : '' }}>PGMI</option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="KPI" {{ $user->prodi == 'KPI' ? 'selected' : '' }}>KPI</option>
                            <option value="Ilmu Komunikasi" {{ $user->prodi == 'Ilmu Komunikasi' ? 'selected' : '' }}>
                                Ilmu
                                Komunikasi</option>
                            <option value="Ilmu Perpustakaan"
                                {{ $user->prodi == 'Ilmu Perpustakaan' ? 'selected' : '' }}>
                                Ilmu Perpustakaan</option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="Akuntansi" {{ $user->prodi == 'Akuntansi' ? 'selected' : '' }}>Akuntansi
                            </option>
                            <option value="Manajement" {{ $user->prodi == 'Manajement' ? 'selected' : '' }}>Manajement
                            </option>
                            {{-- <option disabled selected> </option> --}}
                            <option value="Pd Luar Biasa" {{ $user->prodi == 'Pd Luar Biasa' ? 'selected' : '' }}>Pd
                                Luar
                                Biasa</option>
                            <option value="Pd Luar Sekolah" {{ $user->prodi == 'Pd Luar Sekolah' ? 'selected' : '' }}>Pd
                                Luar Sekolah</option>
                            <option value="Pd Guru dan Anak Usia Dini"
                                {{ $user->prodi == 'Pd Guru dan Anak Usia Dini' ? 'selected' : '' }}>Pd Guru dan Anak
                                Usia
                                Dini</option>
                            <option value="Pd Bhs. dan Sastra Indonesia"
                                {{ $user->prodi == 'Pd Bhs. dan Sastra Indonesia' ? 'selected' : '' }}>Pd Bhs. dan
                                Sastra
                                Indonesia</option>
                            <option value="Pd Bhs. Inggris" {{ $user->prodi == 'Pd Bhs. Inggris' ? 'selected' : '' }}>Pd
                                Bhs. Inggris</option>
                            <option value="Pd Bhs. Arab" {{ $user->prodi == 'Pd Bhs. Arab' ? 'selected' : '' }}>Pd Bhs.
                                Arab
                            </option>
                            <option value="Pd Matematika" {{ $user->prodi == 'Pd Matematika' ? 'selected' : '' }}>Pd
                                Matematika</option>
                            <option value="PPKN" {{ $user->prodi == 'PPKN' ? 'selected' : '' }}>PPKN</option>
                        </select>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="wa" class="form-label">No HP</label>
                    <input type="text" name="wa" class="form-control" id="wa" value="{{ $user->wa }}">
                </div>

                {{-- Role Start --}}
                <div class="mb-3">
                    <label for="role_id" class="form-label">Status Keanggotaan</label><br>
                    <select id="role_id" name="role_id" class="form-select">
                        @if (in_array(auth()->user()->role_id, [1]))
                        <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Admin Uninus</option>
                        <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>Admin</option>
                        @endif
                        <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>Anggota MyPerpus</option>
                        <option value="4" {{ $user->role_id == '4' ? 'selected' : '' }}>Penjunjung</option>
                        <option value="5" {{ $user->role_id == '5' ? 'selected' : '' }}>Bukan Kader PMII Uninus</option>
                    </select>
                </div>
        </div>
        {{-- Role end  --}}

        {{-- Role Start --}}
        <div class="mb-3">
            <div>
                <a href="/admin/user"><button class="btn btn-warning" type="submit">Kembali</button></a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
        </form>

    </div>

    

</div>

</div>


<script>
    function showOptions() {
        var rayon = document.getElementById("rayon_id").value;
        var prodi_teknik = document.getElementById("prodi-teknik");
        var prodi_hukum = document.getElementById("prodi-hukum");
        var prodi_ulul_albab = document.getElementById("prodi-ulul-albab");

        if (rayon === "1") {
            prodi_teknik.style.display = "block";
            prodi_hukum.style.display = "none";
            prodi_ulul_albab.style.display = "none";
        } else if (rayon === "2") {
            prodi_teknik.style.display = "none";
            prodi_hukum.style.display = "block";
            prodi_ulul_albab.style.display = "none";
        } else if (rayon === "3") {
            prodi_teknik.style.display = "none";
            prodi_hukum.style.display = "none";
            prodi_ulul_albab.style.display = "block";
        } else {
            prodi_teknik.style.display = "none";
            prodi_hukum.style.display = "none";
            prodi_ulul_albab.style.display = "none";
        }
    }

    function showOptions() {
        var kaderisasi = document.getElementById("kaderisasi").value;
        var thn_mapaba = document.getElementById("thn_mapaba");
        var thn_pkd = document.getElementById("thn_pkd");
        var thn_pkl = document.getElementById("thn_pkl");
        var thn_pkn = document.getElementById("thn_pkn");

        if (kaderisasi === "Belum Mapaba") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "Mapaba") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKD") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKL") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "block";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKN") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "block";
            thn_pkn.style.display = "block";
        } else {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        }
    }

</script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>



<script>
    $(document).ready(function () {
        $('body').on('change', '#province_id', function () {
            let id = $(this).val();
            let route = "{{ $route_get_kota }}";

            $.ajax({
                type: 'get',
                url: route,
                data: {
                    province_id: id
                },
                success: function (data) {
                    $('#form-kota').html(data);
                }
            })
        })

        $('body').on('change', '#city_id', function () {
            let id = $(this).val();
            let route = "{{ $route_get_kecamatan }}";

            $.ajax({
                type: 'get',
                url: route,
                data: {
                    city_id: id
                },
                success: function (data) {
                    $('#form-kecamatan').html(data);
                }
            })
        })

        $('body').on('change', '#kecamatan_id', function () {
            let id = $(this).val();
            let route = "{{ $route_get_kelurahan }}";

            $.ajax({
                type: 'get',
                url: route,
                data: {
                    kecamatan_id: id
                },
                success: function (data) {
                    $('#form-kelurahan').html(data);
                }
            })
        })
    })

</script>


<script>
    function showOptions() {
        var kaderisasi = document.getElementById("kaderisasi").value;
        var thn_mapaba = document.getElementById("thn_mapaba");
        var thn_pkd = document.getElementById("thn_pkd");
        var thn_pkl = document.getElementById("thn_pkl");
        var thn_pkn = document.getElementById("thn_pkn");

        if (kaderisasi === "Belum Mapaba") {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "Mapaba") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKD") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKL") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "block";
            thn_pkn.style.display = "none";
        } else if (kaderisasi === "PKN") {
            thn_mapaba.style.display = "block";
            thn_pkd.style.display = "block";
            thn_pkl.style.display = "block";
            thn_pkn.style.display = "block";
        } else {
            thn_mapaba.style.display = "none";
            thn_pkd.style.display = "none";
            thn_pkl.style.display = "none";
            thn_pkn.style.display = "none";
        }
    }

</script>
