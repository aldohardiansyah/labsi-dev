@extends('templates/template')
@section('title', 'Data Asisten')

@section('content')

<!-- Page Content -->
<div class="container">

    <div class="mt-4">
        <hr>
        <div class="row">
            <!-- Navigation -->
            @include('admin/navbar')

        </div>
        <hr>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @if (session('status'))
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <center>{{ session('status') }}<center>
          </div>
          @endif
    </div>

    <div class="row">
        <div class="col-lg-12">
                <h4><center> Data Menu Aktif</center></h4>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-lg-3">
            {{-- <button type="button" class="btn btn-outline-primary">Pendaftaran Asisten</button> --}}
        </div>
        <div class="col-lg-6"></div> <!--separatorbusway-->
        <div class="col-lg-3">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" placeholder="Cari/Sortir Data" type="text" id="cari">
              <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                  <thead>
                    <tr  class="table-primary table-active" align="center">
                      <th scope="col" width="5%">No.</th>
                      <th scope="col" width="15%">Nama Menu</th>
                      <th scope="col" width="15%">Proses</th>
                    </tr>
                  </thead>
                  <tbody id="isi">
                    <?php $no = 0;?>
                    @foreach ($menu as $data)
                    <?php $no++ ;?>
                    <tr>
                      <td align="center">{{$no}}</td>
                      <td>{{$data->menu}}</td>
                      <td align="center">
                        @if($data->status == 0)
                          <span>
                            <a href="{{route('admin_menu.aktivasi' ,$data->id)}}" class="btn btn-primary btn-xsm">Aktifkan</a>
                          </span>
                        @else
                          <span>
                            <a href="{{route('admin_menu.nonaktif' ,$data->id)}}" class="btn btn-secondary btn-xsm">Nonaktifkan</a>
                          </span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

        </div>
    </div>
    <hr>


</div>
<!-- /.container -->



<script type="text/javascript">

    document.getElementById('cari').value = '';
    $(document).ready(function(){

        //Buat Nyari Data Tabel
         $("#cari").on("keyup", function() {
           var value = $(this).val().toLowerCase();
           $("#isi tr").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
           });
         });


        });

</script>

@endsection
