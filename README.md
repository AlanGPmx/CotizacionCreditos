<p align="center">
  <a href="https://www.gruposalinas.com" target="_blank"><img src="hhttps://www.gruposalinas.com/Content/iconos/LogoGS-main.svg" width="200px" height="auto"></a>
</p>


# Prueba técnica de Grupo Salinas
En la dirección de Canales de terceros, se requiere realizar un pequeño sistema de cotización de productos a crédito, el cual debe contar con 3 secciones:

* 1. Sección de administración de productos.
* 2. Sección de administración de plazos.
* 3. Sección de cotización de créditos.

## Notas importantes

* **Sistema realizado en Laravel 8 (PHP) usando Bootstrap:CSS, jQuery:Javascript**
* **Se pueden crear, editar, eliminar y visualizar Productos, Categorias y Plazo de pago**
* **Las cuentas requieren un email y un nombre, así como su contraseña**
* **Se realizó el código para usar roles de usuario, pero por tiempo no se implementó**
* **La interacción total es en usuario con rol de administrador**

## Bonus 3
# ¿Cómo harías una función en donde multipliques dos números dados sin USAR "*" como operador?
La forma más rápida es realizando un ciclo que sume el nummero 1 tantas veces el número 2 lo indique, auqnue ineficiente, es una forma de resolver el problema.

Por otro lado se implementaría una función recursiva que obtenga ambos números y se mande a llamar hasta obtener el resultado que satisfaga las condiciones implementadas, ejemplo:

**Implementado en Python:**
````
def multiplicacion(a,b)
    if b < 0:
        return -multiplicacion(a,-b)
    elif b == 0:
        return 0
    elif b == 1:
        return a
    else:
        return a + multiplicacion(a, b - 1)
````
## Bonus 4
# ¿Que son los parámetros nombrados en JavaScript y para qué sirven?
Son los también llamados **parámetros predeterminados** o **parámetros inicializados** de una función que harán que se inicien con valores predeterminados si no se pasa ningún valor sin que lleguen a estar undefined, asignándoles un valor por defecto; ejemplo:

````
function multiplicar(a, **b = 1**) {
  return a * b;
}
````

### Bonus 5
# ¿Qué métodos de un array en JavaScript conoces?

* **forEach()**: Nos permite iterar el contenido, recibe un callback que toma como parámetro el elemento actual de la iteración y el indice del mismo.
````
const array = ['Elemento 1', 'Elemento 2', 'Elemento 3', 'Elemento 4']
const resutado = array.forEach((element, i) => {
    console. log(`$element} se encuentra en el indice $(i}`)
});
````

* **isArray()**: Indicará si el valor que se le pase es un Array.
````
const array = ['Elemento 1', 'Elemento 2', 'Elemento 3', 'Elemento 4']
const intNum1 = 99;

Array.isArray(array) // True
Array.isArray(intNum1) // False
````

* **reverse()**: Invierte el orden de los elementos.
````
const array = ['Elemento 1', 'Elemento 2', 'Elemento 3', 'Elemento 4']
array.reverse(); // ['Elemento 4', 'Elemento 3', 'Elemento 2', 'Elemento 1']
````

* **find()**: Recorre el array y devuelve la primer coincidencia.
````
const array = [1,2,3,4,5,6,7]
const resultArray = array.find(element => element > 3)
````

* **push()**: Añade elementos al final de un array.
````
const array = ['Elemento 1', 'Elemento 2', 'Elemento 3']
array.push('Elemento 4')
console.log(array)  // ['Elemento 1', 'Elemento 2', 'Elemento 3', 'Elemento 4']
````

* **map()**: Sirve para recorrer el array y modificar los elementos del mismo, retornando un nuevo array.
````
const array = [1,2,3,4,5,6,7]
const resultArray = array.map(element => element + 10)
console.log(resultArray)    //[11,12,13,14,15,16,17]
````

* **pop()**: Elimina el último elemento de un array.
````
const array = ['Elemento 1', 'Elemento 2', 'Elemento 3']
array.pop('Elemento 3')
console.log(array) // ['Elemento 1', 'Elemento 2']
````

* **sort()**: Ordena los elementos del array y retorna el arreglo ordenado.
````
const array = [1,2,3,4,5,6,7]
const abecedario = ['g', 'd', 'c', 'o', 'd', 'e', 'v']

// Ordenar en forma descendente
const descArray = array.sort((a, b) = a>b?-1:1)
console.Log(descArray) // [7, 6, 5, 4, 3, 2, 1]

// Ordenar en forma ascendente
const ascArray = abecedario.sort((a,b)a>b?1:-1)
console.log(ascArray) // ('c', 'd', 'd', "e', 'g', v']
````

* **concat()**: Une dos o más arrays, sin modificarlos, pues creará uno nuevo.
````
const arravl = ['a', 'b', 'c']
const arrav2 = ['d', 'e', 'f']
const resultArray = arrayl.concat (array2)
console. log(resultArrav) // ['a', 'b', 'c', 'd', 'e', 'f']
````

* **indexOf()**: Retorna el primer índice en el que se puede encontrar un elemento dado en el array, ó retorna -1 si el elemento no se encontró.
````
const array = ['alan', "roberto', 'luis']
const resultArray = array.indexOf( 'roberto')
console.Log(resultArray)        //2
````

* **slice()**: Retorna una copia de una parte del array, indicado por sus parametros.
````
const array = ['a', 'b', 'c', 'd', 'e', 'f']
const resultArray = array.slice(2,4)
console.log(resultArray)        //['c','d']
````