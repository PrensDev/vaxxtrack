/**
 * ====================================================================
 * * CONTACTS METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * COVID-19 Probable Contacts
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    loadContactsDT();
});


liveReloadDataTables([
    'contactsDT'
]);

/**
 * ====================================================================
 * * GET COVID-19 CASES RECORDS
 * ====================================================================
 */

// Load Contacts DataTable
loadContactsDT = () => {
    const dt = $('#contactsDT');
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }contacts`,
                headers: AJAX_HEADERS,
                // success: result => console.log(result.data)
            },
            columns: [

                // Added at (hidden for default sorting)
                { data: 'created_datetime', visible: false },

                // Probable Contact Name
                { 
                    data: null,
                    render: data => {
                        const probableContact = data.probable_contact;
                        const contactName = setFullName('L, F Mi', {
                            firstName: probableContact.first_name,
                            middleName: probableContact.middle_name,
                            lastName: probableContact.last_name,
                        });

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user text-danger"></i>
                                </div>
                                <div>
                                    <div>${ contactName }</div>
                                    <div class="small text-secondary">Probable Contact</div>
                                </div>
                            </div>
                        `
                    }
                },

                // Case Origin
                { data: 'case_information.case_code', class: 'text-nowrap' },

                // Added At
                { 
                    data: null,
                    render: data => {
                        const addedAt = data.created_datetime;
                        return `
                            <div>${ moment(addedAt).format('dddd, MMMM D, YYYY') }</div>
                            <div>${ moment(addedAt).format('hh:mm A') }</div>
                            <div class="small text-secondary">${ humanizeDate(addedAt) }</div>
                        `
                    }
                },

                // User Actions
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        return `
                            <div class="dropdown">
                                <div class="d-inline" data-toggle="dropdown">
                                    <div class="btn btn-sm btn-white-muted">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div 
                                        class="dropdown-item" 
                                        role="button"
                                        onclick="viewContactDetails('${ data.contact_ID }')"
                                    >
                                        <div class="icon-container">
                                            <i class="fas fa-list"></i>
                                        </div>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ], 
            columnDefs: [{
                targets: [4],
                orderable: false
            }]
        })
    }
}

// View Contact Details
viewContactDetails = (contact_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }contacts/${ contact_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;
                console.log(data);

                const probableContact = data.probable_contact;

                // Probable Contact Name
                const fullName = setFullName('F M L', {
                    firstName: probableContact.first_name,
                    middleName: probableContact.middle_name,
                    lastName: probableContact.last_name
                })
                $('#contactFullName').html(fullName);

                // Probable Contact Sex
                var contactSexBlade;
                if(probableContact.sex == 'Female') {
                    contactSexBlade = `
                        <div class="icon-container">
                            <i class="fas fa-venus text-danger"></i>
                        </div>
                        <div>${ probableContact.sex }</div>
                    `
                } else if(probableContact.sex == 'Male') {
                    contactSexBlade = `
                        <div class="icon-container">
                            <i class="fas fa-mars text-blue"></i>
                        </div>
                        <div>${ probableContact.sex }</div>
                    `
                }
                $('#contactSex').html(contactSexBlade);

                // Probable Contact Birth Date and age
                const birthDate = probableContact.birth_date;
                $('#contactBirthDate').html(moment(birthDate).format('MMMM D, YYYY'));
                $('#contactAge').html(`${getAge(birthDate)} years old`)

                // Probable Contact Civil Status
                $('#contactCivilStatus').html(probableContact.civil_status)

                // Probable Contact Address
                const address = probableContact.address;
                $('#contactRegion').html(address.region)
                $('#contactProvince').html(address.province)
                $('#contactCity').html(address.city_municipality)
                $('#contactStreetAndBrgy').html(address.street + ' ' + address.barangay_district)
                $('#contactSpecificLocation').html(address.specific_location)
                $('#contactZipCode').html(address.zip_code)
                $('#contactLongLat').html(`
                    <span>(Lat: ${address.latitude}, Lng: ${address.longitude})<span>
                `);

                // Probable Contact Contact Information
                const accounts = probableContact.user_accounts;
                var contactInfoBlade = '';
                accounts.forEach(a => {
                    if(a.type === 'Email') {
                        contactInfoBlade += `
                            <div>
                                <div class="icon-container">
                                    <i class="fas fa-envelope text-secondary"></i>
                                </div>
                                <span>${ a.details }</span>
                            </div>
                        `
                    } else if(a.type === 'Contact Number') {
                        contactInfoBlade += `
                            <div>
                                <div class="icon-container">
                                    <i class="fas fa-phone-alt text-secondary"></i>
                                </div>
                                <span>${ a.details }</span>
                            </div>
                        `
                    }
                });
                $('#contactInfo').html(contactInfoBlade);

                // Probable Contact Case Origin
                $('#caseOrigin').html(data.case_information.case_code);

                // Date Added
                const addedAt = data.created_datetime;
                $('#addedDate').html(moment(addedAt).format('dddd, MMMM D, YYYY'));
                $('#addedTime').html(moment(addedAt).format('hh:mm A'));
                $('#addedDateTimeHumanized').html(humanizeDate(addedAt));

                // Show View Contact Details Modal
                $('#viewContactDetailsModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in getting the contact information'))
}