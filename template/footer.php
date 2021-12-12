</div>
</div>

</body>

<script src="<?php echo $url; ?>/assets/vendor/jquery.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script>
    let currentPage = location.href;
    $(".menu-item-link").each(function (){
        let links = $(this).attr("href");
        if (currentPage == links){
            $(this).addClass("active");
        }
    })
</script>
</html>
