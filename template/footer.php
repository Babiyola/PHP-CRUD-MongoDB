</div>
</div>
<script>
    if (typeof action != 'undefined' && '<?= (isset($_SESSION['action']) ? $_SESSION['action'] : "") ?>' != '' && <?= (isset($_SESSION['display']) ? $_SESSION['display'] : "") ?> == 1) {
        action.innerHTML = '<?= (isset($_SESSION['action']) ? $_SESSION['action'] : "") ?>';
        action.style.display = 'block';
        setTimeout(() => {
            action.style.display = 'none';
        }, 2500)
    }
</script>
</body>
<?php
if (isset($_SESSION['display']) && $_SESSION['display'] >= 1) {
    $_SESSION['display'] = 0;
    unset($_SESSION['action']);
}
?>

</html>