<script src="<?=base_url('asset/js/jquery-3.1.0.min.js');?>"></script>
    <script src="<?=base_url('asset/js/bootstrap.min.js');?>"></script>
    <script>
    $(function(){
        var x = 0;
        setInterval(function(){
            x-=1;
            $('#movebg').css('background-position', x + 'px 0');
        }, 10);
    })
    </script>
  </body>
</html>