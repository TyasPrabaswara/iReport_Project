document.getElementById('reportType').addEventListener('change', function() {
    const transportationFields = document.getElementById('transportationFields');
    const locationFields = document.getElementById('locationFields');
    
    if (this.value === 'transportation') {
        transportationFields.style.display = 'block';
        locationFields.style.display = 'none';
        
        // Make transportation fields required
        document.getElementById('transportType').required = true;
        document.getElementById('vehicleId').required = true;
        document.getElementById('route').required = true;
        document.getElementById('operatingTime').required = true;
        document.getElementById('address').required = false;
    } 
    else if (this.value === 'location') {
        transportationFields.style.display = 'none';
        locationFields.style.display = 'block';
        
        // Make location fields required
        document.getElementById('address').required = true;
        document.getElementById('transportType').required = false;
        document.getElementById('vehicleId').required = false;
        document.getElementById('route').required = false;
        document.getElementById('operatingTime').required = false;
    }
    else {
        transportationFields.style.display = 'none';
        locationFields.style.display = 'none';
    }
});

// Form validation
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
})()