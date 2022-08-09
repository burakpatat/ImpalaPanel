@extends('back.layouts.master')
@section('title', 'Emlak İlanı Oluştur')
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
        <form method="post" action="{{route('estates.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>İlan Başlığı</label>
                <input type="text" name="estatetitle" class="form-control" required />
            </div>
            <div class="form-group">
                <label>İlan Kategorisi</label>
                <select name="estatecategory" class="form-control">
                    <option value="">-- Seçim Yapınız --</option>
                    @foreach($estatecategories as $estatecategory)
                        <option value="{{$estatecategory->id}}">{{$estatecategory->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="user-image mb-3 text-center">
                <div class="imgPreview"> </div>
            </div>
            <div class="form-group">
                <label>İlan Resmi</label>
                <input type="file" name="image[]" class="form-control" multiple="multiple" id="images" required />
            </div>
            <div class="form-group">
                <label>ilan Açıklama</label>
                <textarea id="editor1" name="estatedescription" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Olmasını İstediğiniz Özellikler</label>
                <div class="row">

                    @foreach($estatefeatures as $feature)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="estatefeatures[]" value="{{$feature['id']}}" id="{{$feature['id']}}">
                            <label class="form-check-label" for="{{$feature['id']}}" style="font-size: 20px">
                                {{$feature['features']}}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <div class="form-group">
                <label>Konut Fiyatı (₺)</label>
                <input type="text" name="estateprice" class="form-control" required />
            </div>
            <br><label><b>Emlak Bilgileri</b></label><br>
            <div class="form-group">
                <label>Oda Sayısı (Kaç + Kaç el ile giriniz)</label>
                <input type="text" name="room" class="form-control" required />
            </div>





            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kişi Sayısı (Kaç Kişilik)</label>
                        <select name="person" class="form-control" required>
                            <option value="">-- Seçim Yapınız --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Yatak Odası Sayısı</label>
                        <select name="bedroom" class="form-control" required>
                            <option value="">-- Seçim Yapınız --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Banyo/WC Sayısı</label>
                        <select name="bathroom" class="form-control" required>
                            <option value="">-- Seçim Yapınız --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5+</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Isıtma (Isınma Nedir?(doğalgaz,klima vb.))</label>
                        <input type="text" name="heating" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Havuz</label>
                        <select name="pool" class="form-control" required>
                            <option value="">-- Seçim Yapınız --</option>
                            <option value="0">Yok</option>
                            <option value="1">Var</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Otopark</label>
                        <select name="carpark" class="form-control" required>
                            <option value="">-- Seçim Yapınız --</option>
                            <option value="0">Yok</option>
                            <option value="1">Var</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Alan (metrekare)</label>
                        <input type="text" name="area" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bina Yaşı</label>
                        <input type="text" name="estateage" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bina Kat Sayısı</label>
                        <input type="text" name="floor" class="form-control" required />
                    </div>
                </div>
            </div>









            <div class="form-group">
                <label>Takas</label>
                <select name="swap" class="form-control" required>
                    <option value="">-- Seçim Yapınız --</option>
                    <option value="0">Yok</option>
                    <option value="1">Var</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-outline-dark">İlan Oluştur</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('DifCSS')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }
</style>
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
    });
</script>
@endsection
