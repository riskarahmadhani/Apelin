@extends('layouts.main',['title'=>'Profile'])
@section('content')
<x-content :title="[
    'name'=>'Profile',
    'icon'=>'fas fa-user'
]">
    @if (session('message')=='success update')
    <x-alert-success type="update" />        
    @endif
    <div class="row">
        <div class="col-md-4">
            @if (session('status') == 'edit')
                <x-alert-success type="edit" />
            @endif
            <div class="card card-lightblue">
                <div class="card-header p-1">
                </div>
                <div class="card-body text-center">
                    <div class="col">
                    <img src="{{ $row->foto }}" class="img-fluid mr-2 img-circle" width="120">
                    </div>
                    <div class="col mt-4">
                    <h4 class="mb-0">{{ $row->nama }}</h4>
                    {{ $row->username }}
                    </div>
                </div>
                <div class="card-footer">
                    <x-btn-edit href="{{ route('profile.edit') }}" :title="'Profil'" />
                </div>
            </div>
        </div>
    </div>
</x-content>
@endsection