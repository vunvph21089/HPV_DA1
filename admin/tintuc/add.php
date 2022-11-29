        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Thêm Tin Tức</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tin Tức</a></li>
                                        <li class="breadcrumb-item active">Thêm mới</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form id="createproduct-form" autocomplete="off" class="needs-validation" action="index.php?act=addtintuc" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Tiêu đề</label>
                                            <input type="text" name="tieude" class="form-control" id="product-title-input" placeholder="Nhập vào tiêu đề tin tức" required>
                                        </div>

                                        <div>
                                            <label>Nội dung</label>
                                            <textarea name="noidung" id="ckeditor-classic" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->


                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                                    Thông tin chung
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="manufacturer-name-input">Mô tả ngắn</label>
                                                        <input type="text" name="mota_ngan" class="form-control" id="manufacturer-name-input" placeholder="Nhập mô tả ngắn cho tin tức" required>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row">


                                                    <div class="col-lg-6 col-sm-2">
                                                        <div class="mb-3">
                                                            <div class="card">
                                                                <label class="form-label" for="product-discount-input">Loại tin tức</label>
                                                                <select class="form-select" name="danhmuctt" id="choices-category-input" data-choices data-choices-search-false>
                                                                    <?php foreach ($list_tintuc as $index => $dmtt) : ?>
                                                                        <option name="name" value="<?= $dmtt['id'] ?>"><?= $dmtt['name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="product-discount-input">Người đăng</label>
                                                            <div class="input-group mb-3">
                                                                <select name="nguoidang" class="form-control" id="product-discount-input" aria-label="discount" aria-describedby="product-discount-addon">
                                                                    <?php foreach ($listuser as $index => $user) : ?>
                                                                        <option name="user" value="<?= $user['id'] ?>"><?= $user['user'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end tab-pane -->

                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <a href="index.php?act=listtintuc"><input class="btn btn-success w-sm" value="Danh sách"></a>

                                <div class="text-end mb-3">
                                    <input type="submit" name="submit" class="btn btn-success w-sm" value="Thêm">
                                </div>
                                <?php
                                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                                ?>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">


                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Hình ảnh</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <p class="text-muted">Thêm thumbnail cho tin tức</p>
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" name="anh" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg, image/jpg">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="#" id="product-img" class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fs-14 mb-1">Danh mục ảnh</h5>
                                            <p class="text-muted">Thêm ảnh mô tả tin tức</p>

                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                    </div>
                                                    <h5>Thả tệp vào đây hoặc nhấp để tải lên</h5>
                                                </div>
                                            </div>

                                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                <li class="mt-2" id="dropzone-preview-list">
                                                    <!-- This is used as the file preview template -->
                                                    <div class="border rounded">
                                                        <div class="d-flex p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded">
                                                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="pt-1">
                                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Xoá ảnh</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- end dropzon-preview -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </form>