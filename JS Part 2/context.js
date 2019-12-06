name = 'Super Global';

let pesho = { age: 22, name: 'Pesho' };
let gosho = { age: 21, name: 'Gosho' };
let ivan = { age: 23, name: 'Ivan' };

const sayHi = function (a, b, c) {
    console.log('Hi, I am ' + this.name);
};

sayHi();

pesho.sayHi = sayHi;

pesho.sayHi()

sayHi.call(gosho, 5, 6, 7);
sayHi.apply(ivan, [6, 8, 9]);

pesho.sayHi.call(ivan);
pesho.sayHi.apply(gosho);

gosho.sayHi = pesho.sayHi.bind(pesho);

const student = {
    name: 'Student',
    fn: '62886',
    info: function() {
      return this.name + ' ' + this.fn;
    }
};

student.info();

const studentInfo = student.info;

console.log(studentInfo());

const bindedContext = student.info.bind(student);

console.log(bindedContext());

const greeting = () => `Hello, ${this.name}`;

ivan.greeting = greeting;

console.log(ivan.greeting());