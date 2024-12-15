function cancelOrder(itemId) {
  const user = document.getElementById("user");
  const page = document.getElementById("page");
  
  fetch("../../PHP/includes/cancelOrder.inc.php", {
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
        "./main.php?user=" + user.value + "&page=" + page.value;
    });
}
