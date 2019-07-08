<?php include ROOT . '/layouts/header.php'; ?>
            <!-- ============================================================= HEADER : END ============================================================= -->
            
            <div id="top-banner-and-menu">
                <div class="container">
                    <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                        <!-- ================================== TOP NAVIGATION ================================== -->
                        <div class="side-menu animate-dropdown">
                            <div class="head"><i class="fa fa-list"></i> all departments</div>
                            <nav class="yamm megamenu-horizontal" role="navigation">
                                <ul class="nav">
                                <?php foreach ($genres as $item): ?>
                                    <li class="dropdown menu-item">
                                        <a href='/<?php echo lcfirst($item['title']);?>' class="dropdown-toggle" data-toggle="dropdown">
                                        <?php echo $item['title']; ?></a>
                                        
                                    </li><!-- /.menu-item -->
                                    <?php endforeach; ?>
                                    <li><a href="/authors/">All authors</a></li>
                                </ul><!-- /.nav -->
                            </nav><!-- /.megamenu-horizontal -->
                        </div><!-- /.side-menu -->
                        <!-- ================================== TOP NAVIGATION : END ================================== -->
                    </div><!-- /.sidemenu-holder -->

                    <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                        <!-- ========================================== SECTION – HERO ========================================= -->
                        
                    <div class="col-sm-5">
                                                              
                    <ul id="letters">
                        <div id='col1'><li class="alfavit"><a href='/authors/a/'>А</a></li>
                        <li class="alfavit"><a href='/authors/b/'>Б</a></li>
                        <li class="alfavit"><a href='/authors/v/'>В</a></li>
                        <li class="alfavit"><a href='/authors/g/'>Г</a></li>
                        <li class="alfavit"><a href='/authors/d/'>Д</a></li>
                        <li class="alfavit"><a href='/authors/je/'>Е</a></li>
                        <li class="alfavit"><a href='/authors/j/'>Ж</a></li>
                        <li class="alfavit"><a href='/authors/z/'>З</a></li>
                        <li class="alfavit"><a href='/authors/i/'>И</a></li>
                        <li class="alfavit"><a href='/authors/ji/'>Й</a></li>
                        <li class="alfavit"><a href='/authors/k/'>К</a></li>
                        <li class="alfavit"><a href='/authors/l/'>Л</a></li>
                        <li class="alfavit"><a href='/authors/m/'>М</a></li>
                        <li class="alfavit"><a href='/authors/n/'>Н</a></li></div>
                        <div id='col2'><li class="alfavit"><a href='/authors/o/'>О</a></li>
                        <li class="alfavit"><a href='/authors/p/'>П</a></li>
                        <li class="alfavit"><a href='/authors/r/'>Р</a></li>
                        <li class="alfavit"><a href='/authors/s/'>С</a></li>
                        <li class="alfavit"><a href='/authors/t/'>Т</a></li>
                        <li class="alfavit"><a href='/authors/y/'>У</a></li>
                        <li class="alfavit"><a href='/authors/f/'>Ф</a></li>
                        <li class="alfavit"><a href='/authors/h/'>Х</a></li>
                        <li class="alfavit"><a href='/authors/c/'>Ц</a></li>
                        <li class="alfavit"><a href='/authors/ch/'>Ч</a></li>
                        <li class="alfavit"><a href='/authors/sh/'>Ш</a></li>
                        <li class="alfavit"><a href='/authors/sch/'>Щ</a></li>
                        <li class="alfavit"><a href='/authors/e/'>Э</a></li>
                        <li class="alfavit"><a href='/authors/ju/'>Ю</a></li>
                        <li class="alfavit"><a href='/authors/ja/'>Я</a></li></div>
</ul>          
                    </div>
</div>
             <!-- ============================================================= FOOTER ============================================================= -->
             <?php include ROOT . '/layouts/footer.php'; ?>  