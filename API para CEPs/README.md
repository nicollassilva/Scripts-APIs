# API CEP via VIACEP

### Utilização:

**Include**

> Include no arquivo CepInfo.class.php

#### _Base:_

> $cep = new CEP(NUMERO-CEP);

#### _Para buscar apenas uma informação_

> $cep->getOneInfo(informação)

Válidos: ['cep', 'logradouro', 'bairro', 'localidade', 'uf', 'ibge']

#### _Para buscar mais de uma informação_

> $cep->getMoreInfos([array])

Válidos: ['cep', 'logradouro', 'bairro', 'localidade', 'uf', 'ibge']

#### _Para buscar todas as informações que a API retorna_

> $cep->getData();

# Importante

- Para CEPs inválidos retornará:
> **CEP inválido.**

- Para CEPs inexistentes retornará: 
> **CEP inexistente.**