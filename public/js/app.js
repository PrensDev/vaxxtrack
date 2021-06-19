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
});


/**
 * ===============================================================
 * * INITIALIZED FUNCTIONS
 * ===============================================================
 */

// Initialize DataTable
// Check first 
if($('#dataTable').length) $('#dataTable').DataTable();

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
            location.assign(BASE_URL_MAIN)
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

// Live check if connected to the api server
c19ctavms_API.liveConnect(500);

console.log(localStorage.getItem('token'));