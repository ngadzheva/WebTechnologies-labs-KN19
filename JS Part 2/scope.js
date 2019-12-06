 a = 5;
console.log(a);

let c = 7;

function print() {
    var a = 6;
    let d = 8;

    console.log(c);
    console.log(a);

    return function() {
        return a + c + d;
    }
}

print();

// console.log(a);

// b = 6;
// console.log(b);

let b;

const thisIsConst = 'test';
const obj = {
    prop: 'prop',
    complexProp: {
        prop: 'asd'
    }
};
const arr = [1, 2, 3];

Object.freeze(obj);

function add(a) {
    return function(b) {
        return a + b;
    }
}

const result = add(5);
console.log(result(6));
console.log(result(7));

function asdf(params, callback) {
    return callback(params);
}

function byFive(b) {
    return b * 5;
}

const res = asdf(6, byFive);
console.log(res);

// Callback hell
let func = asdf(6, (a) => {
    let b = 8;
    
    return (c) => {
        return () => {
            return () => {

            }
        }
    }
});

console.log(func(7));

// Event loop

for(var i = 0; i < 10; ++i) {
    setTimeout(function() {
        console.log(i);
    }, 1000);
} // 10 times 10

for(let i = 0; i < 10; ++i) {
    setTimeout(function() {
        console.log(i);
    }, 1000);
} // 0 1 2 ... 9

console.log('executed before callback in setTimeout');