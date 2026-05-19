@extends('user.layout.app')

@section('title', 'Checkout - Karma Shop')

@section('content')
    <style>
        /* Matikan nice-select HANYA di halaman ini */
        #provinsi {
            display: block !important;
        }

        #kota {
            display: block !important;
        }

        #kecamatan {
            display: block !important;
        }

        #kelurahan {
            display: block !important;
        }

        .nice-select {
            display: none !important;
        }
    </style>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Alamat</h2>

                        <form class="row contact_form" action="{{ route('UserAlamatTambahProses') }}" method="POST">
                            @csrf
                        
                            <div class="col-12 form-group"`>
                                    <select name="provinsi_id" id="provinsi" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <select name="kota_id" id="kota" class="form-control">
                                    <option>Pilih Kota</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <select name="kecamatan_id" id="kecamatan" class="form-control">
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="pos_id" placeholder="Kode Pos">
                            </div>
  
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="detail" rows="2" placeholder="Detail Alamat"></textarea>
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="note" rows="2" placeholder="Catatan"></textarea>
                            </div>

                            <button type="submit" class="primary-btn">Simpan</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {

const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');
const kecamatan = document.getElementById('kecamatan');
const kelurahan = document.getElementById('kelurahan');


// LOAD PROVINSI
fetch('/api/wilayah/provinsi')
.then(res => res.json())
.then(res => {

    res.data.forEach(item => {

        provinsi.innerHTML += `
            <option value="${item.code}">
                ${item.name}
            </option>
        `;

    });

});


// PROVINSI -> KOTA
provinsi.addEventListener('change', function () {

    kota.innerHTML = '<option value="">Pilih Kota</option>';

    fetch(`/api/wilayah/kota/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            kota.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});


// KOTA -> KECAMATAN
kota.addEventListener('change', function () {

    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';

    fetch(`/api/wilayah/kecamatan/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            kecamatan.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});


// KECAMATAN -> KELURAHAN
kecamatan.addEventListener('change', function () {

    kelurahan.innerHTML = '<option value="">Pilih Kelurahan</option>';

    fetch(`/api/wilayah/kelurahan/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            kelurahan.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});

});

// document.addEventListener('DOMContentLoaded', function(){

// // Load Provinsi
// fetch('/api/wilayah/provinsi')
// .then(res => res.json())
// .then(res => {
//     res.data.forEach(item => {
//         provinsi.innerHTML +=
//         `<option value="${item.code}">
//             ${item.name}
//         </option>`;
//     });
// });

// const provinsi = document.getElementById('provinsi');
// const kota = document.getElementById('kota');
// const kecamatan = document.getElementById('kecamatan');
// const kelurahan = document.getElementById('kelurahan');


// // =====================
// // PROVINSI → KOTA
// // =====================
// provinsi.addEventListener('change', function(){

//     kota.innerHTML = '<option>Pilih Kota</option>';
//     kecamatan.innerHTML = '<option>Pilih Kecamatan</option>';
//     kelurahan.innerHTML = '<option>Pilih Kelurahan</option>';

//     fetch(`/api/wilayah/kota/${this.value}`)
//     .then(res => res.json())
//     .then(res => {

//         res.data.forEach(item => {

//             kota.innerHTML +=
//             `<option value="${item.code}">
//                 ${item.name}
//             </option>`;

//         });

//     });

// });


// // =====================
// // KOTA → KECAMATAN
// // =====================
// kota.addEventListener('change', function(){

//     kecamatan.innerHTML = '<option>Pilih Kecamatan</option>';

//     fetch(`/api/wilayah/kecamatan/${this.value}`)
//     .then(res => res.json())
//     .then(res => {

//         res.data.forEach(item => {

//             kecamatan.innerHTML +=
//             `<option value="${item.code}">
//                 ${item.name}
//             </option>`;

//         });

//     });

// });


// // =====================
// // KECAMATAN → KELURAHAN
// // =====================
// kecamatan.addEventListener('change', function(){

//     kelurahan.innerHTML = '<option>Pilih Kelurahan</option>';

//     fetch(`/api/wilayah/kelurahan/${this.value}`)
//     .then(res => res.json())
//     .then(res => {

//         res.data.forEach(item => {

//             kelurahan.innerHTML +=
//             `<option value="${item.code}">
//                 ${item.name}
//             </option>`;

//         });

//     });

// });

// });

</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {

const provinsi = document.getElementById('provinsi');
const kota = document.getElementById('kota');
const kecamatan = document.getElementById('kecamatan');
const desa = document.getElementById('desa');


// LOAD PROVINSI
fetch('/api/wilayah/provinsi')
.then(res => res.json())
.then(res => {

    res.data.forEach(item => {

        provinsi.innerHTML += `
            <option value="${item.code}">
                ${item.name}
            </option>
        `;

    });

});


// PROVINSI -> KOTA
provinsi.addEventListener('change', function () {

    kota.innerHTML = '<option value="">Pilih Kota</option>';

    fetch(`/api/wilayah/kota/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            kota.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});


// KOTA -> KECAMATAN
kota.addEventListener('change', function () {

    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';

    fetch(`/api/wilayah/kecamatan/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            kecamatan.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});


// KECAMATAN -> DESA
kecamatan.addEventListener('change', function () {

    desa.innerHTML = '<option value="">Pilih Desa</option>';

    fetch(`/api/wilayah/kelurahan/${this.value}`)
    .then(res => res.json())
    .then(res => {

        res.data.forEach(item => {

            desa.innerHTML += `
                <option value="${item.code}">
                    ${item.name}
                </option>
            `;

        });

    });

});

});
</script>


    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
e.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
