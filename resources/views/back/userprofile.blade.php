@extends('back.layouts.master')
@section('title', 'Kullanıcı Profil Ayarları')
@section('content')
    
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yeni Kullanıcı Ekle</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.userprofile.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Profil Adı</label>
                        <input type="text" name="profilename" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input type="text" name="profileusername" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Şifre</label>
                        <input type="text" name="profilepassword" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" name="profilemail" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Telefon Numarası</label>
                        <input type="text" name="profilenumber" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Profil Resmi</label>
                        <input type="file" name="profileimage" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-dark">Kullanıcı Oluştur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tüm Kullanıcılar</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Profil Adı</th>
                                <th>Kullanıcı adı</th>
                                <th>Mail</th>
                                <th>Telefon Numarası</th>
                                <th>Resim</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                                <tr>
                                    <td><p>{{$profile->name}}</p></td>
                                    <td>{{$profile->username}}</td>
                                    <td>{{$profile->mail}}</td>
                                    <td>{{$profile->number}}</td>
                                    <td><img src="{{$profile->image}}" width="200" /></td>
                                    <td>
                                        <a profile-id="{{$profile->id}}" class="btn btn-sm btn-primary edit-click"><i class="fa fa-edit text-white"></i></a>
                                        @if($profile->id != 1)
                                        <a profile-id="{{$profile->id}}" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times text-white"></i></a>
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
          <h4 class="modal-title text-center" style="color:orangered;">Profili Düzenle</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('admin.userprofile.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Profil Adı</label>

                    <input type="hidden" name="id" id="profile_id" />

                    <input type="text" id="pname" name="pname" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" id="pusername" name="pusername" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>E-Mail</label>
                    <input type="text" id="pmail" name="pmail" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Telefon Numarası</label>
                    <input type="text" id="pnumber" name="pnumber" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Profil Resmi</label>
                    <input type="file" id="pimage" name="pimage" class="form-control"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-dark">Kullanıcı Profili Güncelle</button>
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
          <h4 class="modal-title text-center" style="color:orangered;">Kullanıcıyı Sil</h4>
        </div>
        <div class="modal-body">
            <div id="articleAlert" class="alert alert-danger">

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
            <form method="post" action="{{route('admin.userprofile.delete')}}">
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
            id = $(this)[0].getAttribute('profile-id');
            $('#deleteId').val(id);

            $('#articleAlert').html('Kullanıcıyı silmek istediğinize emin misiniz?');

            $('#deleteModal').modal();
        });

        $('.edit-click').click(function(){
            id = $(this)[0].getAttribute('profile-id');
            $.ajax({
                type:'GET',
                url:"{{route('admin.userprofile.updatedata')}}",
                data:{id:id},
                success:function(data){
                    console.log(data);

                    $('#profile_id').val(data.id);
                    $('#pname').val(data.name);
                    $('#pusername').val(data.username);
                    $('#pmail').val(data.mail);
                    $('#pnumber').val(data.number);
                    

                    $('#editModal').modal();
                }
            })
        });
    })
  </script>
@endsection