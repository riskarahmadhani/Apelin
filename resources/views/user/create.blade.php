@extends('layouts.main',['title'=>'User'])
@section('content')
<x-content :title="[
    'name'=>'User',
    'icon'=>'fas fa-user'
]">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('user.store') }}" class="card card-lightblue" method="POST" enctype="multipart/form-data" >
                <div class="card-header">
                    Buat User
                </div>
                <div class="card-body">
                    @csrf
                    <x-input
                    label="Nama" 
                    name="nama" />

                    <x-input 
                    label="Username"
                    name="username" />
 
                    <x-input label="File Foto/Gambar" name="file_foto" type="file" />

                    <div class="row">
                        <div class="col">
                            <x-select label="Role" name="role" :data-option="[
                                ['value'=>'kasir','option'=>'Kasir'],
                                ['value'=>'owner','option'=>'Pemilik'],
                                ['value'=>'admin','option'=>'Administrator'],
                            ]" />
                        </div>

                        <div class="col">
                            <x-select 
                            label="Outlet"
                            name="outlet_id"
                            :data-option="$outlets" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-input
                            label="Password" name="password" type="password" />
                        </div>

                        <div class="col">
                            <x-input
                            label="Password Konfirmasi" name="password_confirmation" type="password" />
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <x-btn-submit :title="'User'" /> <x-btn-back href="{{ route('user.index') }}" />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection