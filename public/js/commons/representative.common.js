/**
 * ===========================================================================
 * * COMMON FUNCTIONS FOR REPRESENTATIVE PAGES
 * ---------------------------------------------------------------------------
 * TThis file contains the functions used for citizen views and pages
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
    generateEstablishmentQRCode(); 
});


/**
 * ===========================================================================
 * FUNCTIONS AND METHODS
 * ===========================================================================
 */


// Generate Establishment QR Code
generateEstablishmentQRCode = () => {

    // Get the establishement_ID
    const establihsment_id = "405b-2h3n-12nw-03942";

    // Check first if element with ID is existed
    // This is done because there is always error returned from QRCode function 
    if($('#establishmentQRCode').length !== 0) {
        
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
    if($('#establishmentQRCodeInModal').length !== 0) {

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


// Print Establishment QR Code
$('#printQRCodeBtn').on('click', () => {
    const establishmentName = 'ABC Company';
    const qrcode = $('#QRCodeInModal').html();
    const w = window.open('', 'Print QR COde');

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
                .p-border {
                    padding: 20px;
                    border: solid #ccc 1px;
                    border-radius: 10px;
                }
                .text-center { text-align: center } 
                .mt { margin-top: 5px }
            </style>
            <body onload="window.print()">
                <h1 class="text-center">QR Code for Entry</h1>
                <h2 class="establishment">${ establishmentName }</h2>
                <div class="centered">
                    <div class="p-border">${ qrcode }</div>
                </div>
                <p class="text-center pt">Scan this QR Code before you enter to this establishment</p>
            </body>
        </html>
    `);
    w.document.close();
    setTimeout(() => w.close(), 5);
});
