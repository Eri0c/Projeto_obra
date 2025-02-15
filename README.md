Estou criando um projeto para contribuir em meu ambiente de trabalho.
A intenção é que padronize a organização no ambiente de obra.
O projeto tem o intuito de ser usado pelo Responsavel de obra, Cliente(que contrata) e Colaborador. Pensando em porporcionar uma melhoria para ambos.


No projeto estou utilizando Laravel, Jetstream, Livewire e MySql.

Jetstream, responsavel por fazer toda a parte de autenticação do projeto, como login e registro de usuario.

MIDDLEWARE

O primeiro passo foi fazer a estruturação de algumas tabelas, criando seus relacionamentos.
Logo após criei o Middleware para fazer a verificação do usuario, ver se ele é autenticado e se o usuario tem autorização para acessar determinada pagina. O middleware foi registrado em /bootstrap/app.php
middleware tambem foi protegido em web.php


CONTROLLERS

ResponsavelController: gerenciarObras(): Faz a autenticação do responsavel_id, quando o 'responsavel_id' acessar a pagina gerenciar-obras, somente as obras que este 'responsavel_id' criou serão listadas.


ObraController: function index() responsavel por retornar a view gerenciar-obras e, function create(), responsavel por retornar a view criar-obra. function store(Request $request): faz toda a validação dos dados passado pelo usuario e também salva os dados na tabela. function show($id): Faz a autenticação o do usuario que esta tentando acessar  determinada obra, se o usuario for autenticado ira carregar a pagina de detalhes da obra.

TarefaController: index() faz o mesmo que ObraController, valida os dados passado pelo usuario e os salva na tabela, criando assim, a tarefa.


VIEWS

gerenciar-obras exibe as obras gerenciadas pelo responsavel.
