$(document).ready(function(){
    var $phoneInput = $("#phoneInput"),
        $dateInput = $("#dateInput"),
        dateReg = /^\d{2}\.\d{2}.\d{4}$/,
        phoneReg = /^\+7 \(\d{3}\) \d{3}-\d{4}$/;
    $("#userForm").submit(function(e){
        var isOk = true;
        if (!dateReg.exec($dateInput.val())) {
            alert("Поле \"Дата рождения\" заполнено неверно. Убедитесь, что формат соответствует dd.mm.Y");
            isOk = false;
        }
        if (!phoneReg.exec($phoneInput.val())) {
            alert("Поле \"Телефон\" заполнено неверно. Убедитесь, что формат соответствует +7 (777) 777-7777");
            isOk = false;
        }
        //prevent yii from validating other fields and calling submit for the second time
        if (!isOk) {
            e.preventDefault();
            e.stopImmediatePropagation();
        }
        return isOk;
    });
});