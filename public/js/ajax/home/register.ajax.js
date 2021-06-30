/**
 * ====================================================================
 * * REGISTER METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for user registration
 * ====================================================================
 */

$(() => {
    fetchPHLocations();
});

registerCitizenAJAX = () => {
    alert('Form is submitted')
}

registerRepresentativeAJAX = () => {
    alert('Form is submitted')
}

// citizenAJAX = () => {
//     alert('Form is submitted')
// }

// representativeAJAX = () => {
//     alert('Form is submitted')
// }

citizenAJAX = () => {
    const form = new FormData($('#registerCitizenForm')[0]);

    data = {
        first_name:   form.get('firstName'),
        middle_name:  form.get('middleName'),
        last_name:    form.get('lastName'),
        suffix_name:  form.get('suffixName'),
        sex:          form.get('sex'),
        birth_date:   form.get('birthDate'),
        civil_status: form.get('civilStatus'),
        user_type:    form.get('citizen'),
        password:     form.get('password'),
        user_accounts: [
        {
            details:  form.get('email'),
            type:     form.get('email'),
            verified: form.get('verificationCode'),
        }],
        address: [
        {
            region:            form.get('region'),
            province:          form.get('province'),
            city_municipality: form.get('cityMunicipality'),
            barangay_district: form.get('baranggayDistrict'),
            street:            form.get('street'),
            specific_location: form.get('specificLocation'),
            zip_code:          form.get('1121'),
            latitude:          form.get('23.8623'),            
            longitude:         form.get('43.0235'),
        }]
    }

    $.ajax({
        url: `${ CITIZEN_OFFICIAL_API_ROUTE }register/citizen`,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Show alert
                alert('Success! You have been registered.');


                // Set form values to empty
                setFormValues('#registerCitizenForm', [
                    {
                        name: 'email',
                        value: ''
                    }, {
                        name: 'verificationCode',
                        value: ''
                    }, {
                        name: 'firstName',
                        value: ''
                    }, {
                        name: 'lastName',
                        value: ''
                    }, {
                        name: 'sex',
                        value: ''
                    }, {
                        name: 'birthDate',
                        value: ''
                    }, {
                        name: 'civilStatus',
                        value: ''
                    }, {
                        name: 'region',
                        value: ''
                    }, {
                        name: 'province',
                        value: ''
                    }, {
                        name: 'cityMunicipality',
                        value: ''
                    }, {
                        name: 'baranggayDistrict',
                        value: ''
                    }, {
                        name: 'street',
                        value: ''
                    }, {
                        name: 'specificLocation',
                        value: ''
                    }, {
                        name: 'password',
                        value: ''
                    }, {
                        name: 'confirmPassword',
                        value: ''
                    }
                ]);

            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error while registering your account.')
    })
}

representativeAJAX = () => {
    const form = new FormData($('#registerRepresentativeForm')[0]);

    data = {
        first_name:   form.get('firstName'),
        middle_name:  form.get('middleName'),
        last_name:    form.get('lastName'),
        suffix_name:  form.get('suffixName'),
        sex:          form.get('sex'),
        birth_date:   form.get('birthDate'),
        civil_status: form.get('civilStatus'),
        user_type:    form.get('citizen'),
        password:     form.get('password'),
        user_accounts: [
        {
            details:  form.get('email'),
            type:     form.get('email'),
            verified: form.get('verificationCode'),
        }],
        establishments_with_roles: {
            name:  form.get('establishmentName'),
            type:  form.get('establishmentType'),
            roles: form.get('position'),
            address: [
            {
                region:            form.get('region'),
                province:          form.get('province'),
                city_municipality: form.get('cityMunicipality'),
                barangay_district: form.get('baranggayDistrict'),
                street:            form.get('street'),
                specific_location: form.get('specificLocation'),
                zip_code:          form.get('1121'),
                latitude:          form.get('23.8623'),            
                longitude:         form.get('43.0235'),
            }]
        }
    }

    $.ajax({
        url: `${ REPRESENTATIVE_OFFICIAL_API_ROUTE }register/representative`,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Show alert
                alert('Success! You have been registered.');


                // Set form values to empty
                setFormValues('#registerRepresentativeForm', [
                    {
                        name: 'email',
                        value: ''
                    }, {
                        name: 'verificationCode',
                        value: ''
                    }, {
                        name: 'firstName',
                        value: ''
                    }, {
                        name: 'lastName',
                        value: ''
                    }, {
                        name: 'sex',
                        value: ''
                    }, {
                        name: 'birthDate',
                        value: ''
                    }, {
                        name: 'civilStatus',
                        value: ''
                    }, {
                        name: 'establishmentName',
                        value: ''
                    }, {
                        name: 'establishmentType',
                        value: ''
                    }, {
                        name: 'position',
                        value: ''
                    }, {
                        name: 'region',
                        value: ''
                    }, {
                        name: 'province',
                        value: ''
                    }, {
                        name: 'cityMunicipality',
                        value: ''
                    }, {
                        name: 'baranggayDistrict',
                        value: ''
                    }, {
                        name: 'street',
                        value: ''
                    }, {
                        name: 'specificLocation',
                        value: ''
                    }, {
                        name: 'password',
                        value: ''
                    }, {
                        name: 'confirmPassword',
                        value: ''
                    }
                ]);

            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error while registering your account.')
    })
}


