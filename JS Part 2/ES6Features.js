  
// 1. Destructuring

// Objects destructuring
const ivan = {
    name: 'Ivan',
    age: 22,
    fn: 66299
};

// const name = ivan.name;

let { name } = ivan;
console.log(name);

name = 'sadd';

console.log(ivan.name);

let { name: firstName, maxAge = 30 } = ivan;

console.log(firstName);

// Arrays destructuring
const numbers = [1, 2, 3];
const [ one, two, three ] = numbers;
const [, , last] = numebrs;

const a = 5;
const b = 6;

const [c, d] = [a, b];
[b, a] = [a, b];

// 2. Spread operator

// Spread arrays
const array = [1, 2, 3, 4];
function sum(a, b, c, d) {
    return a + b + c + d;
}
sum(...array);
const [first, ...array] = array;

// Spread objects
const object1 = {
    a: 1,
    b: 2,
    c: 0
};

const object2 = {
    c: 3
};

const newObj = {
    ...object1,
    ...object2
}

const {a, ...object1} = object1;