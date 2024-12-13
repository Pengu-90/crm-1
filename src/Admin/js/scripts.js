/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

function user_details(
  fname,
  lname,
  address,
  city,
  prov,
  zip,
  country,
  email,
  num,
  user,
  id
) {
  const fname_inp = document.getElementById("firstname");
  const lname_inp = document.getElementById("lastname");
  const address_inp = document.getElementById("address");
  const city_inp = document.getElementById("city");
  const province_inp = document.getElementById("province");
  const zip_inp = document.getElementById("zip");
  const country_inp = document.getElementById("country");
  const email_inp = document.getElementById("email");
  const contact_inp = document.getElementById("contact");
  const user_inp = document.getElementById("username");
  const user_id = document.getElementById("user_id");

  fname_inp.value = fname;
  lname_inp.value = lname;
  address_inp.value = address;
  city_inp.value = city;
  province_inp.value = prov;
  zip_inp.value = zip;
  country_inp.value = country;
  email_inp.value = email;
  contact_inp.value = num;
  user_inp.value = user;
  user_id.value = id;
}

function emp_details(
  fname,
  lname,
  email,
  user,
  id
) {
  const fname_inp = document.getElementById("emp_firstname_edit");
  const lname_inp = document.getElementById("emp_lastname_edit");
  const email_inp = document.getElementById("emp_email_edit");
  const user_inp = document.getElementById("emp_username_edit");
  const emp_id = document.getElementById("emp_id_edit");

  fname_inp.value = fname;
  lname_inp.value = lname;
  email_inp.value = email;
  user_inp.value = user;
  emp_id.value = id;
}

const user_form = document.getElementById("user_form");
const firstname = document.getElementById("add_firstname");
const lastname = document.getElementById("add_lastname");
const address = document.getElementById("add_address");
const city = document.getElementById("add_city");
const province = document.getElementById("add_province");
const zipcode = document.getElementById("add_zipcode");
const country = document.getElementById("add_country");
const number = document.getElementById("add_number");
const email = document.getElementById("add_email");
const username = document.getElementById("add_username");
const password = document.getElementById("add_password");
const password2 = document.getElementById("add_password2");

// console.log('as')

user_form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (password.value == password2.value) {
    fetch("../../PHP/includes/signup.inc.php", {
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
        if (data != null) {
          location.href = "./main.php?page=users";
        }
      });
  }
});

const task_form = document.getElementById("task_assign_form");
const task_admin = document.getElementById("admin_list");
const task_name = document.getElementById("task_name");
const cartId = document.getElementById("cart_id");
const orderId = document.getElementById("orderId");

task_form.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/task_assign.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset = utf-8",
    },
    body: JSON.stringify({
      admin: task_admin.value,
      task: task_name.value,
      cartId: cartId.value,
      orderId: orderId.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data != false) {
        location.href = "./main.php?" + link_head + "&page=orders_pending";
      } else {
        console.log(data);
        const err = document.getElementById("task_err");
        err.removeAttribute("hidden");
      }
    });
});

function task(id, order_id) {
  cartId.value = id;
  orderId.value = order_id;
}

const emp_form = document.getElementById("emp_form");
const emp_firstname = document.getElementById("emp_firstname");
const emp_lastname = document.getElementById("emp_lastname");
const emp_email = document.getElementById("emp_email");
const emp_username = document.getElementById("emp_username");
const emp_password = document.getElementById("emp_password");
const emp_password2 = document.getElementById("emp_password2");

emp_form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (emp_password.value == emp_password2.value) {
    fetch("../../PHP/includes/signup_emp.inc.php", {
      method: "post",
      headers: {
        "Content-Type": "application/json; charset = utf-8",
      },
      body: JSON.stringify({
        lastname: emp_lastname.value,
        firstname: emp_firstname.value,
        email: emp_email.value,
        username: emp_username.value,
        password: emp_password.value,
      }),
    })
      .then((res) => res.text())
      .then((data) => {
        if (data != null) {
          console.log(data);
          // location.href = "./main.php?page=users";
        }
      });
  }
});

const shipping_form = document.getElementById("shipping_form");
const shipping_orderId = document.getElementById("shipping_orderId");
const link_head = document.getElementById("link_head").value;

shipping_form.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/shipping.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset = utf-8",
    },
    body: JSON.stringify({
      orderId: shipping_orderId.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data != false) {
        location.href = "./main.php?" + link_head + "&page=orders_process";
      } else {
        console.log(data);
      }
    });
});

function ship(order_id) {
  shipping_orderId.value = order_id;
}


const deliver_form = document.getElementById("deliver_form");
const deliver_orderId = document.getElementById("deliver_orderId");

deliver_form.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/deliver.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset = utf-8",
    },
    body: JSON.stringify({
      deliverId: deliver_orderId.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data != false) {
        location.href = "./main.php?" + link_head + "&page=orders_shipping";

      } else {
        console.log(data);
      }
    });
});

function deliver(order_id) {
  deliver_orderId.value = order_id;
}



const edit_user = document.getElementById("user_edit_form");
const edit_firstname = document.getElementById("firstname");
const edit_lastname = document.getElementById("lastname");
const edit_address = document.getElementById("address");
const edit_city = document.getElementById("city");
const edit_province = document.getElementById("province");
const edit_zip = document.getElementById("zip");
const edit_country = document.getElementById("country");
const edit_email = document.getElementById("email");
const edit_contact = document.getElementById("contact");
const edit_username = document.getElementById("username");
const edit_password = document.getElementById("pwd");
const edit_id = document.getElementById("user_id");

edit_user.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/edit_user.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset = utf-8",
    },
    body: JSON.stringify({
      lastname: edit_lastname.value,
      firstname: edit_firstname.value,
      address: edit_address.value,
      city: edit_city.value,
      province: edit_province.value,
      zip: edit_zip.value,
      country: edit_country.value,
      contact: edit_contact.value,
      email: edit_email.value,
      username: edit_username.value,
      password: edit_password.value,
      id: edit_id.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data != null) {
        location.href = "./main.php?page=users";
      }
    });
});

const edit_emp = document.getElementById("emp_edit_form");
const edit_firstname_emp = document.getElementById("emp_firstname_edit");
const edit_lastname_emp = document.getElementById("emp_lastname_edit");
const edit_email_emp = document.getElementById("emp_email_edit");
const edit_user_emp = document.getElementById("emp_username_edit");
const edit_pass_emp = document.getElementById("emp_password_edit");
const edit_id_emp = document.getElementById("emp_id_edit");

edit_emp.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/edit_emp.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset = utf-8",
    },
    body: JSON.stringify({
      lastname: edit_lastname_emp.value,
      firstname: edit_firstname_emp.value,
      email: edit_email_emp.value,
      username: edit_user_emp.value,
      password: edit_pass_emp.value,
      id: edit_id_emp.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      if (data != null) {
        location.href = "./main.php?page=emp";
      }
    });
});
