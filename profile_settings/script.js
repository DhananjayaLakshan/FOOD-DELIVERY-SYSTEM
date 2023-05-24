

function myFunction1() {
    document.getElementById('update_feild1').style.cssText = 'display:block;';
    document.getElementById('update_feild2').style.cssText = 'display:none;';
    document.getElementById('update_feild3').style.cssText = 'display:none;';
    document.getElementById('update_feild4').style.cssText = 'display:none;';
    document.getElementById('update_feild5').style.cssText = 'display:none;';
    
}

function myFunctionclose1() {
    document.getElementById('update_feild1').style.cssText = 'display:none;';
}

function myFunction2() {
    document.getElementById('update_feild2').style.cssText = 'display:block;';
    document.getElementById('update_feild1').style.cssText = 'display:none;';
    document.getElementById('update_feild3').style.cssText = 'display:none;';
    document.getElementById('update_feild4').style.cssText = 'display:none;';
    document.getElementById('update_feild5').style.cssText = 'display:none;';
}

function myFunctionclose2() {
    document.getElementById('update_feild2').style.cssText = 'display:none;';
}

function myFunction3() {
    document.getElementById('update_feild3').style.cssText = 'display:block;';
    document.getElementById('update_feild1').style.cssText = 'display:none;';
    document.getElementById('update_feild2').style.cssText = 'display:none;';
    document.getElementById('update_feild4').style.cssText = 'display:none;';
    document.getElementById('update_feild5').style.cssText = 'display:none;';
}

function myFunctionclose3() {
    document.getElementById('update_feild3').style.cssText = 'display:none;';
}

function myFunction4() {
    document.getElementById('update_feild4').style.cssText = 'display:block;';
    document.getElementById('update_feild1').style.cssText = 'display:none;';
    document.getElementById('update_feild2').style.cssText = 'display:none;';
    document.getElementById('update_feild3').style.cssText = 'display:none;';
    document.getElementById('update_feild5').style.cssText = 'display:none;';
}

function myFunctionclose4() {
    document.getElementById('update_feild4').style.cssText = 'display:none;';
}


function myFunction5() {
    document.getElementById('update_feild4').style.cssText = 'display:none;';
    document.getElementById('update_feild1').style.cssText = 'display:none;';
    document.getElementById('update_feild2').style.cssText = 'display:none;';
    document.getElementById('update_feild3').style.cssText = 'display:none;';
    document.getElementById('update_feild5').style.cssText = 'display:block;';
}

function myFunctionclose5() {
    document.getElementById('update_feild5').style.cssText = 'display:none;';
}

var fun_name;

function fun1(name){
    fun_name = name;
    return fun_name;
}

function fun2(name){
    fun_name = name;
    return fun_name;
}

function fun3(name){
    fun_name = name;
    return fun_name;
}

function fun4(name){
    fun_name = name;
    return fun_name;
}

function fun5(name){
    fun_name = name;
    return fun_name;
}

if(fun_name=='change_email'){
    alert("Email Cahged Sucessflly. Login agin!!");
}