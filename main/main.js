function sendEmail(){
            
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    let message = document.getElementById("message").value;
    
    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "iwtassiments123@gmail.com",
    Password : "386665DAFB8D3A9E7B87C9796583D52A8438",
    To : 'iwtassiments123@gmail.com',
    From : "iwtassiments123@gmail.com",
    Subject : "Mail Form countact us",
    Body : "Name" + name + "<br/>User Email :" +email+ "<br/>Contact Number :" + phone + "<br/>User Massage :"+ message,
    }).then(
    message => alert("Massage Sended.!")
    );
}
