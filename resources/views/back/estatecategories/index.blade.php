@extends('back.layouts.master')
@section('title', 'Tüm Emlak Kategoriler')
@section('content')
    
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.estatecategory.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Emlak Kategori Adı</label>
                        <input type="text" name="ec_name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-dark">Kategori Oluştur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>İlan Sayısı</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estatecategories as $estatecategory)
                                <tr>
                                    <td><p style="color:red;">{{$estatecategory->name}}</p></td>
                                    <td>{{$estatecategory->estateCount()}}</td>
                                    <td>
                                        <input type="checkbox" category-id="{{$estatecategory->id}}" class="switch-status" data-on="AKTİF" 
                                        data-off="PASİF" data-onstyle="success" data-offstyle="danger" 
                                        @if($estatecategory->status == 1) checked @endif data-toggle="toggle" />
                                    </td>
                                    <td>
                                        <a category-id="{{$estatecategory->id}}" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
                                        @if($estatecategory->id != 1)
                                        <a category-id="{{$estatecategory->id}}" category-count="{{$estatecategory->estateCount()}}" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
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
          <h4 class="modal-title text-center" style="color:orangered;">Kategoriyi Düzenle</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('admin.estatecategory.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Kategori Adı</label>

                    <input type="hidden" name="id" id="estatecategory_id" />

                    <input type="text" id="cname" name="cname" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Kategori Slug</label>
                    <input type="text" id="cslug" name="cslug" class="form-control" required />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-dark">Kategori Güncelle</button>
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
            <form method="post" action="{{route('admin.estatecategory.delete')}}">
                @csrf
                <input type="hidden" name="id" id="deleteId" />
                <button type="submit" class="btn btn-success">Sil</button>
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
                $('#articleAlert').html('Bu kategoride hiç makale bulunmamaktadır. Silmek istediğinize emin misiniz ?');
            } 

            $('#deleteModal').modal();
        });

        $('.edit-click').click(function(){
            id = $(this)[0].getAttribute('category-id');
            $.ajax({
                type:'GET',
                url:"{{route('admin.estatecategory.updatedata')}}",
                data:{id:id},
                success:function(data){
                    console.log(data);

                    $('#cname').val(data.name);
                    $('#cslug').val(data.slug);
                    $('#estatecategory_id').val(data.id);

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
    })
  </script>
@endsection