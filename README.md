# Projeto Obra

## 📌 Sobre o Projeto
Este projeto tem como objetivo padronizar a organização no ambiente de obra, proporcionando uma melhor gestão para o **Responsável pela obra**, **Cliente** e **Colaborador**. A plataforma permite que:
- O **Responsável** gerencie as obras, tenha um controle financeiro sobre determinada obra, controle o estoque, delegue tarefas, etc.
- O **Cliente** acompanhe o progresso da obra, tendo acesso a um feed com fotos e vídeos, de acordo com o andamento da obra. Crie solicitações como solicitar nova tarefa a ser feita atraves de um novo orçamento, entre outras funções.
- O **Colaborador** visualize suas tarefas, atualize as tarefas sempre anexando fotos tanto ao iniciar, como ao finalizar cada tarefa. Crie solicitações de materias e ferramentas, entre outras funcionalidades.

## 🛠️ Tecnologias Utilizadas
O projeto foi desenvolvido utilizando as seguintes tecnologias:

- **Laravel** – Estrutura principal do backend.
- **Jetstream** – Responsável pela autenticação (login e registro de usuários).
- **Livewire** – Utilizado para facilitar a criação de componentes dinâmicos.
- **MySQL** – Banco de dados para armazenamento das informações.

## 📂 Estrutura do Projeto

### 🔒 Middleware
O middleware foi implementado para garantir a segurança e controle de acesso:
- **Autenticação**: Verifica se o usuário está autenticado antes de acessar determinadas páginas.
- **Autorização**: Verifica se o usuário tem permissão para acessar determinados recursos.
- O middleware foi registrado em `/bootstrap/app.php` e protegido no arquivo de rotas `web.php`.

### 📑 Controllers
- **ResponsavelController**
  - `gerenciarObras()`: Garante que apenas obras criadas pelo usuário logado sejam listadas.

- **ObraController**
  - `index()`: Retorna a view `gerenciar-obras`.
  - `create()`: Retorna a view `criar-obra`.
  - `store(Request $request)`: Valida e salva os dados da obra no banco.
  - `show($id)`: Autentica o usuário antes de exibir os detalhes da obra.

- **TarefaController**
  - `index()`: Valida e salva as tarefas associadas à obra.

### 🎨 Views
- **`gerenciar-obras`**: Exibe as obras associadas ao responsável.

## 🚀 Como Rodar o Projeto
1. Clone este repositório:
   ```sh
   git clone https://github.com/Eri0c/Projeto_obra.git
   ```
2. Instale as dependências:
   ```sh
   composer install
   npm install
   ```
3. Configure o arquivo `.env` e gere a chave do aplicativo:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Execute as migrações do banco de dados:
   ```sh
   php artisan migrate
   ```
5. Inicie o servidor local:
   ```sh
   php artisan serve
   ```

## 📌 Considerações Finais
O projeto está em constante evolução, e melhorias serão implementadas conforme necessário. Feedbacks e contribuições são bem-vindos!

