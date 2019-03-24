jQuery(document).ready(function( $ ) {

  $.extend($.validator.messages, {
      required: "Required Field",
      remote: "Please fix this field.",
      email: "Please enter a valid email address.",
      url: "Please enter a valid URL.",
      date: "Please enter a valid date.",
      dateISO: "Please enter a valid date (ISO).",
      number: "Please enter a valid number.",
      digits: "Please enter only digits.",
      creditcard: "Please enter a valid credit card number.",
      equalTo: "Please enter the same value again.",
      accept: "Invalid file Format",
      maxlength: jQuery.validator.format("Max of {0} characters only."),
      minlength: jQuery.validator.format("Please enter at least {0} characters."),
      rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
      range: jQuery.validator.format("Please enter a value between {0} and {1}."),
      max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
      min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
  });

  jQuery.validator.addMethod("alphaonly", function(value, element) {
    return this.optional(element) || /^([a-zA-Z]+\s)*[a-zA-Z]+$/i.test(value);
  }, "Alpha Characters Only");

  jQuery.validator.addMethod("alphanumonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
  }, "AlphaNumeric Characters Only");

  jQuery.validator.addMethod("uploadSize", function (val, element) {

      var size = element.files[0].size;

       if (size > 2097152){
            return false;
       } else {
           return true;
       }

  }, "Upload is More than 2MB");



  $('#reg-form').validate({
      errorClass: "is-invalid",
      rules : {
        "lname": {
          alphaonly: true
        },
        "fname": {
          alphaonly: true
        },
        "nric": {
          alphanumonly: true
        },
        "emailaddress": {
          email: true
        },
        "mobilenumber": {
          digits: true
        },
        "address": {
          maxlength: 250
        },
        "zipcode": {
          alphanumonly: true
        },
        "imgup": {
          required: true,
          accept: "image/jpg,image/jpeg,image/png",
          //extension: "jpg|jpeg|png",
          uploadSize: true
        }
      },
      submitHandler: function(form) {

      form.submit();

    }
  });
});

function preview_image(event) {

  var reader = new FileReader();

  reader.onload = function() {
    var output = document.getElementById('output_image');
    output.src = reader.result;
    jQuery('img-preview').css("background-image", reader.result );
  }

  reader.readAsDataURL(event.files[0]);
}
