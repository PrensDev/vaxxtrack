/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR HOME PAGES
 * ---------------------------------------------------------------------------
 * This file contains the functions used for home views and pages
 * ===========================================================================
 */


/**
 * ===========================================================================
 * * INSTANCES
 * ===========================================================================
 */

// Margin Top Navbar to adjust element after it
$("#mainNavbar").next().css("margin-top", $("#mainNavbar").outerHeight());


/**
 * ===========================================================================
 * * FUNCTIONS AND METHODS
 * ===========================================================================
 */

// Set Step for Progress Indicator
setStepIndicator = (currentVal, maxValue) => {
    const stepIndicator = $('#stepIndicator');
    if(stepIndicator.length) {
        stepIndicator.html(`Step ${ currentVal } of ${ maxValue }`);
        width = (currentVal/maxValue)*100;
        stepIndicator.css('width', width+'%');
    }
}


// Get the buttons for multistep form
const prevBtn   = $('#prevBtn');
const nextBtn   = $('#nextBtn');
const submitBtn = $('#submitBtn');


// Show Field Set 
// For multistep form 
showFieldset = (fieldsets, step) => {
    step -= 1;
    fieldsets.forEach((fieldset, i) => {

        // Show the only fieldset declared
        step == i ? $('#' + fieldset).show() : $('#' + fieldset).hide();

        // Hide the previous button in first fieldset
        step == 0 ? $('#prevBtnContainer').hide() : $('#prevBtnContainer').show();

        // Show the submit button in the last fieldset, hide if not
        if(step == fieldsets.length - 1) {
            nextBtn.hide();
            submitBtn.show();
        } else {
            nextBtn.show(); 
            submitBtn.hide();
        }
    });
    setStepIndicator(showed, fieldsets.length);
}


// Register Citizen MultiStep Form
if($('#registerCitizenForm').length) {

    // Get the form
    registerCitizenForm = $('#registerCitizenForm');
    
    // Get the fieldset IDs
    const fieldsets = [
        'emailFieldset',
        'verifyAccountFieldset',
        'fullNameFieldset',
        'infoFieldset',
        'addressFieldset',
        'passwordFieldset'
    ];
    
    // Initialize the fieldset that is showned
    var showed = 1;

    // Show the fieldset and the step indicator
    showFieldset(fieldsets, showed)
    setStepIndicator(showed, fieldsets.length);

    // For form validation
    validateForm = () => {
        {

            // Validate field from form
            registerCitizenForm.validate(validateOptions({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    verificationCode: {
                        required: true
                    },
                    firstName: {
                        required: true
                    },
                    lastName: {
                        required: true
                    },
                    sex: {
                        required: true
                    },
                    civilStatus: {
                        required: true
                    },
                    birthDate: {
                        required: true
                    },
                    region: {
                        required: true
                    },
                    province: {
                        required: true
                    },
                    cityMunicipality: {
                        required: true
                    },
                    barangayDistrict: {
                        required: true
                    },
                    street: {
                        required: true
                    },
                    specificLocation: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    email: {
                        required: 'Your email is required',
                        required: 'This is an invalid email address',
                    },
                    verificationCode: {
                        required: 'Verification Code is required'
                    },
                    firstName: {
                        required: 'Your first name is required'
                    },
                    lastName: {
                        required: 'Your last name is required'
                    },
                    sex: {
                        required: 'Select your biological sex'
                    },
                    civilStatus: {
                        required: 'Select your current civil status'
                    },
                    birthDate: {
                        required: 'Your date of birth is required'
                    },
                    region: {
                        required: 'Select the region where you currently living'
                    },
                    province: {
                        required: 'Select the province where you currently living'
                    },
                    cityMunicipality: {
                        required: 'Select the city or municipality where you currently living'
                    },
                    barangayDistrict: {
                        required: 'Select the barangay or district where you currently living'
                    },
                    street: {
                        required: 'Type the street where you currently living'
                    },
                    specificLocation: {
                        required: 'Type the specific location where you currently living'
                    },
                    password: {
                        required: 'Your password is required',
                        minlength: 'Your password must be 8 random characters and above'
                    },
                    confirmPassword: {
                        required: 'Retype your password for confirmation',
                        equalTo: 'This doesn\'t match to your password'
                    }
                },
                submitHandler: () => registerCitizenAJAX()
            }));
    
            // If fields are valid, show the next fieldset and hide the current
            if(registerCitizenForm.valid()) {
                showed++;
                showFieldset(fieldsets, showed);
                nextBtn.blur();
            }
        }
    }

    // Next Event
    nextEvent = () => {

        // Check if account is already used
        if($('#emailFieldset').is(':visible')) {

            data = {
                details: `${ $('#email').val() }`
            };

            $.ajax({
                url: `${ BASE_URL_API }check-account`,
                type: 'POST',
                data: data,
                dataType: 'json',
                success: result => {
                    if(result) {
                        const data = result.data;
                        
                        if(data.length) {
                            showAlert('danger', 'This account is already used')
                        } else {
                            $('#alert').alert('close');
                            validateForm();
                        }
                    } else {
                        
                    }
                }
            })
        } else {
            validateForm();
        }
    }

    // When next button is clicked
    nextBtn.on('click', () => nextEvent());

    // When enter button is clicked
    registerCitizenForm.on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if(showed != fieldsets.length) {
            if (keyCode === 13) { 
                e.preventDefault();
                nextEvent()
            }
        } else {
            if (keyCode === 13) { 
                if(!registerCitizenForm.valid()) {
                    e.preventDefault();
                    nextEvent()
                }
            }
        }
    });

    // When previous button is clicked
    prevBtn.on('click', () => {
        showed--;
        showFieldset(fieldsets, showed);
    });
}

