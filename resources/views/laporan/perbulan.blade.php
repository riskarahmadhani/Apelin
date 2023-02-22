@extends('layouts.report',['title'=>'Laporan Perbulan'])
@section('content')
    <div class="container">
        <div class="row mt-2">
            <img src="/img/logo3.png" alt="" class="mr-3" style="height: 85px">
            <div class="col">
                <h3 class="mb-0">{{ $outlet->nama }}</h3>
                <p>{{ $outlet->alamat }}<br> {{ $outlet->tlp }}</p>
            </div>
            <div class="justify-content-end">
                @php
                    $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                @endphp
                <h2 class="mb-0">Laporan Perbulan</h2>
                <p>{{ $bulan[(request()->bulan - 1)] }} {{ request()->tahun }}</p>
            </div>
        </div>
        
        <table class="table table-sm table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ date('d/m/Y', strtotime($row->tanggal)) }}</td>
                        <td>{{ number_format($row->jumlah,0,',','.') }}</td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr class="border-bottom">
                        <th colspan="2" class="text-center">Total</th>
                        <th>{{ number_format($data->sum('jumlah'),0,',','.') }}</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>
@endsection