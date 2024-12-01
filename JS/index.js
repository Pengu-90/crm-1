const login = document.getElementById('login_form');
const form = document.getElementById('login-form');
const message_box = document.getElementById('message-error');
const message_close_btn = document.getElementById('message-close');
const usn_inp = document.getElementById('username');
const pwd_inp = document.getElementById('password');
const usn_label = document.getElementById('usn_label');
const pwd_label = document.getElementById('pwd_label');

message_close_btn.addEventListener('click', () => {
    message_box.style.display = 'none';
    usn_inp.style.borderColor = '';
    usn_label.style.color = '';
    pwd_inp.style.borderColor = '';
    pwd_label.style.color = '';

});

usn_inp.addEventListener('click', () => {
    usn_inp.style.borderColor = '';
    usn_label.style.color = '';
})

pwd_inp.addEventListener('click', () => {
    pwd_inp.style.borderColor = '';
    pwd_label.style.color = '';
})

login.addEventListener('submit', (e) => {
    e.preventDefault();

    const user = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('./PHP/includes/login.inc.php', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json; charset = utf-8'
        },
        body: JSON.stringify({
            user: user,
            pwd: password
        })
    })
        .then(res => res.json())
        .then(data => {
            if (data != null) {
                // location.href = './src/user/candidates.php';
                if (data['Role'] == 'user') {
                    location.href = './src/Client/main.php?user=' + data['Id'];
                } else if (data['Role'] == 'admin') {
                    location.href = './src/Admin/main.php?page=dashboard';
                } else {
                    message_box.style.display = 'flex';

                    usn_inp.style.borderColor = 'var(--red)';
                    pwd_inp.style.borderColor = 'var(--red)';
                    usn_label.style.color = "var(--red)";
                    pwd_label.style.color = "var(--red)";
                }
            } else {
                message_box.style.display = 'flex';

                usn_inp.style.borderColor = 'var(--red)';
                pwd_inp.style.borderColor = 'var(--red)';
                usn_label.style.color = "var(--red)";
                pwd_label.style.color = "var(--red)";
            }
        })
})