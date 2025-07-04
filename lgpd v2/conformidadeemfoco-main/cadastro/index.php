<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Conformidade em Foco</title>
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Estilos para alertas */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="cadastro-container">
        <div class="cadastro-header">
            <h1><i class="fas fa-shield-alt"></i> Conformidade em Foco</h1>
            <p>Crie sua conta e comece a avaliar sua conformidade LGPD</p>
            
            <div class="tipo-selector">
                <button type="button" class="tipo-btn active" data-tipo="empresa">
                    <i class="fas fa-building"></i> Sou Empresa
                </button>
                <button type="button" class="tipo-btn" data-tipo="dpo">
                    <i class="fas fa-user-tie"></i> Sou DPO
                </button>
            </div>
        </div>
        
        <div class="cadastro-form">
            <div id="alertContainer"></div>
            
            <form id="cadastroForm">
                <!-- Campos Comuns -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha *</label>
                        <input type="password" id="senha" name="senha" required minlength="6">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="telefone" name="telefone">
                    </div>
                </div>
                
                <!-- Campos Específicos da Empresa -->
                <div id="empresa-fields">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="razao_social">Razão Social *</label>
                            <input type="text" id="razao_social" name="razao_social" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" id="nome_fantasia" name="nome_fantasia">
                        </div>
                        
                        <div class="form-group">
                            <label for="cnpj">CNPJ *</label>
                            <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="setor_atividade">Setor de Atividade</label>
                            <select id="setor_atividade" name="setor_atividade">
                                <option value="">Selecione...</option>
                                <option value="Tecnologia da Informação">Tecnologia da Informação</option>
                                <option value="Saúde e Medicina">Saúde e Medicina</option>
                                <option value="Educação">Educação</option>
                                <option value="Financeiro e Bancário">Financeiro e Bancário</option>
                                <option value="Varejo e Comércio">Varejo e Comércio</option>
                                <option value="Indústria e Manufatura">Indústria e Manufatura</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="porte_empresa">Porte da Empresa</label>
                            <select id="porte_empresa" name="porte_empresa">
                                <option value="micro">Microempresa</option>
                                <option value="pequena">Pequena</option>
                                <option value="media">Média</option>
                                <option value="grande">Grande</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="numero_funcionarios">Número de Funcionários</label>
                            <input type="number" id="numero_funcionarios" name="numero_funcionarios" min="1">
                        </div>
                    </div>
                </div>
                
                <!-- Campos Específicos do DPO -->
                <div id="dpo-fields" style="display: none;">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nome_completo">Nome Completo *</label>
                            <input type="text" id="nome_completo" name="nome_completo">
                        </div>
                        
                        <div class="form-group">
                            <label for="cpf">CPF *</label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                        </div>
                        
                        <div class="form-group">
                            <label for="formacao_academica">Formação Acadêmica</label>
                            <input type="text" id="formacao_academica" name="formacao_academica">
                        </div>
                        
                        <div class="form-group">
                            <label for="experiencia_anos">Anos de Experiência</label>
                            <input type="number" id="experiencia_anos" name="experiencia_anos" min="0">
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="certificacoes">Certificações (separadas por vírgula)</label>
                            <textarea id="certificacoes" name="certificacoes" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Endereço (Opcional) -->
                <div class="form-grid">
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" placeholder="00000-000">
                    </div>
                    
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" name="cidade">
                    </div>
                    
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado">
                            <option value="">Selecione...</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn-cadastrar" id="btnCadastrar">
                    <i class="fas fa-user-plus"></i> Criar Conta
                </button>
            </form>
            
            <div class="login-link">
                <p>Já tem uma conta? <a href="../login/">Fazer Login</a></p>
            </div>
        </div>
    </div>
    
    <script src="../assets/js/cadastro.js"></script>
</body>
</html>
