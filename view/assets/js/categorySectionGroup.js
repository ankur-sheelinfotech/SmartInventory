
jQuery.noConflict();
jQuery(document).ready(function ($) {
    var action = "load";
    function load_table() {
        $.ajax({
            url: "../controller/controllerCategorySectionGroup.php",
            type: "post",
            data: { action: action },// Pass as an object with key-value pair
            success: function (result) {
                var data = JSON.parse(result);
                if (data['status'] === "success") {
                    // Insert the HTML table into the DOM
                    $("#tableContainer").html(data['table']);  // Assuming you have a div with id 'tableContainer'
                } else {
                    // Handle error if needed
                    console.error(result.message);
                }
            }
        });
    }
    load_table();

    $('#category').on('change', function() {
        var value = $('#category').val();  // Get the value of #category
        if (value === 'normal') {  // Check if selected value is 'normal'
            $('#duration').val("none").trigger('change');  // Set the value of the duration dropdown to 'None'
            $('#duration_limit').val(0);  // Set the duration limit to 0
        }
    });
    

    $("#categorySection").on('click', '#btnSave', function (e) {
        e.preventDefault();
        var isValid = true;
        var category = $("#category").val();
        var duration = $("#duration").val();
        var duration_limit = $("#duration_limit").val();

        // Clear previous error messages
        $("#category_error").text("");
        $("#duration_error").text("");
        $("#duration_limit_error").text("");

        // Validate Category
        if (category === "" || category === null) {
            isValid = false;
            $("#category_error").text("Please select a category.");
        }

        // Validate Duration
        if (duration === "" || duration === null) {
            isValid = false;
            $("#duration_error").text("Please select a duration type.");
        }

        // Validate Duration Limit
        if (duration_limit === "" || duration_limit < 0) {
            isValid = false;
            $("#duration_limit_error").text("Please enter a valid duration limit.");
        }

        // If all fields are valid, submit the form
        if (isValid) {
            // var formData = new FormData(this);
            var formData = new FormData($('#categorySection')[0]);
            formData.append("action", "submit");
            $.ajax({
                url: "../controller/controllerCategorySectionGroup.php",
                type: "post",
                data: formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if (result.status === "success") {
                        // Apply text-success class for success message
                        $("#msg").removeClass('text-danger').addClass('text-success');
                        $("#msg").html(result.message);
                        $('#category').val('');  // Set to a default or updated category
                        $('#duration').val('');  // Set to a default or updated duration
                        setTimeout(function () {
                            $("#msg").html(''); // Clear the message
                            $("#categorySection")[0].reset();
                            $('#category').trigger('change');
                            $('#duration').trigger('change');
                            load_table();
                        }, 1000);
                    } else {
                        // Apply text-danger class for error message
                        $("#msg").removeClass('text-success').addClass('text-danger');
                        $("#msg").html(result.message);
                        setTimeout(function () {
                            $("#msg").html(''); // Clear the message
                            $("#categorySection")[0].reset();
                            $('#category').trigger('change');
                            $('#duration').trigger('change');
                            load_table();
                        }, 1000);
                      
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX Error:', status, error);
                    // Apply text-danger class for error message
                    $("#msg").removeClass('text-success').addClass('text-danger');
                    $("#msg").html("Request failed. Please try again.");
                    setTimeout(function () {
                        $("#msg").html(''); // Clear the message
                        // $("#viewUserProfile")[0].reset();
                    }, 1000);
                }
            });
        }
    });

    $("#categorySection").on('click', '#btnUpdate', function (e) {
        e.preventDefault();
        // var formData = new FormData(this);
        var formData = new FormData($('#categorySection')[0]);
        formData.append("action", "update");
        $.ajax({
            url: "../controller/controllerCategorySectionGroup.php",
            type: "post",
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                if (result.status === "success") {
                    // Apply text-success class for success message
                    $("#msg").removeClass('text-danger').addClass('text-success');
                    $("#msg").html(result.message);
                    $('#desgid').val(""); // Assuming you have a dropdown or input field for status
                    $('#btnUpdate').text("Save");
                    $('#btnUpdate').attr('name', "btnSave");
                    $('#btnUpdate').attr('id', "btnSave");
                    $('#category').val('');  // Set to a default or updated category
                    $('#duration').val('');  // Set to a default or updated duration
                    setTimeout(function () {
                        $("#msg").html(''); // Clear the message
                        $("#categorySection")[0].reset();
                        $('#category').trigger('change');
                        $('#duration').trigger('change');
                        load_table();
                    }, 1000);
                } else {
                    // Apply text-danger class for error message
                    $("#msg").removeClass('text-success').addClass('text-danger');
                    // Handling error in a user-friendly way
                    let errorMessage = "An error occurred. Please try again later.";
                    // Display the error message
                    $("#msg").html(errorMessage);
                }
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', status, error);
                // Apply text-danger class for error message
                $("#msg").removeClass('text-success').addClass('text-danger');
                $("#msg").html("Request failed. Please try again.");
                setTimeout(function () {
                    $("#msg").html(''); // Clear the message
                    // $("#viewUserProfile")[0].reset();
                }, 1000);
            }
        });
    });

    $(document).on('click', '#btnDelete', function () {
        var id = $(this).data('value');
        if (confirm("Are you sure you want to delete this category?")) {
            $.ajax({
                url: '../controller/controllerCategorySectionGroup.php',
                method: 'post',
                data: { 'id': id, 'action': 'delete' },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data['status'] == "success") {
                        alert("Record deleted successfully");
                        load_table();
                    }
                }
            });
        }
    });

    $(document).on('click', '#btnEdit', function () {
        var id = $(this).data('value');
        $.ajax({
            url: '../controller/controllerCategorySectionGroup.php',
            method: 'post',
            data: { 'id': id, 'action': 'show' },
            success: function (response) {
                var data = JSON.parse(response);
                if (data['status'] == "success") {
                    $('#category').val(data.record.category).trigger('change'); // Trigger change to update select2 or other enhancements
                    // Set the duration type value in the select dropdown
                    $('#duration').val(data.record.duration_type).trigger('change');  // Populate duration select
                    $('#duration_limit').val(data.record.duration_limit);
                    $('#catid').val(data.record.id); // Assuming you have a dropdown or input field for status
                    $('#btnSave').text("Update");
                    $('#btnSave').attr('name', "btnUpdate");
                    $('#btnSave').attr('id', "btnUpdate");
                } else {
                    alert(data.message);  // Display error message if no data found
                }
            }
        });
    });
});