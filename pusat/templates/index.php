<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>PT. Sejahtera Selalu</title>
        <link rel="stylesheet" href="<?php echo base_url()?>/templates/style.css" type="text/css" charset="utf-8" />
        <script type="text/javascript" src="<?php echo base_url()?>/jquery/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>/jquery/jquery-ui-1.7.2.custom.min.js"></script>

    </head>

    <body>
        <?php
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        ?>
        <div id="wrapper" >
            <div id="header"> </div>
            <div id="left">
                <div id="logo">
                    <h1>PT. Sejahtera Selalu</h1>
                    <p>It's all possible</p>
                </div>
                <div id="nav">
                    <ul>
                        <?php
                        switch ($employee['jabatan']) {
                            case 'manager':
                                ?>
                        <li class="important"><a href="<?php echo base_url();?>home">Beranda</a></li>
                        <li><a href="<?php echo base_url();?>kantor">Kantor</a></li>
                        <li><a href="<?php echo base_url();?>karyawan">Karyawan</a></li>
                        <li><a href="<?php echo base_url();?>barang">Barang</a></li>
                        <li><a href="<?php echo base_url();?>jatah_cabang">Jatah Cabang</a></li>
                        <li><a href="<?php echo base_url();?>kirim_barang">Kirim Barang</a></li>
                        <li class="separator">Laporan Penjualan</li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perbarang">Per Barang</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perkantor">Per Cabang</a></li>
                        <li class="separator">Sinkronisasi</li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>setting_wsdl">Pengaturan WSDL</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>barang_ws">Barang</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>karyawan_ws">Karyawan</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perkantor/synch_form">Transaksi Penjualan</a></li>
                                <?php
                                break;
                            case 'kasir':
                                ?>
                        <li><a href="<?php echo base_url();?>kirim_barang">Kirim Barang</a></li>
                                <?php
                                break;
                            case 'admin':
                                ?>
                        <li class="separator">Sinkronisasi</li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>setting_wsdl">Pengaturan WSDL</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>barang_ws">Barang</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>karyawan_ws">Karyawan</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perkantor/synch_form">Transaksi Penjualan</a></li>
                                <?php
                                break;
                            case 'staf':
                                ?>
                        <li class="important"><a href="<?php echo base_url();?>home">Beranda</a></li>
                        <li><a href="<?php echo base_url();?>kantor">Kantor</a></li>
                        <li><a href="<?php echo base_url();?>karyawan">Karyawan</a></li>
                        <li><a href="<?php echo base_url();?>barang">Barang</a></li>
                        <li><a href="<?php echo base_url();?>jatah_cabang">Jatah Cabang</a></li>
                        <li><a href="<?php echo base_url();?>kirim_barang">Kirim Barang</a></li>
                        <li class="separator">Laporan Penjualan</li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perbarang">Per Barang</a></li>
                        <li class="sub_separator"><a href="<?php echo base_url();?>lap_penjualan_perkantor">Per Cabang</a></li>
                                <?php
                                break;
                        }?>
                        <li class="important"><a href="<?php echo base_url();?>login/logout">Keluar</a></li>
                        <!--
                        <li><a href="http://www.freewebsitetemplates.com">Solutions</a></li>
                        <li><a href="http://www.freewebsitetemplates.com">Contact us</a></li>
                        -->
                    </ul>
                </div>
                <div id="news">
                    <h2>Latest News</h2>
                    <h3>02/03/07</h3>
                    <p>Even more websites all about website templates on <a href="http://www.justwebtemplates.com">Just Web Templates</a>.</p>
                    <div class="hr-dots"> </div>
                    <h3>01/03/07</h3>
                    <p>If you're looking for beautiful and professionally made templates you can find them at <a href="http://www.templatebeauty.com">Template Beauty</a>.</p>
                    <p class="more"><a href="http://www.freewebsitetemplates.com">more</a></p>
                </div>
                <div id="support">
                    <p>Call: +3265-9856-789</p>
                </div>
            </div>
            <div id="right">
                <!--
               <h2>Welcome to Our Site!</h2>
               !-->
                <div id="welcome">
                    <!--
                     <img src="images/pic_1.jpg" width="171" height="137" alt="Pic 1" class="left" />
                     <p>Don't forget to check <a href="http://www.freewebsitetemplates.com">free website templates</a> every day, because we add  a new free website template almost daily.</p><p>You can remove any link to our websites from this template you're free to use the template without linking back to us.</p>
                     <p>This is just a place holder so you can see how the site would look like.</p>
                     <p class="more"><a href="http://www.freewebsitetemplates.com">more</a></p>

                     <h2>Guestbook</h2>
                    !-->
                    <?php
                    if($main) {
                        echo $main;
                    }
                    ?>
                </div>
                <h3>Company Profile</h3>
                <div id="profile">
                    <div id="corp">
                        <div id="corp-img">
                            Corporate Building
                        </div>
                        <p>If you're having problems editing the template please don't hesitate to ask for help on <a href="http://www.freewebsitetemplates.com/forum/">the forum</a>.</p>
                    </div>
                    <div id="indu">
                        <div id="indu-img">
                            Industrial
                        </div>
                        <p>This is a template designed by free website templates for you for free you can replace all the text by your own   			text.</p>
                    </div>
                    <div class="clear"> </div>
                    <p class="more"><a href="http://www.freewebsitetemplates.com">View Details</a></p>
                </div>
            </div>
            <div class="clear"> </div>
            <div id="spacer"> </div>
            <div id="footer">
                <div id="copyright">
                    Copyright &copy; 2007 Company Name All right reserved.
                </div>
                <div id="footerline"></div>
            </div>

        </div>
    </body>
</html>
