# Projeto CRUD de Cadastro de Pessoas

Este projeto consiste em um CRUD (Create, Read, Update, Delete) desenvolvido para gerenciar informações de pessoas. O objetivo é permitir a criação, visualização, atualização e exclusão de registros de indivíduos.

## Funcionalidades

- Cadastro de pessoas com campos obrigatórios: Nome, E-mail e Telefone.
- Operações CRUD: Criar, Ler, Atualizar e Deletar registros de pessoas.

## Inicialização do Projeto

Para iniciar o projeto, siga os passos abaixo:

1. **Instalação das Dependências:**
   Execute o script `boot.sh` para instalar as dependências necessárias, iniciar o container do banco de dados, realizar as migrações e criar os registros iniciais das pessoas no banco de dados.

    ```bash
    ./boot.sh
    ```

2. **Execução do Servidor:**
   Após a conclusão do script `boot.sh`, execute o comando abaixo para iniciar o servidor:

    ```bash
    php artisan serve
    ```
