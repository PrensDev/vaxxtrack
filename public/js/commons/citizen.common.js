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

initDataTables([
    'vaccAppointmentsDT'
]);

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