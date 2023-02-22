@extends('layouts.main',['title'=>'Log Activity'])
@section('content')
<x-content :title="[
    'name'=>'Log Activity',
    'icon'=>'fas fa-shoe-prints'
]">
    @if (session('status') == 'clear')
        <x-alert-success type="delete" />
    @endif
    <div class="card card-lightblue card-outline">
        <div class="card-header form-inline">
                    @can('admin')
                        <button type="button" class="btn btn-danger btn-delete" 
                        data-url="{{ route('log.clear') }}"
                        >
                            <i class="fas fa-trash mr-2"></i> Bersihkan Semua Log
                        </button>
                    @endcan
                    <x-form-search name="nama" />
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Log</th>
                        <th>IP Address</th>
                        <th>Agent</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $no = $data->firstItem();
                    @endphp
                    @forelse ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <strong>{{ $row->nama }}</strong>
                                <span class="text-muted">({{ ucwords($row->role) }})</span>
                                {{ $row->subject }} <br>
                                <small>
                                    <span class="text-muted">Tanggal : </span>{{ date('d F Y H:i:s',strtotime($row->tanggal)) }}
                                </small> <br>
                            </td>
                            <td>{{ $row->ip }}</td>
                            <td><small class="text-muted">{{ $row->agent ?? '-' }}</small></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>                       
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer pb-0 text-right">
            {{ $data->appends(['nama'=>request()->nama])->links('page') }}
        </div>
    </div>
</x-content>
@endsection

@push('modal')
    <x-modal-delete />
@endpush