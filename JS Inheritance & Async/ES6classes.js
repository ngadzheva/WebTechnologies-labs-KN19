class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    info() {
        return `${this.name} ${this.age}`;
    }
}

class Student extends Person {
    constructor(name, age, fn) {
        super(name, age);

        this.fn = fn;

        let mark;

        this.setMark = function(newMark) {
            mark = newMark
        };

        this.getMark = function() {
            return mark;
        }
    }

    info() {
        return super.info() + this.fn;
    }
}

const ivan = new Person('Ivan', 22);
const maria = new Student('Maria', 22, 81999);

console.log(ivan.info());
console.log(maria.info());