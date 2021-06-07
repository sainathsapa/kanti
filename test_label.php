<?php
require('inc/nav.php');
?>
<script>var prev_data;
$('#special_radios input').change(function(){
    var me = $(this);
    //running function for check
  $('#log').html('<p>firing event for check: '+ me.attr('id') +'</p>');
    if(prev_data)
      uncheck_method(prev_data);  
  prev_data = me;
});

//@param obj = jquery raidio object
function uncheck_method(obj){
    $('#log').append('<p>firing event for uncheck: '+obj.attr('id')+'</p>');
    obj.prop('checked', false) 
    //console.log($('#special_radios input:checked'));
}
</script>

<input type="radio" name="zz" id="5"/>
<div id="special_radios">
   <input type="radio" name="rx" id="1"/>
   <input type="radio" name="ry"  id="2" />
   <input type="radio" name="rz" id="3"/>
   <input type="radio" name="ra"  id="4"/>
</div>
<div id="log"></div>