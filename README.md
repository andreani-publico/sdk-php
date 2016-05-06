# SDK de PHP para integración con servicios Andreani

* [Instalación](#instalacion)
* [Uso](#uso)
* [Llamadas Propias](#llamadas_propias)

<a name="instalacion"></a>
## Instalación:

Para las instrucciones de instalación se presume que su aplicación utiliza [Composer](https://getcomposer.org/), si en su proyecto no tiene incorporada esta herramienta (primero considere utilizarla, ¡es muy útil!) deberá descargar el repositorio completo y definir manualmente los namespaces (o hacer los `includes` según corresponda).

###### Agregue la siguiente línea dentro de la sección `require` de su composer.json

```json
    "andreani/sdk-php": "dev-master"
```

###### Corra el comando `composer update` y una vez finalizado el proceso debería ver el directorio "andreani" dentro de sus vendors.

<a name="uso"></a>
## Uso:

Las llamadas a los servicios de Andreani están modeladas en objetos que implementan la interfaz WebserviceRequest. Este SDK trae incorporadas probablemente todas las llamadas que vaya a necesitar (más abajo se explica como desarrollar llamadas propias e incorporarlas al circuito).

Por otro lado, la clase principal que gestiona la comunicación es la clase Andreani. Para instanciarla se debe pasar como parámetros obligatorios el `username` y el `password`. Opcionalmente se le puede pasar un entorno (`test` para que apunte al entorno de pruebas de Andreani, por defecto `prod` para producción).

Los pasos a seguir serían los siguientes:

1. Instanciar un objeto del tipo WebserviceRequest.
2. Setear los datos para la llamada
3. Instanciar la clase Andreani.
4. Llamar al método `call` pasándole el Request como parámetro

Ejemplo para realizar una cotización de prueba:

```php
    use Andreani\Andreani;
    use Andreani\Requests\CotizarEnvio;

    // Los siguientes datos son de prueba, para la implementación en un entorno productivo deberán reemplazarse por los verdaderos
    $request = new CotizarEnvio();
    $request->setCodigoDeCliente('CL0003750');
    $request->setNumeroDeContrato('400006709');
    $request->setCodigoPostal('1014');
    $request->setPeso(500);
    $request->setVolumen(100);
    $request->setValorDeclarado(100);

    $andreani = new Andreani('eCommerce_Integra','passw0rd','test');
    $response = $andreani->call($request);
    if($response->isValid()){
        $tarifa = $response->getMessage()->CotizarEnvioResult->Tarifa;
        echo "La cotización funcionó bien y la tarifa es $tarifa";
    } else {
        echo "La cotización falló, el mensaje de error es el siguiente";
        var_dump($response->getMessage());
    }
```

Como se muestra en el ejemplo, toda llamada devuelve un objeto del tipo Response, capaz de responder si la llamada fue o no exitosa (con el método `isValid`) y que con el método `getMessage` retorna literalmente la respuesta del webservice.

<a name="llamadas_propias"></a>
## Llamadas propias

Si necesita desarrollar sus propias llamadas a los webservices (por ejemplo, por si tiene en los sistemas de Andreani un webservice hecho a medida) puede hacerlo y aún utilizar el sdk.

Los pasos serían los siguientes:

1. Desarrollar una clase que implemente la interfaz `Andreani\Resources\WebserviceRequest`. Esta interfaz lo obligará a implementar el método `getWebserviceRequest` que deberá retornar un índice que la identifique.
2. Generar un archivo del tipo `json` para la configuración. Este archivo contiene la configuración de cada webservice (identificado por el índice del paso anterior).
3. Adapter del request a los parámetros del webservice, es decir, una clase cuya responsabilidad es generar (a partir de un WebserviceRequest) los parámetros necesarios para la consulta. La clase a utilizar también se define en el archivo de configuración.

Ejemplo de una llamada propia:

```php
namespace MiApp\Requests;

use Andreani\Resources\WebserviceRequest;

class MiRequest implements WebserviceRequest{

    protected $dato;

    public function setDato($dato){
        $this->dato = $dato;
    }

    public function getDato(){
        return $this->dato;
    }

    public function getWebserviceIndex() {
        return 'mi_request';
    }

}
```

```json
{
    "resources": {
        "argument_converter": "\\MiApp\\Resources\\MiArgumentConverter"
    },
    "webservices": {
        "prod": {
            "mi_request": {
                "url": "https://www.e-andreani.com/CASAWS/eCommerce/WebserviceAMedida.svc?wsdl", #url del webservice
                "method": "Metodo", #el nombre del método
                "headers": ["auth"], #los headers que utiliza, normalmente 'auth' cuando requiere autenticación o un array vacío cuando no la requiere
                "message_type":"external"
            }
        },
        "test": {
            "cotizacion": {
                "url": "https://www.e-andreani.com/CasaStaging/eCommerce/WebserviceAMedida.svc?wsdl",
                "method": "Metodo",
                "headers": ["auth"],
                "message_type":"external"
            }
        }
    }
}

```

```php
namespace MiApp\Resources;

use Andreani\Resources\WebserviceRequest;
use Andreani\Resources\ArgumentConverter;

class MiArgumentConverter implements ArgumentConverter{

    public function getArgumentChain(WebserviceRequest $consulta){
        if($consulta->getWebserviceIndex() == 'mi_request') return $this->convertMiRequest($consulta);
    }

    protected function convertMiRequest(WebserviceRequest $consulta){
        $arguments = array(
            'Metodo' => array(
                'Dato' => $consulta->getDato()
            )
        );

        return $arguments;
    }

}
```
