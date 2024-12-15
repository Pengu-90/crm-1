function login() {
  location.href = "../../index.php";
}
function logout() {
  location.href = "../../PHP/includes/logout.inc.php";
}

setInterval(() => {
  const user = document.getElementById("user");

  fetch("../../PHP/includes/fetchNotify.inc.php", {
    method: "post",
    headers: { "Content-Type": "application/json; charset = utf-8" },
    body: JSON.stringify({
      user: user.value,
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      if (data != false) {
        const notify = document.getElementById("notif_icon");
        notify.setAttribute("src", "../img/../img/notification-green-1.5.svg");
      } else {
        const notify = document.getElementById("notif_icon");
        notify.setAttribute("src", " ../img/../img/notification-1.5em.svg");
      }
    })
    .catch((error) => {
      console.log(error);
    });

  fetch("../../PHP/includes/fetch_notif.inc.php", {
    method: "post",
    headers: { "Content-Type": "application/json; charset = utf-8" },
    body: JSON.stringify({
      user: user.value,
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      const content =document.getElementById('notif_content');

      content.innerHTML = data;
    })
    .catch((error) => {
      console.log(error);
    });
}, 1000);

const notif_link = document.getElementById("notif_link");

notif_link.addEventListener("click", () => {
  const notify = document.getElementById("notif_icon");
  const user = document.getElementById("user");

  notify.setAttribute("src", " ../img/../img/notification-1.5em.svg");

  fetch("../../PHP/includes/updateNotif.inc.php", {
    method: "post",
    headers: { "Content-Type": "application/json; charset = utf-8" },
  })
    .then((response) => response.text())
    .then((data) => {
      const notify = document.getElementById("notif_icon");
      notify.setAttribute("src", " ../img/../img/notification-1.5em.svg");
    })
    .catch((error) => {
      console.log(error);
    });
});
