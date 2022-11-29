<?php
include "view/header.php";
?>
            <!-- CONTENT AREA -->
            <div class="content-area">

                <!-- BREADCRUMBS -->
                <section class="page-section breadcrumbs text-center">
                    <div class="container">
                        <div class="page-header">
                            <h1>Contact Us</h1>
                        </div>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Contact</li>
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

                                    <h2 class="block-title"><span>Contact Us</span></h2>

                                    <div class="media-list">
                                        <div class="media">
                                            <i class="pull-left fa fa-home"></i>
                                            <div class="media-body">
                                                <strong>Address:</strong><br>
                                                987 Main st. New York, NY, 00001, U.S.A
                                            </div>
                                        </div>
                                        <div class="media">
                                            <i class="pull-left fa fa-phone"></i>
                                            <div class="media-body">
                                                <strong>Telephone:</strong><br>
                                                (012) 345-7689
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
                                                Phasellus pellentesque purus in massa aenean in pede phasellus libero ac tellus pellentesque semper.
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <strong>Customer Service:</strong><br>
                                                <a href="mailto:hello@rentit.com">hello@rentit.com</a>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <strong>Returns and Refunds:</strong><br>
                                                <a href="mailto:hello@rentit.com">hello@rentit.com</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-8 text-left">

                                <h2 class="block-title"><span>Contact Form</span></h2>

                                <!-- Contact form -->
                                <form name="contact-form" method="post" action="#" class="contact-form" id="contact-form">

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="name">Name</label>
                                            <input
                                                type="text" name="name" id="name" placeholder="Name" value="" size="30"
                                                data-toggle="tooltip" title="Name is required"
                                                class="form-control placeholder"/>
                                        </div>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="email">Email</label>
                                            <input
                                                type="text" name="email" id="email" placeholder="Email" value="" size="30"
                                                data-toggle="tooltip" title="Email is required"
                                                class="form-control placeholder"/>
                                        </div>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <label class="sr-only" for="subject">Subject</label>
                                            <input
                                                type="text" name="subject" id="subject" placeholder="Subject" value="" size="30"
                                                data-toggle="tooltip" title="Subject is required"
                                                class="form-control placeholder"/>
                                        </div>
                                    </div>

                                    <div class="form-group af-inner">
                                        <label class="sr-only" for="input-message">Message</label>
                                        <textarea
                                            name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                            data-toggle="tooltip" title="Message is required"
                                            class="form-control placeholder"></textarea>
                                    </div>

                                    <div class="outer required">
                                        <div class="form-group af-inner">
                                            <input type="submit" name="submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" id="submit_btn" value="Send message" />
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