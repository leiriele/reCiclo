
        // Função para abrir o modal
        function openModal() {
            document.getElementById("loginModal").style.display = "block";
        }

        // Função para fechar o modal
        function closeModal() {
            document.getElementById("loginModal").style.display = "none";
        }

        // Adicionar ouvinte de evento de clique ao link "LOGIN"
        document.addEventListener('DOMContentLoaded', function() {
            var loginLink = document.getElementById("loginLink");
            loginLink.addEventListener('click', function(event) {
                event.preventDefault();
                openModal();
            });
        });
