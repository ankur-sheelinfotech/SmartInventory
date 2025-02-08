jQuery.noConflict();
(function ($) {
    window.handleFileChange = function (inputElement, imgElementId, errorElementId, maxFileSize, maxWidth, maxHeight) { // Make function global
        var file = inputElement.files[0];
        var imageId = $("#" + imgElementId);
        var errorMsg = $("#" + errorElementId);

        if (file) {
            var fileType = file.type;
            var validTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
            if (validTypes.indexOf(fileType) === -1) {
                errorMsg.text("Please select a valid image file (JPEG, PNG, GIF, WEBP).").show();
                imageId.hide();
                inputElement.value = "";
            } else if (file.size > maxFileSize) {
                errorMsg.text("File size exceeds the 2MB limit.").show();
                imageId.hide();
                inputElement.value = "";
            } else {
                var img = new Image();
                var reader = new FileReader();
                reader.onload = function (e) {
                    img.onload = function () {
                        if (img.width !== maxWidth || img.height !== maxHeight) {
                            errorMsg.text("Image dimensions must be within the allowed size range " + maxWidth + "x" + maxHeight + "px.").show();
                            imageId.hide();
                            inputElement.value = "";
                        } else {
                            imageId.attr("src", e.target.result).css("display", "block");
                            errorMsg.hide();
                        }
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    };
})(jQuery);
