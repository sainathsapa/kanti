<b> Upload Passport Sized Photo </b>
<img class="image img col-md-2 form-control" id="custImage" src="#" alt="Upload Photo" type="hidden" />

<input type='file' name="imageCust" onchange="addImage(this);" />
<img class="image img col-md-2 form-control" id="custSign" src="#" alt="Upload Photo" type="hidden" />

<input type='file' name="signCust" onchange="addSign(this);" />


function addImage(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#custImage')
.attr('src', e.target.result)
.width(150)
.height(200);
};

reader.readAsDataURL(input.files[0]);
}
}

function addSign(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#custSign')
.attr('src', e.target.result)
.width(200)
.height(50);
};

reader.readAsDataURL(input.files[0]);
}
}