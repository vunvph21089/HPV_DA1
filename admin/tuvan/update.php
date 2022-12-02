
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Bất động sản tư vấn</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tư vấn</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="index.php?act=update_bds_tuvan" method="post" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="product-title-input">Chọn nhân viên tư vấn</label>
                                    <select name="user" class="form-control" id="product-discount-input" aria-label="discount" aria-describedby="product-discount-addon">
                                        <?php foreach ($listnhanvien as $index => $user) : print_r($user); ?>
                                            <option name="user" value="<?= $user['id'] ?>"><?= $user['user'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                    <input hidden name="trangthai" value="1">
                            </div>
                        </div>

                        <!-- end card -->
                        <div class="text-end mb-3">
                            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                            <input type="submit" name="capnhat" class="btn btn-success w-sm" value="Giao việc">
                            <!-- <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal">
                                    <input type="button" class="btn btn-success w-sm" value="Xóa"></a>
                            </li> -->
                            <!-- <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-2 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                    <h4>Are you sure ?</h4>
                                                    <p class="text-muted mx-4 mb-0">Bạn có chắc muốn xóa loại bất động sản này không ?</p>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Không</button>
                                                <a href="index.php?act=deletedm-tintuc&id=<?php if (isset($id) && ($id > 0)) echo $id; ?>"><button type="button" class="btn w-sm btn-danger" id="delete-record">Cóoooooo!</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <a href="index.php?act=list_bds_tuvan"><button type="button" class="btn btn-success w-sm">Danh sách</button></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </form>

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>