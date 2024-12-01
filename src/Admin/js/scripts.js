/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function user_details(fname, lname, address, city, prov, zip, country, email, num, user) {
    const fname_inp = document.getElementById('firstname');
    const lname_inp = document.getElementById('lastname');
    const address_inp = document.getElementById('address');
    const city_inp = document.getElementById('city');
    const province_inp = document.getElementById('province');
    const zip_inp = document.getElementById('zip');
    const country_inp = document.getElementById('country');
    const email_inp = document.getElementById('email');
    const contact_inp = document.getElementById('contact');
    const user_inp = document.getElementById('username');

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

}
