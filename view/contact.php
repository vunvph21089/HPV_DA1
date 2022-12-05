<?php
include "view/header.php";
?>
            <!-- CONTENT AREA -->
            <div class="content-area">

                <!-- BREADCRUMBS -->
                <section class="page-section breadcrumbs text-center">
                    <div class="container">
                        <div class="page-header">
                            <h1>Liên hệ với chúng tôi</h1>
                        </div>
                        <ul class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li>
                            <li class="active">Liên hệ</li>
                        </ul>
                    </div>
                </section>
                <!-- /BREADCRUMBS -->

                <!-- PAGE -->
                <section class="page-section color">
                    <div class="container">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="contact-info">

                                    <h2 class="block-title"><span>Liên hệ với chúng tôi</span></h2>

                                    <div class="media-list">
                                        <div class="media">
                                            <i class="pull-left fa fa-home"></i>
                                            <div class="media-body">
                                                <strong>Địa chỉ:</strong><br>
                                                11c 131/24 Đường Phương Canh, Xuân Phương, Nam Từ Liêm, Hà Nội 
                                            </div>
                                        </div>
                                        <div class="media">
                                            <i class="pull-left fa fa-phone"></i>
                                            <div class="media-body">
                                                <strong>Số điện thoại:</strong><br>
                                                0339410975
                                            </div>
                                        </div>
                                        <div class="media">
                                            <i class="pull-left fa fa-envelope-o"></i>
                                            <div class="media-body">
                                                <strong>Fax:</strong><br>
                                                0123456789
                                            </div>
                                        </div>
                                       
                                        <div class="media">
                                            <div class="media-body">
                                                <strong>Dịch vụ khách hàng:</strong><br>
                                                <a href="mailto:hello@rentit.com">Vanvu@gmail.com</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <strong>Hoàn tiền:</strong><br>
                                                <a href="mailto:hello@rentit.com">Migu@gmail.com</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-8 text-left">

                                <h2 class="block-title"><span>Form liên hệ</span></h2>

                                <!-- Contact form -->
                                <form name="contact-form" method="post" action="#" class="contact-form" id="contact-form">

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="name">Họ và tên</label>
                                            <input
                                                type="text" name="name" id="name" placeholder="Tên" value="" size="30"
                                                data-toggle="tooltip" title="Name is required"
                                                class="form-control placeholder" required/>
                                        </div>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="email">Email</label>
                                            <input
                                                type="text" name="email" id="email" placeholder="Email" value="" size="30"
                                                data-toggle="tooltip" title="Email is required"
                                                class="form-control placeholder" required/>
                                        </div>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="subject">Nghề nghiệp</label>
                                            <input
                                                type="text" name="subject" id="subject" placeholder="Nghề nghiệp" value="" size="30"
                                                data-toggle="tooltip" title="Subject is required"
                                                class="form-control placeholder" required/>
                                        </div>
                                    </div>

                                    <div class="form-group af-inner">
                                        <label class="sr-only" for="input-message">Lời nhắn</label>
                                        <textarea
                                            name="message" id="input-message" placeholder="Lời nhắn" rows="4" cols="50"
                                            data-toggle="tooltip" title="Message is required"
                                            class="form-control placeholder"></textarea>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <input onclick="thongbao()" type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn"  value="Gửi" />
                                        </div>
                                    </div>
                                
                                </form>
                                
                                <!-- /Contact form -->

                            </div>

                        </div>

                    </div>
                </section>
                <!-- /PAGE -->

                <!-- PAGE -->
                <div class="page-section no-padding">
                    <div class="container full-width">

                        <!-- Google map -->
                        <div class="google-map">
                            <div id="map-canvas"></div>
                        </div>
                        <!-- /Google map -->

                    </div>
                </div>
                <!-- /PAGE -->

            </div>
            <?php
include "view/footer.php";
?>