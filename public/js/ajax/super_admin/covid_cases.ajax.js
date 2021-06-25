/**
 * ====================================================================
 * * COVID19 CASES METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * COVID-19 Case information
 * ====================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

 $(() => {
    loadCOVID19CasesDT()
});


/**
 * ====================================================================
 * GET COVID19 CASES RECORDS
 * ====================================================================
 */

loadCOVID19CasesDT = () => {
    const dt = $('#COVID19CasesDT');

    if(dt.length) {
        dt.DataTable({
            ajax: {
                url: `${ SUPER_ADMIN_API_ROUTE }covid19-cases`,
                type: 'GET',
                headers: AJAX_HEADERS,
                error: err => {
                    console.log(err);
                }
            },
            columns: [

                // Case Code
                { 
                    data: 'case_code',
                    class: 'text-nowrap'
                },

                // Date Confirmed
                { 
                    data: null,
                    render: data => {
                        return moment(data.date_confirmed).format('MMM. d, YYYY');
                    }
                },

                // Admitted Status
                {
                    data: null,
                    class: 'text-center',
                    render: data => {
                        if(data.admitted)
                            return `<i class="fas fa-check text-success"></i>`
                        else
                            return `<i class="fas fa-times text-danger"></i>`
                    }
                },

                // Current Health Status
                {
                    data: null,
                    render: data => {
                        const renderBadge = (theme, content) => `
                            <div
                                role        = "button" 
                                data-toggle = "modal" 
                                data-target = "#updateHealthStatusModal"
                            >
                                <span 
                                    class       = "badge alert-${ theme } text-${ theme } p-2 w-100"
                                    data-toggle = "tooltip"
                                    title       = "Click to update current health status"
                                >${ content }</span>
                            </div>
                        `;
                        
                        const chs = data.current_health_status;

                        if(chs == 'Asymptomatic') return renderBadge('secondary', chs);
                        if(chs == 'Mild')         return renderBadge('info', chs);
                        if(chs == 'Severe')       return renderBadge('warning', chs);
                        if(chs == 'Critical')     return renderBadge('danger', chs);
                        if(chs == 'Recovered')    return renderBadge('success', chs);
                        if(chs == 'Died')         return renderBadge('dark', chs);
                    }
                },

                // View Report
                {
                    data: null,
                    render: data => {
                        return `
                            <button 
                                class       = "btn btn-muted btn-block btn-sm"
                                data-toggle = "modal"
                                data-target = "#labReportModal"
                            >
                                <i class="fas fa-file-medical mr-1"></i>
                                <span>View Report</span>
                            </button>
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
                                <div data-toggle="dropdown">
                                    <div class="btn btn-white-muted btn-sm" data-toggle="tooltip" title="More">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                                
                                <div class="dropdown-menu dropdown-menu-right border-0">
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#caseDetailsModal"
                                    >
                                        <i class="fas fa-list icon-container"></i>
                                        <span>View case details</span>
                                    </div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#updateHealthStatusModal"
                                    >
                                        <i class="fas fa-notes-medical icon-container"></i>
                                        <span>Update health status</span>
                                    </div>
                                    <div class="dropdown-item" role="button">
                                        <i class="far fa-edit icon-container"></i>
                                        <span>Edit case details</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div 
                                        class       = "dropdown-item" 
                                        role        = "button"
                                        data-toggle = "modal"
                                        data-target = "#removeCaseRecordModal"
                                    >
                                        <i class="far fa-trash-alt icon-container"></i>
                                        <span>Remove this case</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                }
            ]
        });
    }
}