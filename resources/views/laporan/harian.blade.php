@extends('layouts.report',['title'=>'Laporan Harian'])
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
                <h3 class="mb-0">Laporan Harian</h3>
                <p>{{ date('d F Y', strtotime(request()->tanggal)) }}</p>
            </div>
        </div>
        <table class="table table-sm table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Waktu</th>
                    <th>Nama Kasir</th>
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
                        <td>{{ $row->nama }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($row->tgl)) }}</td>
                        <td>{{ $row->kasir }}</td>
                        <td>{{ number_format($row->total_bayar,0,',','.') }}</td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr class="border-bottom">
                        <th class="text-center" colspan="4" >Total</th>
                        <th>{{ number_format($data->sum('total_bayar'),0,',','.') }}</th>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>
@endsection