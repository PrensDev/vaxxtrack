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
 * * GET ALL ESTABLISHMENTS
 * ===========================================================================
 */

// Establishment Container Link Blade
const establishmentContainerLink = (establishment_ID, establishment_name) => {
    return `
        <a 
            class     = "nav-link" 
            href      = "${ REPRESENTATIVE_MAIN_ROUTE }establishment/${ establishment_ID }"
            draggable = "false"
        >
            <div class="sb-nav-link-icon mr-1">
                <i class="far fa-building icon-container"></i>
            </div>
            <span>${ establishment_name }</span>
        </a>
    `
}

// Get All Establishment AJAX
getAllEstablishmentsAJAX = () => {
    $.ajax({
        url: `${ REPRESENTATIVE_API_ROUTE }establishments`,
        type: 'GET',
        headers: AJAX_HEADERS,
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
        }
    })
    .fail(() =>console.error('There was an error in getting all establishments'));
}


/**
 * ===========================================================================
 * * GET ESTABLISHMENT DETAILS
 * ===========================================================================
 */

// Get Establishment Details
if($('#establishmentDetails').length) {
    const establishment_ID = location.pathname.split('/')[4];

    $.ajax({
        url: `${ REPRESENTATIVE_API_ROUTE }establishments/${ establishment_ID }`,
        type: 'GET',
        headers: AJAX_HEADERS,
        success: (result) => {
            if(result) {
                const data = result.data;

                // Generate Establishment QR Code
                generateEstablishmentQRCode = (establihsment_id) => {

                    // Check first if element with ID is existed
                    // This is done because there is always error returned from QRCode function 
                    if($('#establishmentQRCode').length) {
                        
                        // Set Establishment QC Code 
                        const establishmentQRCode = new QRCode('establishmentQRCode', {
                            text: "sample-text",
                            width: 125,
                            height: 125,
                            correctLevel: QRCode.CorrectLevel.H
                        });
                        establishmentQRCode.makeCode(establihsment_id);
                    }

                    // Check first if element with ID is existed
                    // This is done because there is always error returned from QRCode function
                    if($('#establishmentQRCodeInModal').length) {

                        // Set Establishment QR Code in Modal
                        const establishmentQRCodeInModal = new QRCode('establishmentQRCodeInModal', {
                            text: "sample-text",
                            width: 300,
                            height: 300,
                            correctLevel: QRCode.CorrectLevel.H
                        });
                        establishmentQRCodeInModal.makeCode(establihsment_id);
                    }
                }
                generateEstablishmentQRCode(data.establishment_ID);

                // Establishment Details
                $('#establishmentName').html(data.name);
                $('#establishmentNameForDisplay').html(data.name);
                $('#estName').val(data.name);
                $('#establishmentType').html(data.type);
                $('#establishmentTypeForDisplay').html(data.type);

                // Roled By
                const roledBy = data.roled_by;
                roledBy.forEach(r => {
                    const role = r.Roles;
                    if(role.representative_ID === localStorage.getItem('user_ID')) $('#representativeRole').html(role.role);
                });
                
                // Establishment Location / Address
                const address = data.address;
                $('#establishmentLocationForDisplay').html(address.barangay_district + ', ' + address.city_municipality + ', ' + address.province);
                $('#establishmentRegion').html(address.region);
                $('#establishmentProvince').html(address.province);
                $('#establishmentCity').html(address.city_municipality);
                $('#establishmentStreetAndBarangay').html(address.street + ', ' + address.barangay_district);
                $('#establishmentSpecificLocation').html(address.specific_location);
                $('#establishmentZipCode').html(address.zip_code);
                $('#establishmentLatitude').html(address.latitude);
                $('#establishmentLongitude').html(address.longitude);
                $('#estLat').val(address.latitude);
                $('#estLng').val(address.longitude);
                $('#estLoc').val(address.barangay_district + ', ' + address.city_municipality);

                // Added DateTime
                const createdDatetime = data.created_datetime;
                $('#establishmentAddedDate').html(moment(createdDatetime).format('dddd, MMMM D, YYYY'));
                $('#establishmentAddedTime').html(moment(createdDatetime).format('hh:mm:ss A'));
                $('#establishmentAddedAtHumanized').html(humanizeDate(createdDatetime));

                // Updated Datetime
                const updatedDatetime = data.updated_datetime;
                $('#establishmentUpdatedDate').html(moment(updatedDatetime).format('dddd, MMMM D, YYYY'));
                $('#establishmentUpdatedTime').html(moment(updatedDatetime).format('hh:mm:ss A'));
                $('#establishmentUpdatedAtHumanized').html(humanizeDate(updatedDatetime));
            } else {
                location.replace(`${ BASE_URL_MAIN }page_not_found`);
            }
        }
    })
    .fail(() => location.replace(`${ BASE_URL_MAIN }page_not_found`));
}


/**
 * ===========================================================================
 * * UPDATE ESTABLISHMENT
 * ===========================================================================
 */

// Update Establishment AJAX
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
$('#editEstablishmentDetailsForm').validate(validateOptions({
    rules: {
        
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
    messages: {
        
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
    submitHandler: () => updateEstablishmentAJAX()
}));


/**
 * ===========================================================================
 * * ADD ESTABLISHMENT
 * ===========================================================================
 */

// Add Establishment Form
$('#addEstablishmentForm').validate(validateOptions({
    rules: {
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
    messages: {
        
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
    submitHandler: () => console.log('Submit')
}));


/**
 * ===========================================================================
 * * ADD REPRESENTATIVE
 * ===========================================================================
 */

// Add Representative Form
$('#addRepresentativeForm').validate(validateOptions({
    rules: {
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
    messages: {
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
    submitHandler: () => {
        if(submitHandlerLogs) console.log("#addRepresentativeForm is submitted");
    }
}));


/**
 * ===========================================================================
 * * UPDATE ROLE
 * ===========================================================================
 */

// Change role
changePosition = () => {
    alert('hello');
    $('#changePositionModal').modal('show');
}
