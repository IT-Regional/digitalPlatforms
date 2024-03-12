function mostrarInformacionCliente(customerId) {
        // Hacer una solicitud a la API para obtener la información del cliente
        fetch(`https://beesys.beenet.com.sv/api/2.0/admin/customers/customer/${customerId}`, {
            method: 'GET',
            headers: {
                'Authorization': 'Splynx-EA (access_token=' + '{{ session(`customer_token`) }}' + ')'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Mostrar la información del cliente en un modal o en algún otro lugar en la página
            alert(`Información del Cliente:
Nombre: ${data.name}
Email: ${data.email}
Teléfono: ${data.phone}`);
        })
        .catch(error => {
            console.error('Error al obtener la información del cliente:', error);
            alert('Error al obtener la información del cliente. Por favor, inténtelo de nuevo más tarde.');
        });
    }