var img_arr= ["plus","plus_1", "plus_2", "plus_3", "plus_4", "plus_5", "plus_6"];
var per_array= ["per","per_1", "per_2", "per_3", "per_4", "per_5", "per_6"];
var total_mark_array= ["tot_mark","tot_mark_1", "tot_mark_2", "tot_mark_3", "tot_mark_4", "tot_mark_5", "tot_mark_6"];
var obt_mark_array= ["obt_marks","obt_marks_1", "obt_marks_2", "obt_marks_3", "obt_marks_4", "obt_marks_5", "obt_marks_6"];


var i = 1;
function Add_new() {

    if(i<6)
    {
        var img = document.getElementById(img_arr[i-1]);
        img.style.visibility = 'hidden';
    }
    if (i == 6) {
        
        return;

    }
    var img = document.getElementById(img_arr[i-1]);
    img.style.visibility = 'hidden';

    console.log(i);


    var Add = document.createElement("tr");
    Add.innerHTML = '<tr><td><input class="form-control" type="text" name="qualification[]" placeholder="" required> </input></td>    <td><input class="form-control" type="text" name="university[]" placeholder="" required> </input></td><td><input class="form-control" type="text" name="passing_year[]"  placeholder="YYYY" required> </input></td><td><input id="'+total_mark_array[i]+'" class="form-control" type="text" name="total_marks[]" placeholder="" required> </input></td><td><input id="'+obt_mark_array[i]+'" class="form-control" type="text" name="obt_marks[]" placeholder="" onchange="calc_Per()" required> </input></td><td><input id="'+per_array[i]+'" class="form-control" type="text" name="percentage[]" placeholder="" required> </input></td><td><img id="'+img_arr[i]+'" src="inc/icon.png" width="20px" onclick="Add_new()" /></td></tr>';
    document.getElementById("row_id").appendChild(Add);               // Append <button> to <body>
    i++;



}