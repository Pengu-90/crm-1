function delete_cart_item(itemId) {
  fetch("../../PHP/includes/deleteFromCart.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset= utf-8",
    },
    body: JSON.stringify({
      itemId: itemId,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      location.href =
        "./" + page.value + ".php?user=" + user.value + "&page=" + page.value;
    });
}

const checkout_form = document.getElementById("checkout_form");

checkout_form.addEventListener("submit", (e) => {
  e.preventDefault();

  const user = document.getElementById("user");
  const page = document.getElementById("page");
  // const payment = document.getElementById("pay_method");

  fetch("../../../PHP/includes/checkout.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset= utf-8",
    },
    body: JSON.stringify({
      user: user.value,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      location.href = "../main.php?user=" + user.value + "&page=main";
    });
});
