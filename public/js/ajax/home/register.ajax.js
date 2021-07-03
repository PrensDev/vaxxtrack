/**
 * ====================================================================
 * * REGISTER METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for user registration
 * ====================================================================
 */

$(() => {
    // fetchPHLocations();
});


/**
 * ===========================================================================
 * CITIZEN REGISTRATION
 * ===========================================================================
 */

// Register Citizen AJAX
registerCitizenAJAX = () => {
    const form = new FormData($('#registerCitizenForm')[0]);

    data = {
        user_type:    'Citizen',
        first_name:   form.get('firstName'),
        middle_name:  form.get('middleName'),
        last_name:    form.get('lastName'),
        suffix_name:  form.get('suffixName'),
        sex:          form.get('sex'),
        birth_date:   form.get('birthDate'),
        civil_status: form.get('civilStatus'),
        password:     form.get('password'),
        user_accounts: [{
            details:  form.get('email'),
            type:     'Email',
            verified: true,
        }],
        address: {
            region:            form.get('region'),
            province:          form.get('province'),
            city_municipality: form.get('cityMunicipality'),
            barangay_district: form.get('baranggayDistrict'),
            street:            form.get('street'),
            specific_location: form.get('specificLocation'),
            zip_code:          '1121',
            latitude:          '23.8623',            
            longitude:         '43.0235',
        }
    }

    $.ajax({
        url: `${ BASE_URL_API }register/citizen`,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {

                // Show Success Modal
                $('#successRegisterModal').modal('show');

            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error while registering your account.');
    })
}

// Populate Region Select Input
$.ajax({
    url: `${ PSGC_API_ROUTE }region`,
    type: 'GET',
    success: result => {
        if(result) {
            const data = result.data;
            const region = data[0].region

            console.log(region);

            var options = '';

            region.forEach(r => {
                options += `
                    <option
                        value="${ r.code }"
                    >${ r.name }</option>
                `;
            });

            $('#regionsDropdown').html(options);
            $('#regionsDropdown').selectpicker('refresh');
        }
    }
});

// On change (or select) region select input
$('#regionsDropdown').on('changed.bs.select', () => {
    code = $('#regionsDropdown').val();

    $.ajax({
        url: `${ PSGC_API_ROUTE }region/${ code }/province`,
        type: 'GET',
        success: result => {
            if(result) {
                const provinces = result;
                console.log(provinces)
    
                var options = '';
    
                provinces.forEach(p => {
                    options += `
                        <option
                            value="${ p.code }"
                        >${ p.name }</option>
                    `;
                });
    
                $('#provincesDropdown').html(options);
                $('#provincesDropdown').selectpicker('refresh');
                
                $('#citiesDropdown').html('');
                $('#citiesDropdown').selectpicker('refresh');

                $('#barangaysDropdown').html('');
                $('#barangaysDropdown').selectpicker('refresh');
            }
        }
    });
});

// On change (or select) province select input
$('#provincesDropdown').on('changed.bs.select', () => {
    code = $('#provincesDropdown').val();

    var options = '';

    // Get all cities
    $.ajax({
        async: false,
        url: `${ PSGC_API_ROUTE }province/${ code }/city`,
        type: 'GET',
        success: result => {
            if(result) {
                const cities = result;
                console.log(cities)

                cities.forEach(c => {
                    options += `
                        <option
                            value="${ c.code }"
                        >${ c.name }</option>
                    `;
                });
            }
        }
    });

    // Get all municipalities
    $.ajax({
        async: false,
        url: `${ PSGC_API_ROUTE }province/${ code }/municipality`,
        type: 'GET',
        success: result => {
            if(result) {
                const municipality = result;
                console.log(municipality)

                municipality.forEach(m => {
                    options += `
                        <option
                            value="${ m.code }"
                        >${ m.name }</option>
                    `;
                });
    
            }
        }
    });
    
    $('#citiesDropdown').html(options);
    $('#citiesDropdown').selectpicker('refresh');

    $('#barangaysDropdown').html('');
    $('#barangaysDropdown').selectpicker('refresh');
});

// On change (or select) cities select input
$('#citiesDropdown').on('changed.bs.select', () => {
    code = $('#citiesDropdown').val();
    alert(code);

    $.ajax({
        url: `${ PSGC_API_ROUTE }city/${ code }/barangay`,
        type: 'GET',
        success: result => {
            if(result) {
                const barangays = result;
                console.log(barangays);

                var options = '';

                barangays.forEach(b => {
                    options += `
                        <option
                            value="${ b.code }"
                        >${ b.name }</option>
                    `;
                });

                $('#barangaysDropdown').html(options);
                $('#barangaysDropdown').selectpicker('refresh');
            }
        }
    });

    $.ajax({
        url: `${ PSGC_API_ROUTE }municipality/${ code }/barangay`,
        type: 'GET',
        success: result => {
            if(result) {
                const barangays = result;
                console.log(barangays);

                var options = '';

                barangays.forEach(b => {
                    options += `
                        <option
                            value="${ b.code }"
                        >${ b.name }</option>
                    `;
                });

                $('#barangaysDropdown').html(options);
                $('#barangaysDropdown').selectpicker('refresh');
            }
        }
    });
});


/**
 * ===========================================================================
 * REPRESENTATIVE REGISTRATION
 * ===========================================================================
 */

// Register Representative AJAX
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
