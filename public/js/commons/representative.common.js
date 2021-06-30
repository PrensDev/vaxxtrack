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


/**
 * ===========================================================================
 * FUNCTIONS AND METHODS
 * ===========================================================================
 */

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
