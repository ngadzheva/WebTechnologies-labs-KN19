(function() {
    /**
     * Get the login button
     */
    var login = document.getElementById('login');

    /**
     * Listen for click event on the login button
     */
    login.addEventListener('click', sendForm);
})();

/**
 * Handle the click event by sending an asynchronous request to the server
 * @param {*} event 
 */
function sendForm(event) {
    /**
     * Prevent the default behavior of the clicking the form submit button
     */
    event.preventDefault();

    /**
     * Get the values of the input fields
     */
    var userName = document.getElementById('user-name').value;
    var password = document.getElementById('password').value;

    /**
     * Create an object with the user's data
     */
    var user = {
        userName: userName,
        password: password
    };

    /**
     * Send POST request with user's data to api.php/login
     */
    login('src/api.php/login', {method: 'POST', data: `data=${JSON.stringify(user)}`});
} 

/**
 * Handle the post request
 * @param {*} url 
 * @param {*} settings 
 */
function login(url, settings) {
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: settings.data
    })
    .then(response => response.json())
    .then(data => load(data))
    .catch(error => console.error(error));
}

/**
 * Handle the received response from the server
 * If there were no errors found on validation, the dashboard.html is loaded.
 * Else the errors are displayed to the user.
 * @param {*} response 
 */
function load(response) {
    if(response.success) {
        window.location = 'dashboard.html';
    } else {
        var errors = document.getElementById('errors');
        errors.innerHTML = response.data;
    }
}