<?php include ROOT . '/layouts/header.php'; ?>
            <!-- ============================================================= HEADER : END ============================================================= -->
            <div class="animate-dropdown"><!-- ========================================= BREADCRUMB ========================================= -->
                <div id="top-mega-nav">
                    <div class="container">
                        
                    </div><!-- /.container -->
                </div><!-- /#top-mega-nav -->
            <!-- ========================================= BREADCRUMB : END ========================================= -->
            </div>

                      
            <div id="single-product">
            <div class="col-sm-6">
            <script type="text/javascript" src="/layouts/js/simplebox_util.js"></script>
                    <script type="text/javascript">
                    (function(){
                    var boxes=[],els,i,l;
                    if(document.querySelectorAll){
                    els=document.querySelectorAll('a[rel=simplebox]');	
                    Box.getStyles('simplebox_css','simplebox.css');
                    Box.getScripts('simplebox_js','simplebox.js',function(){
                    simplebox.init();
                    for(i=0,l=els.length;i<l;++i)
                    simplebox.start(els[i]);
                    simplebox.start('a[rel=simplebox_group]');			
                    });
                    }
                    })();
            </script>
                    <a rel="simplebox" href="/layouts/images/<?php echo $book['id'];?>.jpg">

                    <img src="/layouts/images/<?php echo $book['id'];?>.jpg"></a>
                  

                                          <h2>$ <?php echo $book['price']; ?></h2>
                                        <p>
                                            <?php echo $book['author']; ?><br>
                                            <?php echo $book['year']; ?>
                                        </p>
                                       
                            </div>
        </div>    
            </div><!-- /.single-product -->
            <p id='description'>
                                <?php echo $book['info']; ?>
                                </p>
           
            
            <!-- ============================================================= FOOTER ============================================================= -->
<?php include ROOT . '/layouts/footer.php'; ?> 
