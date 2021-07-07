/**
 * ===============================================================
 * * MAIN JS FILE
 * ---------------------------------------------------------------
 * This is the main javasript file for this app
 * General methods for the overall web app is declared here
 * 
 * @author PrensDev
 * ===============================================================
 */


/**
 * ===============================================================
 * * ON PAGE LOAD FUNCTIONS
 * ===============================================================
 */
$(() => {
    
    // Remove the preloader after the page was loaded
    $('body').removeClass('modal-open');
    $('#preloader').removeClass('d-flex').addClass('d-none');

    // Live check if connected to the api server
    c19ctavms_API.liveConnect(500);

    // Always hide any active alert on load
    hideAlert();
});


/**
 * ===============================================================
 * * INITIALIZED FUNCTIONS
 * ===============================================================
 */

// Enable all tooltips and popover
$('[data-toggle="tooltip"]').tooltip();
$('[data-toggle="popover"]').popover();

// Toggle the side navigation
$('#sidebarToggle').on('click', (e) => {
    e.preventDefault();
    $('.sb-nav-fixed').toggleClass('sb-sidenav-toggled');
});


/**
 * ===============================================================
 * * FUNCTIONS AND METHODS
 * ===============================================================
 */

// Show fetch error modal when called
showFetchErrModal = (message) => {
    $('#fetchErrLog').html(message);
    $('#fetchErrorModal').modal('show');
}


// Hide fetch error modal when called
hideFetchErrModal = () => $('#fetchErrorModal').modal('hide');


// Show connection error modal when called
showConnErrModal = (message) => {
    $('#connErrLog').html(message);
    $('#connErrorModal').modal('show');
}


// Hide connection error Modal when called
hideConnErrModal = () => $('#connErrorModal').modal('hide');


// Request Logout
requestLogout = () => {

    // Send POST request for user logout
    $.ajax({
        url:  `${ BASE_URL_MAIN }logout`,
        type: 'POST',
        data: { request: 'logout' },
        success: () => {
            
            // Clear the localStorage items 
            localStorage.clear();

            // Redirect to Home Page
            location.assign(BASE_URL_MAIN);
        },
        error: () => {
            console.log('Error occured');
            logoutBtn.attr("disabled", false);
            logoutBtn.html(`Log out`);
        }
    })
    .fail(() => showConnErrModal('Error occured while you try to logout'));;
}


/**
 * ===============================================================
 * * INTERVALS
 * ===============================================================
 */

// Digital Clock
setInterval(() => {

    // Instanciate moment
    const m = moment();
    
    // Get clock containers
    var clockDate    = $('#clockDate');
    var clockTime    = $('#clockTime');
    var clockSession = $('#clockSession');

    // Get formatted date, time, and session values
    const clockDateVal    = m.format("dddd, MMMM D, YYYY");
    const clockTimeVal    = m.format("h:mm:ss");
    const clockSessionVal = m.format("A");

    // Set or display formatted clock to the containers
    // Change only the content if not equal to the current content for better performance
    if(clockDate.html()    != clockDateVal)    clockDate.html(clockDateVal);
    if(clockTime.html()    != clockTimeVal)    clockTime.html(clockTimeVal);
    if(clockSession.html() != clockSessionVal) clockSession.html(clockSessionVal);
}, 1);


// Prevent images to right click
$('img').bind('contextmenu', (e) => { return false });


// // Fetch PH Locations to selectors
// fetchPHLocations = (selectors = {
//     regionsSelector:    'regionsDropdown',
//     provincesSelector:  'provincesDropdown',
//     citiesSelector:     'citiesDropdown',
//     baragaysSelector:   'barangaysDropdown'
// }) => {

//     // Get selectors
//     const regionsSelector   = $('#' + selectors.regionsSelector);
//     const provincesSelector = $('#' + selectors.provincesSelector);
//     const citiesSelector    = $('#' + selectors.citiesSelector);
//     const barangaysSelector = $('#' + selectors.baragaysSelector);

//     // Check if selectors are exists in DOM
//     if(regionsSelector.length && provincesSelector && citiesSelector && barangaysSelector) {
        
//         // Initialize PH Locations
//         regionsSelector.ph_locations({'location_type': 'regions'});
//         provincesSelector.ph_locations({'location_type': 'provinces'});
//         citiesSelector.ph_locations({'location_type': 'cities'});
//         barangaysSelector.ph_locations({'location_type': 'barangays'});
        
//         // Fetch provinces list
//         regionsSelector.ph_locations('fetch_list');
//         provincesSelector.ph_locations('fetch_list');
//         citiesSelector.ph_locations('fetch_list');
//         barangaysSelector.ph_locations('fetch_list');
        
//         // When region selector is changed
//         regionsSelector.on('change', () => {
//             provincesSelector.ph_locations('fetch_list', [{
//                 'region_code': regionsSelector.val()
//             }]);
//             citiesSelector.ph_locations('fetch_list', [{
//                 'province_code': provincesSelector.val()
//             }]);
//             barangaysSelector.ph_locations('fetch_list', [{
//                 'city_code': citiesSelector.val()
//             }]);
//         });
        
//         // When province selector is changed
//         provincesSelector.on('change', () => {
//             citiesSelector.ph_locations('fetch_list', [{
//                 'province_code': provincesSelector.val()
//             }]);
//             barangaysSelector.ph_locations('fetch_list', [{
//                 'city_code': citiesSelector.val()
//             }]);
//         });
        
//         // When cities selector is changed
//         citiesSelector.on('change', () => {
//             barangaysSelector.ph_locations('fetch_list', [{
//                 'city_code': citiesSelector.val()
//             }]);
//         });
//     }
// }

getLongLat = (query) => {

    const rawQuery = query.split(' ');

    var newQuery = '';

    rawQuery.forEach((q, i) => {
        newQuery += q;
        if(i !== rawQuery.length-1) newQuery += '+';
    });

    const HERE_GEOCODE_API_KEY = 'wCzOTTWBWwbtIOhgfZWKvn_oThvZlhMY07JHNayyh_Y';
    const HERE_GEOCODE_SEARCH_QUERY = newQuery;

    $.ajax({
        url: `https://geocode.search.hereapi.com/v1/geocode?q=${ HERE_GEOCODE_SEARCH_QUERY }&apiKey=${ HERE_GEOCODE_API_KEY }`,
        type: 'GET',
        success: (result) => {
            if(result) {

                // Get the location
                const location = result.items[0];

                console.log(location);

                // Get the address from location
                const address = location.address;

                console.log(address);

                console.log(address.postalCode)

                // Get the position from location
                const position = location.position;

                console.log(position)

            } else {
                console.log('No result was found');
            }
        }
    })
    .fail(() => console.log('There was an error in fetching location'));
}

// Get OTP
getOTP = () => {
    const email = prompt('Type your email')
    const password = prompt('Type your password')

    $.ajax({
        url: `${ BASE_URL_API }send-verification`,
        type: 'POST',
        data: {
            email: email,
            password: password
        },
        dataType: 'json',
        success: result => {
            if(result) {
                console.log(result);

                const user_otp = prompt('Type OTP');

                $.ajax({
                    url: `${ BASE_URL_API }verify-otp`,
                    type: 'POST',
                    data: {
                        user_otp: user_otp
                    },
                    success: result => {
                        if(result) {
                            if(result.matched) {
                                alert('Verified');
                            } else {
                                alert('Not Verified');
                            }
                        }
                    }
                })
                .fail(() => console.error('There was an error in verifying otp'));
            }
        }
    })
    .fail(() => console.error('There was an error in sending otp'));
}

// getOTP();