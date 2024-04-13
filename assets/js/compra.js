document.addEventListener('DOMContentLoaded', function() {
    // Verificar si el botón submit existe antes de agregar el evento de escucha
    var submitBtn = document.getElementById('submit-btn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe por defecto

            // Realizar la validación de campos aquí
            var cardNumber = document.getElementById('card-number').value;
            var cardExpiryMonth = document.getElementById('card-expiry-month').value;
            var cardExpiryYear = document.getElementById('card-expiry-year').value;
            var cardCvc = document.getElementById('card-cvc').value;

            // Ejemplo de validación: comprobar si los campos no están vacíos
            if (cardNumber.trim() === '' || cardExpiryMonth.trim() === '' || cardExpiryYear.trim() === '' || cardCvc.trim() === '') {
                alert('Por favor, complete todos los campos antes de realizar la compra.');
                return; // Detener el proceso si hay campos vacíos
            }

            // Validar la longitud del CVV
            if (cardCvc.length !== 3) {
                alert('El CVV debe tener exactamente 3 dígitos.');
                return;
            }
            
            // Si todos los campos están llenos y en el formato adecuado, puedes enviar el formulario manualmente
            document.getElementById('payment-form').submit();
        });
    }
});

