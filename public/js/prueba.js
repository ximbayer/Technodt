function radioClicked(btn){
  var tbl,cell,row,rowIndex,cellIndex,tblID;
  cell = btn.parentNode;
  row= cell.parentNode;
  tbl=row.parentNode;
  while(tbl.nodeName!="TABLE")//this is incase the table has a body     tbl=tbl.parentNode;
  rowIndex = row.rowIndex; //starts at 0 so we will add 1 
  rowIndex++;
  cellIndex = cell.cellIndex; //starts at 0 so we will add 1 
  cellIndex++;
  tblID = tbl.id;
  alert("A radio button has been clicked in row " + rowIndex + " cell " +  cellIndex + " in table whos id is " + tblID);
}
