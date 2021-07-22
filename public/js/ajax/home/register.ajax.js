/**
 * ====================================================================
 * * REGISTER METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for user registration
 * ====================================================================
 */

$(() => {
    // fetchPHLocations();
    populateRegionSelectAJAX();
});


/**
 * ===========================================================================
 * * FOR LOCATION IN REGISTRATION
 * ===========================================================================
 */

// Populate Region Select Input
populateRegionSelectAJAX = () => {
    $.ajax({
        url: `${ PSGC_API_ROUTE }region`,
        type: 'GET',
        success: result => {
            if(result) {
                const data = result.data;
                const region = data[0].region;
                let options = '';
                region.forEach(r => options += `<option value="${ r.code }">${ r.name }</option>`);
                $('#regionsDropdown').html(options);
                $('#regionsDropdown').selectpicker('refresh');
            }
        }
    });
}

// On change (or select) region select input
$('#regionsDropdown').on('changed.bs.select', () => {
    code = $('#regionsDropdown').val();

    $('#provincesDropdown').html(`
        <option class="text-center small" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span>Loading... Please wait</span>
        </option>
    `);
    $('#provincesDropdown').selectpicker('refresh');

    $.ajax({
        url: `${ PSGC_API_ROUTE }region/${ code }/province`,
        type: 'GET',
        success: result => {
            if(result) {
                const provinces = result;

                var options = '';
                provinces.forEach(p => options += `
                    <option 
                        value="${ p.code }"
                        data-content="<div>${ p.name }</div>"
                        title="${ p.name }"
                    >${ p.name }</option>`
                );
                
                // Reset provinces dropdown
                $('#provincesDropdown').html(options);
                $('#provincesDropdown').selectpicker('refresh');
                
                // Reset cities dropdown
                $('#citiesDropdown').html(`
                    <option class="text-center small" disabled>Please select a province first</option>
                `);
                $('#citiesDropdown').selectpicker('refresh');

                // Reset barangay, street, and specific location inputs
                $('#barangay').val('');
                $('#street').val('');
                $('#specificLocation').val('');
            }
        }
    });
    
    $.ajax({
        url: `${ PSGC_API_ROUTE }region/${ code }`,
        type: 'GET',
        success: result => {
            if(result) {
                $('#regionName').val(result.name);
            }
        }
    })
});

// On change (or select) province select input
$('#provincesDropdown').on('changed.bs.select', () => {
    code = $('#provincesDropdown').val();

    $('#citiesDropdown').html(`
        <option class="text-center small" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span>Loading... Please wait</span>
        </option>
    `);
    $('#citiesDropdown').selectpicker('refresh');

    var options = '';

    // Get all cities
    $.ajax({
        async: false,
        url: `${ PSGC_API_ROUTE }province/${ code }/city`,
        type: 'GET',
        success: result => {
            if(result) {
                result.forEach(c => options += `<option value="${ c.code }">${ c.name }</option>`);
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
                result.forEach(m => options += `<option value="${ m.code }">${ m.name }</option>`);
            }
        }
    });
    
    // Reset cities dropdown
    $('#citiesDropdown').html(options);
    $('#citiesDropdown').selectpicker('refresh');

    // Reset barangay, street, and specific location inputs
    $('#barangay').val('');
    $('#street').val('');
    $('#specificLocation').val('');

    $.ajax({
        url: `${ PSGC_API_ROUTE }province/${ code }`,
        type: 'GET',
        success: result => {
            if(result) {
                $('#provinceName').val(result.name);
            }
        }
    })
});

// On chnage (or select) cities select input
$('#citiesDropdown').on('changed.bs.select', () => {
    code = $('#citiesDropdown').val();

    // Reset barangay, street, and specific location inputs
    $('#barangay').val('');
    $('#street').val('');
    $('#specificLocation').val('');

    $.ajax({
        url: `${ PSGC_API_ROUTE }city/${ code }`,
        type: 'GET',
        success: result => {
            if(result) {
                $('#cityName').val(result.name);
            }
        }
    })
});


/**
 * ===========================================================================
 * * CITIZEN REGISTRATION
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
            region:            form.get('regionName'),
            province:          form.get('provinceName'),
            city_municipality: form.get('cityName'),
            barangay_district: form.get('barangay'),
            street:            form.get('street'),
            specific_location: form.get('specificLocation'),
            zip_code:          form.get('postalCode'),
            latitude:          form.get('latitude'),            
            longitude:         form.get('longitude'),
        }
    }

    console.log(data);

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
    .fail(() => console.error('There was an error while registering your account.'));
}


/**
 * ===========================================================================
 * * REPRESENTATIVE REGISTRATION
 * ===========================================================================
 */

// Register Representative AJAX
registerRepresentativeAJAX = () => {
    const form = new FormData($('#registerRepresentativeForm')[0]);

    data = {
        first_name:   form.get('firstName'),
        middle_name:  form.get('middleName'),
        last_name:    form.get('lastName'),
        suffix_name:  form.get('suffixName'),
        password:     form.get('password'),
        user_accounts: [{
            details:  form.get('email'),
            type:     'Email',
            verified: true,
        }],
        establishments_with_roles: [{
            name:    form.get('establishmentName'),
            type:    form.get('establishmentType'),
            address: [{
                region:            form.get('regionName'),
                province:          form.get('provinceName'),
                city_municipality: form.get('cityName'),
                barangay_district: form.get('barangay'),
                street:            form.get('street'),
                specific_location: form.get('specificLocation'),
                zip_code:          form.get('postalCode'),
                latitude:          form.get('latitude'),            
                longitude:         form.get('longitude'),
            }],
            Roles: {
                role:    form.get('position'),
                isAdmin: true,
            }
        }]
    }

    console.log(data);

    $.ajax({
        url: `${ BASE_URL_API }register/representative`,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: (result) => {
            if(result) {
                // Show Success Modal
                $('#successRegisterModal').modal('show');
                $('#registerRepresentativeForm').trigger('reset');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => console.error('There was an error while registering your account.'))
}
