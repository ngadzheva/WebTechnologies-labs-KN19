function Person(name, age) {
    this.name = name;
    this.age = age;

    // this.info = function () {
    //     console.log(`${this.name} ${this.age()}`);
    // }

    this.info = () => {
        console.log(`${this.name} ${this.age()}`);
    }
}

function Age(age) {
    this.age = age;

    var asd = 5;

    this.setAsd = (value) => asd = value;
    this.getAsd = () => asd; 

    // this.getAge = function () {
    //     return this.age;
    // }

    this.getAge = () => {
        return this.age;
    }
}

const age = new Age(20);
age.asd; // can not access it here
age.age; // 20
age.getAge();

// const ivan = new Person('Ivan', age.getAge.bind(age));
const ivan = new Person('Ivan', age.getAge);
ivan.info();
// ivan.age();

Person.prototype.getName = function() {
    console.log(this.name);
}

const pesho = new Person('Pesho', age.getAge);
ivan.getName();
pesho.getName();