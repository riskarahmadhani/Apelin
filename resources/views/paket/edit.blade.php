@extends('layouts.main',['title'=>'Paket'])
@section('content')
<x-content :title="[
    'name'=>'Paket',
    'icon'=>'fas fa-cubes'
]">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <form action="{{ route('paket.update',['paket'=>$paket->id]) }}" class="card card-lightblue" method="POST">
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
                    id="harga"
                    :value="$paket->harga" />

                    <x-input 
                    label="Diskon" 
                    name="diskon" 
                    :value="$paket->diskon" 
                    type="number"/>

                    <x-input 
                    label="Harga Akhir" 
                    name="harga_akhir" 
                    id="harga_akhir" 
                    :value="$paket->harga_akhir" 
                    readonly />

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
                    <x-btn-update :title="'Paket'" /> <x-btn-back href="{{ route('paket.index') }}" />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            function calculateFinalPrice() {
                let harga = parseInt($('#harga').val());
                let diskon = parseInt($('input[name="diskon"]').val());
                if (isNaN(diskon)) {
                    diskon = 0;
                }
                let harga_akhir = harga - diskon; 
                if (harga_akhir < 0) {
                    $('#harga_akhir').val('');
                    alert('Diskon tidak boleh melebihi harga.');
                    $('button[type="submit"]').attr('disabled', true);
                    return;
                }
                $('#harga_akhir').val(harga_akhir);
                $('button[type="submit"]').attr('disabled', false);
            }

            $('#harga').on('input', function(){
                calculateFinalPrice();
            });

            $('input[name="diskon"]').on('input', function () {
                calculateFinalPrice();
            })
        })
    </script>
@endpush