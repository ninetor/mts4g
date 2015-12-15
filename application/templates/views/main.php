<!DOCTYPE html>
<html lang="ru">
    <?=$params['header']?>
<body>
<script>
    window.host = '<?=$params['host']?>';
</script>
<div class="layout">
    <?=$params['top']?>
    <?=$params['content']?>
    <?=$params['footer']?>
</div><!-- END LAYOUT-->
<?=$params['addition']?>

    <script src="../js/vendors/slick/slick.min.js"></script>
    <script src="../js/vendors/spin/spin.min.js"></script>
    <!--<script src="js/vendors/croppic/croppic.min.js"></script>-->
    <script src="../js/vendors/fancybox/jquery.fancybox.pack.js"></script>
    <script src="../js/interface.js"></script>
    <script src="../js/croppic.min.js"></script>
    <script src="../js/Share.js"></script>
</body>
</html>