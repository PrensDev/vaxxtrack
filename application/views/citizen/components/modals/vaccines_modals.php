<!-- View Vaccine Details Modal -->
<div class="modal fade" id="viewVaccineDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-syringe"></h5>
                <h5 class="modal-title">Vaccine Details</h5>
                <button 
                    class        = "btn btn-sm btn-white-muted" 
                    type         = "button" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Vaccine</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-syringe text-success"></i>
                                </div>
                                <div>
                                    <div id="productName"></div>
                                    <div class="small text-secondary" id="vaccineName"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Manufacturer</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-industry text-secondary"></i>
                                </div>
                                <div id="manufacturer"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>
                            <div class="d-flex align-items-baseline">
                                <div class="icon-container">
                                    <i class="fas fa-dna text-info"></i>
                                </div>
                                <div id="type"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Shots Details</th>
                        <td id="shotsDetails"></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td id="description"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-white p-3"></div>
        </div>
    </div>
</div>