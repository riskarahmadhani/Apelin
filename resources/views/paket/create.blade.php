@extends('layouts.main',['title'=>'Paket'])
@section('content')
<x-content :title="[
    'name'=>'Paket',
    'icon'=>'fas fa-cubes'
]">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <form action="{{ route('paket.store') }}" class="card card-lightblue" method="POST">
                <div class="card-header">
                    Buat Paket
                </div>
                <div class="card-body">
                    @csrf
                    <x-input
                    label="Nama Paket" 
                    name="nama_paket" />

                    <x-input 
                    label="Harga"
                    name="harga" />

                    <x-select label="Jenis" name="jenis" :data-option="[
                        ['value'=>'kiloan','option'=>'Kiloan'],
                        ['value'=>'kaos','option'=>'T-Shirt/Kaos'],
                        ['value'=>'bed_cover','option'=>'Bed Cover'],
                        ['value'=>'selimut','option'=>'Selimut'],
                        ['value'=>'lain','option'=>'Lainnya'],
                    ]" />

                    <x-select 
                    label="Outlet"
                    name="outlet_id"
                    :data-option="$outlets" />

                </div>
                <div class="card-footer">
                    <x-btn-submit />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection