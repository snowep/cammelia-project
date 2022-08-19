<?php Flasher::getFlashAuth() ?>
</div>
<!-- end container fluid -->
</div>
<!-- end page wrapper -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= BASEURL ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core Javascript -->
<script src="<?= BASEURL ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!--Custom JavaScript -->
<script src="<?= BASEURL ?>/dist/js/feather.min.js"></script>
<script src="<?= BASEURL ?>/dist/js/custom.min.js"></script>

<!-- this javascript is required for toast -->
<script src="<?= BASEURL ?>/highlights/highlights.min.js"></script>
<script>
    $(function() {
        hljs.initHighlightingOnLoad();
        $(".toast").toast("show");
    });
</script>
</body>

</html>