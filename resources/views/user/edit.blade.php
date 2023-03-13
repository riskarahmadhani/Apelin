@extends('layouts.main',['title'=>'User'])
@section('content')
<x-content :title="[
    'name'=>'User',
    'icon'=>'fas fa-user'
]">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('user.update',['user'=>$user->id]) }}" class="card card-lightblue" method="POST" enctype="multipart/form-data" >
                <div class="card-header">
                    Edit User
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <x-input
                    label="Nama" 
                    name="nama" 
                    :value="$user->nama" />

                    <x-input 
                    label="Username"
                    name="username" 
                    :value="$user->username" />

                    {{-- <img src="{{ $user->foto }}" class="img-fluid" |> --}}
                    <x-input label="File Foto/Gambar" name="file_foto" type="file" />

                    <div class="row">
                        <div class="col">
                            <x-select label="Role" name="role" :value="$user->role" :data-option="[
                                ['value'=>'kasir','option'=>'Kasir'],
                                ['value'=>'owner','option'=>'Pemilik'],
                                ['value'=>'admin','option'=>'Administrator'],
                            ]" />
                        </div>

                        <div class="col">
                            <x-select 
                            label="Outlet"
                            name="outlet_id"
                            :value="$user->outlet_id"
                            :data-option="$outlets" />
                        </div>
                    </div>

                    <p class="text-muted">
                        Kosongkan password jika tidak mengganti password
                    </p>

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
                    <x-btn-update :title="'User'" /> <x-btn-back href="{{ route('user.index') }}" />
                </div>
            </form>
        </div>
    </div>
</x-content>
@endsection