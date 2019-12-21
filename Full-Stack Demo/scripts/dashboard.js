(function(){
    /**
     * Send GET request to api.php/dashboard to get user's data
     */
    ajax('src/api.php/dashboard', {method: 'GET'});

    /**
     * Get the logout button
     */
    var logoutBtn = document.getElementById('logout');
    /**
     * Listen for click event on the logout button
     */
    logoutBtn.addEventListener('click', logout);
})();

/**
 * Handle the get request
 * @param {*} url 
 * @param {*} settings 
 */
function ajax(url, settings, isLogout) {
    fetch(url, settings)
        .then(response => response.json())
        .then(data => {
            if (isLogout) {
                window.location = 'index.html';
            } else {
                load(data);
            }
        })
        .catch(error => console.error(error));
}

/**
 * Handle the received response from the server
 * If there were no errors, the user's info is displayed.
 * Else the errors are printed to the console.
 * @param {*} response 
 */
function load(response) {
    var userInfo = document.getElementById('user');

    if(response.success) {
        userInfo.innerHTML = `User: ${response.data}`;
    } else {
        console.log(response.data);
    }
}

/**
 * Handle the click event by sending an asynchronous request to the server
 * @param {*} event 
 */
function logout(event) {
    /**
     * Prevent the default behavior of the clicking the form submit button
     */
    event.preventDefault();

    /**
     * Send GET request to api.php/logout to logout the user
     */
    ajax('src/api.php/logout', {method: 'GET'}, true);
}