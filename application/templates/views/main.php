<!DOCTYPE html>
<html lang="ru">
    <?=$params['header']?>
<body>
<script>
    window.host = <?=$params['host']?>;
</script>
<div class="layout">
    <?=$params['top']?>
    <?=$params['content']?>
    <?=$params['footer']?>
    <?=$params['addition']?>
</div><!-- END LAYOUT-->
    <script src="../js/jQuery-2.1.3.min.js"></script>
    <script src="../js/vendors/slick/slick.min.js"></script>
    <script src="../js/vendors/spin/spin.min.js"></script>
    <!--<script src="js/vendors/croppic/croppic.min.js"></script>-->
    <script src="../js/vendors/fancybox/jquery.fancybox.pack.js"></script>
    <script src="../js/interface.js"></script>
    <script src="../js/Share.js"></script>
</body>
</html>