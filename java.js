

function passvalues(){
    var p1= document.getElementById("fname").value;
    var p2= document.getElementById("lname").value;
    console.log("First name: "+p1+" Last name: "+p2)
}


    var signUp = document.getElementById('signupbutton');
    var special=/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    function password(){
        console.log(document.getElementById('password').value)}

    document.getElementById('password').addEventListener('keypress',function(e){
        const key=e.key;
        const keyLower=key.toLowerCase();
        const isUpperCase=(key!==keyLower);
        var upper=false;
        var keypress;
        if(isUpperCase){
            upper=true;

        }
        if(!upper){
            console.log("We need capital");

        }
        if(!special.test(key)){
            console.log("We need special character");

        }



    })

    document.getElementById('password').addEventListener('keypress',function(e){
          if(document.getElementById('password').value !=document.getElementById('repassword').value){
                console.log("passwords must match");
            }
            else{
                console.log("Passwords match");

            }



        })

    var oldValue = '';
    var alert = document.getElementById('alert'); // 10 characters
    var clear = document.getElementById('alert2'); // 1 UpperCase
    var okiDokie = document.getElementById('alert1'); // 1 Special Character



    document.getElementById('password').onkeyup = function(){
        if(!textLength(this.value)){
            this.value = this.value;
            alert.style.color='red';
            console.log(document.getElementById('id').value);
        }
        else {
            alert.style.color='green';
        }
        if(this.value!== this.value.toLowerCase()){
            clear.style.color='green';
        }
        else {
            clear.style.color='red';
        }
        if(containsSpecialChars(this.value)){
            okiDokie.style.color='green';
        }
        else {
            okiDokie.style.color='red';
        }
    }

    function textLength(value){
        var minLength = 10;
        if(value.length < minLength) return false;
        return true;
     }

     function containsSpecialChars(str) {
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        return specialChars.test(str);
      }

     document.getElementById('password').onkeydown=function() {
        var key = event.keyCode||event.charCode; // const {key} = event; ES6+
        if (key === 8) {
           if(document.getElementById('password').value.length-1<10){
            alert.style.color='red';
           }
           else{
            alert.style.color='green';
           }
           if(containsSpecialChars(this.value)){
            okiDokie.style.color='green';
            }
            else {
            okiDokie.style.color='red';
            }
        }
    };