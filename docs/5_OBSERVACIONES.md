# Observaciones al proyecto
## información de la pagina web
la información que nos llega de la url contiene bastantes datos. No he modelado todos, solo aquellos de los que he visto
una utilidad más cercana. Si necesitáramos mas información, tendriamos que añadir el `valueObject` correspondiente, agregarlo
en el objeto `Girl`, y luego en el servicio `arrayToGirls`

## css de front
He revisado los archivos de css de cada proyecto, y dado que son similares, he optado por separar el css común en un archivo
`base.css`, y luego cada uno de los sites tiene su propio archivo. Este archivo se encuentra dentro de la información del archivo
de configuracion de symfony, en la seccion `parameters`. 

Como mejora, se podria incluir un sistema tipo scss, que compilara en un único archivo css los tres que se necesitan.
También habria que revisar todo el css. Quizás se pueda simplificar utilizando un bootstrap o rehaciendo todo desde 0. Esto
último no he optado por ello, porque no me veo actualmente capacitado para temas de frontend/css.

## Url de imagenes
Aunque la información que nos llega de la petición de la url contiene entre otros los thumbnail de cada camara, los datos
solo contienen el nombre del archivo de imagen. No he sido capaz haciendo pruebas con la informacion indicada de ver dicha imagen.
Por ello, he optado por añadir imagenes aleatorias en cada representación de la pagina.

Las imágenes que he elegido son de comic manga. 

## benchmark
La primera prueba de aproximación para ver el rendimiento de la aplicación, ha sido utilizar el comando `ab` de apache,
que nos permite hacer pruebas de benchmark sobre la url. 
El comando a utilizar es:

    ab -n 1000 -c 10 http://{dominio.tld}/

Dado que la aplicación responde a cada uno de los dominios, doy por supuesto que la petición de cada web será muy parecida.
En este caso, he utilizado como dominio `cerdas.com`.

El resultado del benchmark ha sido:

```
Benchmarking cerdas.com (be patient)
Completed 100 requests
Completed 200 requests
Completed 300 requests
Completed 400 requests
Completed 500 requests
Completed 600 requests
Completed 700 requests
Completed 800 requests
Completed 900 requests
Completed 1000 requests
Finished 1000 requests


Server Software:        
Server Hostname:        cerdas.com
Server Port:            80

Document Path:          /
Document Length:        31938 bytes

Concurrency Level:      10
Time taken for tests:   4243.917 seconds
Complete requests:      1000
Failed requests:        992
   (Connect: 0, Receive: 0, Length: 992, Exceptions: 0)
Total transferred:      32211478 bytes
HTML transferred:       31918478 bytes
Requests per second:    0.24 [#/sec] (mean)
Time per request:       42439.173 [ms] (mean)
Time per request:       4243.917 [ms] (mean, across all concurrent requests)
Transfer rate:          7.41 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:  4206 42211 2560.6  42385   43650
Waiting:     4206 42210 2560.6  42385   43650
Total:       4206 42211 2560.6  42385   43650

Percentage of the requests served within a certain time (ms)
  50%  42385
  66%  42455
  75%  42509
  80%  42556
  90%  42680
  95%  42816
  98%  42942
  99%  43158
 100%  43650 (longest request)
```
