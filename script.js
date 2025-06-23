document.addEventListener('DOMContentLoaded', function() {
    // Hitung total bobot saat input berubah
    const bobotInputs = document.querySelectorAll('.bobot-input');
    
    bobotInputs.forEach(input => {
        input.addEventListener('input', calculateTotalBobot);
    });
    
    function calculateTotalBobot() {
        let total = 0;
        bobotInputs.forEach(input => {
            const value = parseFloat(input.value) || 0;
            total += value;
        });
        document.getElementById('totalBobot').textContent = total;
    }
    
    // Validasi form sebelum submit
    const form = document.getElementById('smartForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            let valid = true;
            
            // Validasi bobot
            const totalBobot = parseFloat(document.getElementById('totalBobot').textContent);
            if (totalBobot <= 0) {
                alert('Total bobot harus lebih dari 0');
                valid = false;
            }
            
            // Validasi nilai alternatif
            const numberInputs = document.querySelectorAll('input[type="number"]:not(.bobot-input)');
            numberInputs.forEach(input => {
                if (input.value === '' || isNaN(input.value)) {
                    alert('Harap isi semua nilai alternatif dengan angka');
                    valid = false;
                    return;
                }
            });
            
            if (!valid) {
                e.preventDefault();
            }
        });
    }
});