/*
 * ===================================================================
 * FORM VALIDATION
 * -------------------------------------------------------------------
 * This will be the JS file for all forms for this project
 * ===================================================================
 */

/** Set this to true if in debug mode  */
const debug = false;
const submitHandlerLogs = true;

// On Page Load
$(() => {

/*
 * ===================================================================
 * REGISTER FORMS
 * ===================================================================
 */

// Register Citizen - Step1-ContactNumber
$('#registerCznStep1ContactNoForm').validate({
    debug: debug,
    rules: {
        contactNumber: {
            required: true,
            minlength: 11
        }
    },
    messages: {
        contactNumber: {
            required: "Contact Number is required",
            minlength: "Input must be a valid contact number"
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Citizen - Step1-Email
$('#registerCznStep1EmailForm').validate({
    debug: debug,
   rules: {
       contactNumber: {
           required: true,
           email: true
       }
   },
   messages: {
       contactNumber: {
           required: "Email is required",
           email: "Email must be valid",
       }
   },
   errorElement: "div",
   errorPlacement: (err, el) => {
       err.addClass("invalid-feedback");
       el.closest(".form-group").append(err);
   },
   highlight: (el, errClass, validClass) => {
       $(el).addClass('is-invalid').removeClass('is-valid');
   },
   unhighlight: (el, errClass, validClass) => {
       $(el).addClass('is-valid').removeClass('is-invalid');
   },
   submitHander: () => {
       if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
   }
});

// Register Citizen - Step1-Verification
$('#registerCznStep1VerificationForm').validate({
    debug: debug,
    rules: {
        verificationCode: {
            required: true,
            minlength: 6,
            maxlength: 6,
        }
    },
    messages: {
        verificationCode: {
            required: "Verification code is required",
            minlength: "Your code is not valid",
            maxlength: "Your code is not valid",
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Citizen - Step2
$('#registerCznStep2Form').validate({
    debug: debug,
    rules: {
        firstName: {
            required: true
        },
        lastName: {
            required: true
        }
    },
    messages: {
        firstName: {
            required: "Your first name is required"
        },
        lastName: {
            required: "Your last name is required"
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Citizen - Step3
$('#registerCznStep3Form').validate({
    debug: debug,
    rules: {
        sex: {
            required: true
        },
        dateOfBirth: {
            required: true
        }
    },
    messages: {
        sex: {
            required: "Please choose your sex"
        },
        dateOfBirth: {
            required: "Your date of birth is required"
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Citizen - Step4
$('#registerCznStep4Form').validate({
    debug: debug,
    rules: {
        region: {
            required: true,
        },
        province: {
            required: true,
        },
        cityMunicipality: {
            required: true,
        },
        baranggayDistrict: {
            required: true,
        },
        street: {
            required: true,
        },
        specificLocation: {
            required: true,
        },
    },
    messages: {
        region: {
            required: "Region is required",
        },
        province: {
            required: "Province is required",
        },
        cityMunicipality: {
            required: "City/Municipality is required",
        },
        baranggayDistrict: {
            required: "Baranggay/District is required",
        },
        street: {
            required: "Street is required",
        },
        specificLocation: {
            required: "Your specific location is required",
        },
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Representative - Step1-ContactNumber
$('#registerRepStep1ContactNoForm').validate({
    debug: debug,
    rules: {
        contactNumber: {
            required: true,
            minlength: 11
        }
    },
    messages: {
        contactNumber: {
            required: "Contact Number is required",
            minlength: "Input must be a valid contact number"
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Representative - Step1-Email
$('#registerRepStep1EmailForm').validate({
    debug: debug,
    rules: {
        email: {
            required: true,
            email: true
        }
    },
    messages: {
        email: {
            required: "Email is required",
            email: "Input must be a valid email"
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Representative - Step2
$('#registerRepStep2Form').validate({
    debug: debug,
    rules: {
        establishmentName: {
            required: true,
        },
        establishmentType: {
            required: true, 
        }
    },
    messages: {
        establishmentName: {
            required: "Establishment name is required",
        },
        establishmentType: {
            required: "Please select the type of your establishment", 
        }
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

// Register Representative - Step 3
$('#repStep3Form').validate({
    debug: debug,
    rules: {
        firstName: {
            required: true,
            minlength: 2
        },
        middleName: {
            minlength: 2
        },
        lastName: {
            required: true,
            minlength: 2
        },
        position: {
            required: true,
            minlength: 2
        },
    },
    messages: {
        firstName: {
            required: "First name is required",
            minlength: "First name should be valid"
        },
        middleName: {
            minlength: "Middle name should be valid"
        },
        lastName: {
            required: "Last name is required",
            minlength: "First name should be valid"
        },
        position: {
            required: "Position is required",
            minlength: "Position should be valid"
        },
    },
    errorElement: "div",
    errorPlacement: (err, el) => {
        err.addClass("invalid-feedback");
        el.closest(".form-group").append(err);
    },
    highlight: (el, errClass, validClass) => {
        $(el).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: (el, errClass, validClass) => {
        $(el).addClass('is-valid').removeClass('is-invalid');
    },
    submitHander: () => {
        if(submitHandlerLogs) console.log("#repNamePositionForm is submitted");
    }
});

}); // End of ready method