// Register Representative MultiStep Form
if($('#registerRepresentativeForm').length) {

    // Get the form
    registerRepresentativeForm = $('#registerRepresentativeForm');
    
    // Get the fieldset IDs
    const fieldsets = [
        'userAccountFieldset',
        'accountVerificationFieldset',
        'repInfoFieldset',
        'establishmentInfoFieldset',
        'addressFieldset',
        'passwordFieldset'
    ];

    // Initialize the fieldset that is showned
    var showed = 1;

    // Show the fieldset and the step indicator
    showFieldset(fieldsets, showed)
    setStepIndicator(showed, fieldsets.length);

    validateForm = () => {

        // Validate field from form
        registerRepresentativeForm.validate(validateOptions({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                verificationCode: {
                    required: true
                },
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                establishmentName: {
                    required: true
                },
                establishmentType: {
                    required: true
                },
                position: {
                    required: true
                },
                region: {
                    required: true
                },
                province: {
                    required: true
                },
                cityMunicipality: {
                    required: true
                },
                barangayDistrict: {
                    required: true
                },
                street: {
                    required: true
                },
                specificLocation: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                confirmPassword: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                email: {
                    required: 'Your email is required',
                    required: 'This is an invalid email address',
                },
                verificationCode: {
                    required: 'Verification Code is required'
                },
                firstName: {
                    required: 'Your first name is required'
                },
                lastName: {
                    required: 'Your last name is required'
                },
                establishmentName: {
                    required: 'The name of your establishment is required'
                },
                establishmentType: {
                    required: 'Select the type of your establishment'
                },
                position: {
                    required: 'Your position to this establishment is required'
                },
                region: {
                    required: 'Select the region where the establishment can be located'
                },
                province: {
                    required: 'Select the province where the establishment can be located'
                },
                cityMunicipality: {
                    required: 'Select the city or municipality where the establishment can be located'
                },
                barangayDistrict: {
                    required: 'Select the barangay or district where the establishment can be located'
                },
                street: {
                    required: 'Type the street where the establishment can be located'
                },
                specificLocation: {
                    required: 'Type the specific location where the establishment can be located'
                },
                password: {
                    required: 'Your password is required',
                    minlength: 'Your password must be 8 random characters and above'
                },
                confirmPassword: {
                    required: 'Retype your password for confirmation',
                    equalTo: 'This doesn\'t match to your password'
                }
            },
            submitHandler: () => registerRepresentativeAJAX()
        }));

        // If fields are valid, show the next fieldset and hide the current
        if(registerRepresentativeForm.valid()) {
            showed++;
            showFieldset(fieldsets, showed);
            nextBtn.blur();
        }
    }

    // When next button is clicked
    nextBtn.on('click', () => validateForm());

    // When enter button is clicked
    registerRepresentativeForm.on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if(showed != fieldsets.length) {
            if (keyCode === 13) { 
                e.preventDefault();
                validateForm()
            }
        } else {
            if (keyCode === 13) { 
                if(!registerRepresentativeForm.valid()) {
                    e.preventDefault();
                    validateForm()
                }
            }
        }
    });

    // When previous button is clicked
    prevBtn.on('click', () => {
        showed--;
        showFieldset(fieldsets, showed);
    });
}