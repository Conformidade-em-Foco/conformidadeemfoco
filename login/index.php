<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login | LGPD em Foco</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/form.css">
    <link rel="stylesheet" href="../assets/css/tabs.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">

            <!-- Logo e título -->
            <img src="../assets/imagens/login.png" alt="Logo" class="logo-topo" />
            <h1 class="titulo-centralizado">Conformidade em Foco</h1>

            <!-- Abas -->
            <div class="tabs">
                <button id="tab-login" class="tab-button active" onclick="showTab('login')">Entrar</button>
                <button id="tab-register" class="tab-button" onclick="showTab('register')">Cadastrar</button>
            </div>

            <!-- Login -->
            <div id="login" class="form-section active">
                <form method="post" action="../../app/controller/LoginController.php" autocomplete="off">
                    <input type="text" name="usuario" id="usuario_login" placeholder="Usuário"
                           maxlength="30" pattern="[A-Za-z0-9]+" title="Apenas letras e números"
                           autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required>

                    <input type="password" name="senha" id="senha_login" placeholder="Senha"
                           maxlength="20" autocomplete="new-password"
                           readonly onfocus="this.removeAttribute('readonly');" required>

                    <button class="btn-login" type="submit">Entrar</button>
                </form>
            </div>

            <!-- Cadastro -->
            <div id="register" class="form-section">
                <form method="post" action="../../app/controller/CadastroController.php" onsubmit="return validarCadastro();" autocomplete="off">
                    <input type="text" name="usuario" id="usuario_cadastro" placeholder="Usuário"
                           maxlength="30" pattern="[A-Za-z0-9]+" title="Apenas letras e números"
                           autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required>

                    <input type="password" name="senha" id="senha_cadastro" placeholder="Senha"
                           maxlength="20" autocomplete="new-password"
                           readonly onfocus="this.removeAttribute('readonly');" required>

                    <select name="tipo_usuario" id="tipo" onchange="toggleCampos();" required>
                        <option value="">Selecione o tipo de usuário</option>
                        <option value="empresa">Empresa</option>
                        <option value="dpo">DPO</option>
                    </select>

                    <div id="cnpj-container" style="display: none;">
                        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" maxlength="18" autocomplete="off">
                    </div>

                    <div id="cpf-container" style="display: none;">
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" maxlength="14" autocomplete="off">
                    </div>

                    <button class="btn-login" type="submit">Cadastrar</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        function showTab(tabId) {
            document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));
            document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active'));
            document.getElementById(tabId).classList.add('active');
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        function toggleCampos() {
            const tipo = document.getElementById('tipo').value;
            const cnpjContainer = document.getElementById('cnpj-container');
            const cpfContainer = document.getElementById('cpf-container');
            const cnpjInput = document.getElementById('cnpj');
            const cpfInput = document.getElementById('cpf');

            if (tipo === 'empresa') {
                cnpjContainer.style.display = 'block';
                cpfContainer.style.display = 'none';
                cnpjInput.setAttribute('required', 'required');
                cpfInput.removeAttribute('required');
            } else if (tipo === 'dpo') {
                cpfContainer.style.display = 'block';
                cnpjContainer.style.display = 'none';
                cpfInput.setAttribute('required', 'required');
                cnpjInput.removeAttribute('required');
            } else {
                cnpjContainer.style.display = 'none';
                cpfContainer.style.display = 'none';
                cnpjInput.removeAttribute('required');
                cpfInput.removeAttribute('required');
            }
        }

        function validarCadastro() {
            const tipo = document.getElementById('tipo').value;
            const cnpj = document.getElementById('cnpj')?.value ?? '';
            const cpf = document.getElementById('cpf')?.value ?? '';

            if (tipo === 'empresa' && cnpj.trim() === '') {
                alert("O CNPJ é obrigatório para empresas.");
                return false;
            }

            if (tipo === 'dpo' && cpf.trim() === '') {
                alert("O CPF é obrigatório para DPOs.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
