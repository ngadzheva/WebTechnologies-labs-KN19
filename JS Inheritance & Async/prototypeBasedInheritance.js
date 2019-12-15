function Person(name, age) {
    this.name = name;
    this.age = age;

    // this.info = function() {
    //     return this.name + ' ' + this.age;
    // }
}

function Student(name, age, fn) {
    Person.call(this, name, age);

    this.fn = fn;

    let mark;

    this.getMatk = function() {
        return mark;
    }

    this.setMark = function(studentMark) {
        mark = studentMark;
    }

    // this.studentInfo = function() {
    //     return this.info() + ' ' + this.fn;
    // }
}

Student.prototype = Object.create(Person.prototype);

Person.prototype.sayHi = function() {
    return `Hello, ${this.name}`;
}

Student.prototype.welcome = function() {
    return `Welcome, ${this.name}`;
}

Person.prototype.info = function() {
    return this.name + ' ' + this.age;
}

Student.prototype.info = function() {
    return Person.prototype.info.call(this) + ' ' + this.fn;
};

const ivan = new Person('Ivan', 22);
const maria = new Student('Maria', 21, 81999);
const student = new Student('Student name', 21, 81998);
student.info = function() {
    return this.fn;
}

console.log(ivan.sayHi());
console.log(maria.sayHi());

// console.log(ivan.welcome());
console.log(maria.welcome());

console.log(ivan.info());
console.log(maria.info());
console.log(student.info());
console.log(maria.info());
