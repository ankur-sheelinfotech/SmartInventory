jQuery.noConflict();
jQuery(document).ready(function ($) {
  var data = JSON.parse(sessionStorage.getItem('responseData'));
  if (data) {
    // Fill in the form fields with the data
    if (data['status'] == "success") {
      $('#name').val(data.record.author_name);
      $('#description').val(data.record.author_description);
      $('#author_image').attr('src', '../assets/uploads/' + data.record.author_image);
      $('#author_image').css('display', 'block');
      $('#whatsapp').val(data.record.whatsapp_url);
      $('#facebook').val(data.record.facebook_url);
      $('#linkedin').val(data.record.linkedin_url);
      $('#instagram').val(data.record.instagram_ulr);
      $('#twitter').val(data.record.twitter_url);
      $('#authorId').val(data.record.id);
      $('#btnSave').text("Update");
      $('#btnSave').attr('name', "btnUpdate");
      $('#btnSave').attr('id', "btnUpdate");
      $('#first_name').focus();
    } else {
      alert(data.message);
    }
    sessionStorage.removeItem('responseData');
  }
  // loadForm();
  // function loadForm() {
  //   $.ajax({
  //     url: "../controller/controllerAuthorProfile.php",
  //     type: "post",
  //     data: { action: "load" },
  //     success: function (response) {
  //       const data = JSON.parse(response);
  //       if (data.status === "success" && data.record.length > 0) {
  //         // If records are available, fill the form fields
  //         const company = data.record[0]; // Assuming you're just showing the first record
  //         $("#compid").val(company.id);
  //         $("#owner_name").val(company.owner_name);
  //         $("#company_name").val(company.company_name);
  //         $("#browser_title").val(company.browser_title);
  //         $("#meta_description").val(company.meta_description);
  //         $("#meta_keywords").val(company.meta_keywords);
  //         $("#gst_number").val(company.gst_number);
  //         $("#address").val(company.address);
  //         $("#email").val(company.email);
  //         $("#contact_number").val(company.contact_number);
  //         $("#website").val(company.website_url);
  //         $("#whatsapp").val(company.whatsapp_url);
  //         $("#facebook").val(company.facebook_url);
  //         $("#linkedin").val(company.linkedin_url);
  //         $("#instagram").val(company.instagram_ulr);
  //         $("#twitter").val(company.twitter_url);
  //         // If you have images, show them in the preview
  //         if (company.company_logo) {
  //           $("#companyLogo")
  //             .attr("src", "../assets/uploads/" + company.company_logo)
  //             .show();
  //         }
  //         if (company.company_icon) {
  //           $("#companyIcon")
  //             .attr("src", "../assets/uploads/" + company.company_icon)
  //             .show();
  //         }
  //         $("#btnSave").text("Update");
  //         $("#btnSave").attr("name", "btnUpdate");
  //         $("#btnSave").attr("id", "btnUpdate");
  //       }
  //     },
  //   });
  // }
  function restrictInputToLettersAndSpaces(selector) {
    $(selector).on("input", function (e) {
      // Remove any character that is not a letter or space
      this.value = this.value.replace(/[^a-zA-Z\s.,!?;:()'"-]/g, "");
    });
  }
  restrictInputToLettersAndSpaces("#name");
  restrictInputToLettersAndSpaces("#description");

  // function validateEmail() {
  //   const emailField = $("#email");
  //   const email = emailField.val();
  //   const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Basic email regex pattern

  //   if (email && !emailRegex.test(email)) {
  //     emailField.css("border-color", "red"); // Invalid email - red border
  //     $("#email_error").show(); // Show error message
  //     return false; // Invalid email
  //   } else {
  //     emailField.css("border-color", "green"); // Valid email - green border
  //     $("#email_error").hide(); // Hide error message
  //     return true; // Valid email
  //   }
  // }

  // $("#email").on("input", function () {
  //   validateEmail();
  // });

  function validateSocialMediaLink(selector) {
    $(selector).on("input", function (e) {
      // Validate URL format for social media links
      const urlRegex =
        /^(https?:\/\/)?(www\.)?(wa\.me|facebook\.com|linkedin\.com\/in|instagram\.com|twitter\.com|[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})\/?[a-zA-Z0-9_]*$/;
      if (this.value && !urlRegex.test(this.value)) {
        $(this).css("border-color", "red"); // Change border color to red on invalid input
      } else {
        $(this).css("border-color", "green"); // Change border color to green on valid input
      }
    });
  }

  function validateForm() {
    // Check if all social media and website fields are valid before submitting the form
    let isValid = true;
    // Check each input field for validation
    const fields = [
      "#whatsapp",
      "#facebook",
      "#linkedin",
      "#instagram",
      "#twitter",
      "#website",
    ];

    fields.forEach(function (selector) {
      const value = $(selector).val();
      const urlRegex =
        /^(https?:\/\/)?(www\.)?(wa\.me|facebook\.com|linkedin\.com\/in|instagram\.com|twitter\.com|[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})\/?[a-zA-Z0-9_]*$/;

      // If the input is invalid, mark it as invalid and stop submission
      if (value && !urlRegex.test(value)) {
        $(selector).css("border-color", "red");
        isValid = false; // Set isValid to false if any input is invalid
      }
    });

    // Prevent form submission if validation failed
    if (!isValid) {
      alert("Please correct the invalid URLs before submitting.");
      return false; // Prevent form submission
    }
    return true; // Allow form submission
  }

  validateSocialMediaLink("#website");
  validateSocialMediaLink("#whatsapp");
  validateSocialMediaLink("#facebook");
  validateSocialMediaLink("#linkedin");
  validateSocialMediaLink("#instagram");
  validateSocialMediaLink("#twitter");

  // $("#contact_number").on("input", function () {
  //   var inputValue = this.value;
  //   // Remove any non-numeric characters
  //   this.value = inputValue.replace(/[^0-9]/g, "");
  //   // Check if the length is greater than 10 digits
  //   if (this.value.length > 10) {
  //     this.value = this.value.substring(0, 10); // Trim to 10 digits
  //   }
  //   // Check if the length is exactly 10 digits
  //   if (this.value.length !== 10) {
  //     $("#contact_error").show(); // Show error message
  //   } else {
  //     $("#contact_error").hide(); // Hide error message if valid
  //   }
  // });

  var maxFileSize = 2 * 1024 * 1024;
  var maxWidth = 100; // Max allowed width in pixels
  var maxHeight = 100; // Max allowed height in pixels

  // Function to handle file input changes
  function handleFileChange(inputElement, imgElementId, errorElementId) {
    var file = inputElement.files[0];
    var imageId = $("#" + imgElementId);
    var errorMsg = $("#" + errorElementId);

    if (file) {
      var fileType = file.type; // Get the MIME type of the file
      var validTypes = ["image/jpeg", "image/png", "image/gif"]; // Allowed MIME types

      // Check if the file type is valid
      if (validTypes.indexOf(fileType) === -1) {
        errorMsg
          .text("Please select a valid image file (JPEG, PNG, GIF).")
          .show();
        imageId.hide();
        inputElement.value = ""; // Clear the input
      }
      // Check if the file size is within the allowed limit (2MB in this case)
      else if (file.size > maxFileSize) {
        errorMsg.text("File size exceeds the 2MB limit.").show();
        imageId.hide();
        inputElement.value = ""; // Clear the input
      } else {
        // Create an Image object to check the image's dimensions
        var img = new Image();
        var reader = new FileReader();
        reader.onload = function (e) {
          img.onload = function () {
            // Check if the image's dimensions are within the allowed size
            if (img.width > maxWidth || img.height > maxHeight) {
              errorMsg
                .text(
                  "Image dimensions should not exceed " +
                  maxWidth +
                  "x" +
                  maxHeight +
                  "px."
                )
                .show();
              imageId.hide();
              inputElement.value = ""; // Clear the input
            } else {
              imageId.attr("src", e.target.result);
              imageId.css("display", "block"); // Show the image
              errorMsg.hide(); // Hide error message if valid
            }
          };
          img.src = e.target.result; // Set the image source to the file
        };

        reader.readAsDataURL(file); // Read the selected file as a data URL
      }
    }
  }

  // Attach change event to file inputs
  $("#authorImage").on("change", function () {
    handleFileChange(this, "author_image", "author_image_error");
  });

  // Attach change event to file inputs
  $("#authorprofile").on("click", "#btnSave", function (e) {
    e.preventDefault();
    let isValid = true;
    $("input[required]").each(function () {
      if ($(this).val().trim() === "") {
        isValid = false;
        $(this).css("border-color", "red"); // Highlight invalid fields with red border
      } else {
        $(this).css("border-color", ""); // Remove the red border if valid
      }
    });
    if (!isValid) {
      alert("Please fill in all required fields.");
      return;
    }
    if (!validateForm()) {
      // alert("Please correct the invalid URLs before submitting.");
      return;
    }
    var formDate = new FormData($("#authorprofile")[0]);
    formDate.append("action", "submit");
    $.ajax({
      url: "../controller/controllerAuthorProfile.php",
      type: "post",
      data: formDate,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        // var data = JSON.parse(result);
        if (result.status === "success") {
          // Apply text-success class for success message
          $("#msg").removeClass("text-danger").addClass("text-success");
          $("#msg").html(result.message);
          setTimeout(function () {
            $("#msg").html(""); // Clear the message
            $("#authorprofile")[0].reset();
            $("#author_image").css("display", "none");
            // loadForm();
          }, 3000);
        } else {
          // Apply text-danger class for error message
          $("#msg").removeClass("text-success").addClass("text-danger");
          $("#msg").html(result.message);
        }
      },
    });
  });

  $("#authorprofile").on("click", "#btnUpdate", function (e) {
    e.preventDefault();
    let isValid = true;
    $("input[required]").each(function () {
      // Skip file inputs if images are already present or if the user has selected a new file
      if ($(this).attr("type") === "file") {
        const inputId = $(this).attr("id");

        if (this.files.length === 0) {
          // Check if the user has not selected a new file
          if (inputId === "authorImage" && $("#author_image").attr("src") !== "") {
            // If the companyLogo already has an image, don't mark it as invalid
            $(this).css("border-color", "");
          } else {
            // If no file is selected and no existing image, mark as invalid
            isValid = false;
            $(this).css("border-color", "red");
          }
        } else {
          // File is selected, no border color change needed
          $(this).css("border-color", "");
        }
      } else {
        // For other required fields (text fields), validate normally
        if ($(this).val().trim() === "") {
          isValid = false;
          $(this).css("border-color", "red");
        } else {
          $(this).css("border-color", "");
        }
      }
    });
    // $("input[required]").each(function () {
    //   if ($(this).val().trim() === "") {
    //     isValid = false;
    //     $(this).css("border-color", "red"); // Highlight invalid fields with red border
    //   } else {
    //     $(this).css("border-color", ""); // Remove the red border if valid
    //   }
    // });
    if (!isValid) {
      alert("Please fill in all required fields.");
      return;
    }
    if (!validateForm()) {
      // alert("Please correct the invalid URLs before submitting.");
      return;
    }
    // if (!isValid) {
    //   alert("Please fill in all required fields.");
    //   return;
    // }
    // if (!validateEmail()) {
    //   alert("Please correct the invalid email address.");
    //   return;
    // }
    // if (!validateForm()) {
    //   // alert("Please correct the invalid URLs before submitting.");
    //   return;
    // }
    var formDate = new FormData($("#authorprofile")[0]);
    formDate.append("action", "update");
    var authorImage = $("#authorImage")[0].files[0];
    if (authorImage) {
      formDate.append("authorImage", authorImage); // Append the selected postImage file
    } else {
      // If no new file is selected, you can optionally append the old file name here
      var oldAuthorImage = $("#author_image").attr("src").split("/").pop();
      formDate.append("authorImage", oldAuthorImage); // Append the old post image name
    }
    $.ajax({
      url: "../controller/controllerAuthorProfile.php",
      type: "post",
      data: formDate,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        if (result.status === "success") {
          // Apply text-success class for success message
          $("#msg").removeClass("text-danger").addClass("text-success");
          $("#msg").html(result.message);
          setTimeout(function () {
            $("#msg").html(""); // Clear the message
            window.location.href = 'viewManageAuthor.php';
            // loadForm();
          }, 1000);
        } else {
          // Apply text-danger class for error message
          $("#msg").removeClass("text-success").addClass("text-danger");
          $("#msg").html(result.message);
        }
      },
    });
  });
});
