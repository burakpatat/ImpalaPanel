@extends('back.layouts.master')
@section('title', $article->title.' Makalesi Güncelleniyor')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        @if(($errors->any()))
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Makale Başlığı</label>
                <input type="text" name="title" class="form-control" value="{{$article->title}}" required />
            </div>
            <div class="form-group">
                <label>Makale Kategorisi</label>
                <select name="category" class="form-control" required>
                    <option value="">-- Seçim Yapınız --</option>
                    @foreach($categories as $category)
                        <option @if($article->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Makale Resmi</label>
                <br>
                <img src="{{asset($article->image)}}" class="img-thumbnail rounded float-left" width="300" />
                <input type="file" name="image" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Makale içeriği</label>
                <textarea id="editor" name="content" rows="10" class="form-control">{!! $article->content !!}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-outline-dark">Makale Güncelle</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('DifCSS')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('DifJS')
<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#editor').summernote({
      height:300
  });
});
</script>
@endsection
