$(function (){
    $("#change-password").submit(function(e){
        let curr_pass = $("#current_password").val();
        let new_pass = $('#new_password').val();
        let cnew_pass = $("#cnew_password").val();
        let check = 'Pass';
        if(curr_pass == ''){
            show_error('Current Password Is Required');
            check = 'Fail';
        }else if(new_pass == ''){
            show_error('New Password Field Is Required');
            check = 'Fail';
        }else if(cnew_pass == ''){
            show_error('Confirm New Password Is Required');
            check = 'Fail';
        }else if(new_pass != cnew_pass){
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
                    if(res != 'true'){
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
});
function show_error(error_message){
    $('#error_message').removeClass('d-none');
    $("#error_message").text(error_message);
}
function removeError(){
    $('#error_message').addClass('d-none');
    $("#error_message").text("");
}