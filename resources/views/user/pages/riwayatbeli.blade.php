@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')

    <section class="features-area section_gap" style="margin-top: 100px; padding-bottom: 50px;">
        <div class="container">
            <h2 class="mb-4">Riwayat Belanja</h2>
            
            @forelse ($riwayat as $order)
                <div class="card mb-4" style="border: 1px solid #eee; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #f8f9fa; border-bottom: 1px solid #eee; padding: 15px 20px;">
                        <div>
                            <strong style="font-size: 16px;">Order #{{ $order->id }}</strong><br>
                            <span class="text-muted" style="font-size: 14px;">{{ $order->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div>
                            <span class="badge" style="font-size: 14px; padding: 8px 12px; background-color: {{ $order->status == 'pending' ? '#ffc107' : ($order->status == 'selesai' ? '#28a745' : '#007bff') }}; color: {{ $order->status == 'pending' ? '#000' : '#fff' }}; border-radius: 4px;">
                                {{ strtoupper($order->status) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-body" style="padding: 20px;">
                        @foreach ($order->detailPemesanan as $detail)
                            @php
                                $umkm = $detail->produk->umkm ?? null;
                            @endphp
                            
                            <div class="row align-items-center mb-3 pb-3" style="border-bottom: 1px dashed #eee;">
                                <div class="col-md-8 d-flex align-items-center">
                                    <div>
                                        @if($detail->produk && $detail->produk->batch_foto && $detail->produk->batch_foto->fotos->count() > 0)
                                            <img src="{{ asset('assets/img/user/product/' . $detail->produk->batch_foto->fotos->first()->foto) }}" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                        @else
                                            <img src="{{ asset('assets/img/user/product/p1.jpg') }}" alt="Product Image" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                        @endif
                                    </div>
                                    <div style="margin-left: 20px;">
                                        <h5 class="mb-1" style="font-weight: 600;">{{ $detail->produk->nama ?? 'Produk Tidak Ditemukan' }}</h5>
                                        <div class="text-muted" style="font-size: 14px; margin-top: 5px;">
                                            @if($umkm)
                                                <i class="fa fa-store"></i> {{ $umkm->nama }}
                                                @php
                                                    $nohp = $umkm->nomorhp;
                                                    if(substr($nohp, 0, 1) == '0') $nohp = '62' . substr($nohp, 1);
                                                @endphp
                                                <a href="https://wa.me/{{ $nohp }}" target="_blank" class="text-success" style="margin-left: 10px; font-weight: 500;" title="Hubungi Penjual">
                                                    <i class="fa fa-whatsapp"></i> Chat Penjual
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">
                                    <p class="mb-1 text-muted" style="font-size: 14px;">{{ $detail->jumlah }} x Rp {{ number_format($detail->produk->harga ?? 0, 0, ',', '.') }}</p>
                                    <h6 class="mb-0" style="font-weight: 700;">Rp {{ number_format($detail->total, 0, ',', '.') }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="card-footer d-flex justify-content-between align-items-center" style="background-color: #fff; border-top: none; padding: 15px 20px;">
                        <div>
                            <a href="{{ route('userTracking', ['id' => $order->id]) }}" class="btn btn-outline-primary btn-sm" style="border-radius: 20px; padding: 8px 20px; font-weight: 600;">
                                <i class="fa fa-map-marker"></i> Lacak Pesanan
                            </a>
                        </div>
                        <div class="text-end">
                            <h5 class="mb-0">Total Belanja: <span style="color: #ff6c00; font-weight: 700;">Rp {{ number_format($order->total, 0, ',', '.') }}</span></h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center" style="padding: 30px; background-color: #f8f9fa; border: 1px solid #e9ecef;">
                    <i class="fa fa-shopping-bag mb-3" style="font-size: 40px; color: #ccc;"></i>
                    <h4>Belum Ada Riwayat Belanja</h4>
                    <p class="text-muted">Ayo mulai belanja sekarang dan penuhi kebutuhan Anda!</p>
                    <a href="{{ route('userShop') }}" class="primary-btn mt-2">Mulai Belanja</a>
                </div>
            @endforelse
        </div>
    </section>


@endsection
