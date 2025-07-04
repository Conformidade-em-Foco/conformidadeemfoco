document.addEventListener('DOMContentLoaded', function() {
    // Referências aos elementos do DOM
    const tipoButtons = document.querySelectorAll('.tipo-btn');
    const empresaFields = document.getElementById('empresa-fields');
    const dpoFields = document.getElementById('dpo-fields');
    const cadastroForm = document.getElementById('cadastroForm');
    const alertContainer = document.getElementById('alertContainer');
    
    // Variável para armazenar o tipo de usuário selecionado
    let tipoUsuarioSelecionado = 'empresa'; // Valor padrão
    
    console.log('Script de cadastro carregado');
    
    // Adicionar evento de clique aos botões de tipo
    tipoButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remover classe active de todos os botões
            tipoButtons.forEach(btn => btn.classList.remove('active'));
            
            // Adicionar classe active ao botão clicado
            this.classList.add('active');
            
            // Obter o tipo de usuário do atributo data-tipo
            tipoUsuarioSelecionado = this.getAttribute('data-tipo');
            console.log('Tipo selecionado:', tipoUsuarioSelecionado);
            
            // Mostrar/ocultar campos específicos
            if (tipoUsuarioSelecionado === 'empresa') {
                empresaFields.style.display = 'block';
                dpoFields.style.display = 'none';
                
                // Tornar campos de empresa obrigatórios
                document.getElementById('razao_social').required = true;
                document.getElementById('cnpj').required = true;
                
                // Remover obrigatoriedade dos campos de DPO
                document.getElementById('nome_completo').required = false;
                document.getElementById('cpf').required = false;
            } else {
                empresaFields.style.display = 'none';
                dpoFields.style.display = 'block';
                
                // Tornar campos de DPO obrigatórios
                document.getElementById('nome_completo').required = true;
                document.getElementById('cpf').required = true;
                
                // Remover obrigatoriedade dos campos de empresa
                document.getElementById('razao_social').required = false;
                document.getElementById('cnpj').required = false;
            }
        });
    });
    
    // Função para mostrar alertas
    function showAlert(message, type) {
        alertContainer.innerHTML = `
            <div class="alert alert-${type}">
                ${message}
            </div>
        `;
        
        // Rolar para o topo para mostrar o alerta
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Remover alerta após 5 segundos
        setTimeout(() => {
            alertContainer.innerHTML = '';
        }, 5000);
    }
    
    // Adicionar evento de envio ao formulário
    if (cadastroForm) {
        cadastroForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Formulário enviado');
            
            // Mostrar mensagem de carregamento
            showAlert('Processando cadastro...', 'info');
            
            // Criar objeto FormData
            const formData = new FormData(this);
            
            // Adicionar o tipo de usuário ao formData
            formData.append('tipo_usuario', tipoUsuarioSelecionado);
                // Exibir dados que serão enviados (para depuração)
            console.log('Tipo de usuário:', tipoUsuarioSelecionado);
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
            
            // Enviar dados para o servidor
            fetch('processar_cadastro.php', {
                method: 'POST',
                body: formData
            })
            .then(resp => resp.text())
            .then(raw => {
                console.log('=== resposta bruta do servidor ===\n', raw);
                return JSON.parse(raw);
            })
            .then(data => {
                console.log('Dados processados:', data);
                if (data.status === 'success') {
                    showAlert(data.message, 'success');
                    // Redirecionar após cadastro bem-sucedido
                    setTimeout(() => {
                        window.location.href = '../login/';
                    }, 2000);
                } else {
                    showAlert(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                showAlert('Erro ao processar o cadastro. Tente novamente. Detalhes: ' + error.message, 'danger');
            });
        });
    } else {
        console.error('Formulário não encontrado!');
    }
    
    // Máscara para CNPJ
    const cnpjInput = document.getElementById('cnpj');
    if (cnpjInput) {
        cnpjInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 14) value = value.slice(0, 14);
            
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
            } else if (value.length > 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d+)$/, '$1.$2.$3/$4');
            } else if (value.length > 5) {
                value = value.replace(/^(\d{2})(\d{3})(\d+)$/, '$1.$2.$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d+)$/, '$1.$2');
            }
            
            e.target.value = value;
        });
    }
    
    // Máscara para CPF
    const cpfInput = document.getElementById('cpf');
    if (cpfInput) {
        cpfInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{3})(\d{3})(\d+)$/, '$1.$2.$3');
            } else if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d+)$/, '$1.$2');
            }
            
            e.target.value = value;
        });
    }
    
    // Máscara para CEP
    const cepInput = document.getElementById('cep');
    if (cepInput) {
        cepInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 8) value = value.slice(0, 8);
            
            if (value.length > 5) {
                value = value.replace(/^(\d{5})(\d{3})$/, '$1-$2');
            }
            
            e.target.value = value;
        });
    }
    
    // Máscara para telefone
    const telefoneInput = document.getElementById('telefone');
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 10) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{4})(\d+)$/, '($1) $2-$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d+)$/, '($1) $2');
            }
            
            e.target.value = value;
        });
    }
});
