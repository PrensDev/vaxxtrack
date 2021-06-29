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
$('img').bind('contextmenu', (e) => {
    return false;
});


// Fetch PH Locations to selectors
fetchPHLocations = (selectors = {
    regionsSelector:    'regionsDropdown',
    provincesSelector:  'provincesDropdown',
    citiesSelector:     'citiesDropdown',
    baragaysSelector:   'barangaysDropdown'
}) => {

    // Get selectors
    const regionsSelector   = $('#' + selectors.regionsSelector);
    const provincesSelector = $('#' + selectors.provincesSelector);
    const citiesSelector    = $('#' + selectors.citiesSelector);
    const barangaysSelector = $('#' + selectors.baragaysSelector);

    // Check if selectors are exists in DOM
    if(regionsSelector.length && provincesSelector && citiesSelector && barangaysSelector) {
        
        // Initialize PH Locations
        regionsSelector.ph_locations({'location_type': 'regions'});
        provincesSelector.ph_locations({'location_type': 'provinces'});
        citiesSelector.ph_locations({'location_type': 'cities'});
        barangaysSelector.ph_locations({'location_type': 'barangays'});
        
        // Fetch provinces list
        regionsSelector.ph_locations('fetch_list');
        provincesSelector.ph_locations('fetch_list');
        citiesSelector.ph_locations('fetch_list');
        barangaysSelector.ph_locations('fetch_list');
        
        // When region selector is changed
        regionsSelector.on('change', () => {
            provincesSelector.ph_locations('fetch_list', [{
                'region_code': regionsSelector.val()
            }]);
            citiesSelector.ph_locations('fetch_list', [{
                'province_code': provincesSelector.val()
            }]);
            barangaysSelector.ph_locations('fetch_list', [{
                'city_code': citiesSelector.val()
            }]);
        });
        
        // When province selector is changed
        provincesSelector.on('change', () => {
            citiesSelector.ph_locations('fetch_list', [{
                'province_code': provincesSelector.val()
            }]);
            barangaysSelector.ph_locations('fetch_list', [{
                'city_code': citiesSelector.val()
            }]);
        });
        
        // When cities selector is changed
        citiesSelector.on('change', () => {
            barangaysSelector.ph_locations('fetch_list', [{
                'city_code': citiesSelector.val()
            }]);
        });
    }
}

hideAlert();