# Programação Reativa utilizando PHP

Este repositório contém exemplos e projetos desenvolvidos para ilustrar conceitos de programação reativa utilizando PHP, com ênfase em ReactPHP e WebSockets.

## Conteúdos

### 1. Servidor de Sockets

Neste diretório, você encontrará exemplos de como criar e gerenciar um servidor de sockets em PHP. O conteúdo inclui:
- Configuração e inicialização de um servidor de socket.
- Gerenciamento de conexões simultâneas.
- Exemplos de comunicação via sockets.

### 2. Chat em Tempo Real

Este diretório contém o projeto de um chat em tempo real utilizando WebSockets com ReactPHP e Ratchet. O conteúdo inclui:
- Configuração do servidor WebSocket.
- Código do cliente WebSocket utilizando a API nativa dos navegadores.
- Tratamento de mensagens enviadas e recebidas tanto pelo servidor quanto pelos clientes.
- Implementação de um chat funcional.

## Ferramentas e Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada para todos os exemplos e projetos.
- **ReactPHP**: Biblioteca para programação assíncrona e reativa em PHP.
- **Ratchet**: Biblioteca para desenvolvimento de aplicações WebSocket em PHP.
- **Guzzle**: Cliente HTTP para PHP que utiliza cURL.
- **cURL**: Biblioteca para transferência de dados com URLs.

## Como Executar os Projetos

1. Clone o repositório:
    ```sh
    git clone https://github.com/seu-usuario/programacao-reativa-php.git
    ```

2. Navegue até o diretório do projeto que deseja executar:
    ```sh
    cd programacao-reativa-php/nome-do-diretorio
    ```

3. Instale as dependências utilizando Composer:
    ```sh
    composer install
    ```

4. Execute o servidor ou script PHP:
    ```sh
    php websocket.php
    ```

## Licença

Este projeto é licenciado sob os termos da [MIT License](LICENSE).

---

Obrigado por explorar este repositório!
