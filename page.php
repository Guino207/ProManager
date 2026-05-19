<?php
session_start();
require 'conectar.php';
include 'script.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProManager - Sistema de Gerenciamento de Projetos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/page.css">
</head>
<body>


<button class="menu-toggle" id="menuToggle">
    <i class="fas fa-bars"></i>
</button>

<style>
    img{
        border-radius: 80px;
    }
</style>


<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="./assets/Logo.png" alt="" width="150px" height="150px">
        <h2>ProManager</h2>
    </div>
    <ul class="sidebar-menu">
        <li class="active" data-page="dashboard"><a style="font-size: 20px;">Dashboard</a></li><br>
        <li data-page="projetos"><a style="font-size: 20px;">Projetos</a></li><br>
        <li data-page="tarefas"><a style="font-size: 20px;">Tarefas</a></li><br>
        <li data-page="equipe"><a style="font-size: 20px;">Equipe</a></li><br>
        <li data-page="relatorios"><a style="font-size: 20px;">Relatórios</a></li><br>
        <li data-page="relatorios"><a style="font-size: 20px;" href="close.php">Terminar sessão</a></li>

    </ul>
</div>


<div class="main-content" id="mainContent">
    
    
    <div class="top-bar">
        <div class="page-title" id="pageTitle">
            <h1>Bem-vindo </h1>
        </div>
    </div>

    
    <div id="page-dashboard" class="page active">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="header"><h3>PROJETOS ATIVOS</h3><i class="fas fa-project-diagram"></i></div>
                <div class="number"></div>
            </div>
            <div class="stat-card">
                <div class="header"><h3>EM ANDAMENTO</h3><i class="fas fa-spinner"></i></div>
                <div class="number"></div>
            </div>
            <div class="stat-card">
                <div class="header"><h3>CONCLUÍDOS</h3><i class="fas fa-check-circle"></i></div>
                <div class="number"></div>
            </div>
            <div class="stat-card">
                <div class="header"><h3>MEMBROS</h3><i class="fas fa-users"></i></div>
                <div class="number"></div>
            </div>
        </div>

        <div class="section-title">
            <h2><i class="fas fa-project-diagram"></i> Projetos Recentes</h2>
            <button class="btn-primary" id="btnNovoProjetoDash"><i class="fas fa-plus"></i> Novo Projeto</button>
        </div>

        <div class="projects-grid" id="projectsGrid">
            <div class="project-card">
                <div class="project-header">
                    <div class="project-icon"><i class="fas fa-mobile-alt"></i></div>
                    <span class="project-status status-andamento">Em Andamento</span>
                </div>
                <div class="project-title">App Mobile</div>
                <div class="project-description">Desenvolvimento do aplicativo mobile para clientes com funcionalidades de login e dashboard.</div>
                <div class="project-footer"><div><span class="member-avatar">JS</span><span class="member-avatar">MC</span></div><div class="project-date">Termino: 30/06/26</div></div>
            </div>

            <div class="project-card">
                <div class="project-header">
                    <div class="project-icon"><i class="fas fa-shopping-cart"></i></div>
                    <span class="project-status status-andamento">Em Andamento</span>
                </div>
                <div class="project-title">E-commerce</div>
                <div class="project-description">Plataforma de vendas online com carrinho, pagamentos e integração com transportadoras.</div>
                <div class="project-footer"><div><span class="member-avatar">AN</span><span class="member-avatar">CR</span></div><div class="project-date">Termino: 15/08/26</div></div>
            </div>
            <div class="project-card">
                <div class="project-header">
                    <div class="project-icon"><i class="fas fa-database"></i></div>
                    <span class="project-status status-planejamento">Planejamento</span>
                </div>
                <div class="project-title">Sistema de Estoque</div>
                <div class="project-description">Sistema completo para gestão de estoque, com controle de entrada, saída e relatórios.</div>
                <div class="project-footer"><div><span class="member-avatar">RM</span><span class="member-avatar">TS</span></div><div class="project-date">Termino: 15/10/26</div></div>
            </div>
        </div>
    </div>


    <div id="page-projetos" class="page">
        <div class="section-title">
            <h2><i class="fas fa-project-diagram"></i> Todos os Projetos</h2>
            <button class="btn-primary" id="btnNovoProjetoProjetos"><i class="fas fa-plus"></i> Novo Projeto</button>
        </div>
        <div class="projects-grid" id="allProjectsGrid">

        </div>
    </div>


    <div id="page-tarefas" class="page">
        <div class="section-title">
            <h2><i class="fas fa-tasks"></i>Tarefas</h2>
            <button class="btn-primary" id="btnNovaTarefa"><i class="fas fa-plus"></i> Nova Tarefa</button>
        </div>
        <div class="data-table">
            <table>
                <thead>
                    <tr><th>Tarefa</th><th>Projeto</th><th>Prioridade</th><th>Status</th><th>Termino</th><th>Ações</th></tr>
                </thead>
                <tbody id="tarefasTableBody">
                    <tr><td>Desenvolver tela de login</td><td>App Mobile</td><td><span class="badge" style="background:#dc3545;color:white;">Alta</span></td><td>Em andamento</td><td>20/05/26</td><td><i class="fas fa-check" style="color:#28a745;cursor:pointer;"></i> <button><i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></button></td></tr>
                    <tr><td>Criar banco de dados</td><td>E-commerce</td><td><span class="badge" style="background:#ffc107;color:#333;">Média</span></td><td>Concluída</td><td>15/05/26</td><td><i class="fas fa-undo" style="color:#ffc107;cursor:pointer;"></i> <button><i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></button></td></tr>
                    <tr><td>Integrar API de pagamentos</td><td>E-commerce</td><td><span class="badge" style="background:#dc3545;color:white;">Alta</span></td><td>Pendente</td><td>25/05/26</td><td><i class="fas fa-check" style="color:#28a745;cursor:pointer;"></i> <button><i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></button></td></tr>
                </tbody>
            </table>
        </div>
    </div>


    <div id="page-equipe" class="page">
        <div class="section-title">
            <h2><i class="fas fa-users"></i> Membros da Equipe</h2>
            <button class="btn-primary" id="btnNovoMembro"><i class="fas fa-plus"></i> Adicionar Membro</button>
        </div>
        <div class="data-table">
            <table>
                <thead>
                    <tr><th>Nome</th><th>Cargo</th><th>Email</th><th>Projetos</th><th>Status</th><th>Ações</th></tr>
                </thead>
                <tbody>
                    <tr><td>João Silva</td><td><span class="badge badge-admin">Administrador</span></td><td>joao@email.com</td><td>3</td><td><span style="color:#28a745;">Ativo</span></td><td><i class="fas fa-edit" style="cursor:pointer;"></i> <i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></td></tr>
                    <tr><td>Maria Santos</td><td><span class="badge badge-dev">Desenvolvedor</span></td><td>maria@email.com</td><td>5</td><td><span style="color:#28a745;">Ativo</span></td><td><i class="fas fa-edit" style="cursor:pointer;"></i> <i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></td></tr>
                    <tr><td>Carlos Souza</td><td><span class="badge badge-designer">Designer</span></td><td>carlos@email.com</td><td>2</td><td><span style="color:#dc3545;">Inativo</span></td><td><i class="fas fa-edit" style="cursor:pointer;"></i> <i class="fas fa-trash" style="color:#dc3545;cursor:pointer;margin-left:10px;"></i></td></tr>
                </tbody>
            </table>
        </div>
    </div>



 
    <div id="page-relatorios" class="page">
        <div class="stats-grid">
            <div class="stat-card"><div class="header"><h3>PROJETOS CONCLUÍDOS</h3></div><div class="number">24</div></div>
            <div class="stat-card"><div class="header"><h3>TAREFAS PENDENTES</h3></div><div class="number">12</div></div>
        </div>
        <div class="data-table">
            <table>
                <thead><tr><th>Projeto</th><th>Status</th><th>Progresso</th><th>Data Início</th><th>Data Fim</th></tr></thead>
                <tbody>
                    <tr><td>App Mobile</td><td><span class="status-andamento" style="padding:4px 12px;">Em andamento</span></td><td>65%</td><td>01/03/26</td><td>30/06/26</td></tr>
                    <tr><td>E-commerce</td><td><span class="status-andamento" style="padding:4px 12px;">Em andamento</span></td><td>40%</td><td>01/04/26</td><td>15/08/26</td></tr>
                    <tr><td>Dashboard Financeiro</td><td><span class="status-concluido" style="padding:4px 12px;">Concluído</span></td><td>100%</td><td>10/01/26</td><td>05/04/26</td></tr>
                </tbody>
            </table>
        </div>
    </div>



