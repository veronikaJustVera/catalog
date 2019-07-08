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
        
                        <?php if(!empty($authorsList)):
                            foreach ($authorsList as $item): ?>
                            <p><a href='<?php echo $_SERVER['REQUEST_URI'].$item['id']; ?>'>
                            <?php echo $item['name']; ?></a></p>

                        <?php endforeach;
                        else: ?>
                            <p>Sorry, there are no authors.</p>
                    <?php endif; ?>
                 </div>                                          
                    
                  <div id="back"><a href="/authors/">Back</a></div> 
                  </div>
             <!-- ============================================================= FOOTER ============================================================= -->
<?php include ROOT . '/layouts/footer.php'; ?>  
