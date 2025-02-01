Estou criando um projeto que ajuda em meu trabalho.
A intenção é que padronize a organização no ambiente de obra.
O projeto tem o intuito de ser usado pelo Responsavel de obra, Cliente(que contrata) e Colaborador. Pensando em porporcionar uma melhoria para ambos.


No projeto estou utilizando Laravel, Jetstream, Livewire e MySql.

Jetstream, responsavel por fazer toda a parte de autenticação do projeto, como login e registro de usuario.

MIDDLEWARE
O primeiro passo foi fazer a estruturação de algumas tabelas, criando seus relacionamentos.
Logo após criei o Middleware para fazer a verificação do usuario, ver se ele é autenticado e se o usuario tem autorização para acessar determinada pagina. O middleware foi registrado em /bootstrap/app.php
middleware tambem foi protegido em web.php


CONTROLLERS
ResponsavelController com os metodos para gerenciar obras e acessar o perfil do responsavel. Método gerenciar obras recupera obras atribuidas ao responsavel e as exibe na interface.

VIEWS

gerenciar-obras que exibe as obras gerenciadas pelo responsavel.
