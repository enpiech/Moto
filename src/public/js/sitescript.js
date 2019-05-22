$(document).ready(function() {
    $('#submit').click(function(e) {
        var emailPat = /^[a-zA-Z]\w*@(gmail\.com|yahoo\.com)$/;
        var phonePat = /^0+[0-9]{9,11}$/;
        var phoneParam = $('#phone').val();
        var emailParam = $('#email').val();

        if (!emailPat.test(emailParam)) {
            alert("Email không đúng định dạng");
            e.preventDefault();
            return;
        }

        if (!phonePat.test(phoneParam)) {
            alert("Số điện thoại không đúng định dạng!");
            e.preventDefault();
        }


    })
})
