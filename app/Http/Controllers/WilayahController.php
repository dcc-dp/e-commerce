<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
  public function provinsi()
  {
    return Http::get('https://wilayah.id/api/provinces.json')->json();
  }

  public function kota($provinsi)
  {
    return Http::get("https://wilayah.id/api/regencies/$provinsi.json")->json();
  }

  public function kecamatan($kota)
  {
    return Http::get("https://wilayah.id/api/districts/$kota.json")->json();
  }

  public function kelurahan($kecamatan)
  {
    return Http::get("https://wilayah.id/api/villages/$kecamatan.json")->json();
  }
}
