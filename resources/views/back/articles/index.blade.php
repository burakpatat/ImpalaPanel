@extends('back.layouts.master')
@section('title', 'Tüm Makaleler')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$articles->count()}}</strong> Makale Bulundu
        <span class="float-right">
            <a href="{{route('admin.trashed.article')}}" class="btn btn-sm btn-outline-warning"><i class="fa fa-trash"></i> Silinen Makaleler</a>
        </span>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Makale Resmi</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Görüntülenme</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><p style="color:red;">{{$article->id}}</p></td>
                            <td><img src="{{$article->image}}" width="200" /></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <input type="checkbox" article-id="{{$article->id}}" class="switch-status" data-on="AKTİF"
                                data-off="PASİF" data-onstyle="success" data-offstyle="danger"
                                @if($article->status == 1) checked @endif data-toggle="toggle" />
                            </td>
                            <td>
                                <a href="{{route('blogsinglepage',[$article->getCategory->slug, $article->slug])}}" target="_blank" title="Görüntüle" class="btn btn-sm" style = "color:green;"><i class="fa fa-eye"></i></a>
                                <a href="{{route('articles.edit',$article->id)}}" title="Düzenle" class="btn btn-sm" style = "color:blue;"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.delete.article',$article->id)}}" title="Sil" class="btn btn-sm" style = "color:red;"><i class="fa fa-times"></i></a>
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
        id = $(this)[0].getAttribute('article-id');
        statu = $(this).prop('checked');
        $.get("{{route('admin.switch')}}", {id:id,statu:statu}, function(data, status){
        });
      })
    })
  </script>
@endsection
