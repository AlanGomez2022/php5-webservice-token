// 1. Esperamos a que todo el contenido del DOM esté cargado
document.addEventListener("DOMContentLoaded", function() {
    
    // 2. Seleccionamos el formulario por su ID
    const miFormulario = document.getElementById("miFormulario");

    // 3. Añadimos un "escuchador" para el evento 'submit'
    miFormulario.addEventListener("submit", function(event) {
        
        // 4. ¡LA CLAVE! Prevenimos el comportamiento por defecto (la recarga)
        event.preventDefault();

        // 5. Obtenemos todos los datos del formulario automáticamente
        const formData = new FormData(miFormulario);

        // 6. Usamos fetch() para enviar los datos
        fetch(miFormulario.action, {
            method: "POST", // El método que especificaste en el HTML
            body: formData  // Los datos que acabamos de recolectar
        })
        .then(response => {
            // Es buena idea chequear si la respuesta fue exitosa
            if (!response.ok) {
                throw new Error('La respuesta del servidor no fue OK');
            }
            // Convertimos la respuesta a texto (o .json() si el servidor devuelve JSON)
            return response.text(); 
        })
        .then(data => {
            // 7. Hacemos algo con la respuesta del servidor
            console.log("Respuesta del servidor:", data);
            document.getElementById("respuestaServidor").innerHTML = "¡Éxito! El servidor respondió: " + data;

            // Opcional: limpiar el formulario después de enviarlo
            miFormulario.reset();
        })
        .catch(error => {
            // 8. Manejamos cualquier error que ocurra durante el envío
            console.error("Error al enviar el formulario:", error);
            document.getElementById("respuestaServidor").innerHTML = "Error: " + error.message;
        });
    });
});