<div id="modalProjeto" class="modal">
    <div class="modal-content">
        <div class="modal-header"><h3><i class="fas fa-plus-circle"></i> Novo Projeto</h3><span class="close-modal" onclick="fecharModal('modalProjeto')">&times;</span></div>
        <form id="formNovoProjeto" method="post">
            <div class="form-group">
                <label>Nome do Projeto</label>
                <input type="text" id="projetoNome" placeholder="Digite o nome do projeto" name="nome">
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea id="projetoDescricao" placeholder="Descreva o projeto..." name="descrition">
                </textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select id="projetoStatus" name="selecionar">
                    <option value="andamento">Em Andamento</option>
                    <option value="planejamento">Planejamento</option>
                    <option value="pendente">Pendente</option>
                </select>
            </div>

            <div class="form-group">
                <label>Data de Vencimento</label>
                <input type="date" id="projetoData" name="periodo">
            </div>

            <div class="form-actions">
                <button type="button" class="btn-secondary" onclick="fecharModal('modalProjeto')">Cancelar</button>
                <button type="submit" class="btn-primary" name="Criar">Criar Projeto</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL NOVO MEMBRO -->
<div id="modalMembro" class="modal">
    <div class="modal-content">
        <div class="modal-header"><h3><i class="fas fa-user-plus"></i> Adicionar Membro</h3><span class="close-modal" onclick="fecharModal('modalMembro')">&times;</span></div>
        <form id="formNovoMembro">
            <div class="form-group"><label>Nome</label><input type="text" id="membroNome" placeholder="Digite o nome" required></div>
            <div class="form-group"><label>Email</label><input type="email" id="membroEmail" placeholder="Digite o email" required></div>
            <div class="form-group"><label>Cargo</label>
            <select id="membroCargo">
                <option>Desenvolvedor</option>
                <option>Designer</option>
                <option>Administrador</option>
            </select>
        </div>

            <div class="form-actions">
                <button type="button" class="btn-secondary" onclick="fecharModal('modalMembro')">Cancelar</button>
                <button type="submit" class="btn-primary">Adicionar</button>
            </div>
        </form>
    </div>
</div>

<script src="./assets/script/page.js"></script>
</body>
</html>