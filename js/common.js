var dataView = new Slick.Data.DataView();
var grid;

var data = [];
  var columns = [
    {id: "id", name: "id", field: "id", width: 50, sortable: true },
    {id: "name", name: "name", field: "name", width: 240, sortable: true },
    {id: "phone", name: "phone", field: "phone", width: 180, sortable: true },
  ];

  var options = {
    enableCellNavigation: true,
    enableColumnReorder: false
  };


setTimeout(function run() {
  show();
  setTimeout(run, 1000);
}, 1000);


function show(){
          $.ajax({
                     url: "./dao/get_data.php",
                    type: "GET",
		dataType: "html",
                   error: function(){
                },
             success: function(msg){
                data=JSON.parse(msg) 
                dataView.beginUpdate();
    		dataView.setItems(data);
    		dataView.endUpdate(); 
             }
    
	});  
}


document.addEventListener("DOMContentLoaded", function() {

    grid = new Slick.Grid("#container", dataView, columns, options);
    grid.setSelectionModel(new Slick.RowSelectionModel({selectActiveRow: false}));
    var columnpicker = new Slick.Controls.ColumnPicker(columns, grid, options);
  
    dataView.onRowCountChanged.subscribe(function (e, args) {
      grid.updateRowCount();
      grid.render();
    });

    dataView.onRowsChanged.subscribe(function (e, args) {
      grid.invalidateRows(args.rows);
      grid.render();
    });
   
});


