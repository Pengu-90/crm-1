const qty = document.getElementById("qty");
const item = document.getElementById("item");
const user = document.getElementById("user");
let totalAmount;

qty.addEventListener("input", () => {
  if (qty.value <= 0) {
    qty.value = 1;
    console.log("a");
  }
});

function selectItem(price) {
  const totalAmount_show = document.getElementById("amount_show");
  const cal_amount = price * qty.value;

  totalAmount_show.innerHTML = cal_amount;
  totalAmount = cal_amount;
}

const cart_form = document.getElementById("cart_form");
cart_form.addEventListener("submit", (e) => {
  console.log(totalAmount)
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
      console.log(data);
    });
});
