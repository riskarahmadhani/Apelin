@extends('layouts.main',['title'=>'Profile'])
@section('content')
    <x-content :title="[
        'name'=>'Profile',
        'icon'=>'fas fa-user'
    ]">
    <div class="row">
        <div class="col-md-6">

            @if (session('message') == 'success update')
                <x-alert-success type="update" />
            @endif

            <form
            class="card card-lightblue"
            method="POST" 
            action="{{ route('profile.update') }}" enctype="multipart/form-data">
            <div class="card-header">
            </div>
            <div class="card-body">
                @csrf
                @method('PUT')
                <x-input 
                label="Nama"
                name="nama"
                :value="$pegawai->nama" />

                <x-input 
                label="Username"
                name="username"
                :value="$pegawai->username"
                disabled/>

                <x-input label="File Foto/Gambar" name="file_foto" type="file" />

                <p class="text-muted">
                    Kosongkan password jika tidak mengganti password.
                </p>
                <div class="row">
                    <div class="col">
                        <x-input 
                        label="Password"
                        name="password"
                        type="password" />
                    </div>
                    <div class="col">
                        <x-input 
                        label="Password Confirmation"
                        name="password_confirmation"
                        type="password" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <x-btn-update :title="'Profil'" /> <x-btn-back href="{{ route('profile.index') }}" />
            </div>
        </form>
        </div>
    </div>
    </x-content>
@endsection