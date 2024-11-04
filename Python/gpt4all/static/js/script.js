        function leerRespuesta() {
            const respuesta = document.getElementById("response_text").innerText.trim();

            if (respuesta) {
                const utterance = new SpeechSynthesisUtterance(respuesta);
                utterance.lang = "es-ES";

                // Inicia la animación de hablar
                const mouth = document.querySelector(".mouth");
                mouth.style.animation = "talk 0.2s infinite";

                // Hablar y detener la animación al terminar
                utterance.onend = () => {
                    mouth.style.animation = "none";
                };

                window.speechSynthesis.speak(utterance);
                ocultarCargando();  // Oculta el círculo de carga al recibir respuesta
            }
        }

        // Muestra el círculo de carga
        function mostrarCargando() {
            document.getElementById("loading_overlay").style.display = "flex";
        }

        // Oculta el círculo de carga
        function ocultarCargando() {
            document.getElementById("loading_overlay").style.display = "none";
        }

        // Inicia el reconocimiento de voz
        function activarMicrofono() {
            const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = "es-ES";
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            recognition.start();

            recognition.onresult = (event) => {
                const transcripcion = event.results[0][0].transcript;
                document.getElementById("user_message").value = transcripcion;
            };

            recognition.onerror = (event) => {
                console.error("Error en el reconocimiento de voz: ", event.error);
            };
        }

        // Configura eventos al cargar la página
        window.onload = function() {
            ocultarCargando();  // Asegura que el círculo de carga esté oculto al cargar la página
            const form = document.querySelector("form");
            form.addEventListener("submit", function() {
                mostrarCargando();
            });
            leerRespuesta();  // Ejecuta leerRespuesta cada vez que la página se carga o actualiza
        };