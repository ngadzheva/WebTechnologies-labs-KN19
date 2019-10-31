console.log(1 + '1'); // >> 11

console.log('1' + 1); // >> 11

console.log('2' - 1) // >> 1

console.log(2 - '1') // >> 1

console.log(1 == '1'); // >> true

console.log(1 === '1'); // >> false

console.log('a' + 1); // >> a1

console.log('a' * 1) // >> NaN

console.log(1 + +'1') // >> 2

console.log('b' + 'a' + +'a' + 'a') // >> baNaNa

console.log(0.2 + 0.1 === 0.3) // >> false

var a = {
    b: 1,
    c: 2
}

var aa = a;

console.log(aa === a); // >> true

var aaa = {
    b: 1,
    c: 2
}

console.log(aaa === a); // >> false

console.log(a === { b: 1, c: 2 }) // >> false

console.log([1,2,3] === [1,2,3]) // >> false

var arr = [ 1, 'asdf', { b: 1, c: 2 }, a, 5.5 ]

console.log(arr.includes({ b: 1, c: 2 })); // >> false

console.log(arr[5]) // >> undefined
arr.length = 8
arr[7] = 5
console.log(arr) // >> [1, 'asdf', { b: 1, c: 2 }, a, 5.5, emptyx2, 5]

delete arr[3]
console.log(arr) // >> [1, 'asdf', { b: 1, c: 2 }, empty, 5.5, emptyx2, 5]

console.log(new Array(3) == ",,"); // >> true

console.log([1, 2, 3] + [4, 5, 6]) // >> 1, 2, 34, 5, 6

function foo() {
    return
    {
       foo: 'bar'
    }
 }
 
 function bar() {
    return {
       foo: 'bar'
    }
 }
 
 console.log(typeof foo() === typeof bar()); // >> false

 console.log(d = 2); // >> 2

 var d = 5;

 function asdf() {
     for(i = 0; i < 10; i++) {
         var c = i;
     }

     c += 10;
 }