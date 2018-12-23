function createDynamicTable(tableName, columns, pageWrapperId) {
  var table = document.createElement('table');
  table.setAttribute('id', 'table-'+ tableName);
  table.setAttribute('class', 'table table-striped table-bordered');

  document.getElementById(pageWrapperId).appendChild(table);
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
  document.getElementById(pageWrapperId).appendChild(table);

  var t = $('#table-'+ tableName).DataTable({
      responsive: true
  });
  var url = "http://localhost:8888/php-crud-api/api.php/records/"+tableName;
  // var url = "http://php-crud-api.loc/api.php/records/"+tableName;

  $.ajax({
      url: url,
      method: "GET",
      success: function(answer){
          if (answer && answer.records) {
              answer.records.map(function(el) {
                  var row = [];
                  for (var i = 0; i < columns.length; i++){
                      row.push(el[columns[i].id])
                  }
                  t.row.add(row).draw( false );
              });
          }
      }//end success
  });//end ajax
}