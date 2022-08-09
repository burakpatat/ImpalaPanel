@extends('back.layouts.master')
@section('title', 'Tüm Emlak Özellikleri')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Özellik Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" id="featureForm" action="{{route('estatefeatures.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Emlak Özellik Adı</label>
                            <input type="text" name="ec_name" id="ec_name" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <button type="button" id="addFeature" class="btn btn-block btn-outline-dark">Özellik Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tüm Özellikler</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Özellik Adı</th>
                                <th>İlan Sayısı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody id="tableData">
                            @foreach($features as $feature)
                                <tr id="{{$feature->id}}">
                                    <td><p style="color:red;">{{$feature->features}}</p></td>
                                    <td>0</td>

                                    <td>
                                        <a category-id="{{$feature->id}}" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
                                        @if($feature->id != 1)
                                            <a category-id="{{$feature->id}}"  class="btn btn-sm btn-danger remove-click" ><i class="fa fa-times text-white"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color:orangered;">Özelliği Düzenle</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('estatefeatures.updateData')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Özellik Adı</label>

                            <input type="hidden" name="id" id="estatefeatures_id" />

                            <input type="text" id="cname" name="cname" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-outline-dark">Güncelle</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" style="color:orangered;">Kategoriyi Sil</h4>
                </div>
                <div class="modal-body">
                    <div id="articleAlert" class="alert alert-danger">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <form method="post" id="deleteFeature" action="{{route('estatefeatures.delete')}}">
                        @csrf
                        <input type="hidden" name="id" id="deleteId" value=""/>
                        <button type="button" id="featureDeleteButton" class="btn btn-success">Sil</button>
                    </form>
                </div>
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
            $('.remove-click').click(function(){
                id = $(this)[0].getAttribute('category-id');

                articlecount = $(this)[0].getAttribute('category-count');

                $('#deleteId').val(id);

                if(articlecount>0){
                    $('#articleAlert').html('Bu kategoriye ait '+articlecount+' makale bulunmaktadır. Silmek istediğinize emin misiniz?');
                }
                else{
                    $('#articleAlert').html('Bu özellikte hiç özellik bulunmamaktadır. Silmek istediğinize emin misiniz ?');
                }



                $('#deleteModal').modal();
            });

            $('#featureDeleteButton').click(function(){
                var postData = $('#deleteFeature').serialize()
                var id = '#' + $('#deleteId').val()
                console.log(id)
                $.ajax({
                    url : $("#deleteFeature").attr('action'),
                    type : 'POST',
                    data : postData,
                    success:function(data) {
                        if (data==1) {
                            $(id).hide()
                            Swal.fire("Başarılı!","Özellik Başarıyla silindi!","success")
                            $('#deleteModal').modal('toggle');
                        } else {

                        }
                    }
                })
            })

            $('.edit-click').click(function(){
                id = $(this)[0].getAttribute('category-id');
                $.ajax({
                    type:'GET',
                    url:"{{route('estatefeatures.updateInfo')}}",
                    data:{id:id},
                    success:function(data){
                        console.log(data);

                        $('#cname').val(data.features);
                        $('#estatefeatures_id').val(data.id);

                        $('#editModal').modal();
                    }
                })
            });

            $('.switch-status').change(function() {
                id = $(this)[0].getAttribute('category-id');
                statu = $(this).prop('checked');
                $.get("{{route('admin.estatecategory.switch')}}", {id:id,statu:statu}, function(data, status){
                });
            })


            $('#addFeature').click(function (){

                var formData = $("#featureForm").serialize();

                if ($('#ec_name').val() != '') {

                    $.ajax({
                        'url' : $("#featureForm").attr('action'),
                        'type' : 'POST',
                        'data' : formData,
                        success:function (data) {
                            console.log(data)
                            if (data == 0) {
                                Swal.fire(
                                    'Hata!',
                                    'Beklenmedik Bir Hata Oluştu!',
                                    'error'
                                )

                            } else if(data == 2) {
                                Swal.fire(
                                    'Hata!',
                                    'Böyle Bir Kayıt Zaten Var!',
                                    'warning'
                                )
                            } else {
                                Swal.fire(
                                    'Başarılı!',
                                    'Yeni Özellik Başarıyla Eklendi!',
                                    'success'
                                )
                                $('#tableData').append(data)
                                $('#ec_name').val('')
                            }
                        }

                    })

                }  else {
                    alert("Boş Kaydedilemez")
                }




            })
        })
    </script>
@endsection
