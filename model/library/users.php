<?php
$user_type = [
    1 => "Administrador",
    2 => "Moderador"
];
?>
<script>
    const $user_type = JSON.parse('<?= json_encode($user_type) ?>');
</script>