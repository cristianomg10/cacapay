# API de Pagamento

## Endpoints

### `POST /api/compras`

Realiza uma compra (transação) associada a um cliente identificado pelo CPF.

#### Regras de Negócio

1. **Cliente não existente**: Se o CPF informado não estiver cadastrado, um novo cliente é criado automaticamente com:
   - Saldo promocional de **R$ 50,00**
   - Cidade padrão "Não Informada"
   - Telefone, senha e número da conta gerados automaticamente

2. **Saldo insuficiente**: Se o valor da compra ultrapassar o saldo do cliente, a transação é **negada** (erro 422).

3. **Saldo suficiente**: Se o cliente existir e possuir saldo, o valor da venda é descontado do saldo e a transação é registrada com status **Aprovado**.

#### Request Body

| Campo | Tipo | Obrigatório | Descrição |
|---|---|---|---|
| `cpf` | string | sim | CPF do cliente |
| `token` | string | sim | Token de acesso da empresa parceira |
| `valor` | numeric | sim | Valor da compra (mínimo 0.01) |
| `nome` | string | condicional | Nome do cliente (obrigatório apenas se o CPF não existir) |
| `email` | string | condicional | E-mail do cliente (obrigatório apenas se o CPF não existir) |

#### Exemplo de Requisição — Cliente Existente

```json
{
  "cpf": "123.456.789-00",
  "token": "tok_abc123",
  "valor": 30.00
}
```

#### Exemplo de Requisição — Novo Cliente

```json
{
  "cpf": "987.654.321-00",
  "token": "tok_abc123",
  "nome": "João Silva",
  "email": "joao@email.com",
  "valor": 25.00
}
```

#### Resposta de Sucesso (201)

```json
{
  "id": 1,
  "data": "2026-06-08T10:00:00.000000Z",
  "valor": 25.00,
  "status": {
    "id": 1,
    "nome": "Aprovado"
  },
  "cliente": {
    "id": 1,
    "nome": "João Silva"
  },
  "empresa_parceira": {
    "id": 1,
    "razao_social": "Empresa Exemplo"
  }
}
```

#### Resposta de Erro — Dados Inválidos (422)

Quando campos obrigatórios não são enviados ou estão incorretos:

```json
{
  "message": "O campo CPF é obrigatório. (e mais 2 erros)",
  "errors": {
    "cpf": ["O campo CPF é obrigatório."],
    "token": ["O campo token é obrigatório."],
    "valor": ["O campo valor é obrigatório."]
  }
}
```

#### Resposta de Erro — Saldo Insuficiente (422)

```json
{
  "message": "Saldo insuficiente."
}
```

#### Resposta de Erro — CPF não cadastrado sem nome (422)

```json
{
  "message": "O campo nome é obrigatório quando o CPF não está cadastrado.",
  "errors": {
    "nome": ["O campo nome é obrigatório quando o CPF não está cadastrado."]
  }
}
```
