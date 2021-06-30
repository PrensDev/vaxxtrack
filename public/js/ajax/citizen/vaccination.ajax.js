/**
 * ====================================================================
 * * VACCINATION METHODS
 * --------------------------------------------------------------------
 * This file contains the methods and functions for managing
 * vaccines and vaccination records
 * ====================================================================
 */




$(() => {
    getAllVaccinesAJAX();
    viewVaccCard();
});

/**
 * ====================================================================
 * GET VACCINES
 * ====================================================================
 */

getAllVaccinesAJAX = () => {
    $.ajax({
        url: `${ BASE_URL_API }vaccines`,
        type: 'GET',
        success: (result) => {
            if(result) {

                // Get data from result
                const data = result.data

                console.log(data);
            } else {
                console.log('No result for vaccine records');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in retrieving vaccine records');
    })
}


/**
 * ====================================================================
 * GET VACCINATION RECORDS OF CITIZEN
 * ====================================================================
 */

// Vaccination Record
viewVaccCard = () => {
    $.ajax({
        url: `${ CITIZEN_API_ROUTE }vaccination-records/${ localStorage.getItem('user_ID') }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                
                // Get data from result
                const data = result.data;
                
                // Get vaccination records of citizen
                const vaccRecords = data.vaccination_records;

                $('#citizenLastName').html(data.last_name);
                $('#citizenFirstName').html(data.first_name);
                $('#citizenMiddleInitial').html(`${data.middle_name[0]}.`);
                $('#citizenBirthDate').html(moment(data.birth_date).format('MMMM D, YYYY'));
                $('#citizenNumber').html(data.user_ID);

                var rows = '';

                // Get all records (max of 4)
                for(var i = 0; i < 4; i++) {

                    // Get each record
                    const r = vaccRecords[i];

                    if(i == 0) {
                        col1 = `1<sup>st</sup> Dose`;
                    } else if(i == 1) {
                        col1 = `2<sup>nd</sup> Dose`;
                    } else {
                        col1 = `Other`
                    }

                    if(r != null) {
                        col2 = `
                            <div>${r.vaccine_used.product_name}</div>
                            <div class="small text-secondary">${r.vaccine_used.manufacturer}</div>
                        `;
                        col3 = moment(r.vaccination_date).format('MMM. DD, YYYY');
                        
                        vaccinationSite = 
                            (r.vaccininated_in == null || r.vaccininated_in == '') 
                                ? 'Unknown vaccination site' 
                                : r.vaccininated_in;

                        col4 = `
                            <div>${r.vaccinated_by}</div>
                            <div class="small text-secondary">${vaccinationSite}</div>
                        `;
                    } else {
                        col2 = `<i class="text-muted font-weight-normal">No data yet</i>`;
                        col3 = `<i class="text-muted font-weight-normal">--:--:----</i>`
                        col4 = `<i class="text-muted font-weight-normal">No data yet</i>`;
                    }

                    rows += `
                        <tr>
                            <td>${ col1 }</td>
                            <td>${ col2 }</td>
                            <td>${ col3 }</td>
                            <td>${ col4 }</td>
                        <tr>
                    `
                }

                $('#vaccCardDataRows').html(rows);
            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => {
        console.log('There was an error in getting a vaccination record')
    })
}