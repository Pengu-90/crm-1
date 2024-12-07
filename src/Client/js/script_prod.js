const qty = document.getElementById("qty");
const item = document.getElementById("item");
const user = document.getElementById("user");
const page = document.getElementById("page");
let totalAmount;

qty.addEventListener("input", () => {
  if (qty.value < 0) {
    qty.value = 1;
  }
});

function selectItem(price) {
  // const totalAmount_show = document.getElementById("amount_show");
  const cal_amount = price * qty.value;

  // totalAmount_show.innerHTML = cal_amount;
  totalAmount = cal_amount;
}

const cart_form = document.getElementById("cart_form");
cart_form.addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("../../PHP/includes/addToCart.inc.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json; charset= utf-8",
    },
    body: JSON.stringify({
      qty: qty.value,
      item: item.value,
      user: user.value,
      amount: totalAmount,
    }),
  })
    .then((res) => res.text())
    .then((data) => {
      // document.querySelector('#payment .btn-close').click();
      location.href = "./main.php?user=" + user.value + "&page=main";
    });
});
