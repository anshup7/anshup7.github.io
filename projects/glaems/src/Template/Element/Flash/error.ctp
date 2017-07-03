<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id = "au-change" class="message error " onclick="this.classList.add('hidden');"><?= $message ?></div>
