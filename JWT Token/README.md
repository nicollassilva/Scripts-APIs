# Gerar token JWT para APIs RESTFUL.

### Como gerar um token?

```php
echo JWTGenerate();
```

### Como validar um token?

```php
var_dump(JWTValidate($token));
```

* _Retorno_: (Bool) true/false