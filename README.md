# Cadena Original

Crea la cadena original en base a los XSLT liberados por el SAT y la cadena XML del CFDI.

## Instalación

La manera recomendada para instalar esta extensión es a través de composer:

```
php composer.phar require --prefer-dist ktaris/cadenaoriginal "dev-master"
```

O agregándolo directamente al archivo `composer.json`:

```
"ktaris/cadenaoriginal": "dev-master"
```

## Ejemplo de uso


La clase `CadenaOriginal` solamente contiene un método estático que recibe una cadena del XML de un CFDI como argumento, y regresa una cadena de texto correspondiente a la cadena original.

Para su uso, hacer lo siguiente:

```
use ktaris\cadenaoriginal\CadenaOriginal;

$cadenaOriginal = CadenaOriginal::obtener($xml);
```
