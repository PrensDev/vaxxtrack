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
                url: `${ HEALTH_OFFICIAL_API_ROUTE }contacts`,
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
                { data: 'created_datetime'},
            ], 
            columnDefs: [{
                targets: [4],
                orderable: false
            }]
        })
    }
}