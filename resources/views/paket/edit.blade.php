@extends('layouts.main',['title'=>'Paket'])
@section('content')
<x-content :title="[
    'name'=>'Paket',
    'icon'=>'fas fa-cubes'
]">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <form action="{{ route('paket.update',['paket'=>$paket->id]) }}" class="card card-primary" method="POST">
                <div class="card-header">
                    Edit Paket
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <x-input
                    label="Nama Paket" 
                    name="nama_paket" 
                    :value="$paket->nama_paket" />

                    <x-input 
                    label="Harga"
                    name="harga" 
                    :value="$paket->harga" />

                    <x-select label="Jenis" name="jenis"
                    :value="$paket->jenis"
                    :data-option="[
                        ['value'=>'kiloan','option'=>'Kiloan'],
                        ['value'=>'kaos','option'=>'T-Shirt/Kaos'],
                        ['value'=>'bed_cover','option'=>'Bed Cover'],
                        ['value'=>'selimut','option'=>'Selimut'],
                        ['value'=>'lain','option'=>'Lainnya'],
                    ]" />

                    <x-select 
                    label="Outlet"
                    name="outlet_id"
                    :value="$paket->outlet_id"
                    :data-option="$outlets" />

                </div>
                <div class="card-footer">
                    <x-btn-update />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection