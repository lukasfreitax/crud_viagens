# Projeto CRUD - Agência de Viagens

## Descrição
Sistema PHP para gestão de pacotes de viagem de uma agência de turismo, implementando as operações básicas do CRUD (Create, Read, Update, Delete) conforme especificações da Prova Prática P2.

## Estrutura do Projeto
```
crud_viagens_lucas/
assets
    ├── fundo.png            #imagem utilizada para o fundo

├── conexao.php              # Arquivo de conexão com o banco de dados
├── index.php                # Página principal (listagem das viagens)
├── inserir.php              # Página para inserir novas viagens
├── editar.php               # Página para editar viagens existentes
├── excluir.php              # Script para excluir viagens
├── agencia_viagens.sql      # Script SQL para criar o banco de dados
└── README.md                # Documentação do projeto
```

## Instalação e Configuração

### 1. Pré-requisitos
- XAMPP instalado e funcionando
- Apache e MySQL ativos

### 2. Configuração do Banco de Dados
1. Abra o phpMyAdmin (http://localhost/phpmyadmin)
2. Execute o script SQL fornecido (`agencia_viagens.sql`)
3. Isso criará o banco de dados `agencia_viagens` com a tabela `viagens`

### 3. Instalação do Sistema
1. Copie a pasta `crud_viagens_lucas` para o diretório `htdocs` do XAMPP
2. Acesse o sistema através do navegador: `http://localhost/lucas_freitas_viagens`

## Funcionalidades

### ✅ Create (Inserir)
- Formulário para cadastrar novos pacotes de viagem
- Campos: Destino, Código do Pacote, Duração (dias), Quantidade de Vagas
- Validação de campos obrigatórios
- Interface moderna com ícones

### ✅ Read (Consultar)
- Listagem de todos os pacotes de viagem cadastrados
- Exibição em tabela organizada com estatísticas
- Dashboard com total de pacotes e vagas
- Interface responsiva e atrativa

### ✅ Update (Atualizar)
- Edição de dados dos pacotes existentes
- Formulário pré-preenchido com dados atuais
- Confirmação de alterações
- Design diferenciado para edição

### ✅ Delete (Excluir)
- Exclusão de pacotes do sistema
- Confirmação JavaScript antes da exclusão
- Redirecionamento automático

## Campos da Tabela Viagens
- **id**: INT, auto incremento, chave primária
- **destino**: VARCHAR(100), não nulo
- **codigo_pacote**: VARCHAR(20), não nulo
- **duracao_dias**: INT, não nulo
- **quantidade_vagas**: INT, não nulo

## Tecnologias Utilizadas
- **PHP**: Linguagem de programação principal
- **MySQL**: Banco de dados
- **HTML/CSS**: Interface do usuário moderna
- **JavaScript**: Confirmação de exclusão

## Segurança
- Uso de prepared statements para prevenir SQL injection
- Validação de parâmetros GET
- Sanitização de dados de entrada com bind_param()

## Design e Interface
- Interface moderna com tema azul
- Ícones emoji para melhor usabilidade
- Efeitos hover e transições CSS
- Dashboard com estatísticas
- Design responsivo

## Como Usar
1. Acesse `http://localhost/lucas_freitas_viagens`
2. Visualize o dashboard com estatísticas
3. Use o botão "✈️ Nova Viagem" para cadastrar pacotes
4. Use os botões "✏️ Editar" e "🗑️ Excluir" na tabela para gerenciar os registros

## Estrutura do Banco de Dados
```sql
CREATE DATABASE agencia_viagens;

USE agencia_viagens;

CREATE TABLE viagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destino VARCHAR(100) NOT NULL,
    codigo_pacote VARCHAR(20) NOT NULL,
    duracao_dias INT NOT NULL,
    quantidade_vagas INT NOT NULL
);
```


