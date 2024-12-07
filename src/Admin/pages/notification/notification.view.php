<p id="a">
</p>

<script>
    const display_data = document.getElementById('a');

    setInterval(() => {
        fetch("./pages/notification/customer.update.php", {
                method: "get",
                headers: {
                    "Content-Type": "application/json; charset = utf-8",
                },
            })
            .then((res) => res.text())
            .then((data) => {
                if (data != null) {
                    display_data.innerHTML = data
                    // location.href = "./main.php?page=pending";
                }
            });
    }, 2000)
</script>