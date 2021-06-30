/**
 * ====================================================================
 * * VACCINATION AJAX METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * user information
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

 $(() => {
    loadVaccRecordDT();
});

/**
 * ====================================================================
 * GET VACCINATION RECORDS
 * ====================================================================
 */

loadVaccRecordDT = () => {
    const dt = $('#vaccinationRecordsDT');
    
    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }vaccination-records`,
                type: 'GET',
                headers: AJAX_HEADERS
            },
            columns: [
                { 
                    data: null,
                    render: data => {
                        const vc = data.vaccinated_citizen;
                        const first_name = vc.first_name;
                        const middle_name = (vc.middle_name == null || vc.middle_name == '') ? ' ' : ` ${ vc.middle_name }`;
                        const last_name = vc.last_name;
    
                        return `
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-user-circle text-secondary"></i>
                                </div>
                                <div>
                                    <div>${ last_name }, ${ first_name + middle_name }</div>
                                </div>
                            </div>
                        `
                    }
                },
                { 
                    data: null,
                    render: data => {
                        const age = moment().diff(moment(data.vaccinated_citizen.birth_date, 'YYYY'), 'years');
                        return age + ' y/o';
                    }
                },
                { data: 'vaccine_used.product_name'},
                {
                    data: null,
                    render: data => {
                        return `
                            <div>${moment(data.vaccination_date).format("MMM. d, YYYY")}</div>
                            <div class="small text-secondary">${moment(data.vaccination_date).fromNow()}</div>
                        `;
                    }
                },
                { data: 'vaccinated_by'},
                { data: 'vaccinated_in'},
                { 
                    data: null,
                    render: data => {
                        return `
                            <div class="dropdown">
                                <div class="d-inline" data-toggle="dropdown">
                                    <div 
                                        class       = "btn btn-white-muted btn-sm" 
                                        role        = "button"
                                        data-toggle = "tooltip" 
                                        title       = "More"
                                    ><i class="fas fa-ellipsis-v"></i></div>
                                </div>
    
                                <div class="dropdown-menu dropdown-menu-right border-0">
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#vaccCardModal"
                                    >
                                        <i class="far fa-id-card icon-container"></i>
                                        <span>View citizen's card</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#vaccRecordDetailsModal"    
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View full details</span>
                                    </div>
                                    <div class="dropdown-item" role="button">
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit this details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#deleteVaccRecordModal"    
                                    >
                                        <i class="far fa-trash-alt icon-container"></i>
                                        <span>Delete this record</span>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                },
            ]
        });
    }

}