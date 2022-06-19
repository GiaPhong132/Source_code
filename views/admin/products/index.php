<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>

<?php
require_once('/xampp/htdocs/Source_code/views/admin/header.php');
// require_once("/XAMPP/htdocs/Source_code/models/product.php");
// $data = Product::getAll();
?>

<!-- Add CSS -->


<?php
require_once('/xampp/htdocs/Source_code/views/admin/content_layouts.php'); ?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Add Content -->
    <!-- Content Header (Page header)-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=main&controller=layouts&action=index">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
    </section>
    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header-->
                        <div class="card-body">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">Thêm mới</button>
                            <div class="modal fade" id="addUserModal" aria-labelledby="addUserModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới sản phẩm</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=products&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6"><label>Tên sản phẩm</label><input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" /></div>
                                                    <div class="col-6"><label>Giá</label><input class="form-control" type="number" placeholder="Giá" name="price" /></div>
                                                </div>

                                                <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" name="description" rows="5"></textarea></div>
                                                <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" name="content" rows="10"></textarea></div>
                                                <div class="form-group"> <label>Hình ảnh </label>&nbsp <input type="file" name="fileToUpload" id="fileToUpload" /></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary" type="submit">Thêm mới</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
                            <table id="TAB-product" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá </th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    // $index = 1;

                                    foreach ($result as $item) {

                                        echo "
                                        <tr class=\"text-center\">
                                        <td>".
                                                     $item['id']
                                                    ."</td>
                                        <td>
                                            " . $item['name'] . "
                                        </td>
                                        <td>
                                            " .  $item['price'] . "
                                        </td>
                                        <td>
                                            " .  $item['description'] . "
                                        </td>
                                        <td>
                                            " . $item['content'] . "
                                        </td>
                                        <td >
                                            <img style='width: 100px; height:100px;' src='".$item['img']."'>
                                        </td>
                                        ";

                                       echo "
                                       <td>
                                       <button data-toggle='modal' data-target='#EditStudentModal".$item['id']."' type='button' data class='btn-edit btn btn-primary btn-xs' style='margin-right: 5px' data-id='".$item['id']."' data-name='".$item['name']."' data-price='".$item['price']."' data-description='".$item['description']."' data-content='".$item['content']."' data-img='".$item['img']."'> <i style='font-size:17px;' class='fas fa-edit' ></i></button>";
                                           echo "
                                       <div class='modal fade' id='EditStudentModal".$item['id']."' tabindex='-1' role='dialog' aria-labelledby='EditStudentModal".$item['id']."' aria-hidden='true'>
                                           <div class='modal-dialog modal-xl' role='document'>
                                               <div class='modal-content'>
                                                   <div class='modal-header'>
                                                       <h5 class='modal-title'>Chỉnh sửa</h5><button class='close' type='button' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                   </div>
                                                   <form id='form-edit-student' action='index.php?page=admin&controller=products&action=edit' enctype='multipart/form-data' method='POST'>
                                                       <div class='modal-body'>
                                                           <div class='col-12'><label>ID</label> <input class='form-control' type='text' value='".$item['id']."' name='id' readonly /></div>
                                                           <div class='row'>
                                                               <div class='col-6'><label>Tên sản phẩm</label><input class='form-control' type='text' value='".$item['name']."' name='name' /></div>
                                                               <div class='col-6'><label>Giá</label><input class='form-control' type='number' value='".$item['price']."' name='price' /></div>
                                                           </div>
   
                                                           <div class='form-group'> <label>Mô tả</label> <textarea class='form-control' name='description' rows='5'>".$item['description']."</textarea></div>
                                                           <div class='form-group'> <label>Nội dung</label> <textarea class='form-control' name='content' rows='10'>".$item['content']."</textarea></div>
                                                           <div class='form-group'><label>Url Hình ảnh </label><input class='form-control' type='text' name='imggg' readonly /></div>
                                                           <div class='form-group'> <label> Hình ảnh </label>&nbsp <input type='file' name='fileToUpload' id='fileToUpload' /></div>
                                                       </div>
                                                       <div class='modal-footer'><button class='btn btn-secondary' type='button' data-dismiss='modal'>Đóng</button><button class='btn btn-primary formedit' type='submit'>Chỉnh sửa</button></div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                       "; 
                                
                                    



                                        echo "<button data-toggle='modal' data-target='#DeleteStudentModal".$item['id']."' type='button' class=\"btn-delete btn btn-danger btn-xs\" style=\"margin-right: 5px\" data-id='".$item['id']."' ><i style=\"font-size:17px;\" class=\"fas fa-trash\"></i></button>";
                                        echo "
                                    <div class='modal fade' id='DeleteStudentModal".$item['id']."' tabindex='-1' role='dialog' aria-labelledby='DeleteStudentModal".$item['id']."' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content bg-danger'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title'>Xóa</h5><button class='close' type='button' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                </div>
                                                <form action='index.php?page=admin&controller=products&action=delete' method='post'>
                                                    <div class='modal-body'><input type='hidden' name='id' value='".$item['id']."' />
                                                        <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                                                    </div>
                                                    <div class='modal-footer'><button class='btn btn-danger btn-outline-light' type='button' data-dismiss='modal'>Đóng</button><button class='btn btn-danger btn-outline-light' type='submit'>Xóa</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    ";
                                        echo "</td>
                                </tr>";
                                        // $index++;
                                    }
                                    ?>
                                </tbody>
                                <!-- <div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="EditStudentModal" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chỉnh sửa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form id="form-edit-student" action="index.php?page=admin&controller=products&action=edit" enctype="multipart/form-data" method="post">
                                                <div class="modal-body">
                                                    <div class="col-12"><label>ID</label> <input class="form-control" type="text" placeholder="Name" name="id" readonly /></div>
                                                    <div class="row">
                                                        <div class="col-6"><label>Tên sản phẩm</label><input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" /></div>
                                                        <div class="col-6"><label>Giá</label><input class="form-control" type="number" placeholder="Giá" name="price" /></div>
                                                    </div>

                                                    <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" name="description" rows="5"></textarea></div>
                                                    <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" name="content" rows="10"></textarea></div>
                                                    <div class="form-group"><label>Url Hình ảnh </label><input class="form-control" type="text" name="imggg" readonly /></div>
                                                    <div class="form-group"> <label> Hình ảnh </label>&nbsp <input type="file" name="fileToUpload" id="fileToUpload" /></div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button><button class="btn btn-primary formedit" type="submit">Chỉnh sửa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteStudentModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg-danger">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=products&action=delete" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
                                                    <p>Bạn có chắc chắn muốn xóa sản phẩm này?</p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Đóng</button><button class="btn btn-danger btn-outline-light" type="submit">Xóa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>


<!-- Add Javascripts -->
<script src="/Source_code/public/js/admin/index.js"></script>
<script type="text/javascript" src="/Source_code/public2/js/admin.js"></script>
</body>

</html>