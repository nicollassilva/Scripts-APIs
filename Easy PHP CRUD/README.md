## Create, Read, Update, Delete (CRUD PHP)

> Crud desenvolvido para facilitar as consultas e inserções no banco de dados e reduzir linhas de códigos.

![](image.png)

* Inserts, Updates, Select's, Delete's no banco de dados sem se preocupar com parâmetros de variáveis e todas suas estruturas. Esse CRUD fará todo o serviço pesado e facilitará sua vida no dia-a-dia, além de diminuir algumas linhas de código...

# Atualizações:

- [ ] Variações entre inserts, updates, selects.
- [x] Métodos **clearOne** e **clearMore**,
- [x] Método **delete**,
- [x] Método **insert**,
- [x] Método **update**.
- [x] Metódo **selectOneOrMore**,
- [x] Método **selectAll**,
- [x] Método para verificar a existência de tabelas
- [x] Atributo global para comunicar com o banco de dados
- [x] Conexão com o banco de dados (PHP-POO PDO)

## Exemplo de uso

#### - Iniciando

```php
$crud = new CRUD('host', 'user', 'pass', 'dbname', 'charset');
```
> **charset** não obrigatório. Como padrão: **utf8**
------------
#### - Selecionar todos os registros de uma tabela
```php
$crud->selectAllQuery('tabela', 'where', 'order', 'limit');
```
> **order** e **limit** não obrigatório. Como padrão: **nulo**
* _Retorno_: [array]
------------
#### - Selecionar uma ou mais coluna de uma tabela
```php
$crud->selectOneOrMore('tabela', String 'colunas', 'where', 'order', 'limit');
```
> **order** e **limit** não obrigatório. Como padrão: **nulo**
* _Retorno_: [array]
------------
#### - Fazer update em uma ou mais colunas de uma tabela
```php
$crud->update('tabela', String 'coluna(s)', Array ['valor(es)'], 'where');
```
> Todos os campos são obrigatórios
* _Retornos_: (Boolean) true / (String) Erro: _errorInfo_
------------
#### - Fazer inserção em uma tabela
```php
$crud->insert('tabela', String 'parâmetro(s)', Array ['valor(es)']);
```
> Todos os campos são obrigatórios
* _Retornos_: (Boolean) true / (String) Erro: _errorInfo_
------------
#### - Deletar um registro da tabela
```php
$crud->delete('tabela', 'where');
```
> Todos os campos são obrigatórios
* _Retornos_: (Boolean) true / (String) Erro: _errorInfo_
------------
#### - Limpar o registro de uma coluna da tabela
```php
$crud->clearOne('tabela', 'coluna', 'where');
```
> Todos os campos são obrigatórios
* _Retornos_: (Boolean) true / (String) Erro: _errorInfo_
------------
#### - Limpar o registro de uma ou mais colunas da tabela.
```php
$crud->clearMore('tabela', Array ['colunas'], 'where');
```
> Todos os campos são obrigatórios
* _Retornos_: (Boolean) true / (String) Erro: _errorInfo_
------------