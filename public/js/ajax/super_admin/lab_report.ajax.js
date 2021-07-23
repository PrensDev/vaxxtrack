/**
 * ====================================================================
 * * LAB REPORTS METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * Lab Reports of COVID 19 Cases
 * ====================================================================
 */


/**
 * ====================================================================
 * * VIEW LAB REPORT
 * ====================================================================
 */

// View Lab Report
viewLabReport = (lab_report_ID) => {
    $.ajax({
        url: `${ SUPER_ADMIN_API_ROUTE }lab-reports/${ lab_report_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: result => {
            if(result) {
                const data = result.data;

                $('#caseCode').html(data.case_information.case_code);
                $('#laboratory').html(data.laboratory);
                $('#requestedExam').html(data.requested_exam);
                
                // Date and Time Requested
                const requestedDateTime = data.requested_datetime;
                $('#requestedDate').html(moment(requestedDateTime).format('dddd, MMMM D, YYYY'));
                $('#requestedTime').html(moment(requestedDateTime).format('hh:mm A'));
                $('#requestedDateTimeHumanized').html(humanizeDate(requestedDateTime));

                // Date and Time Collected
                const collectedDateTime = data.collected_datetime;
                $('#collectedDate').html(moment(collectedDateTime).format('dddd, MMMM D, YYYY'));
                $('#collectedTime').html(moment(collectedDateTime).format('hh:mm A'));
                $('#collectedDateTimeHumanized').html(humanizeDate(collectedDateTime));

                // Date and Time Released
                const releasedDateTime = data.released_datetime;
                $('#releasedDate').html(moment(releasedDateTime).format('dddd, MMMM D, YYYY'));
                $('#releasedTime').html(moment(releasedDateTime).format('hh:mm A'));
                $('#releasedDateTimeHumanized').html(humanizeDate(releasedDateTime));
                
                $('#specimenID').html(data.specimen_ID);
                $('#specimenType').html(data.specimen_type);

                if(data.remarks == null || data.remarks == '') {
                    $('#remarks').html(`<span class="font-weight-normal text-muted font-italic">No data</span>`)
                } else {                   
                    $('#remarks').html(data.remarks);
                }

                $('#performedBy').html(data.performed_by);
                $('#verifiedBy').html(data.verified_by);

                if(data.noted_by == null || data.noted_by == '') {
                    $('#notedBy').html(`<span class="font-weight-normal text-muted font-italic">No data</span>`)
                } else {                   
                    $('#notedBy').html(data.noted_by);
                }

                if(data.encoded_by == null || data.encoded_by == '') {
                    $('#encodedBy').html(`<span class="font-weight-normal text-muted font-italic">No data</span>`)
                } else {                   
                    $('#encodedBy').html(data.encoded_by);
                }

                // Date and Time Uploaded
                const uploadedDateTime = data.created_datetime;
                $('#uploadedDate').html(moment(uploadedDateTime).format('dddd, MMMM D, YYYY'));
                $('#uploadedTime').html(moment(uploadedDateTime).format('hh:mm A'));
                $('#uploadedDateTimeHumanized').html(humanizeDate(uploadedDateTime));

                // Last Updated
                const lastUpdated = data.updated_datetime;
                $('#updatedDate').html(moment(lastUpdated).format('dddd, MMMM D, YYYY'));
                $('#updatedTime').html(moment(lastUpdated).format('hh:mm A'));
                $('#updatedDateTimeHumanized').html(humanizeDate(uploadedDateTime));

                // Show lab report modal
                $('#labReportModal').modal('show');
            }
        }
    })
    .fail(() => console.error('There was an error in getting a lab report'));
}
