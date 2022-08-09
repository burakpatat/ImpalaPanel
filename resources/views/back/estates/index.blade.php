@extends('back.layouts.master')
@section('title', 'Tüm Emlak İlanları')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$estates->count()}}</strong> Emlak İlanı Bulundu
        <span class="float-right">
            <h6>İlanlarda hata görürseniz siliniz ve yeniden oluşturunuz.</h6>
            <!--<a href="{{route('admin.estate.trashed')}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-trash"></i> Silinen İlanlar</a>-->
        </span>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>İlan Resmi</th>
                        <th>İlan Başlığı</th>
                        <th>İlan Kategori</th>
                        <th>Görüntülenme</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durum</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estates as $estate)
                        <tr>
                            @php $images = explode('|', $estate->image); @endphp
                            <td><img src="{{ URL::to($images[0]) }}" width="200" /></td>
                            <td>{{$estate->title}}</td>
                            <td>{{$estate->getEstateCategory->name}}</td>
                            <td>{{$estate->hit}}</td>
                            <td>{{$estate->created_at->diffForHumans()}}</td>
                            <td>
                                <input type="checkbox" estate-id="{{$estate->id}}" class="switch-status" data-on="AKTİF"
                                data-off="PASİF" data-onstyle="success" data-offstyle="danger"
                                @if($estate->status == 1) checked @endif data-toggle="toggle" />
                            </td>
                            <td>
                                <a href="{{route('admin.estate.harddelete',$estate->id)}}" title="Sil" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
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
        id = $(this)[0].getAttribute('estate-id');
        statu = $(this).prop('checked');
        $.get("{{route('admin.estate.switch')}}", {id:id,statu:statu}, function(data, status){
        });
      })
    })
  </script>
@endsection
