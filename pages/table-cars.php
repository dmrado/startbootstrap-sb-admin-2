<?php
require_once ("../lib/header.php");
?>
<div id="page-wrapper">
    <?php if($_REQUEST['type'] && ($_REQUEST['type'] == 'carbrands')): ?>
        <div id="data">carbrands</div>
    <?php else: ?>
        <div id="data">carmods</div>
    <?php endif; ?>
    <input type="button" class="btn btn-default" id="addRow" value="Добавить строку">
</div>
<?php
require_once ("../lib/scripts.php");
?>
<script src="/js/dynamic-table.js"></script>
    <script>
        $(document).ready(function(){
            var mode = document.getElementById('data').innerText;
            alert(mode);
            var tableName = 'carbrands';
            var columns = [{
                id: 'carbrand_id',
                name: 'ID'
            },
            {
                id: 'carbrand_name',
                name: 'BRAND'
            }];
            // var tableName = 'carmods';
            // var columns = [{
            //     id: 'carmod_id',
            //     name: 'ID'
            // },{
            //     id: 'carbrand_id',
            //     name: 'Brand id'
            // },{
            //     id: 'carmod_name',
            //     name: 'Название модели'
            // }];
            createDynamicTable(tableName, columns, 'page-wrapper');
        });//end ready
    </script>

<?php
require_once ("../lib/footer.php");
?>