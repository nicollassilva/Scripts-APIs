# Easy Notifications
> com CSS/Javascript&Jquery

> Script bem simples, indico para quem está iniciando! (:

![](image.png)

* Demonstração: https://nicollas.dev.br/projects/easynotifications/

## Exemplo de uso

```javascript
$('.btn-warning').click(function() { Alert.setAlert('topRight', 'warning', 'Exemplo de alerta 2', 3000) })
```
* Índice:
```javascript
Alert.setAlert(posição, tipo, mensagem, tempo)
``` 

> Posições:
* topLeft, bottomLeft
* topRight, bottomRight

> Tipos:

* success, warning, primary, danger

> Tempo:

* Milisegundos, ex: 3000 (3 segundos)
------------
