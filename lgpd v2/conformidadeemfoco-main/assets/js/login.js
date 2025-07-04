document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const btnLogin = document.getElementById('btnLogin');
    const alertContainer = document.getElementById('alertContainer');

    // Submissão do formulário
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value.trim();
        const senha = document.getElementById('senha').value;
        const lembrar = document.getElementById('lembrar').checked;

        // Validações básicas
        if (!email || !senha) {
            showAlert('Por favor, preencha todos os campos.', 'error');
            return;
        }

        if (!isValidEmail(email)) {
            showAlert('Por favor, insira um e-mail válido.', 'error');
            return;
        }

        // Desabilitar botão e mostrar loading
        btnLogin.disabled = true;
        btnLogin.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Entrando...';

        // Enviar dados para o servidor
        const formData = new FormData();
        formData.append('email', email);
        formData.append('senha', senha);
        formData.append('lembrar', lembrar ? '1' : '0');

        fetch('processar_login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('Login realizado com sucesso! Redirecionando...', 'success');
                setTimeout(() => {
                    window.location.href = data.redirect || '../dashboard/';
                }, 1500);
            } else {
                                showAlert(data.message || 'Erro ao fazer login. Tente novamente.', 'error');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            showAlert('Erro de conexão. Tente novamente.', 'error');
        })
        .finally(() => {
            // Reabilitar botão
            btnLogin.disabled = false;
            btnLogin.innerHTML = '<i class="fas fa-sign-in-alt"></i> Entrar';
        });
    });

    // Função para validar e-mail
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Função para mostrar alertas
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        
        const icon = type === 'success' ? 'check-circle' : 
                    type === 'error' ? 'exclamation-circle' : 'info-circle';
        
        alertDiv.innerHTML = `
            <i class="fas fa-${icon}"></i>
            ${message}
        `;
        
        alertContainer.innerHTML = '';
        alertContainer.appendChild(alertDiv);
        
        // Auto-remover após 5 segundos
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
});

// Função para alternar visibilidade da senha
function togglePassword() {
    const senhaInput = document.getElementById('senha');
    const toggleBtn = document.querySelector('.toggle-password i');
    
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        toggleBtn.className = 'fas fa-eye-slash';
    } else {
        senhaInput.type = 'password';
        toggleBtn.className = 'fas fa-eye';
    }
}

// Função para limpar alertas
function clearAlerts() {
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = '';
}

// Auto-focus no primeiro campo
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('email').focus();
});
