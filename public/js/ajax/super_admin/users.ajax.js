/**
 * ====================================================================
 * * USER MANAGEMENT METHOD
 * --------------------------------------------------------------------
 * This file contains the methods and functions for fetching users 
 * count
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to render data
 * ====================================================================
 */

liveRenderData(() => {
    if($('#usersCountContainer').length) getUsersCount();
});

$(() => {
    loadCitizensDT();
    loadRepresentativesDT();
    loadHealthOfficialsDT();
    loadSuperAdminsDT();
})


/**
 * ====================================================================
 * * USERS COUNT
 * ====================================================================
 */

// Get User Count
function getUsersCount() {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }users-count`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            c = result.users_count;

            $('#citizensCount').html(c.citizens);
            $('#representativesCount').html(c.representatives);
            $('#healthOfficialsCount').html(c.health_officials);
            $('#superAdminsCount').html(c.super_admins);
        }
    })
}


/**
 * ====================================================================
 * * GET ALL CITIZENS
 * ====================================================================
 */

// Load Citizens DataTable
loadCitizensDT = () => {
    const dt = $('#citizensDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }users/citizens`,
                type: 'GET',
                headers: AJAX_HEADERS,
                // success: (result) => {
                //     console.log(result.data);
                // }
            }, 
            columns: [
                {
                    data: null,
                    render: (data) => {

                        // Get the middle name and check if not null or empty
                        var middleName = data.middle_name;
                        middleName = (middleName == null || middleName == '') ? '' : ` ${ middleName }`;
                        
                        // Set the full name
                        const fullName = data.last_name + ', ' + data.first_name + middleName;

                        // Return the full name
                        return `
                            <div class="d-flex align-items-baseline text-nowrap">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary">${ data.user_type }</div>
                                </div>
                            </div>
                        `;
                    }
                },
                {
                    data: null,
                    class: 'text-nowrap',
                    render: (data) => {
                        const age = moment().diff(data.birth_date, 'years', false) + ' years old'
                        const birthDate = moment(data.birth_date).format('MMMM D, YYYY')
                        return `
                            <div>${ age }</div>
                            <div class="small text-secondary">${ birthDate }</div>
                        `
                    }
                },
                {
                    data: null,
                    class: 'text-nowrap',
                    render: (data) => {
                        const sex = data.sex;

                        if(sex == 'Female') {
                            return `
                                <i class="fas fa-venus icon-container text-danger"></i>
                                <span>${ sex }</span>
                            `
                        } else {
                            return `
                                <i class="fas fa-mars icon-container text-blue"></i>
                                <span>${ sex }</span>
                            `
                        }
                    }
                },
                { data: 'civil_status' },
                {
                    data: null,
                    render: (data) => {
                        const address = data.address;

                        const location =
                            address.barangay_district + ', ' +
                            address.city_municipality + ', ' +
                            address.province;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-map-marker-alt text-danger"></i>
                                </div>
                                <div>
                                    <div>${ location }</div>
                                    <div class="small text-secondary">
                                        <span data-toggle="tooltip" title="Latitude">Lat: ${ address.latitude }</span>,
                                        <span data-toggle="tooltip" title="Longitude">Lng: ${ address.longitude }</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                },
                {
                    data: null,
                    class: 'text-center',
                    render: (data) => {
                        return `
                            <div class="dropdown">
                                <div 
                                    class="d-inline-block"
                                    data-toggle="dropdown"
                                >
                                    <div 
                                        class       = "btn btn-sm btn-white-muted"
                                        role        = "button"
                                        data-toggle = "tooltip"
                                        title       = "More"
                                    >
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div 
                                        class="dropdown-item"
                                        role="button"
                                        onclick="viewCitizenDetails('${ data.user_ID }')"
                                    >
                                        <div class="icon-container">
                                            <i class="fas fa-list"></i>
                                        </div>
                                        <span>View More Details</span>
                                    </div>
                                    <div 
                                        class="dropdown-item"
                                        role="button"
                                        data-toggle="modal"
                                        data-target=""
                                    >
                                        <div class="icon-container">
                                            <i class="fas fa-user-cog"></i>
                                        </div>
                                        <span>Make administrative action</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ],
            columnDefs: [{
                targets: [5],
                orderable: false,
            }]
        })
    }
}

// View Citizen Details
viewCitizenDetails = (citizen_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }users/citizens/${ citizen_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                
                // Get data from result
                const data = result.data;
                
                // Set citizen full name
                var middleName = data.middle_name
                middleName = (middleName == null || middleName == '') ? '' : ' ' + middleName;
                const fullName = data.last_name + ', ' + data.first_name + middleName;
                $('#citizenFullName').html(fullName);

                // Set age and birth date
                $('#citizenAge').html(moment().diff(data.birth_date, 'years', false) + ' years old');
                $('#citizenBirthDate').html(moment(data.birth_date).format('MMMM D, YYYY'));

                // Set civil status
                $('#citizenCivilStatus').html(data.civil_status);

                // Set sex
                const sex = data.sex;
                if(sex == 'Female') {
                    $('#citizenSex').html(`
                        <div class="icon-container">
                            <i class="fas fa-venus text-danger"></i>
                        </div>
                        <div>${ sex }</div>
                    `);
                } else if(sex == 'Male') {
                    $('#citizenSex').html(`
                        <div class="icon-container">
                            <i class="fas fa-mars text-blue"></i>
                        </div>
                        <div>${ sex }</div>
                    `);
                } else {
                    $('#citizenSex').html(`
                        <div class="text-muted font-italic">No data</div>
                    `);
                }


                // Set citizen address
                const address = data.address
                $('#region').html(address.region);
                $('#province').html(address.province);
                $('#cityMunicipality').html(address.city_municipality);
                $('#barangayDistrict').html(address.barangay_district);
                $('#street').html(address.street);
                $('#specificLocation').html(address.specific_location);
                $('#zipCode').html(address.zip_code);
                $('#longitude').html(address.longitude);
                $('#latitude').html(address.latitude);


                // Set citizen date registered
                $('#dateRegistered').html(moment(data.created_datetime).format('dddd, MMMM D, YYYY'));
                $('#dateRegisteredHumanized').html(moment(data.created_datetime).fromNow());

                
                // Show view citizen details modal
                $('#viewCitizenDetailsModal').modal('show');
            } else {
                console.log('No result was found')
            }
        }
    })
    .fail(() => {
        console.log('There was an error in retrieving citizen information')
    })
}


/**
 * ====================================================================
 * * GET ALL REPRESENTATIVES
 * ====================================================================
 */

// Load Representative DataTable
loadRepresentativesDT = () => {
    const dt = $('#representativesDT');

    if(dt.length) {
        dt.DataTable({
            // ajax: {
            //     url: `${ SUPER_ADMIN_API_ROUTE }users/representatives`,
            //     type: 'GET',
            //     headers: AJAX_HEADERS,
            //     success: result => {
            //         if(result) {
            //             console.log(result.data)
            //         }
            //     }
            // },
            columnDefs: [{
                targets: [5],
                orderable: false,
            }]
        });
    }
}


/**
 * ====================================================================
 * * GET ALL HEALTH OFFICIALS
 * ====================================================================
 */

// Load Health Official DataTable
loadHealthOfficialsDT = () => {
    const dt = $('#healthOfficialsDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }users/health-officials`,
                type: 'GET',
                headers: AJAX_HEADERS,
                // success: (result) => {
                //     if(result){
                //         console.log(result.data);
                //     }
                // }
            },
            columns: [
                {
                    data: null,
                    render: data => {
                        var middleName = data.middle_name;

                        middleName = (middleName == null || middleName == '') ? '' : ' ' + middleName;

                        const fullName =
                            data.last_name + ', ' + data.first_name + middleName;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary">Health Official</div>
                                </div>
                            </div>
                        `;
                    }
                }, 
                {
                    data: null,
                    render: data => {
                        if(data.ho_added_by != null) {
                            const sa = data.ho_added_by;
                            
                            var middleName = sa.middle_name;
    
                            middleName = (middleName == null || middleName == '') ? '' : ' ' + middleName;
    
                            const fullName =
                                sa.last_name + ', ' + sa.first_name + middleName;
    
                            return `
                                <div class="d-flex align-items-baseline">
                                    <div class="icon-container">
                                        <i class="fas fa-user-tie text-secondary"></i>
                                    </div>
                                    <div>
                                        <div>${ fullName }</div>
                                        <div class="small text-secondary">Super Admin</div>
                                    </div>
                                </div>
                            `;
                        } else {
                            return `<div class="text-secondary font-italic">No data</div>`
                        }
                    }
                }, 
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${ moment(data.created_datetime).format("dddd, MMMM D, YYYY") }</div>
                            <div class="small text-secondary">${ moment(data.created_datetime).fromNow() }</div>
                        `
                    }
                },
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${ moment(data.updated_datetime).format("dddd, MMMM D, YYYY") }</div>
                            <div class="small text-secondary">${ moment(data.updated_datetime).fromNow() }</div>
                        `
                    }
                },
                {
                    data: 'first_name'
                }
            ],
            columnDefs: [{
                targets: [4],
                orderable: false,
            }]
        });
    }
}


/**
 * ====================================================================
 * * GET ALL SUPER ADMINS
 * ====================================================================
 */

// Load Super Admins DataTable
loadSuperAdminsDT = () => {
    const dt = $('#superAdminsDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }users/super-admins`,
                type: 'GET',
                headers: AJAX_HEADERS,
                // success: (result) => {
                //     if(result) {
                //         console.log(result.data);
                //     }
                // }
            },
            columns: [
                {
                    data: null,
                    render: data => {
                        var middleName = data.middle_name;

                        middleName = (middleName == null || middleName == '') ? '' : ' ' + middleName;

                        const fullName =
                            data.last_name + ', ' + data.first_name + middleName;

                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ fullName }</div>
                                    <div class="small text-secondary">Super Admin</div>
                                </div>
                            </div>
                        `;
                    }
                }, 
                {
                    data: null,
                    render: data => {
                        const sa_added_by = data.sa_added_by;
                        
                        if(sa_added_by == null) {
                            return `<div class="text-secondary font-italic font-weight-normal">No data</div>`
                        } else {
                            return 'Super Admin'
                        }
                    }
                }, 
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${ moment(data.created_datetime).format("dddd, MMMM D, YYYY") }</div>
                            <div class="small text-secondary">${ moment(data.created_datetime).fromNow() }</div>
                        `
                    }
                },
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${ moment(data.updated_datetime).format("dddd, MMMM D, YYYY") }</div>
                            <div class="small text-secondary">${ moment(data.updated_datetime).fromNow() }</div>
                        `
                    }
                },
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        return data.first_name
                    }
                }
            ],
            columnDefs: [{
                targets: [4],
                orderable: false
            }]
        });
    }
}