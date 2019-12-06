const config = {
    host: 'localhost',
    port: 8080,
    connect: function() { console.log('Connecting...'); }
};

config.host;

config.connect()

const basketModule = (function () {
    let basket = [];

    return {
        addItem: function (item) { basket.push(item); },
        getItemCount: function() { return basket.length; },
        getItems: function() { return basket; }
    };
})();

basketModule.addItem('sads');
