<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>itern version</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">​
</head>

<body id="page-top">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-add" href='#'>thêm</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Guid</th>
                                            <th>Name</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($repo as $row)
                                        <tr>
                                            <td>{{ $row->guid }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                
                                                    <button class="btn btn-primary edit" data-toggle="modal" data-target="#modal-edit{{ $row->guid }}" type="button"><i class="fas fa-edit"></i></button>
                                                
                                                <a onclick="confirm("Want to delete?")" href="{{ route('delete', $row->guid) }}">
                                                    <button class="btn btn-danger delete" data-toggle="modal" data-target="" type="button"><i class="fas fa-trash-alt"></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Edit Modal-->

    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="margin-left: 183px;">
                        <button type="button" class="btn btn-success">Có</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                </div>
            </div>
        </div>
     </div>
    </div>
  @include('create')
  {{-- @include('update') --}}
    @foreach ($repo as $item)
        <div class="modal fade" id="modal-edit{{ $item->guid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ route('update-post') }}" method="POST" role="form">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="row" style="margin: 5px">
                                <div class="col-lg-12">
                                    <input type="hidden" name="guid" value="{{ $item->guid }}">
                                    <fieldset class="form-group">
                                        <label>Text Input with Placeholder</label>
                                        <input class="form-control" value="{{ $item->guid }}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label>Text area</label>
                                        <textarea name="name" class="form-control" rows="3">{{ $item->name }}</textarea>
                                    </fieldset>
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            {{-- <button type="reset" class="btn btn-primary">Làm Lại</button> --}}
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
