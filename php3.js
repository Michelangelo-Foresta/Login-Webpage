
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

    var oldValue = '';
    var alert = document.getElementById('alert'); // 10 characters
    var clear = document.getElementById('alert2'); // 1 UpperCase
    var okiDokie = document.getElementById('alert1'); // 1 Special Character
    var match = document.getElementById('alert3');
   
    

    document.getElementById('password').onkeyup = function(){
        if(!textLength(this.value)){
            alert.style="display:visible";
            this.value = this.value;
            alert.style.color='red';
        } 
        else {
            alert.style.color='green';
            alert.style="display:none";
        }
        if(this.value!== this.value.toLowerCase()){
            clear.style.color='green';
            clear.style="display:none";
        } 
        else {
            clear.style="display:visible";
            clear.style.color='red';
            
        }
        if(containsSpecialChars(this.value)){
            okiDokie.style.color='green';
            okiDokie.style="display:none";
        } 
        else {
            okiDokie.style="display:visible";
            okiDokie.style.color='red';
           
        }
    }

    function containsUppercase(str) {
        return /[A-Z]/.test(str);
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



