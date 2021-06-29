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


// User Main Routes
const CITIZEN_MAIN_ROUTE         = `${ BASE_URL_MAIN }c/`;
const REPRESENTATIVE_MAIN_ROUTE  = `${ BASE_URL_MAIN }r/`;
const HEALTH_OFFICIAL_MAIN_ROUTE = `${ BASE_URL_MAIN }h/`;
const SUPER_ADMIN_MAIN_ROUTE     = `${ BASE_URL_MAIN }admin/`;


// User API Routes
const CITIZEN_API_ROUTE         = `${ BASE_URL_API }citizen/`;
const REPRESENTATIVE_API_ROUTE  = `${ BASE_URL_API }representative/`;
const HEALTH_OFFICIAL_API_ROUTE = `${ BASE_URL_API }health-official/`;
const SUPER_ADMIN_API_ROUTE     = `${ BASE_URL_API }super-admin/`;


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

// showAlert
const showAlert = (theme, message) => {
    $('#alertContainer').html(`
        <div class="alert alert-${ theme } alert-dismissible fade show mb-4" role="alert" id="alert">
            <span class="font-weight-semibold">${ message }</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `);

    setTimeout(() => $('#alert').alert('close'), 5000);
}

// Hide alert
const hideAlert = (id = 'alert', timeout = 5000) => {
    const alert = $('#' + id);
    if(alert.length) setTimeout(() => alert.alert('close'), timeout);
} 

// Reset Fields
const resetFields = (fieldIDs = []) => {
    fieldIDs.forEach(id => {
        const inputElement = $('#' + id);
        
        if(inputElement.hasClass('selectpicker')) {
            inputElement.selectpicker('val', '')
            inputElement.selectpicker('refresh');
        } else {
            inputElement.val(this.defaultValue);
        }
    });
} 

// Make Button Loading
const makeBtnLoading = (id = '') => {
    const btn = $('#' + id);

    btn.attr("disabled", true);
    btn.html(`
        <span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>
    `);
}

// Make Button Set its default value
const makeBtnDefault = (id = '', content = '') => {
    const btn = $('#' + id);
    btn.html(content);
    btn.removeAttr('disabled');
}

// Set Form Values
const setFormValues = (formElement = '', formFieldNamesAndValues = []) => {

    // Get the form
    const form = $(formElement);
    
    // Check if form exists
    if(form.length) {

        // Set the values for each fields by name
        formFieldNamesAndValues.forEach(el => {
                        
            // Get the name value for name attribute
            const name = `[name="${ el.name }"]`;
    
            // Get the value for input fields
            const value  = el.value;
            
            // If element is an input
            if($(`input${ name }`).length) {
                $(`input${ name }`).val(value);
            }
    
            // If element is an textarea
            if($(`textarea${ name }`).length) {
                $(`textarea${ name }`).html(value)
            }
        });
    }

    // Reset the form
    const vForm = form.validate();
    vForm.resetForm();
}

// Live render the data
const liveRenderData = (handler) => {
    
    // Execute handler when page is loaded
    handler();

    // Live execute the handler
    setInterval(() => handler(), LIVE_UPDATE_DATA_TIMEOUT);
}