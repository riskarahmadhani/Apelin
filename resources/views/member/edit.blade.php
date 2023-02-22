@extends('layouts.main',['title'=>'User'])
@section('content')
<x-content :title="[
    'name'=>'Member',
    'icon'=>'fas fa-users'
]">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <form action="{{ route('member.update',['member'=>$member->id]) }}" class="card card-lightblue" method="POST">
                <div class="card-header">
                    Edit Member
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <x-input
                    label="Nama" 
                    name="nama" 
                    :value="$member->nama" />

                    <x-select label="Jenis Kelamin" name="jenis_kelamin" :value="$member->jenis_kelamin" :data-option="[
                        ['value'=>'L','option'=>'Laki-laki'],
                        ['value'=>'P','option'=>'Perempuan'],
                    ]" />

                    <x-input 
                    label="Telepon"
                    name="tlp" 
                    :value="$member->tlp" />

                    <x-textarea 
                    label="Alamat"
                    name="alamat" 
                    :value="$member->alamat" />
                </div>
                <div class="card-footer">
                    <x-btn-update />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection