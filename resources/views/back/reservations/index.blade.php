@extends('back.layouts.master')
@section('title', 'Tüm Rezervasyonlar')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$reservations->count()}}</strong> Rezervasyon Bulundu
                <span class="float-right">
        </span>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Villa Numarası</th>
                        <th>Misafir Adı</th>
                        <th>Misafir Email</th>
                        <th>Misafir Telefon</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Kişi Sayısı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durum</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>Nea Makri - {{$reservation->villa_number}}</td>
                            <td>{{$reservation->name}}</td>
                            <td>{{$reservation->email}}</td>
                            <td>{{$reservation->phone}}</td>
                            <td>{{$reservation->checkin}}</td>
                            <td>{{$reservation->checkout}}</td>
                            <td>{{$reservation->villa_personcount}}</td>
                            <td>{{$reservation->created_at->diffForHumans()}}</td>
                            <td>
                                <input type="checkbox" reserv-id="{{$reservation->id}}" class="switch-status" data-on="AKTİF"
                                       data-off="PASİF" data-onstyle="success" data-offstyle="danger"
                                       @if($reservation->status == 1) checked @endif data-toggle="toggle" />
                            </td>
                            <td>
                                <a href="{{route('admin.reservation.delete',$reservation->id)}}" title="Sil" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('DifCSS')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('DifJS')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch-status').change(function() {
                id = $(this)[0].getAttribute('reserv-id');
                statu = $(this).prop('checked');
                $.get("{{route('admin.reservation.switch')}}", {id:id,statu:statu}, function(data, status){
                });
            })
        })
    </script>
@endsection
