# Software de Venda e Aluguel de Jogos de RPG

Este projeto, desenvolvido como parte da disciplina Desenvolvimento de Aplicações Orientadas a Objetos em 2020.1 no Campus Lages, é um software que facilita a venda e aluguel de jogos de RPG. Abaixo, você encontrará informações sobre as telas do programa e as classes envolvidas.

## Telas

### 1. Login
- Tela inicial onde os funcionários podem fazer login com seu ID e senha.
- Como não há integração com banco de dados, use "funcionario" (sem acentos) como ID e senha.

### 2. Inicial
- Após o login bem-sucedido, esta tela exibe todas as funções do sistema, incluindo registro de jogos, aluguel, devolução, venda e serialização de dados de clientes.

### 3. Alugar jogo
- Para alugar um jogo, insira o ID do jogo e a quantidade desejada e pressione o botão "alugar".

### 4. Vender jogo
- Para vender um jogo, insira o ID do jogo e a quantidade desejada e pressione o botão "vender".

### 5. Serializar cliente
- Para serializar os dados do cliente, insira as informações do cliente, incluindo idade, nome, número de telefone e CPF, e pressione o botão "serializar".

### 6. Devolver jogo
- Para devolver um jogo, insira o ID do jogo e a quantidade desejada e pressione o botão "devolver".

### 7. Cadastrar jogo
- Para cadastrar um novo jogo, insira o ID, a quantidade e o nome do jogo e pressione o botão "cadastrar".

## Classes

1. **Pessoa**
   - Uma classe abstrata.
   - Variáveis:
     - `int id, idade;`
     - `String nome, telefone, cpf.`

2. **Cliente**
   - Uma subclasse de "Pessoa," herdando suas propriedades e métodos.
   - Implementa serialização com "Serializable."
   - Variáveis:
     - As mesmas variáveis da classe "Pessoa."

3. **Alugar_Comprar**
   - Uma interface com métodos:
     - `alugar(int quantidade);`
     - `devolver(int quantidade);`
     - `comprar(int quantidade).`

4. **Jogos**
   - Implementa a interface "Alugar_Comprar."
   - Variáveis:
     - `int id, quantidade, quantidade_disp;`
     - `String nome.`

5. **SistemaVendas**
   - A classe principal que inicia o programa.


## Estrutura do Diretório

```
src/sistemavendas/
|-- Alugar.form
|-- Alugar.java
|-- Alugar_Comprar.java
|-- CadastrarJogo.form
|-- CadastrarJogo.java
|-- Cliente.java
|-- Devolver.form
|-- Devolver.java
|-- Inicio.form
|-- Inicio.java
|-- Jogo.java
|-- Login.form
|-- Login.java
|-- Pessoa.java
|-- SerializarCliente.form
|-- SerializarCliente.java
|-- SistemaVendas.java
|-- Venda.form
|-- Venda.java
```

Aqui está uma breve descrição de cada arquivo:

- `Alugar.form` e `Alugar.java`: Implementam a interface de aluguel de jogos.
- `Alugar_Comprar.java`: Define a interface para alugar, devolver e comprar jogos.
- `CadastrarJogo.form` e `CadastrarJogo.java`: Tratam do cadastro de jogos no sistema.
- `Cliente.java`: Implementa a classe que herda propriedades de "Pessoa" e permite a serialização de dados.
- `Devolver.form` e `Devolver.java`: Lidam com a devolução de jogos.
- `Inicio.form` e `Inicio.java`: Representam a tela inicial do sistema com várias funcionalidades.
- `Jogo.java`: Define a classe que implementa a interface "Alugar_Comprar".
- `Login.form` e `Login.java`: Cuidam do processo de login dos funcionários.
- `Pessoa.java`: É uma classe abstrata com propriedades compartilhadas por outras classes.
- `SerializarCliente.form` e `SerializarCliente.java`: Tratam da serialização de dados do cliente.
- `SistemaVendas.java`: A classe principal que inicia o programa.
- `Venda.form` e `Venda.java`: Lidam com a venda de jogos.

## Contribuição

Se você deseja contribuir para o projeto "Software de Venda e Aluguel de Jogos de RPG", siga estas etapas:

1. Faça um fork do repositório.
2. Clone o repositório forked para o seu ambiente de desenvolvimento.
3. Faça as alterações desejadas e crie um branch para suas modificações.
4. Faça commit das alterações em seu branch.
5. Envie um pull request para o repositório original.
6. Seus pull requests serão revisados e, se aprovados, mesclados ao projeto.

O projeto pode se beneficiar de contribuições relacionadas a correções de bugs, melhorias de código, recursos adicionais ou documentação aprimorada.

Lembre-se de seguir as boas práticas de desenvolvimento, incluir testes, documentar seu código e garantir que suas alterações sejam compatíveis com a estrutura do projeto.

Agradecemos a sua contribuição!

