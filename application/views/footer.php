 </div>
 </div>
</header>
<footer id="foot" class="footer fixed-bottom" style="position: relative;z-index:90;padding:0px;">
    <div class="container">
         <?php  if (!empty($user)){ ?>
         <nav class="pull-left">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>#section-home">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>#section-about">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>#section-quiz">
                        Category
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>#section-contact">
                        Contact Us
                    </a>
                </li>
            </ul>
        </nav> 
         <?php } ?>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, made by Parallax
        </div>
    </div>
</footer>
<style>
    footer ul li a:hover{
        color: #00bcd4;
    }
</style>
<script src="<?php echo base_url();?>js/smooth-scroll.js" type="text/javascript"></script>
<script>
var scroll = new SmoothScroll('a[href*="#section-"]');
</script>

<script>
$( "div:visible" ).scroll(function() {
  $( this ).css( "background", "yellow" );
});
$( "button" ).click(function() {
  $( "div:hidden" ).show( "fast" );
});
</script>

  </body>
</html>
