@extends('layouts.main',['title'=>'Member'])
@section('content')
<x-content :title="[
    'name'=>'Member',
    'icon'=>'fas fa-users'
]">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <form action="{{ route('member.store') }}" class="card card-primary" method="POST">
                <div class="card-header">
                    Buat Member
                </div>
                <div class="card-body">
                    @csrf
                    <x-input
                    label="Nama" 
                    name="nama" />

                    <x-select label="Jenis Kelamin" name="jenis_kelamin" :data-option="[
                        ['value'=>'L','option'=>'Laki-laki'],
                        ['value'=>'P','option'=>'Perempuan'],
                    ]" />

                    <x-input 
                    label="Telepon"
                    name="tlp" />

                    <x-input 
                    label="Alamat"
                    name="alamat" />

                </div>
                <div class="card-footer">
                    <x-btn-submit />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection