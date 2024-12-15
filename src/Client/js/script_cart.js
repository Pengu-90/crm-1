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

  const formData = new FormData(checkout_form);
  const urlEncodedData = new URLSearchParams();

  formData.forEach((value, key) => {
    urlEncodedData.append(key, value);
  });

  fetch("../../PHP/includes/checkout.inc.php", {
    method: "post",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: urlEncodedData.toString(),
  })
    .then((response) => response.text())
    .then((data) => {
      location.href = "./main.php?user=" + user.value + "&page=main";
    })
    .catch((error) => {
      console.log(error);
    });
});
