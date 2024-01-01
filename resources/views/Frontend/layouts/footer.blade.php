        <style>
         .icon-size{
            font-size:25px;
            padding:5px;
            color:#fff;
         }
         .footer-p{
            padding:0px 25px;
         }   
        </style>
        
        </section>
        <footer1>    
            <div class="footer-copyrights row" style = "padding: 10px 0px 15px 0px;">
                <div class = "col-lg-3 col-md-3 col-sm-12 text-center">
                <h2> About </h2>
                <p class = "footer-p">Lorem Ipsum has been the industry's standard dummy textLoremLorem Ipsum has been the industry's standard dummy textLoremLorem Ipsum has been the industry's standard dummy textLorem</p>
    </div>
    <div class = "col-lg-3 col-md-3 col-sm-12">
    <h2> Social Connect</h2>
    <span class = "footer-p">
    <span><i class="fa fa-facebook-f icon-size"></i></span>
    <span> <i class="fa fa-instagram icon-size"></i></span>
    <span> <i class="fa fa-snapchat icon-size"></i></span>
        </span>
    </div>
    <div class = "col-lg-3 col-md-3 col-sm-12">
    <h2> Contact us </h2>
    <span class = "text-center">
    <span><i class="fa fa-envelope icon-size"></i>demo@demo.com  </span></br>
    <span><i class="fa fa-phone icon-size"></i>  +1-123465468 </span> 
    </span>
    </div>
    <div class = "col-lg-3 col-md-3 col-sm-12">
    <h2> Find us</h2>
    <span class = "footer-p">
    <span><i class="fa fa-map-marker icon-size"></i> 
                        The Artist Stage<br/>
                        Barmingham<br/>
                        Gk-82345<br/>
                        UK

    </span>
        </span>
    </div>
            </div>
            <div class = "row footer-copyrights " style = "border:solid 1px #fff;">
                <div class = "col-lg-8 col-md-8 col-sm-12 text-left">
                    <p class = "footer-p">All Rights Reserved 	&#169; 2023</p>
                </div>
                <div class = "col-lg-4 col-md-4 colsm-12 center">
                   <p> Design and Developed by <a href = "https://wizdomwebsolutions.com/"> wizdomwebsolutions</a> </p>
                </div>
            </div>            
        </footer>

        <script>
            $(document).ready(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 10) {
                       
                        $('.logo').css({
                            'width': '100px',
                            'height': 'auto',
                            'margin': '10px',
                            'padding': '0'
                        });
                    } else {
                        $('.logo').css({
                            'width': '100%',
                            'height': 'auto',
                            'margin': '0',
                            'padding': '20px'
                        });
                        $('.logo img').css({
                            'position': 'fixed',
                            'z-index': '1'
                        });
                        $('.udata').css({
                            'padding-top': '150px',
                        });
                    }
                });
            });
        </script>

    </body>
</html>
