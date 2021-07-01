/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR CITIZEN PAGES
 * ---------------------------------------------------------------------------
 * This file contains the functions used for citizen views and pages
 * ===========================================================================
 */


/**
 * ===========================================================================
 * ON PAGE LOAD
 * Declare functions and methods that is required to be called when a page is
 * fully loaded
 * ===========================================================================
 */

$(() => {
    generateCitizensQRCode(); 
});


/**
 * ===========================================================================
 * FUNCTIONS AND METHODS
 * ===========================================================================
 */

// Generate Citizen's QR Code
generateCitizensQRCode = () => {
    
    // Get the user_ID of the citizen
    const user_ID = localStorage.getItem('user_ID');

    // Check first if element with ID is existed
    // This is done because there is always error returned from QRCode function 
    if($('#citizenQRCodeInID').length !== 0) {    
    
        // QR Code in ID
        const citizenQRCodeInID = new QRCode('citizenQRCodeInID', {
            text: "sample-text",
            width: 200,
            height: 200,
            correctLevel: QRCode.CorrectLevel.H
        });
        citizenQRCodeInID.makeCode(user_ID);
    }

    // Check first if element with ID is existed
    // This is done because there is always error returned from QRCode function 
    if($('#citizenQRCodeInModal').length !== 0) {    
    
        // QR Code In Modal
        const citizenQRCodeInModal = new QRCode('citizenQRCodeInModal', {
            text: "sample-text",
            width: 275,
            height: 275,
            correctLevel: QRCode.CorrectLevel.H
        });
        citizenQRCodeInModal.makeCode(user_ID);
    }
}


// Print Vaccination Card
printVaccinationCard = () => {

    // Get the content of vaccination card
    const vaccinationCard = $('#vaccinationCard').html();
    
    // Instanciate a window for printing
    const w = window.open('', 'Print QR COde');

    // Open a document in window and start printing
    w.document.open();
    w.document.write(`
        <html>
            <style>
                body {
                    font-family: Segoe UI;
                }
                .establishment {
                    text-align: center;
                    text-transform: uppercase;
                    font-weight: normal;
                }
                .centered {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .text-center { text-align: center } 
                .mt { margin-top: 5px }
            </style>
            <body onload="window.print()">
                <h1 class="text-center">Your Vaccination Card</h1>
                <div class="centered">
                    <div>${ vaccinationCard }</div>
                </div>
                <p class="text-center pt">Scan this QR Code before you enter to this establishment</p>
            </body>
        </html>
    `);
    w.document.close();
    setTimeout(() => w.close(), 5);
}

// Disable Save Health Status Button
disableHealthStatusButton = () => {
    const fields = [
        'healthy',
        'fever',
        'dryCough',
        'soreThroat',
        'breathShortness',
        'smellTasteLoss',
        'fatigue',
        'achesPain',
        'runnyNose',
        'diarrhea',
        'headache'
    ];

    var disabled = true;

    fields.forEach(f => {
        if($('#'+f).is(':checked')) disabled = false;
    });

    if(disabled) $('#saveHealthStatus').prop('disabled', true);
}

// Uncheck symptoms
$('#healthy').on('change', () => {
    disableHealthStatusButton();
    if($('#healthy').is(':checked')) {
        const symptomsFields = [
            'fever',
            'dryCough',
            'soreThroat',
            'breathShortness',
            'smellTasteLoss',
            'fatigue',
            'achesPain',
            'runnyNose',
            'diarrhea',
            'headache'
        ];

        symptomsFields.forEach(field => {
            $('#'+field).prop('checked', false);
        });

        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#fever').on('change', () => {
    disableHealthStatusButton();
    if($('#fever').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#dryCough').on('change', () => {
    disableHealthStatusButton();
    if($('#dryCough').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#soreThroat').on('change', () => {
    disableHealthStatusButton();
    if($('#soreThroat').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#breathShortness').on('change', () => {
    disableHealthStatusButton();
    if($('#breathShortness').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#smellTasteLoss').on('change', () => {
    disableHealthStatusButton();
    if($('#smellTasteLoss').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#fatigue').on('change', () => {
    disableHealthStatusButton();
    if($('#fatigue').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#achesPain').on('change', () => {
    disableHealthStatusButton();
    if($('#achesPain').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#runnyNose').on('change', () => {
    disableHealthStatusButton();
    if($('#runnyNose').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#diarrhea').on('change', () => {
    disableHealthStatusButton();
    if($('#diarrhea').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});

$('#headache').on('change', () => {
    disableHealthStatusButton();
    if($('#headache').is(':checked')) {
        $('#healthy').prop('checked', false);
        $('#saveHealthStatus').prop('disabled', false);
    }
});