
/**
 * validate the legth of values for input 
 * @param {*} field 
 * @param {*} errs 
 */
function updatelength(field,errs){
 
    var numbers = /^[0-9]+$/;
    var letters = /^[a-z]+[A-Z 0-9]+$/;

    curr_length = document.getElementById(field).value.length;
    if(curr_length == 0){
        document.getElementById(errs).innerHTML = "Field required input";
    }else if(curr_length < 3){
        document.getElementById(errs).innerHTML = "Minimum legth 3 required";
        curr_val = document.getElementById(field).value;
        if(curr_val.match(numbers))
        {
            document.getElementById(errs).innerHTML = "Please enter alphabets";
        }
    }else{
        document.getElementById(errs).innerHTML = "";
        curr_val = document.getElementById(field).value;
        if(curr_val.match(numbers))
        {
            document.getElementById(errs).innerHTML = "Please enter alphabets";
        }
        // if(!curr_val.match(letters)){
        //     document.getElementById(errs).innerHTML = "Name start with alphabets a-z/A-Z and follow by numbers";
        // }
    }
   
}

/**
 * Field is empty or not than give msg
 */
function checkFeild(field,msg){
    curr_length = document.getElementById(field).value.length;
    document.getElementById(msg).innerHTML = "This field require info...";
    if(curr_length <= 5){
        document.getElementById(msg).innerHTML = "This field require info...";
    }else{
        document.getElementById(msg).innerHTML = "";
    }
}

/**
 * Check the Feild input is number or not
 */
function isnumber(field,msg) {
    
    curr_val = document.getElementById(field).value;
    var numbers = /^[0-9]+$/;
    
    if(curr_val.match(numbers))
    {
        document.getElementById(msg).innerHTML = "";
    }else{
        if(curr_val.length==0){
            document.getElementById(msg).innerHTML = "input Required";
        }else{
            document.getElementById(msg).innerHTML = "Only Number Required";
        }    
    }
}

/**
 * Validate the Dropdown list
 * @param {*} field 
 * @param {*} msg 
 */
function checkSelect(field,msg){
    var val= document.getElementById(field).value;
    if(val==='-1'){
        document.getElementById(msg).innerHTML = "Selection required";
    }
}

/**
 * Check the date input is alread have in db or not
 */

function checkName(field,msg){
    curr_val = document.getElementById(field).value;
    
    document.getElementById(msg).innerHTML = curr_val;
}