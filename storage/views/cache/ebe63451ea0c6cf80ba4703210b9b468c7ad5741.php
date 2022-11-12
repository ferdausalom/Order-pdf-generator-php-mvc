<?php if(isset($_SESSION["$sessionName"])): ?>
<div id="message" class="bg-gray-100 border mb-2 p-3 rounded" style="color:cadetblue">
    <?php
        echo sessionGet($sessionName);
        sessionUnset($sessionName);
    ?>
</div>

<script>
    const mg = document.getElementById('message');

    setTimeout(function(){ 
        mg.style.opacity = '0';
    }, 3000);

    setTimeout(function(){ 
        mg.style.display = 'none';
    }, 4000);

</script>
<?php endif; ?><?php /**PATH C:\laragon\www\ecommerce\views/message.blade.php ENDPATH**/ ?>