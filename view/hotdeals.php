<?php
include "view/header.php";
?>
<!-- PAGE WITH SIDEBAR -->
<section class="page-section with-sidebar sub-page">
    <div class="container">
        <div class="row">
            <!-- CONTENT -->
            <div class="col-md-9 content property-listing" id="content">

                <!-- Car Listing -->


                <?php
                foreach ($ds_bds as $bds) {
                    extract($bds);
                    $linkbds = "index.php?act=batdongsanchitiet&idbds=" . $id;
                    echo '
                <div class="thumbnail no-border no-padding thumbnail-property-card clearfix">
                <div class="media">
                    <a class="media-link" data-gal="prettyPhoto" href="' . $img . '">
                        <img src="' . $img . '" alt=""/>
                        <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                    </a>
                </div>
                <div class="caption">
                    <div class="rating">
                        <a href="#"> <img alt="" src="view/assets/img/map-marker-icon.png"> </a>
                    </div>
                    <h4 class="caption-title"><a href="' . $linkbds . '">' . $name . '</a></h4>
                    <h5 class="caption-title-sub">' . $price . '</h5>
                    <div class="caption-text">' . $location . '</div>
                    <table class="table">
                        <tr>
                            <td><i class="fa fa-expand"></i> 250 sq ft </td>
                            <td><i class="fa fa-bed"></i> 1 Bedroom</td>
                            <td><i class="fa fa-tint"></i> 1 Bathroom</td>

                            <td class="buttons"><a class="btn btn-theme" href="">tư vấn</a></td>
                        </tr>
                    </table>
                </div>
            </div>
                ';
                }
                ?>










                <!-- /Car Listing -->

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <ul class="pagination">
                        <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i> Previous</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
                <!-- /Pagination -->

            </div>
            <!-- /CONTENT -->

            <!-- SIDEBAR -->
            <aside class="col-md-3 sidebar" id="sidebar">
                <!-- widget -->
                <div class="widget shadow widget-find-property">
                    <h4 class="widget-title">Find Best Properties</h4>
                    <div class="widget-content">
                        <!-- Search form -->
                        <div class="form-search light">
                            <form action="#">

                                <div class="form-group has-icon has-label">
                                    <label for="formSearchUpLocation3">Enter Location</label>
                                    <input type="text" class="form-control" id="formSearchUpLocation3" placeholder="City">
                                    <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
                                </div>

                                <div class="form-group has-label">
                                    <label>Property For</label>
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                        <option>Property For</option>
                                        <option>Sale</option>
                                        <option>Rent</option>
                                    </select>
                                </div>

                                <div class="form-group has-label">
                                    <label>Property Type</label>
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                        <option>Flat</option>
                                        <option>House</option>
                                        <option>Villa</option>
                                    </select>

                                </div>

                                <div class="form-group has-label selectpicker-wrapper">
                                    <label>Budget</label>
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                        <option> Budget </option>
                                        <option>
                                            < 5Lac </option>
                                        <option>
                                            < 10Lac </option>
                                    </select>

                                </div>

                                <div class="form-group selectpicker-wrapper">
                                    <label>BHK</label>
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                        <option> 1 BHK </option>
                                        <option> 2 BHK </option>
                                        <option> 3 BHK </option>
                                    </select>

                                </div>

                                <div class="form-group selectpicker-wrapper">
                                    <label>Posted By</label>
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                        <option> Posted By </option>
                                        <option> Owners </option>
                                        <option> Brokers </option>
                                        <option> Builders </option>
                                    </select>

                                </div>

                                <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block">Find Property</button>

                            </form>
                        </div>
                        <!-- /Search form -->
                    </div>
                </div>
                <!-- /widget -->
                <!-- widget price filter -->
                <div class="widget shadow widget-filter-price">
                    <h4 class="widget-title">Price</h4>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <input type="text" id="amount" readonly />
                        <button class="btn btn-theme btn-theme-dark">Filter</button>
                    </div>
                </div>
                <!-- /widget price filter -->
                <!-- widget testimonials -->
                <div class="widget shadow">
                    <div class="widget-title">Chi nhánh tư vấn</div>
                    <div class="testimonials-carousel">
                        <div class="owl-carousel" id="testimonials">
                            <div class="testimonial">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="testimonial-text">Chi nhánh TP. Hồ Chí Minh
                                            Tầng 3, Tòa nhà Viettel Complex, 285 Cách Mạng Tháng Tám, Phường 12, Quận 10, TP. Hồ Chí Minh
                                            Điện thoại: 0904 893 279 - 0904 946 163</div>
                                        <div class="testimonial-name">Vụ<span class="testimonial-position">Tư vấn ngay</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="testimonial-text">Chi nhánh Đà Nẵng
                                            Tầng 9, tòa nhà Vĩnh Trung Plaza, số 255 – 257 Hùng Vương, phường Vĩnh Trung, quận Thanh Khê, TP. Đà Nẵng
                                            Điện thoại: (0236) 3 666 968 - Mobile: 0904 907 279</div>
                                        <div class="testimonial-name">Phương<span class="testimonial-position">Tư vấn ngay</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="testimonial-text">Chi nhánh Hải Phòng
                                            Phòng 502, TD Business Center, lô 20A Lê Hồng Phong, quận Ngô Quyền, TP. Hải Phòng
                                            Điện thoại: (0225) 3 246 848 - Mobile: 0903 456 322</div>
                                        <div class="testimonial-name">Hoàng <span class="testimonial-position">Tư vấn ngay</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /widget testimonials -->
                <!-- widget helping center -->
                <div class="widget shadow widget-helping-center">
                    <h4 class="widget-title">TRUNG TÂM GIÚP ĐỠ</h4>
                    <div class="widget-content">
                        <p>chúng tôi sẽ giải quyết mọi thắc mắc và tư vấn nhiệt tình nhất có đóng góp gì hay liên hệ</p>
                        <h5 class="widget-title-sub">+0793-576-765</h5>
                        <p><a href="mailto:support@supportcenter.com">support@supportcenter.com</a></p>
                        <div class="button">
                            <a href="#" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
                        </div>
                    </div>
                </div>
                <!-- /widget helping center -->
            </aside>
            <!-- /SIDEBAR -->

        </div>
    </div>
</section>
<!-- /PAGE WITH SIDEBAR -->

<?php
include "view/footer.php";
?>