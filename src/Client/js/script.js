const signup = document.getElementById("signup_form");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const address = document.getElementById("address");
const city = document.getElementById("city");
const province = document.getElementById("province");
const zipcode = document.getElementById("zipcode");
const country = document.getElementById("country");
const number = document.getElementById("number");
const email = document.getElementById("email");
const username = document.getElementById("username");
const password = document.getElementById("password");
const password2 = document.getElementById("password2");

// console.log('as')

signup.addEventListener("submit", (e) => {
  e.preventDefault();

  if (password.value == password2.value) {
    fetch("../../../PHP/includes/signup.inc.php", {
      method: "post",
      headers: {
        "Content-Type": "application/json; charset = utf-8",
      },
      body: JSON.stringify({
        lastname: lastname.value,
        firstname: firstname.value,
        email: email.value,
        address: address.value,
        username: username.value,
        password: password.value,
      }),
    })
      .then((res) => res.text())
      .then((data) => {
        if(data != null) {
            console.log(data)
        }
      });
  }
});
