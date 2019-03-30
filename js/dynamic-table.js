function createDynamicTable(tableName, columns, pageWrapperId) {
  var table = document.createElement('table');
  table.setAttribute('id', 'table-'+ tableName);
  table.setAttribute('class', 'table table-striped table-bordered');


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
    var th = document.createElement('th');
    th.innerText = 'operations';//название третьей колонки в текстовом виде
    row.appendChild(th);
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
              answer.records.map(function(el) {//это строчка из БД - единица данных, превращенная в объект. Результат выполнения анонимной функции с аргументом el прибалятся к каждому элементу массива answer
                  var row = [];//массив ячеек, которые нужны для строки в ней данные из ответа ajax
                  for (var i = 0; i < columns.length; i++){
                      row.push(el[columns[i].id])//в columns у нас поля, писанные в элементе
                  }
                  row.push('<a href="'+tableName+'_view.php?id='+ el[columns[0].id] +'">Просмотр</a>');// так как самый первый элемент - это примари кей carbrand_id для этой таблицы
                  t.row.add(row).draw( false );//передаем массив ячеек получаемые по url
              });
          }
      }//end success
  });//end ajax
}