/**
 * ===========================================================================
 * USER REGISTRATION
 * ===========================================================================
 */

// Validate citizen registration
$('#registerCitizenForm').validate(validateOptions({
    rules: {

        // Citizen's User Account
        email: {
            required: true
        },
        verificationCode: {
            required: true
        },

        // Citizen's Personal Information
        firstName: {
            required: true
        },
        lastName: {
            required: true
        },
        sex: {
            required: true
        },
        birthDate: {
            required: true
        },
        civilStatus: {
            required: true
        },

        // Citizen's Address
        region: {
            required: true
        },
        province: {
            required: true
        },
        cityMunicipality: {
            required: true
        },
        baranggayDistrict: {
            required: true
        },
        street: {
            required: true
        },
        specificLocation: {
            required: true
        },

        // Citizen's Password
        password: {
            required: true
        },
        confirmPassword: {
            required: true
        },
    },


    messages: {
        // Citizen's User Account
        email: {
            required: 'Email is Required'
        },
        verificationCode: {
            required: 'Verification Code is Required'
        },

        // RCitizen's Personal Information
        firstName: {
            required: 'Your first name is required'
        },
        lastName: {
            required: 'Your last name is required'
        },
        sex: {
            required: 'Your sex is required'
        },
        birthDate: {
            required: 'Your birthdate is required'
        },
        civilStatus: {
            required: 'Select your civil status'
        },

        // Citizen's Address
        region: {
            required: 'Select your region'
        },
        province: {
            required: 'Select your province'
        },
        cityMunicipality: {
            required: 'Select your City/Municipality'
        },
        baranggayDistrict: {
            required: 'Select your Baranggay/District'
        },
        street: {
            required: 'Street is required'
        },
        specificLocation: {
            required: 'Specific Location is required'
        },

        // Citizen's Password
        password: {
            required: 'Password is required'
        },
        confirmPassword: {
            required: 'Confirm Password is required'
        },
    },

    submitHandler: () => citizenAJAX()
}))

// Representative registration
$('#registerRepresentativeForm').validate(validateOptions({
    rules: {

        // Representative's User Account
        email: {
            required: true
        },
        verificationCode: {
            required: true
        },

        // Representative's Personal Information
        firstName: {
            required: true
        },
        lastName: {
            required: true
        },
        sex: {
            required: true
        },
        birthDate: {
            required: true
        },
        civilStatus: {
            required: true
        },

        // Establishment Information
        establishmentName: {
            required: true
        },
        establishmentType: {
            required: true
        },
        position: {
            required: true
        },

        // Representative's Address
        region: {
            required: true
        },
        province: {
            required: true
        },
        cityMunicipality: {
            required: true
        },
        baranggayDistrict: {
            required: true
        },
        street: {
            required: true
        },
        specificLocation: {
            required: true
        },

        // Representative's Password
        password: {
            required: true
        },
        confirmPassword: {
            required: true
        },
    },


    messages: {
        // Representative's User Account
        email: {
            required: 'Email is required'
        },
        verificationCode: {
            required: 'Verification Code is required'
        },

        // Representative's Personal Information
        firstName: {
            required: 'Your first name is required'
        },
        lastName: {
            required: 'Your last name is required'
        },
        sex: {
            required: 'Your sex is required'
        },
        birthDate: {
            required: 'Your birthdate is required'
        },
        civilStatus: {
            required: 'Select your civil status'
        },

        // Establishment Information
        establishmentName: {
            required: 'The name of your establishment in required'
        },
        establishmentType: {
            required: 'Select the type of your establishment'
        },
        position: {
            required: 'Your position in this establishment is required'
        },

        // Representative's Address
        region: {
            required: 'Select your region'
        },
        province: {
            required: 'Select your province'
        },
        cityMunicipality: {
            required: 'Select your City/Municipality'
        },
        baranggayDistrict: {
            required: 'Select your Baranggay/District'
        },
        street: {
            required: 'Street is Required'
        },
        specificLocation: {
            required: 'Specific Location is required'
        },

        // Representative's Password
        password: {
            required: 'Password is required'
        },
        confirmPassword: {
            required: 'Confirm Password is required'
        },
    },

    submitHandler: () => representativeAJAX()
}))