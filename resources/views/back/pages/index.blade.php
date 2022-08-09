@extends('back.layouts.master')
@section('title', 'Tüm Sayfalar')
@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$pages->count()}}</strong> Sayfa Bulundu
        <span class="float-right">
        </span>
        </h6>
    </div>
    <div class="card-body">
        <div id="ordersuccess" style="display:none;" class="alert alert-success">
            Sıralama Başarıyla Güncellendi!
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sıralama</th>
                        <th>Sayfa Resmi</th>
                        <th>Sayfa Başlığı</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody id="orderSort">
                    @foreach($pages as $page)
                        <tr id="page_{{$page->id}}">
                            <td class="text-center" style="width:10px;">
                                <i class="fas fa-arrows-alt fa-3x handle" style="color:black;cursor:move;"></i>
                            </td>
                            <td><img src="{{$page->image}}" width="200" /></td>
                            <td>{{$page->title}}</td>
                            <td>
                                <input type="checkbox" page-id="{{$page->id}}" class="switch-status" data-on="AKTİF" 
                                data-off="PASİF" data-onstyle="success" data-offstyle="danger" 
                                @if($page->status == 1) checked @endif data-toggle="toggle" />
                            </td>
                            <td>
                                <a href="{{route('page',$page->slug)}}" target="_blank" title="Görüntüle" class="btn btn-light" style = "color:green;"><i class="fa fa-eye"></i></a>
                                <a href="{{route('admin.page.update',$page->id)}}" title="Düzenle" class="btn btn-light" style = "color:blue;"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.page.delete',$page->id)}}" title="Sil" class="btn btn-light" style = "color:red;"><i class="fa fa-times"></i></a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>
    $(function() {
      $('.switch-status').change(function() {
        id = $(this)[0].getAttribute('page-id');
        statu = $(this).prop('checked');
        $.get("{{route('admin.page.switch')}}", {id:id,statu:statu}, function(data, status){
        });
      })
    })
  </script>
  <script>
      $('#orderSort').sortable({
        handle:'.handle',
        update: function(){
            var sort= $('#orderSort').sortable('serialize');
            $.get("{{route('admin.page.orders')}}?"+sort,function(data){
                $('#ordersuccess').show();
                setTimeout(function(){$('#ordersuccess').fadeOut();},1000);
            });
        }
      });
  </script>
@endsection