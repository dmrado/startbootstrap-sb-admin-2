<?php
require_once ("../lib/header.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<div id="page-wrapper">
    <div class="row" id="data" data-id="<?=$id ?>"></div>
</div>
<?php
require_once ("../lib/scripts.php");
?>
    <script>
         $(function() {
    //         var id = $('#data').attr('data-id');//передали значение $id из php в JS
    //         //alert(id);//для отладки
    //         if(id!=''){
    //             $.ajax({
    //                 url:'http://localhost:8888/php-crud-api/api.php/records/carbrands/'+id,
    //                 method:'GET',
    //                 success: function (data) {
    // // console.log(data);
    // // для отладки
    // // debugger;
    //                     $('#data').html(data.carbrand_id + " " + data.carbrand_name);
    //                 }
    //             });//end ajax
    //         }

            var id = $('#data').attr('data-id');//передали значение $id из php в JS
            //alert(id);//для отладки
            if(id!=''){
                $.ajax({
                    url:'http://localhost:8888/php-crud-api/api.php/records/carmods/'+id,
                    method:'GET',
                    success: function (data) {
                        // console.log(data);
                        // для отладки
                        // debugger;
                        $('#data').html(data.carmod_id + " " + data.carmod_name);
                    }
                });//end ajax
            }

        });//end ready
    </script>

<?php
require_once ("../lib/footer.php");
?>
