/**
 * ===========================================================================
 * * CONSTANTS
 * ---------------------------------------------------------------------------
 * Here are the constants that are used by some javascript files.
 * Configure this as needed.
 * 
 * Naming Convention: constant variables must be in this form: CAPITAL_LETTERS 
 * ===========================================================================
 */


/**
 * ===========================================================================
 * * CONSTANT VARIABLES
 * ===========================================================================
 */

// Base URLs
const BASE_URL_MAIN = 'http://localhost/c19ctavms-web/';
const BASE_URL_API  = 'http://localhost:3000/c19ctavms/v1/';


// jQuery Validation Variables
const JQUERY_VALIDATE_DEBUG = false;


// AJAX Variables
const AJAX_REQUEST_TIMEOUT = 30000;


// Live update data timeout
const LIVE_UPDATE_DATA_TIMEOUT = 3000;


// Leaflet Variables
// DO NOT DISTRIBUTE THE LEAFLET ACCESS TOKEN
const LEAFLET_ACCESS_TOKEN ='pk.eyJ1IjoicHJlbnNkZXYiLCJhIjoiY2tweXo0eXNtMWxicjJwcDk0N3h5ZDl0NCJ9.ODmDvWOcEhZlNEMDltHtRw';
const LEAFLET_ATTRIBUTION = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';


/**
 * ===========================================================================
 * * CONSTANT OBJECTS
 * ===========================================================================
 */

// AJAX Headers
const AJAX_HEADERS = {
    Accept: 'application/json',
    Authorization: `Bearer ${ localStorage.getItem('token') }`
}

// c19ctavms API Object
var c19ctavms_API = {
    liveConnect: (ms = 100) => {
        setInterval(() => {
            $.ajax({
                type: 'GET',
                url: BASE_URL_API,
                timeout: AJAX_REQUEST_TIMEOUT,
                success: () => hideConnErrModal()
            })
            .fail(() => showConnErrModal('Cannot connect to the server'));
        }, ms);
    },
    sendUserRequest: (settings) => {
        $.ajax({
            url:  BASE_URL_API + settings.url,
            type: settings.type,
            headers: AJAX_HEADERS,
            data: settings.data,
            dataType: 'json',
            success: settings.success,
            error: (err) => console.log(err) 
        })
        .fail(() => showConnErrModal('Cannot connect to the server'));
    }
}



/**
 * ===========================================================================
 * * CONSTANT FUNCTIONS AND METHODS
 * ===========================================================================
 */

// Initialize DataTables by calling their ids
const initDataTables =(dataTableIDs = []) => {
    dataTableIDs.forEach(id => {

        // Only call DataTable() method if id exists in DOM
        // to reduce warning or error logs in console 
        if($(`#${ id }`).length) $(`#${ id }`).DataTable();
    });
}

// Return options for jquery validation plugin
// with default or initialized other option values
const validateOptions = (
    validateOptions = {
        rules: {}, 
        messages: {}, 
        submitHandler: () => {}
    }
) => {
    return {
        debug: JQUERY_VALIDATE_DEBUG,
        rules: validateOptions.rules,
        messages: validateOptions.messages,
        errorElement: "div",
        errorPlacement: (err, el) => {
            err.addClass("invalid-feedback");
            el.closest(".form-group").append(err);
        },
        highlight:   (el) => $(el).addClass('is-invalid').removeClass('is-valid'),
        unhighlight: (el) => $(el).addClass('is-valid').removeClass('is-invalid'),
        submitHandler: validateOptions.submitHandler
    }
}


// Live render the data
const liveRenderData = (handler) => {
    
    // Execute handler when page is loaded
    handler();

    // Live execute the handler
    setInterval(() => handler(), LIVE_UPDATE_DATA_TIMEOUT);
}