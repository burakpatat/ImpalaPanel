@extends('back.layouts.master')
@section('title', 'Silinen Makaleler - Geri Dönüşüm')
@section('content')
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$articles->count()}}</strong> Makale Bulundu
        <span class="float-right">
            <a href="{{route('articles.index')}}" class="btn btn-sm btn-outline-success"><i class="fa fa-fish"></i> Aktif Makaleler</a>
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
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><p style="color:red;">{{$article->id}}</p></td>
                            <td><img src="{{$article->image}}" width="200" /></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->categoriname}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('admin.recover.article',$article->id)}}" title="Kurtar" class="btn btn-sm" style = "color:orange;"><i class="fa fa-recycle"> Kurtar</i></a>
                                <a href="{{route('admin.harddelete.article',$article->id)}}" title="Sil" class="btn btn-sm" style = "color:red;"><i class="fa fa-times"></i></a>
                            </td>  
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection