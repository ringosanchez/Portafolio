        // Función para controlar la visibilidad de los paneles
        function showPanel(panelToShow) {
            const loginPanel = document.getElementById('login-panel');
            const registerPanel = document.getElementById('register-panel');

            if (panelToShow === 'login') {
                loginPanel.classList.remove('hidden');
                registerPanel.classList.add('hidden');
            } else if (panelToShow === 'register') {
                registerPanel.classList.remove('hidden');
                loginPanel.classList.add('hidden');
            }
        }
        
        // Asignar eventos a los botones al cargar la página
        document.addEventListener('DOMContentLoaded', () => {

            showPanel('login'); 

            const btnRegistrar = document.getElementById('btn-registrar');
            if (btnRegistrar) {
                btnRegistrar.addEventListener('click', function() {
                    showPanel('register');
                });
            }

            // Listener para volver a LOGIN
            const btnLogin = document.getElementById('btn-login');
            if (btnLogin) {
                btnLogin.addEventListener('click', function() {
                    showPanel('login');
                });
            }
        });