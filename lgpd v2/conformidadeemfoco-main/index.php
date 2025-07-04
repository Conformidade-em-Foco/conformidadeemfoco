<?php 
include('includes/header.php'); 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conformidade em Foco - Avaliação LGPD</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-shield-alt"></i>
                <span>Conformidade em Foco</span>
            </div>
            <div class="nav-menu">
                <a href="#inicio" class="nav-link">Início</a>
                <a href="#sobre" class="nav-link">Sobre</a>
                <a href="#categorias" class="nav-link">Categorias</a>
                <a href="login/" class="nav-link login-btn">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </a>
                <a href="cadastro/" class="nav-link signup-btn">
                    <i class="fas fa-user-plus"></i> Cadastrar
                </a>
            </div>
        </div>
    </nav>

    <!-- Home Page -->
    <div id="home" class="page active">
        <!-- Hero Section -->
        <section class="hero" id="inicio">
            <div class="container">
                <h1>Avalie sua Conformidade LGPD</h1>
                <p>Ferramenta completa para avaliar o nível de conformidade da sua organização com a Lei Geral de Proteção de Dados</p>
                
                <div class="hero-buttons">
                    <button class="cta-button" onclick="showPage('checklist')">
                        <i class="fas fa-play"></i> Iniciar Avaliação Gratuita
                    </button>
                    <a href="cadastro/" class="cta-button secondary">
                        <i class="fas fa-user-plus"></i> Criar Conta
                    </a>
                </div>
                
                <div class="hero-stats">
                    <div class="stat">
                        <strong>40+</strong>
                        <span>Perguntas</span>
                    </div>
                    <div class="stat">
                        <strong>8</strong>
                        <span>Categorias</span>
                    </div>
                    <div class="stat">
                        <strong>15min</strong>
                        <span>Para completar</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="sobre">
            <div class="container">
                <h2>Por que usar nossa ferramenta?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Avaliação Completa</h3>
                        <p>Análise detalhada de 8 categorias essenciais da LGPD com mais de 40 critérios de conformidade</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Resultado Imediato</h3>
                        <p>Obtenha seu relatório de conformidade instantaneamente com recomendações personalizadas</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Fácil de Usar</h3>
                        <p>Interface intuitiva que permite avaliação rápida sem conhecimento técnico avançado</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-save"></i>
                        </div>
                        <h3>Salve seu Progresso</h3>
                        <p>Crie uma conta para salvar suas avaliações e acompanhar sua evolução</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Preview -->
        <section class="categories-preview" id="categorias">
            <div class="container">
                <h2>Categorias Avaliadas</h2>
                <div class="categories-grid">
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-users-cog category-icon"></i>
                            <h3>Governança e Organização</h3>
                        </div>
                        <p>Estrutura organizacional e responsabilidades</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-balance-scale category-icon"></i>
                            <h3>Base Legal e Consentimento</h3>
                        </div>
                        <p>Fundamentos legais para tratamento de dados</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-user-shield category-icon"></i>
                            <h3>Direitos dos Titulares</h3>
                        </div>
                        <p>Atendimento aos direitos dos proprietários dos dados</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-shield-alt category-icon"></i>
                            <h3>Segurança Técnica</h3>
                        </div>
                        <p>Medidas de proteção e segurança da informação</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-exclamation-triangle category-icon"></i>
                            <h3>Gestão de Incidentes</h3>
                        </div>
                        <p>Preparação e resposta a vazamentos de dados</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-handshake category-icon"></i>
                            <h3>Gestão de Fornecedores</h3>
                        </div>
                        <p>Controle de terceiros que processam dados</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-graduation-cap category-icon"></i>
                            <h3>Treinamento e Conscientização</h3>
                        </div>
                        <p>Capacitação da equipe em proteção de dados</p>
                    </div>
                    <div class="category-card">
                        <div class="category-header">
                            <i class="fas fa-file-alt category-icon"></i>
                            <h3>Documentação e Registros</h3>
                        </div>
                        <p>Mapeamento e documentação de processos</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Pronto para avaliar sua conformidade LGPD?</h2>
                    <p>Comece agora mesmo e descubra o nível de conformidade da sua organização</p>
                    <div class="cta-buttons">
                        <button class="cta-button" onclick="showPage('checklist')">
                            <i class="fas fa-play"></i> Avaliação Gratuita
                        </button>
                        <a href="cadastro/" class="cta-button secondary">
                            <i class="fas fa-user-plus"></i> Criar Conta
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Checklist Page -->
    <div id="checklist" class="page">
        <div class="checklist-container">
            <div class="container">
                <div class="checklist-header">
                    <h1><i class="fas fa-clipboard-check"></i> Checklist de Conformidade LGPD</h1>
                    <p>Responda todas as perguntas para obter sua avaliação de conformidade</p>
                </div>

                <form id="checklistForm" class="checklist-form">
                    <!-- As categorias serão inseridas aqui pelo JavaScript -->
                </form>

                <div class="submit-section">
                    <button type="button" class="submit-button" onclick="calculateResults()">
                        <i class="fas fa-calculator"></i> Calcular Resultado
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Page -->
    <div id="results" class="page">
        <div class="result-container">
            <div class="container">
                <div class="result-header">
                    <h1><i class="fas fa-chart-bar"></i> Resultado da Avaliação LGPD</h1>
                    <p id="evaluationDate"></p>
                </div>

                <div class="score-card">
                    <div id="scoreCircle" class="score-circle">
                        <span id="scorePercentage">0%</span>
                    </div>
                    <div id="scoreLevel" class="score-level">Calculando...</div>
                    <div id="scoreDescription" class="score-description">Aguarde o resultado...</div>
                </div>

                <div id="categoriesResult" class="categories-result">
                    <!-- Resultados por categoria serão inseridos aqui -->
                </div>

                <div class="action-buttons">
                    <button class="btn btn-secondary" onclick="showPage('home')">
                        <i class="fas fa-home"></i> Voltar ao Início
                    </button>
                    <button class="btn btn-primary" onclick="showPage('checklist')">
                        <i class="fas fa-redo"></i> Nova Avaliação
                    </button>
                    <button class="btn btn-success" onclick="printResults()">
                        <i class="fas fa-print"></i> Imprimir Resultado
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
</body>
</html>

<?php include('includes/footer.php'); 
