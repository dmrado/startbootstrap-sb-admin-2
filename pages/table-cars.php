<?php
require_once ("../lib/header.php");
?>
<div id="page-wrapper">
    <input type="button" class="btn btn-default" id="addRow" value="Добавить строку">
</div>
<?php
require_once ("../lib/scripts.php");
?>
    <script>
        $(document).ready(function(){
            var tableName = 'carbrands';
            var columns = [{id: 'carbrand_id', name: 'ID'}, {id: 'carbrand_name', name: 'BRAND'}];
            var table = document.createElement('table');
            table.setAttribute('id', 'table-'+ tableName);
            table.setAttribute('class', 'table table-striped table-bordered');

            document.getElementById('page-wrapper').appendChild(table);
            var tHead = document.createElement('thead');
            var row = document.createElement('tr');
            tHead.appendChild(row);

            table.appendChild(tHead);
            var tBody = document.createElement('tbody');
            table.appendChild(tBody);

            for (var i = 0; i < columns.length; i++){
                var th = document.createElement('th');
                th.innerText = columns[i].name;
                row.appendChild(th);
            }
            document.getElementById('page-wrapper').appendChild(table);

            var t = $('#table-'+ tableName).DataTable({
                responsive: true
            });

            $.ajax({
                url: "http://localhost:8888/php-crud-api/api.php/records/"+tableName,
                method: "GET",
                success: function(answer){
                    //  console.log(data);
                    if (answer && answer.records) {
                        answer.records.map(function(el) {

                            t.row.add( [
                                el['carbrand_id'],
                                el['carbrand_name'],
                            ] ).draw( false );
                        });
                    }
                }//end success
            });//end ajax

        });//end ready
    </script>

<?php
require_once ("../lib/footer.php");
?>