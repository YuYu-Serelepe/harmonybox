Harmonybox - Seu Diário de Músicas

1.Descrição do Projeto

Harmonybox é uma aplicação web desenvolvida como projeto acadêmico, seguindo a arquitetura MVC (Model-View-Controller) e implementando funcionalidade CRUD (Create, Read, Update, Delete).

Inspirado em plataformas de diário de mídia como o Letterboxd, o propósito do Harmonybox é ser um "diário" pessoal de álbuns ouvidos. Cada utilizador pode criar uma conta, registar os álbuns que ouviu, o artista e atribuir-lhes uma nota pessoal. Além disso, os utilizadores podem procurar por outros perfis na plataforma para ver as suas listas de álbuns e notas.

Funcionalidades Principais:

-Autenticação: Sistema de Registo e Login de utilizadores.

-CRUD de Avaliações: Os utilizadores podem Criar, Ler (as suas próprias), Atualizar e Excluir as suas avaliações de álbuns.

-Perfis de Utilizador: Cada utilizador tem um "dashboard" privado.

-Busca Social: Uma barra de pesquisa permite encontrar outros utilizadores pelo nome e ver os seus perfis públicos de álbuns.

-Arquitetura: O código é estruturado em models (lógica de BD), views (HTML/CSS) e controllers (lógica de negócio).

2.Equipe

Thais Barbosa Carneiro &
Yuri Aguilera Proença

3.Como Configurar e Executar

Este projeto foi construído com PHP puro e MySQL. A forma mais fácil de o executar é utilizando um ambiente local como o XAMPP.

Pré-requisitos
XAMPP (ou WAMP, MAMP) instalado.

Um browser web (ex: Chrome, Firefox).

Passos da Instalação

Clonar o Repositório (ou Descarregar o ZIP) Coloque a pasta completa do projeto (projeto-musica, ou renomeie para harmonybox) dentro da pasta htdocs da sua instalação do XAMPP.

Localização padrão: C:\xampp\htdocs\harmonybox

Iniciar o XAMPP Abra o Painel de Controle do XAMPP e inicie os serviços Apache e MySQL.

Criar o Banco de Dados (SQL)

Abra o seu cliente de MySQL (PhpMyAdmin, MySQL Command Line, etc.).

Execute o código SQL abaixo para criar o banco de dados musiquinha e as suas tabelas.

Configurar a Conexão O ficheiro db.php deve ser configurado com as suas credenciais MySQL. O padrão usado no desenvolvimento foi:

Banco de Dados: musiquinha

Utilizador: root

Senha: *sua senha*

Executar o Projeto Abra o seu browser e navegue para: http://localhost/harmonybox/ (ou http://localhost/projeto-musica/, dependendo do nome da pasta)

A aplicação irá redirecioná-lo automaticamente para a página de login.

4.Código SQL do Banco de Dados

Este é o script SQL para criar o banco de dados musiquinha e as tabelas necessárias.

```sql -- Crie primeiro o banco de dados, se não existir

CREATE DATABASE IF NOT EXISTS musiquinha;

-- Use o banco de dados USE musiquinha;

-- Tabela de utilizadores CREATE TABLE usuarios ( id INT AUTO_INCREMENT PRIMARY KEY, nome_usuario VARCHAR(50) NOT NULL UNIQUE, senha VARCHAR(255) NOT NULL, data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP );

-- Tabela de avaliações (o CRUD) CREATE TABLE avaliacoes ( id INT AUTO_INCREMENT PRIMARY KEY, id_usuario INT NOT NULL, nome_album VARCHAR(255) NOT NULL, artista VARCHAR(255) NOT NULL, nota INT NOT NULL, data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

FOREIGN KEY (id_usuario) REFERENCES usuarios(id) 
    ON DELETE CASCADE
); ```
