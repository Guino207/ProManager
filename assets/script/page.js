
    const pages = ['dashboard', 'projetos', 'tarefas', 'equipe', 'relatorios', ''];
    const pageTitles = {
        dashboard: { title: 'Dashboard', subtitle: 'Visão geral do sistema' },
        projetos: { title: 'Projetos', subtitle: 'Gerencie todos os projetos' },
        tarefas: { title: 'Tarefas', subtitle: 'Acompanhe suas tarefas' },
        equipe: { title: 'Equipe', subtitle: 'Gerencie os membros da equipe' },
        calendario: { title: 'Calendário', subtitle: 'Visualize as entregas' },
        relatorios: { title: 'Relatórios', subtitle: 'Análise de métricas' },
        configuracoes: { title: 'Configurações', subtitle: 'Configure o sistema' }
    };

    // Menu click
    document.querySelectorAll('.sidebar-menu li').forEach(item => {
        item.addEventListener('click', () => {
            const page = item.getAttribute('data-page');
            document.querySelectorAll('.sidebar-menu li').forEach(li => li.classList.remove('active'));
            item.classList.add('active');
            document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
            document.getElementById(`page-${page}`).classList.add('active');
            const title = pageTitles[page];
            document.querySelector('.page-title h1').innerHTML = title.title;
            document.querySelector('.page-title p').innerHTML = title.subtitle;
            if (window.innerWidth <= 768) document.getElementById('sidebar').classList.remove('active');
        });
    });

    // Menu mobile
    document.getElementById('menuToggle').addEventListener('click', () => {
        document.getElementById('sidebar').classList.toggle('active');
    });


    function fecharModal(modalId) { document.getElementById(modalId).style.display = 'none'; }
    function abrirModal(modalId) { document.getElementById(modalId).style.display = 'flex'; }

    document.getElementById('btnNovoProjetoDash').addEventListener('click', () => abrirModal('modalProjeto'));
    document.getElementById('btnNovoProjetoProjetos').addEventListener('click', () => abrirModal('modalProjeto'));
    document.getElementById('btnNovoMembro').addEventListener('click', () => abrirModal('modalMembro'));

    window.addEventListener('click', (e) => { if (e.target.classList.contains('modal')) e.target.style.display = 'none'; });



    

    document.getElementById('configForm').addEventListener('submit', (e) => { e.preventDefault(); alert('Configurações salvas com sucesso!'); });


    document.getElementById('allProjectsGrid').innerHTML = document.getElementById('projectsGrid').innerHTML;

    //Terminando a session
    function loghout(){
        document.getElementById('mensagem').style.display = 'flex';
    }

    function openForm(){
        document.getElementById('form').style.display = 'flex';
    }

    function closeForm(){
        document.getElementById('form').style.display = 'none';
    }
