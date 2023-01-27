$(function () {
    // Auth Page
    $('#formAuthentication').submit(function (e) {
        var email = $('#email').val();
        var password = $('#password').val();
        let first_number = parseInt($("#first_number").text());
        let last_number = parseInt($("#second_number").text());
        let check = 'Pass';
        let answer = parseInt($('#answer').val());
        let total = first_number + last_number;
        if (email === '') {
            show_error('Username is Required');
            check = 'Fail';
        } else if (password === '') {
            show_error('Password is Required');
            check = 'Fail';
        } else if (answer === '') {
            show_error('Answer is Required');
            check = 'Fail';
        } else if (answer !== total) {
            show_error('Invalid Answer To The Question');
            check = 'Fail';
        }
        if (check === 'Fail') {
            e.preventDefault();
        } else {
            removeError();
        }
    });
    // Dashboard Page
    $("#change-password").submit(function (e) {
        let curr_pass = $("#current_password").val();
        let new_pass = $('#new_password').val();
        let cnew_pass = $("#cnew_password").val();
        let check = 'Pass';
        if (curr_pass === '') {
            show_error('Current Password Is Required');
            check = 'Fail';
        } else if (new_pass === '') {
            show_error('New Password Field Is Required');
            check = 'Fail';
        } else if (cnew_pass === '') {
            show_error('Confirm New Password Is Required');
            check = 'Fail';
        } else if (new_pass !== cnew_pass) {
            show_error('New and Confirm New Password Not Matched');
            check = 'Fail';
        } else {
            $.ajax({
                url: base + 'service/checkPassword',
                type: 'GET',
                data: { curr_pass: curr_pass },
                dataType: "json",
                async: false,
                success: function (res) {
                    if (res !== 'true') {
                        show_error(res);
                        check = 'Fail';
                    }
                }
            });
        }
        if (check == 'Fail') {
            e.preventDefault();
        } else {
            removeError();
        }
    });
    $('#add_cash').click(function () {
        let new_cash = parseInt($('#add_cash_val').val());
        if (new_cash == '') {
            show_error('Cash Field Cannot Be Empty');
        } else if (new_cash < 1) {
            show_error('Cash cannot be in Negative of less than 1');
        } else {
            $.ajax({
                url: base + 'service/addCash',
                type: 'POST',
                data: { new_cash: new_cash },
                dataType: "json",
                async: false,
                success: function (res) {
                    if (res == 'true') {
                        location.reload();
                    }

                }
            });
        }
    });
    $('#add-expense-type').submit(function (e) {
        let expense_type = $('#expense_type').val();
        if (expense_type == '') {
            show_error('Expense Type Field Can not be empty');
            e.preventDefault();
        } else {
            remoeveError();
        }
    });
    $("#add-category").submit(function(e){
        let name = $('#name').val();
        if (name == '') {
            show_error('Category Name Field Cannot Be Empty');
            e.preventDefault();
        } else {
            remoeveError();
        }
    });
    $("#add-brand").submit(function(e){
        let name = $('#name').val();
        if (name == '') {
            show_error('Brand Name Field Cannot Be Empty');
            e.preventDefault();
        } else {
            remoeveError();
        }
    });
    $('#add-unit').submit(function(e){
        let cat_id = $('#cat_id').val();
        let name = $('#name').val();
        let qty = $('#qty').val();
        let check = 'Pass';
        if (cat_id == '') {
            show_error('Please Select Category From Dropdown');
            check = 'Fail';
        }else if(name == ''){
            show_error('Unit Name Field Cannot Be Empty');
            check = 'Fail';
        }else if(qty == ''){
            show_error('Please Enter Quantity for The Unit');
            check = 'Fail';
        }
        if (check == 'Fail') {
            e.preventDefault();
        } else {
            removeError();
        }
    });
    $('body').on('click', '.del_expense_type', function () {
        let tr = $(this).closest('tr');
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: base + 'service/delExpenseType',
                    type: 'POST',
                    data: { id: id },
                    dataType: "json",
                    async: false,
                    success: function (res) {
                        if(res == 'true'){
                            tr.remove();
                        }
                    }
                });
            }
        });
    });
    $('body').on('click', '.del_category', function () {
        let tr = $(this).closest('tr');
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: base + 'service/delCategory',
                    type: 'POST',
                    data: { id: id },
                    dataType: "json",
                    async: false,
                    success: function (res) {
                        if(res == 'true'){
                            tr.remove();
                            location.reload();
                        }
                    }
                });
            }
        });
    });
    $('body').on('click', '.del_unit', function () {
        let tr = $(this).closest('tr');
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: base + 'service/delUnit',
                    type: 'POST',
                    data: { id: id },
                    dataType: "json",
                    async: false,
                    success: function (res) {
                        if(res == 'true'){
                            tr.remove();
                            location.reload();
                        }
                    }
                });
            }
        });
    });
    $('body').on('click', '.del_brand', function () {
        let tr = $(this).closest('tr');
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-danger me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: base + 'service/delBrand',
                    type: 'POST',
                    data: { id: id },
                    dataType: "json",
                    async: false,
                    success: function (res) {
                        if(res == 'true'){
                            tr.remove();
                            location.reload();
                        }
                    }
                });
            }
        });
    });
    $('#cat_id').change(function(){
        let cat_id = $(this).val();
        $("#unit_id option").remove();
        $('#qty_in_unit').val('');
        $('#add_qty').val('');
        $("#add_qty").attr('readonly','readonly');
        $('#total_qty').val("");
        $('#purchase_price').val("");
        $('#sale_price').val("");
        $('#purchase_price_per_qty').val("");
        $('#sale_price_per_qty').val("");
        let option;
        $.ajax({
            url: base + 'service/getUnitsByCatId',
            type: 'GET',
            data: { id: cat_id },
            dataType: "json",
            async: false,
            success: function (res) {
                var strJSON = JSON.stringify(res);
                var data = JSON.parse(strJSON);
                let i;
                option += "<option value=''>Select Unit</option>";
                option += "<option value='single'>Single (1)</option>";
                if(res != 'false'){
                    for(i=0; i<data.length; i++){
                        option += "<option value='"+ data[i].id +"'>"+ data[i].name +" ("+ data[i].qty +")</option>";
                    }
                }
                $("#unit_id").append(option);
            }
        });
    });
    $("#unit_id").change(function (){
        let unit_id = $(this).val();
        $('#qty_in_unit').val('');
        $('#add_qty').val('');
        $("#add_qty").attr('readonly','readonly');
        $('#total_qty').val("");
        $('#purchase_price').val("");
        $('#sale_price').val("");
        $('#purchase_price_per_qty').val("");
        $('#sale_price_per_qty').val("");
        if(unit_id == 'single'){
            $('#add_qty').val('');
            $("#add_qty").removeAttr('readonly','readonly');
            $('#qty_in_unit').val(1);
        }else{
            $.ajax({
                url: base + 'service/getUnitQtyByUnitId',
                type: 'GET',
                data: { id: unit_id },
                dataType: "json",
                async: false,
                success: function (res) {
                    $('#add_qty').val('');
                    $("#add_qty").removeAttr('readonly','readonly');
                    $('#qty_in_unit').val(res);
                }
            });
        }
    });
    $("body").on('change keypress keyup','#add_qty', function(){
        $('#purchase_price').val("");
        $('#sale_price').val("");
        $('#purchase_price_per_qty').val("");
        $('#sale_price_per_qty').val("");
        let qty_in_unit = parseInt($("#qty_in_unit").val());
        let add_qty = parseInt($('#add_qty').val());
        let new_qty = qty_in_unit * add_qty;
        $('#total_qty').val(new_qty);
    });
    $("body").on('change keypress keyup','#purchase_price', function(){
        let purchase_price = $(this).val();
        let qty_in_unit = $("#qty_in_unit").val();
        let sale_price = $('#sale_price').val();
        let check;
        if(sale_price != ''){
            if(parseInt(purchase_price) >= parseInt(sale_price)){
                show_error('Purchase Price Cannot Be Greater Than Sale Price');
                check = 'Fail';
            }else{
                check = 'Pass';
            }
        }else {
            check = 'Pass';
        }
        if(check == 'Pass'){
            removeError();
            let purchase_price_per_qty = parseInt(purchase_price) / parseInt(qty_in_unit);
            $('#purchase_price_per_qty').val(purchase_price_per_qty.toFixed(2));
        }else{
            $('#purchase_price').val("");
            $('#purchase_price_per_qty').val("");
        }
    });
    $("body").on('change keypress keyup','#sale_price', function(){
        let sale_price = $(this).val();
        let qty_in_unit = $("#qty_in_unit").val();

        let sale_price_per_qty = parseInt(sale_price) / parseInt(qty_in_unit);
        $('#sale_price_per_qty').val(sale_price_per_qty.toFixed(2));

    });
});
function show_error(error_message) {
    $('#error_div').removeClass('d-none');
    $("#error_message").text(error_message);
}
function removeError() {
    $('#error_div').addClass('d-none');
    $("#error_message").text("");
}
function cash_pop_up() {
    return $("#modal_btn").click();
}