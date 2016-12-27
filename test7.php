<!DOCTYPE html>
<html>
<body>

<p>Display the path name of the current URL.</p>

<p id="demo"></p>
<p id="demo2"></p>
<script>
var person = [];
person["firstName"] = "John";
person["lastName"] = "Doe";
  console.log(person);
var x={};
(function(element){
  element.yo="yo2";
  element.say_yo=()=>{console.log(element.yo);};

})(x);
x.say_yo();
console.log(x);
var mySingleton = (function () {
  var instance;	// stores a reference to the Singleton
 
  function init() {
    var privateVariable = "I am private";
    var privateRandomNumber = Math.random();
 
    return {
      publicProperty: "I am public",
      getRandomNumber: function() {
        return privateRandomNumber;
      }
    };
  };
 
  return {
    getInstance: function () {
      if ( !instance ) {
        instance = init();
      }
      return instance;
    }
  };
})();

var singleA = mySingleton.getInstance();
var singleB = mySingleton.getInstance();
console.log( singleA.getRandomNumber() === singleB.getRandomNumber() ); // true
</script>

</body>
</html>
