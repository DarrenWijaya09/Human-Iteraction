alert("Hello World");
console.log("Hello World From Console Log")


var username = "John"
let newUserName = "John Doe"

const PI = 3.14
console.log(username);
console.log("New username " + newUserName)
console.log("PI Value ", PI)

let name = "John Wick"
let isAdult = true
console.log("Name is " + name + isAdult + isAdult)

// Array
let array = ["Apple", "Orange", 12, true]
console.log(array)
console.log("First Element " + array[0])

// Object
let person = {
    name: "Patrick",
    age: 10,
    isAdult: false,
}
console.log(person.age)
console.log(person[age])

// Repetition
for ( let i = 1; i < 5; i++ ) {
    console.log(i)
}

for(let elemen in array ) {
    console.log(elemen)
}

let countDown = 18
while ( countDown > 0 ) {
    console.log(countDown);
    countDown--;
}

let grade = "90"
if ( grade > 89 ) {
    console.log("A")
} else if ( grade === 90 ) {
    console.log("Grade 90")
} else {
    console.log("B")
}

function sum(a,b) {
    return a + b
}

const divide = function(a, b) {
    return a / b
}

console.log("Sum " + sum(10, 5))
console.log("Dividision " + divide(20,2))

const greet = (username, age) => {
    return username + " Age is " + age
}