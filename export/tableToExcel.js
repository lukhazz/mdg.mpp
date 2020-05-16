var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {

    //var blob = new Blob( [ csv ], { type: "text/csv"} );
    //if ( navigator.msSaveOrOpenBlob ) {
    //  // Works for Internet Explorer and Microsoft Edge
    //  navigator.msSaveOrOpenBlob( blob, "output.csv" );
    //}

    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()


function exceller() { //UI
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><?xml version="1.0" encoding="UTF-8" standalone="yes"?><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    table = document.getElementById("pharmacy");
    $('#toExcel').html($(table).html());
    var toExcel = $('#toExcel').html();
    var ctx = {
        worksheet: name || '',
        table: toExcel
    };
    $('#toExcel').remove();
    window.open(uri + base64(format(template, ctx)));
}

function ChemicalContentToExcel() {
    //we have to change the filename of attachment
    var id = cocoon.parameters["id"];
    var rohs = cocoon.parameters["rohs"];
    var response = cocoon.response; 
    response.setContentType("application/vnd.ms-excel; charset=utf-8");
    response.setHeader(
        "Content-Disposition",
        "attachment; filename=" + id + ".xls"
    ); 
  
    cocoon.sendPage(
     "chemicalcontent/excel/" + rohs + "/" + id + ".xls"
    );
}