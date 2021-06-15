/**
 * ===========================================================================
 * * ESTABLISHMENT METHODS
 * ---------------------------------------------------------------------------
 * This file contains the methods and functions for managing and
 * retrieving representative establishments and its information
 * ===========================================================================
 */


/**
 * ====================================================================
 * Declare functions here that are required to call on page load
 * ====================================================================
 */

$(() => {
    getAllEstablishmentsAJAX();
});


/**
 * ===========================================================================
 * GET ALL ESTABLISHMENTS
 * ===========================================================================
 */

// Establishment Container Link Blade
const establishmentContainerLink = (establishment_ID, establishment_name) => {
    return `
        <a 
            class     = "nav-link" 
            href      = "${ BASE_URL_MAIN }r/establishment/${ establishment_ID }"
            draggable = "false"
        >
            <div class="sb-nav-link-icon mr-1">
                <i class="far fa-building icon-container"></i>
            </div>
            <span>${ establishment_name }</span>
        </a>
    `
}

// Send GET request for retrieving all estabslishments
getAllEstablishmentsAJAX = () => {
    $.ajax({
        url: `${ BASE_URL_API }representative/establishments`,
        type: 'GET',
        headers: {
            Accept: 'application/json',
            Authorization: `Bearer ${ localStorage.getItem('token') }`
        },
        success: (res) => {
            if(res) {

                // Get all establishments and create link container in sidebar
                var establishmentsContainer = '';
                res.data.forEach((establishment, index) => {
                    establishmentsContainer += establishmentContainerLink(establishment.establishment_ID, establishment.name);
                });

                // Append links to the sidebar
                $('#establishmentsContainer').html(establishmentsContainer);
            } else {
                console.log('No result was found');
            }
        },
        error: (err) => {
            console.log(err);
        }
    })
    .fail(() =>{
        console.log('Error');
    });
}



/**
 * ===========================================================================
 * UPDATE ESTABLISHMENT
 * ===========================================================================
 */


// Update establishment AJAX
updateEstablishmentAJAX = () => {
    
    // Get date from form to rawData
    var rawData = new FormData($('#editEstablishmentDetailsForm')[0]);

    // Set properties with rawData values
    var data = {
        name: rawData.get('establishmentName'),
        type: rawData.get('establishmentType'),
        address: {
            region: rawData.get('region'),
            province: rawData.get('province'),
            city_municipality: rawData.get('cityMunicipality'),
            barangay_district: rawData.get('barangayDistrict'),
            street: rawData.get('street'),
            specific_location: rawData.get('specificLocation'),
        }
    }

    console.log(data);
}


// Edit Establishment Details Form
$('#editEstablishmentDetailsForm').validate(validateOptions(
    
    // Rules
    {
        
        // Establishment General Information
        establishmentName: {
            required: true,
        },
        establishmentType: {
            required: true,
        },

        // Establishment Address
        region: {
            required: true,
        },
        province: {
            required: true,
        },
        cityMunicipality: {
            required: true,
        },
        baranggayDistrict: {
            required: true,
        },
        street: {
            required: true,
        },
        specificLocation: {
            required: true,
        },
    },
    
    // Messages
    {
        
        // Establishment General Information
        establishmentName: {
            required: "Establishment name is required",
        },
        establishmentType: {
            required: "Please select a type of establishment",
        },

        // Establishment Address
        region: {
            required: "Region is required",
        },
        province: {
            required: "Province is required",
        },
        cityMunicipality: {
            required: "City/Municipality is required",
        },
        baranggayDistrict: {
            required: "Baranggay/District is required",
        },
        street: {
            required: "Street is required",
        },
        specificLocation: {
            required: "The specific location is required",
        },
    },

    // Submit Handler
    () => updateEstablishmentAJAX()
));


/**
 * ===========================================================================
 * ADD ESTABLISHMENT
 * ===========================================================================
 */

// Add Establishment Form
$('#addEstablishmentForm').validate(validateOptions(
    
    // Rules
    {
        // Establishment General Information
        establishmentName: {
            required: true
        },
        establishmentType: {
            required: true
        },

        // Establishment Address
        region: {
            required: true,
        },
        province: {
            required: true,
        },
        cityMunicipality: {
            required: true,
        },
        barangayDistrict: {
            required: true,
        },
        street: {
            required: true,
        },
        specificLocation: {
            required: true,
        },
    }, 
    
    // Messages
    {
        
        // Establishment General Information 
        establishmentName: {
            required: 'Establishment name is required'
        },
        establishmentType: {
            required: 'Please select a type for establishment'
        },
        
        // Establishment Address
        region: {
            required: "Region is required",
        },
        province: {
            required: "Province is required",
        },
        cityMunicipality: {
            required: "City/Municipality is required",
        },
        barangayDistrict: {
            required: "Barangay/District is required",
        },
        street: {
            required: "Street is required",
        },
        specificLocation: {
            required: "The specific location is required",
        },
    },
    
    // Submit Handler
    () => console.log('Submit')
));


/**
 * ===========================================================================
 * ADD ESTABLISHMENT REPRESENTATIVE
 * ===========================================================================
 */

// Add Representative Form
$('#addRepresentativeForm').validate(validateOptions(
    
    // Rules
    {
        firstName: {
            required: true
        },
        lastName: {
            required: true
        },
        position: {
            required: true
        },
        authDetails: {
            required: true
        },
    },
    
    // Messages
    {
        firstName: {
            required: 'First name is required'
        },
        lastName: {
            required: 'Last name is required'
        },
        position: {
            required: 'Position name is required'
        },
        authDetails: {
            required: 'Account details name is required'
        },
    },

    // Submit Handler
    () => {
        if(submitHandlerLogs) console.log("#addRepresentativeForm is submitted");
    }
));