<?php include ROOT . '/layouts/header.php'; ?>
            <!-- ============================================================= HEADER : END ============================================================= -->
            <div id="sel">
                <p>сортировка</p>
                <select onchange="location = this.value;">
                    <option selected>по умолчанию</option>
                    <option  value="/new/" >по новизне</option>
                    <option value="/priceup/" >по возрастанию цены</option>
                    <option value="/pricedown/" >по убыванию цены</option>
                    <option value="/availability/" >по наличию</option>
                </select>
            </div>
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
                                        <a href='/<?php echo lcfirst($item['title']);?>/' class="dropdown-toggle" data-toggle="dropdown">
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
                        <?php foreach ($latestBooks as $item): ?>
                    <div class="col-sm-4">
                                                              
                                        <a href="/book/<?php echo $item['id']; ?>">
                                        <img id="pic" src="/layouts/images/<?php echo $item['id']; ?>.jpg" alt="" />
                                        <h2>$ <?php echo $item['price']; ?></h2>
                                        <p>
                                            
                                            <?php echo $item['title']; ?>
                                            <br>
                                            <?php echo $item['author']; ?><br>
                                            <?php echo $item['year']; ?></a>
                                        </p>
                                        
                                    </div>
                               
                    <?php endforeach; ?>
                    <!-- Постраничная навигация -->
                    <?php echo $pagination->get(); ?>
                    </div>
             <!-- ============================================================= FOOTER ============================================================= -->
 <?php include ROOT . '/layouts/footer.php'; ?>           
