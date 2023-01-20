$(function (){
    // Auth Page
    $('#formAuthentication').submit(function(e){
        var email = $('#email').val();
        var password = $('#password').val();
        let first_number = parseInt($("#first_number").text());
        let last_number = parseInt($("#second_number").text());
        let check = 'Pass';
        let answer = parseInt($('#answer').val());
        let total = first_number + last_number;
        if(email === ''){
            show_error('Username is Required');
            check = 'Fail';
        }else if(password === ''){
            show_error('Password is Required');
            check = 'Fail';
        }else if(answer === ''){
            show_error('Answer is Required');
            check = 'Fail';
        }else if(answer !== total){
            show_error('Invalid Answer To The Question');
            check = 'Fail';
        }
        if(check === 'Fail'){
            e.preventDefault();
        }else{
            removeError();
        }
    });
    // Dashboard Page
    $("#change-password").submit(function(e){
        let curr_pass = $("#current_password").val();
        let new_pass = $('#new_password').val();
        let cnew_pass = $("#cnew_password").val();
        let check = 'Pass';
        if(curr_pass === ''){
            show_error('Current Password Is Required');
            check = 'Fail';
        }else if(new_pass === ''){
            show_error('New Password Field Is Required');
            check = 'Fail';
        }else if(cnew_pass === ''){
            show_error('Confirm New Password Is Required');
            check = 'Fail';
        }else if(new_pass !== cnew_pass){
            show_error('New and Confirm New Password Not Matched');
            check = 'Fail';
        }else{
            $.ajax({
                url : base + 'service/checkPassword',
                type : 'GET',
                data : { curr_pass : curr_pass },
                dataType : "json",
                async : false,
                success : function (res) {
                    if(res !== 'true'){
                        show_error(res);
                        check = 'Fail';
                    }
                }
            });
        }
        if(check == 'Fail'){
            e.preventDefault();
        }else{
            removeError();
        }
    });
    $('#add_cash').click(function (){
        let new_cash = parseInt($('#add_cash_val').val());
        if(new_cash == ''){
            show_error('Cash Field Cannot Be Empty');
        }else if(new_cash < 1){
            show_error('Cash cannot be in Negative of less than 1');
        }else {
            $.ajax({
                url: base + 'service/addCash',
                type: 'POST',
                data: {new_cash: new_cash},
                dataType: "json",
                async: false,
                success: function (res) {
                    if (res == 'true') {
                        location.reload();
                    }

                }
            });
        }
    })
});
function show_error(error_message){
    $('#error_div').removeClass('d-none');
    $("#error_message").text(error_message);
}
function removeError(){
    $('#error_div').addClass('d-none');
    $("#error_message").text("");
}
function cash_pop_up(){
    return $("#modal_btn").click();
}